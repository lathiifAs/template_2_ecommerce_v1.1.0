<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/*
----------------------
Created by : Lathiif Aji Santhosho
Phone : 	082126641201
----------------------
*/

class Register_anggota extends Artdev_Controller {

    // constructor
	public function __construct()
	{
		parent::__construct();
		
		//load models
		$this->load->model('sistem/M_user');
        $this->load->model('master/M_produk');
        $this->load->model('client/M_transaksi');

		//parsing data tanpa template
		$this->parsing([
			'title' => 'Daftar Anggota Ecoracing'
		]);
	}

	public function index()
	{
		//default notif
		$notif = $this->session->userdata('sess_notif');
        // cek apakah sudah login
        $user_id = $this->get_login('user_id');
        if(empty($user_id)){
            $this->notif_msg('welcome', 'Error', 'Anda harus Login terlebih dahulu');
        }
        // cek apakah sudah pernah mendaftar
        $cek = $this->M_user->is_exist_anggota_bisnis($user_id);
        if($cek == !0){
            $this->notif_msg('client/beranda', 'Error', 'Anda sudah terdaftar dalam anggota bisnis');
        }
        //data
        $produk = $this->M_produk->get_all_aktif();
        $result = $this->M_user->get_by_id($user_id);
        //parsing
		$data = [
			'tipe'			=> $notif['tipe'],
			'pesan' 		=> $notif['pesan'],
            'result'        => $result,
            'produk'        => $produk,
            'provinsi'		=> $this->ro_get_provinsi(),
		];
		//delete session notif
		$this->session->unset_userdata('sess_notif');
		//parsing (template_content, variabel_parsing)
		$this->client_template('sistem/register_anggota', $data);
	}

