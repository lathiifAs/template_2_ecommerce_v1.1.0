<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/*
----------------------
Created by : Lathiif Aji Santhosho
Phone : 	082126641201
----------------------
*/

class Group extends MY_Controller {

    // constructor
	public function __construct()
	{
		parent::__construct();
		
		// $this->session->set_userdata('com_user', 'lathiif');
		//load models
		$this->load->model('sistem/M_group');
        
		/*-------------------------------------------------------
		 kosongkan isi parsing js dan css jika tidak digunakan,
		contoh:
		$this->parsing_js([

			]);
		--------------------------------------------------------*/
		//parsing js url
		$this->parsing_js([
			// 'assets/js/jquery.smartWizard.js'
		   ]);
		//parsing css url
		$this->parsing_css([
			// 'assets/css/smart_wizard.css',
			// 'assets/css/smart_wizard_theme_dots.css'
			]);

		//parsing data tanpa template
		$this->parsing([
			'title' => 'Group'
		]);
	}

	public function index()
	{
		// set page rules
		$this->_set_page_rule("R");
		//default notif
		$notif = $this->session->userdata('sess_notif');

		//create pagination
		$this->load->library('pagination');
		$total_row = $this->M_group->count_all();
		$config['base_url'] = base_url('index.php/sistem/group/index/');
		$config['total_rows'] = $total_row;
		$config['per_page'] = 10;
		$from = $this->uri->segment(4);
		$this->pagination->initialize($config);		
		$result = $this->M_group->get_all($config['per_page'],$from);
		if (empty($result)) {
			$no = 0;
		}else{
			$no = 1;
		}

		/*
		isi parameter yang akan di parsing dalam bentuk array 		
		variabel parsing = [
			penamaan 	=> isi dari sebuah data
		];
		*/
		$data = [
			'tipe'			=> $notif['tipe'],
			'pesan' 		=> $notif['pesan'],
			'result' 		=> $result,
			'no' 			=> $no,
			'pagination'	=> $this->pagination->create_links()
		];

		//delete session notif
		$this->session->unset_userdata('sess_notif');
		//parsing (template_content, variabel_parsing)
		$this->parsing_template('sistem/group/index', $data);
	}

	public function add($notif='')
	{
		// set page rules
		$this->_set_page_rule("C");
		//default notif
		$notif = $this->session->userdata('sess_notif');
		$data = [
			'tipe'	=> $notif['tipe'],
			'pesan' => $notif['pesan']
		];
		//delete session notif
		$this->session->unset_userdata('sess_notif');
		//parsing (template_content, variabel_parsing)
		$this->parsing_template('sistem/group/add', $data);
	}

	 // add process
	 public function add_process() {
		// set page rules
		$this->_set_page_rule("C");
        // cek input
		$this->form_validation->set_rules('group_name', 'Nama group', 'trim|required');
		$this->form_validation->set_rules('group_desc', 'Deskripsi group', 'trim|required');
        // get last di group
		$group_id =  $this->M_group->get_last_id();
        // process
        if ($this->form_validation->run() !== FALSE) {
			$params = array(
				'group_id'		=> $group_id,
				'group_name'	=> $this->input->post('group_name'), 
				'group_desc'	=> $this->input->post('group_desc'),
				'mdb'			=> $this->get_login('user_id'),
				'mdb_name'		=> $this->get_login('user_name'),
				'mdd'			=> date('Y-m-d H:i:s') 
			);
            // insert
            if ($this->M_group->insert('com_group', $params)) {
				//sukses notif
				$this->notif_msg('sistem/group/add', 'Sukses', 'Data berhasil ditambahkan');
            } else {
				// default error
				$this->notif_msg('sistem/group/add', 'Error', 'Data gagal ditambahkan !');
            }
        } else {
			// default error
			$this->notif_msg('sistem/group/add', 'Error', 'Data gagal ditambahkan');
        }
    }

	public function detail($group_id='')
	{
		// set page rules
		$this->_set_page_rule("R");
		//cek data
		if (empty($group_id)) {
			// default error
			$this->notif_msg('sistem/group', 'Error', 'Data tidak ditemukan !');
		}

		//parsing
		$data = [
			'result' => $this->M_group->get_by_id($group_id)
		];
		$this->parsing_template('sistem/group/detail', $data);
	}

	public function delete($group_id='')
	{
		// set page rules
		$this->_set_page_rule("D");
		//cek data
		if (empty($group_id)) {
			// default error
			$this->notif_msg('sistem/group', 'Error', 'Data tidak ditemukan !');
		}
		//parsing
		$data = [
			'result' => $this->M_group->get_by_id($group_id)
		];
		$this->parsing_template('sistem/group/delete', $data);
	}

	public function delete_process()
	{
		// set page rules
		$this->_set_page_rule("D");
		$group_id = $this->input->post('group_id', true);
		//cek data
		if (empty($group_id)) {
			// default error
			$this->notif_msg('sistem/group', 'Error', 'Data tidak ditemukan !');
		}

		$where = array(
			'group_id' => $group_id
		);
		//process
		if ($this->M_group->delete('com_group', $where)) {
			//sukses notif
			$this->notif_msg('sistem/group', 'Sukses', 'Data berhasil dihapus');
		}else{
			//default error
			$this->notif_msg('sistem/group', 'Error', 'Data gagal dihapus !');
		}
	}

	public function edit($group_id='')
	{
		// set page rules
		$this->_set_page_rule("U");
		//default notif
		$notif = $this->session->userdata('sess_notif');
		//cek data
		if (empty($group_id)) {
			// default error
			$this->notif_msg('sistem/group', 'Error', 'Data tidak ditemukan !');
		}
		//parsing
		$data = [
			'tipe'		=> $notif['tipe'],
			'pesan' 	=> $notif['pesan'],
			'result' 	=> $this->M_group->get_by_id($group_id),	
		];
		//delete session notif
		$this->session->unset_userdata('sess_notif');
		//parsing and view content
		$this->parsing_template('sistem/group/edit', $data);
	}

	// edit process
	public function edit_process() {
		// set page rules
		$this->_set_page_rule("U");
        // cek input
        $this->form_validation->set_rules('group_id', 'Id Group', 'trim|required');
		$this->form_validation->set_rules('group_name', 'Nama group', 'trim|required');
		// check data
        if (empty($this->input->post('group_id'))) {
            //sukses notif
			$this->notif_msg('sistem/group', 'Error', 'Data tidak ditemukan');
		}
		$group_id = $this->input->post('group_id');
		// process
        if ($this->form_validation->run() !== FALSE) {
			$params = array(
				'group_name'		=> $this->input->post('group_name'), 
				'group_desc'		=> $this->input->post('group_desc'),
				'mdd'				=> date('Y-m-d H:i:s') 
			);
			$where = array(
				'group_id'	=> $group_id
			);
            // insert
            if ($this->M_group->update('com_group', $params, $where)) {
				//sukses notif
				$this->notif_msg('sistem/group/', 'Sukses', 'Data berhasil diedit');
            } else {
				// default error
				$this->notif_msg('sistem/group/edit/'.$group_id, 'Error', 'Data gagal diedit');
            }
        } else {
			// default error
			$this->notif_msg('sistem/group/edit/'.$group_id, 'Error', 'Data gagal diedit');
        }
    }
}
