<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/*
----------------------
Created by : Lathiif Aji Santhosho
Phone : 	082126641201
----------------------
*/

class Profile extends Artdev_Controller {


    // constructor
	public function __construct()
	{
		parent::__construct();
		
		//load models
		$this->load->model('client/M_profile');
        
		//parsing data tanpa template
		$this->parsing([
            'title' => 'Profile',
		]);
	}

	public function index()
	{
		
		//default notif
		$notif = $this->session->userdata('sess_notif');
        $id = $this->get_login('user_id');
        $result = $this->M_profile->get_data_profile($id);
        // $this->cek($result);
        //parsing
        $notif = $this->session->userdata('sess_notif');
		$data = [
            'tipe'			=> $notif['tipe'],
            'pesan' => $notif['pesan'],
            'result'          => $result
			
		];
		//delete session notif
		$this->session->unset_userdata('sess_notif');
		//parsing (template_content, variabel_parsing)
		$this->client_template('client/profile/index', $data);
	}

    public function edit_process()
	{
		$this->form_validation->set_rules('user_id', '', 'trim|required');
        $user_id = $this->input->post('user_id', TRUE);
        $nama = $this->input->post('nama', TRUE);
        $hp = $this->input->post('hp', TRUE);
        $alamat = $this->input->post('alamat', TRUE);
        $jns_kelamin = $this->input->post('jns_kelamin', TRUE);
        $user_name = $this->input->post('user_name', TRUE);
        $password = $this->input->post('password', TRUE);
		//cek validasi
		if ($this->form_validation->run() !== FALSE) {
                // cek apakah password juga diganti
                if(!empty($password)){
                    $password_key = abs(crc32($password));
                    $new_password = $this->encrypt->encode(md5($password), $password_key);
                    // set params
                    $params_user = array(
                        'nama'          => $nama,  
                        'alamat'		=> $alamat,  
                        'jns_kelamin'	=> $jns_kelamin,
                        'hp'            => $hp,
                    );
                    // set params
                    $params_com_user = array(
                        'user_name'     => $user_name,  
                        'user_pass'		=> $new_password,
                        'user_key'      => $password_key,  
                    );
                    // set where
                    $where = array(
                        'user_id' => $user_id,
                    );
                    if ($this->M_profile->update('user', $params_user, $where)){
                        $this->M_profile->update('com_user', $params_com_user, $where);
                        $this->notif_msg('client/profile', 'Sukses', 'Data berhasil diedit');
                    }else{
                        // default error
                        $this->notif_msg('client/profile', 'Error', 'Data gagal diedit');
                    }
                }else{
                     // set params
                    $params_user = array(
                        'nama'          => $nama,  
                        'alamat'		=> $alamat,  
                        'jns_kelamin'	=> $jns_kelamin,
                        'hp'            => $hp,
                    );
                    // set params
                    $params_com_user = array(
                        'user_name'     => $user_name,  
                    );
                    // set where
                    $where = array(
                        'user_id' => $user_id,
                    );

                    if ($this->M_profile->update('user', $params_user, $where)) {
                        //notif
                        $this->M_profile->update('com_user', $params_com_user, $where);
                        $this->notif_msg('client/profile', 'Sukses', 'Data berhasil diedit');
                    }else{
                        // default error
                        $this->notif_msg('client/profile', 'Error', 'Data gagal diedit');
                    }
                }
		} else {
			// default error
			$this->notif_msg('client/profile', 'Error', 'Data gagal diedit');
        }
	}

}
