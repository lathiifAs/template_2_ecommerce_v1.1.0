<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/*
----------------------
Created by : Lathiif Aji Santhosho
Phone : 	082126641201
----------------------
*/

class Contact extends Artdev_Controller 
{
    // constructor
	public function __construct()
	{
		parent::__construct();
		
		//load models
		$this->load->model('client/M_kontak');
        
		/*-------------------------------------------------------
		 kosongkan isi parsing js dan css jika tidak digunakan,
		contoh:
		$this->parsing_js([

			]);
		--------------------------------------------------------*/
		//parsing js url
		$this->parsing_js([
		   ]);
		//parsing css url
		$this->parsing_css([
			]);

		//parsing data tanpa template
		$this->parsing([
			'title' => 'Kontak'
		]);
	}

	public function index()
	{
		// set page rules
		$this->_set_page_rule("R");
		//default notif
		$notif = $this->session->userdata('sess_notif');
		//get data
		$result = $this->M_kontak->get_all();
		$data = [
			'tipe'			=> $notif['tipe'],
			'pesan' 		=> $notif['pesan'],
			'result' 		=> $result
		];

		//delete session notif
		$this->session->unset_userdata('sess_notif');
		//parsing (template_content, variabel_parsing)
		$this->parsing_template('setclient/contact/index', $data);
	}

	// edit process
	public function edit_process() {
		// set page rules
		$this->_set_page_rule("U");
        // cek input
        $this->form_validation->set_rules('telephone', 'Nomor Telephone', 'trim|required');
		$this->form_validation->set_rules('no_whatsapp', 'Nomor Whatsapp', 'trim|required');
		$this->form_validation->set_rules('fanpage_fb', 'Fanpage Facebook', 'trim|required');
        $this->form_validation->set_rules('email', 'Alamat Email', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		
        // process
        if ($this->form_validation->run() !== FALSE) {
			$params = array(
				'telephone'		=> $this->input->post('telephone'), 
				'no_whatsapp'	=> $this->input->post('no_whatsapp'), 
				'fanpage_fb' 	=> $this->input->post('fanpage_fb'), 
				'email'			=> $this->input->post('email'), 
				'alamat'		=> $this->input->post('alamat')
			);
			// var_dump($params);exit;
			if (!$this->M_kontak->update('kontak', $params)) {
				//notif gagal
				$this->notif_msg('setclient/contact', 'Error', 'Gagal dirubah !');
			}else{
				$this->notif_msg('setclient/contact', 'Sukses', 'Data berhasil dirubah.');
			}
		}else{
			$this->notif_msg('setclient/contact', 'Error', 'Gagal dirubah !');
		}
    }
}
