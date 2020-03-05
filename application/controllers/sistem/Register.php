<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Coolpraz\PhpBlade\PhpBlade;

class Register extends Artdev_Controller{
    //init var
    public $mail_message = array();

    public function __construct()
    {        
        parent::__construct();
        //load models
		$this->load->model('sistem/M_user');
		$this->load->model('client/M_transaksi');
    }


    public function index()
	{
        //default notif
        $notif = $this->session->userdata('sess_notif');
		$data = [
			'tipe'	=> $notif['tipe'],
			'pesan' => $notif['pesan']
		];
		//delete session notif
		$this->session->sess_destroy('sess_notif');
		//parsing (template_content, variabel_parsing)
		$this->parsing_template_custom('sistem/register', $data);
    }

    public function register_process()
	{
        //validation
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('hp', 'No Hp', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|max_length[50]');

        //cek validasi
        if ($this->form_validation->run() !== FALSE) { 
            $get_password = $this->generateRandomString();
            $password_key = abs(crc32($get_password));
            $password = $this->encrypt->encode(md5($get_password), $password_key);
			// generate user_id
			$prefix = date('ymd');
			$params_prefix = $prefix . '%';
			$user_id = $this->M_user->generate_id($prefix, $params_prefix);
			$params = array(
				'user_id'	    => $user_id,
				'user_name'	    => $this->input->post('email'), 
				'user_pass'	    => $password, 
				'user_key' 	    => $password_key, 
                'user_st'   	=> 1, 
                'default_page'  => 'client/beranda',
				'user_mail'	    => $this->input->post('email'),
				'mdb'		    => $this->get_login('user_id'),
				'mdb_name'	    => $this->get_login('user_name'),
				'mdd'		    => date('Y-m-d H:i:s') 
			);
            // insert
            if ($this->M_user->insert('com_user', $params)) {
                // insert to users
                $params = array(
					'user_id'		=>	$user_id, 
					'nama'			=> 	$this->input->post('nama'), 
					'alamat'		=>	$this->input->post('alamat'), 
					'jns_kelamin'	=>	$this->input->post('jns_kelamin')
				);
                $this->M_user->insert('user',$params);
				// insert hak akses
				$params = array(
					'user_id'		=>	$user_id, 
					'role_id'		=> 	'3'
				);
                $this->M_user->insert('com_role_user', $params);
                //send mail
                $where_pref = array(
                    'jenis_pref' => 'email'
                );
                $pref = $this->M_transaksi->get_pref($where_pref);
                $to_email = $this->input->post('email', TRUE); 
                // //Load email library 
                // config
                $this->load->library('email');
                $config['mailtype'] = 'html';
                $config['charset'] = 'utf-8';
                $config['newline'] = "\r\n";
                $config['protocol'] = 'smtp';
                $config['smtp_host'] = 'artdev.id';
                $config['smtp_port'] = 25;
                $config['smtp_user'] = $pref['value_pref'];
                $config['smtp_pass'] = $pref['keterangan'];
                $this->email->initialize($config);
                $this->mail_message = 'Selamat anda berhasil mendaftar di <b>GPMC Sabdaguru</b>,';
                $this->mail_message .= '<br>Gunakan data ini untuk login:';
                $this->mail_message .= '<p>Username : '. $this->input->post('email', TRUE) .' <br>';
                $this->mail_message .= 'Password : '. $get_password .'.';
                $this->email->from($pref['value_pref'], 'GPMC Sabdaguru');
                $this->email->to($to_email);
                $this->email->subject('Informasi Pendaftaran Akun');
                $this->email->message($this->mail_message); 
                //Send mail 
                if($this->email->send()){
                    //sukses notif
                    $this->notif_msg('sistem/register', 'Sukses', 'Anda berhasil mendaftar, silahkan cek email anda untuk menemukan username dan password untuk login, jika tidak ada di kotak masuk mungkin saja email masuk ke dalam spam.');
                }else{
                    // default error
                    
    				$this->notif_msg('sistem/register', 'Error', 'Email gagal dikirimkan');    
                }
            } else {
				// default error
				$this->notif_msg('sistem/register', 'Error', 'Data gagal ditambahkan');
            }
        }else{
            // default error
            $this->notif_msg('sistem/register','Error', 'Data harus lengkap !');
        }
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}