    public function register_process()
	{
        //validation
        $this->form_validation->set_rules('user_id', 'User ID', 'trim|required');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('hp', 'No Hp', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|max_length[50]');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
        $this->form_validation->set_rules('jns_kelamin', 'Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('agama', 'Agama', 'trim|required');
        $this->form_validation->set_rules('nik', 'NIK', 'trim|required');
        $this->form_validation->set_rules('kode_pos', 'Kode POS', 'trim|required');
        $this->form_validation->set_rules('nama_bank', 'Nama Bank', 'trim|required');
        $this->form_validation->set_rules('norek', 'Nomor Rekening', 'trim|required');
        $this->form_validation->set_rules('ahli_waris', 'Nama Ahli Waris', 'trim|required');
        $this->form_validation->set_rules('hubungan', 'Hubungan Dengan Ahli Waris', 'trim|required');
        $this->form_validation->set_rules('no_ahli_waris', 'Nomor HP Ahli Waris', 'trim|required');
        $this->form_validation->set_rules('hu', 'Hak Usaha', 'trim|required');
        $this->form_validation->set_rules('pil_produk', 'Pilihan Produk', 'trim|required');
        $this->form_validation->set_rules('sponsor', 'Nama / ID Sponsor', 'trim|required');
        $this->form_validation->set_rules('kurir', 'Kurir', 'trim|required');
        $this->form_validation->set_rules('nominal_transfer', 'Nominal Transfer', 'trim|required');
        $this->form_validation->set_rules('jumlah_transfer', 'Jumlah Transfer', 'trim|required');
        $this->form_validation->set_rules('nama_provinsi', 'Provinsi', 'trim|required');
        $this->form_validation->set_rules('nama_kota', 'Kabupaten', 'trim|required');
        $this->form_validation->set_rules('nama_kecamatan', 'Kecamatan', 'trim|required');

        //cek validasi
        if ($this->form_validation->run() !== FALSE) { 
        
			$params = array(
                'nama'              => $this->input->post('nama'),
                'alamat'            => $this->input->post('alamat'),
                'hp'                => $this->input->post('hp'),
                'tempat_lahir'      => $this->input->post('tempat_lahir'),
                'tanggal_lahir'     => $this->input->post('tanggal_lahir'),
                'jns_kelamin'       => $this->input->post('jns_kelamin'),
                'agama'             => $this->input->post('agama'),
                'nik'               => $this->input->post('nik'),
                'kode_pos'          => $this->input->post('kode_pos'),
                'nama_bank'         => $this->input->post('nama_bank'),
                'norek'             => $this->input->post('norek'),
                'ahli_waris'        => $this->input->post('ahli_waris'),
                'hubungan'          => $this->input->post('hubungan'),
                'no_ahli_waris'     => $this->input->post('no_ahli_waris'),
                'hu'                => $this->input->post('hu'),
                'sponsor'           => $this->input->post('sponsor'),
                'provinsi'          => $this->input->post('nama_provinsi'),
                'kabupaten'         => $this->input->post('nama_kota'),
                'kecamatan'         => $this->input->post('nama_kecamatan'),
                'status_anggota'    => 'aktif',
                'mdd_anggota'       => date('Y-m-d H:i:s') 
            );

            $params_transaksi_bisnis = array(
                'transaksi_bisnis_id'=> $this->input->post('user_id').date('Ymd'),
                'produk_id'         => $this->input->post('pil_produk'),
                'user_id'           => $this->input->post('user_id'),
                'status_transfer'   => 'daftar',
				'kurir'             => $this->input->post('kurir'),
                'nominal_transfer'  => $this->input->post('nominal_transfer'),
                'mdd'               => date('Y-m-d H:i:s') 
            );

            $params_com_user = array(
				'user_mail'	        => $this->input->post('email')
            );
            
            $where = array(
                'user_id'           => $this->input->post('user_id')
            );

            if ($this->M_user->update('user', $params, $where)) {
                $this->M_user->update('com_user', $params_com_user, $where);
                $this->M_user->insert('transaksi_bisnis', $params_transaksi_bisnis);
                
                 //send mail
                $where_pref = array(
                    'jenis_pref' => 'email'
                );
                $rekening_where = array(
                    'jenis_pref' => 'rekening'
                );
                $rekening_pref = $this->M_transaksi->get_pref($rekening_where);
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
                $this->mail_message = 'Selamat anda berhasil mendaftar anggota bisnis di <b>GPMC Sabdaguru</b>,';
                $this->mail_message .= '<br>Silahkan transfer sebesar : <i><b>'.$this->input->post('jumlah_transfer').'</b></i>';
                $this->mail_message .= '<br>Ke rekening <b>'.$rekening_pref['nama_bank'].' : '.$rekening_pref['value_pref'].'</b>';
                $this->mail_message .= '<br>an : <b>'.$rekening_pref['keterangan'].'</b>';
                $this->mail_message .= '<br>Kode Bank : <b>'.$rekening_pref['kode'].'</b>';
                $this->email->from($pref['value_pref'], 'GPMC Sabdaguru');
                $this->email->to($to_email);
                $this->email->subject('Informasi Pendaftaran Anggota Bisnis');
                $this->email->message($this->mail_message); 
                // Send mail 
                if($this->email->send()){
                    //sukses notif
                    $this->notif_msg('client/beranda', 'Sukses', 'Anda berhasil mendaftar anggota bisnis.Silahkan transfer dan konfirmasi.');
                }else{
                    // default error
                    $this->email->print_debugger();die;
    				$this->notif_msg('sistem/register_anggota', 'Error', 'Email gagal dikirimkan');    
                }
            } else {
                // default error
                $this->notif_msg('sistem/register_anggota', 'Error', 'Registrasi anggota bisnis Gagal');
            }
        }else{
            // default error

            $this->notif_msg('sistem/register_anggota','Error', 'Data harus lengkap !');
        }
    }

    public function get_kabupaten_by_prov()
	{
		$prov_id = $this->input->post('prov_id');
		print_r($this->ro_get_kabupaten_by_prov($prov_id));
    }
    public function get_harga_produk()
	{
		$produk_id = $this->input->post('produk_id');
		print_r($this->M_produk->get_harga_by_id($produk_id));
    }
    
    public function get_ongkir()
	{
		// $this->cek($this->input->post());
		$kota_asal = '149'; //indramayu
		$kurir_nama = $this->input->post('kurir_nama');
		$tujuan = $this->input->post('tujuan');
		
		print_r($this->ro_get_onkir($kota_asal,$tujuan, 500, $kurir_nama));
	}
}
