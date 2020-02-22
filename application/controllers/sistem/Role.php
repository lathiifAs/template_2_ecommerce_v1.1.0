<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/*
----------------------
Created by : Lathiif Aji Santhosho
Phone : 	082126641201
----------------------
*/

class Role extends MY_Controller {

    // constructor
	public function __construct()
	{
		parent::__construct();
		
		// $this->session->set_userdata('com_user', 'lathiif');
		//load models
		$this->load->model('sistem/M_role');
        
		/*-------------------------------------------------------
		 kosongkan isi parsing js dan css jika tidak digunakan,
		contoh:
		$this->parsing_js([

			]);
		--------------------------------------------------------*/
		//parsing js url
		$this->parsing_js([
			'assets/plugin/select2/select2.full.min.js'
		]);
		//parsing css url
		$this->parsing_css([
			'assets/plugin/select2/select2.min.css',
			'assets/plugin/select2/select2-bootstrap.min.css'
		]);
		//parsing data tanpa template
		$this->parsing([
			'title' => 'Role'
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
		$total_row = $this->M_role->count_all();
		$config['base_url'] = base_url('index.php/sistem/role/index/');
		$config['total_rows'] = $total_row;
		$config['per_page'] = 10;
		$from = $this->uri->segment(4);
		$this->pagination->initialize($config);		
		$result = $this->M_role->get_all($config['per_page'],$from);
		if (empty($result)) {
			$no = 0;
		}else{
			$no = 1;
		}

		//get all group roles
		$group = $this->M_role->get_all_group();
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
			'groups' 		=> $group,
			'no' 			=> $no,
			'pagination'	=> $this->pagination->create_links()
		];

		//delete session notif
		$this->session->unset_userdata('sess_notif');
		//parsing (template_content, variabel_parsing)
		$this->parsing_template('sistem/role/index', $data);
	}

	public function add($notif='')
	{
		// set page rules
		$this->_set_page_rule("C");
		//default notif
		$notif = $this->session->userdata('sess_notif');
		// get all role
		$group = $this->M_role->get_all_group();
		$data = [
			'tipe'	=> $notif['tipe'],
			'pesan' => $notif['pesan'],
			'groups' => $group
		];
		//delete session notif
		$this->session->unset_userdata('sess_notif');
		//parsing (template_content, variabel_parsing)
		$this->parsing_template('sistem/role/add', $data);
	}

	 // add process
	 public function add_process() {
		// set page rules
		$this->_set_page_rule("C");
        // cek input
        $this->form_validation->set_rules('group_id', 'Group', 'trim|required');
		$this->form_validation->set_rules('role_nm', 'Nama Role', 'trim|required');
        // get last di role
		$role_id =  $this->M_role->get_last_id();
        // process
        if ($this->form_validation->run() !== FALSE) {
			$params = array(
				'role_id'	=> $role_id,
				'group_id'	=> $this->input->post('group_id'),
				'role_nm'	=> $this->input->post('role_nm'), 
				'role_desc'	=> $this->input->post('role_desc'),
				'mdb'		=> $this->get_login('user_id'),
				'mdb_name'	=> $this->get_login('user_name'),
				'mdd'		=> date('Y-m-d H:i:s') 
			);
            // insert
            if ($this->M_role->insert('com_role', $params)) {
				//sukses notif
				$this->notif_msg('sistem/role/add', 'Sukses', 'Data berhasil ditambahkan');
            } else {
				// default error
				$this->notif_msg('sistem/role/add', 'Error', 'Data gagal ditambahkan !');
            }
        } else {
			// default error
			$this->notif_msg('sistem/role/add', 'Error', 'Data gagal ditambahkan');
        }
    }

	public function detail($role_id='')
	{
		// set page rules
		$this->_set_page_rule("R");
		//cek data
		if (empty($role_id)) {
			// default error
			$this->notif_msg('sistem/role', 'Error', 'Data tidak ditemukan !');
		}

		//parsing
		$data = [
			'result' => $this->M_role->get_by_id($role_id)
		];
		$this->parsing_template('sistem/role/detail', $data);
	}

	public function delete($role_id='')
	{
		// set page rules
		$this->_set_page_rule("D");
		//cek data
		if (empty($role_id)) {
			// default error
			$this->notif_msg('sistem/role', 'Error', 'Data tidak ditemukan !');
		}

		//parsing
		$data = [
			'result' => $this->M_role->get_by_id($role_id)
		];
		$this->parsing_template('sistem/role/delete', $data);
	}

	public function delete_process()
	{
		// set page rules
		$this->_set_page_rule("D");
		$role_id = $this->input->post('role_id', true);
		//cek data
		if (empty($role_id)) {
			// default error
			$this->notif_msg('sistem/role', 'Error', 'Data tidak ditemukan !');
		}

		$where = array(
			'role_id' => $role_id
		);
		//process
		if ($this->M_role->delete('com_role', $where)) {
			//sukses notif
			$this->notif_msg('sistem/role', 'Sukses', 'Data berhasil dihapus');
		}else{
			//default error
			$this->notif_msg('sistem/role', 'Error', 'Data gagal dihapus !');
		}
	}

	public function edit($role_id='')
	{
		// set page rules
		$this->_set_page_rule("U");
		//default notif
		$notif = $this->session->userdata('sess_notif');
		//cek data
		if (empty($role_id)) {
			// default error
			$this->notif_msg('sistem/role', 'Error', 'Data tidak ditemukan !');
		}
		// get all role
		$all_group = $this->M_role->get_all_group();
		//parsing
		$data = [
			'tipe'		=> $notif['tipe'],
			'pesan' 	=> $notif['pesan'],
			'result' 	=> $this->M_role->get_by_id($role_id),
			'groups'	=> $all_group	
		];
		//delete session notif
		$this->session->unset_userdata('sess_notif');
		//parsing and view content
		$this->parsing_template('sistem/role/edit', $data);
	}

	// edit process
	public function edit_process() {
		// set page rules
		$this->_set_page_rule("U");
        // cek input
        $this->form_validation->set_rules('group_id', 'Group', 'trim|required');
		$this->form_validation->set_rules('role_nm', 'Nama Role', 'trim|required');
		// check data
        if (empty($this->input->post('role_id'))) {
            //sukses notif
			$this->notif_msg('sistem/role', 'Error', 'Data tidak ditemukan');
		}
		$role_id = $this->input->post('role_id');
		// process
        if ($this->form_validation->run() !== FALSE) {
			$params = array(
				'group_id'	=> $this->input->post('group_id'),
				'role_nm'	=> $this->input->post('role_nm'), 
				'role_desc'	=> $this->input->post('role_desc'),
				'mdd'		=> date('Y-m-d H:i:s') 
			);
			$where = array(
				'role_id'	=> $role_id
			);
            // insert
            if ($this->M_role->update('com_role', $params, $where)) {
				//sukses notif
				$this->notif_msg('sistem/role/', 'Sukses', 'Data berhasil diedit');
            } else {
				// default error
				$this->notif_msg('sistem/role/edit/'.$role_id, 'Error', 'Data gagal diedit');
            }
        } else {
			// default error
			$this->notif_msg('sistem/role/edit/'.$role_id, 'Error', 'Data gagal diedit');
        }
    }
}
