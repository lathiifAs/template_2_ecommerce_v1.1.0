<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/*
----------------------
Created by : Lathiif Aji Santhosho
Phone : 	082126641201
----------------------
*/

class Navigation extends Artdev_Controller {

	//init serach name
	const SESSION_SEARCH = 'search_nav';

    // constructor
	public function __construct()
	{
		parent::__construct();
		
		// $this->session->set_userdata('com_user', 'lathiif');
		//load models
		$this->load->model('sistem/M_navigation');
        
		/*-------------------------------------------------------
		 kosongkan isi parsing js dan css jika tidak digunakan,
		contoh:
		$this->parsing_js([

			]);
		--------------------------------------------------------*/
		//parsing js url
		$this->parsing_js([
			'assets/plugin/select2/select2.full.min.js',
			'assets/plugin/bootstrap4-toggle-3.6.1/js/bootstrap4-toggle.min.js',
		]);
		//parsing css url
		$this->parsing_css([
			'assets/plugin/select2/select2.min.css',
			'assets/plugin/select2/select2-bootstrap.min.css',
			'assets/plugin/bootstrap4-toggle-3.6.1/css/bootstrap4-toggle.min.css'
		]);
		//parsing data tanpa template
		$this->parsing([
			'title' => 'Navigation'
		]);
	}

	public function index()
	{
		// set page rules
		$this->_set_page_rule("R");
		//default notif
		$notif = $this->session->userdata('sess_notif');
		//load library and config pagination
		$this->load->library('pagination');
		$this->load->config('pagination');
		$config = $this->config->item('pagination_config');
		//search
		$search = $this->session->userdata(self::SESSION_SEARCH);

		// cek($search);

		//create pagination
		$total_row = $this->M_navigation->count_all();
		//konfigurasi pagination
		$config['base_url'] = site_url('sistem/navigation/index'); //site url
		$config['total_rows'] = $total_row; //total row
		$config['per_page'] = 10;  //show record per halaman
		$config["uri_segment"] = 4;  // uri parameter
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);

		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$limit = array($config["per_page"], $data['page'], $search);
		//panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
		$data['data'] =   $this->M_navigation->get_all($limit);           
		$data['pagination'] = $this->pagination->create_links();
		$menu = $this->M_navigation->get_all_menu();
		if (empty($data['data'])) {
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
			'search' 		=> $search,
			'result' 		=> $data['data'],
			'page' 			=> $data['page'],
			'pagination'	=> $data['pagination'],
			'no'			=> $no,
			'rs_menu'		=> $menu
		];

		//delete session notif
		$this->session->unset_userdata('sess_notif');
		//parsing (template_content, variabel_parsing)
		$this->parsing_template('sistem/navigation/index', $data);
	}

	public function search_process() {
		// set page rules (untuk memberitahukan pada sistem bahwa halaman ini untuk R atau read Data) *wajib
		$this->_set_page_rule("R");
		if ($this->input->post('search', true) == "tampilkan") {
		  $params = array(
			'nav_id'   	=> $this->input->post('nav_id', true)
		  );
		  //menyimpan $params pada session dengan nama "search_user" dari variabel self::SESSION_SEARCH
		  $this->session->set_userdata(self::SESSION_SEARCH, $params);
		} else {
		  $this->session->unset_userdata(self::SESSION_SEARCH);
		}
		//redirect
		redirect("sistem/navigation");
	}

	public function add($notif='')
	{
		// set page rules
		$this->_set_page_rule("C");
		//default notif
		$notif = $this->session->userdata('sess_notif');
		$menu = $this->M_navigation->get_all_menu();
		$data = [
			'tipe'	=> $notif['tipe'],
			'pesan' => $notif['pesan'],
			'rs_menu'	=> $menu
		];
		//delete session notif
		$this->session->unset_userdata('sess_notif');
		//parsing (template_content, variabel_parsing)
		$this->parsing_template('sistem/navigation/add', $data);
	}

	 // add process
	 public function add_process() {
		// set page rules
		$this->_set_page_rule("C");
        // cek input
        $this->form_validation->set_rules('parent_id', 'Induk Menu', 'trim|required');
		$this->form_validation->set_rules('nav_title', 'Judul Menu', 'required|max_length[50]');
		$this->form_validation->set_rules('nav_url', 'Alamat Menu', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('nav_no', 'Urutan', 'trim|required');
		$this->form_validation->set_rules('active_st', 'Digunakan', 'trim|required');
		$this->form_validation->set_rules('display_st', 'Ditampilkan', 'trim|required');
		//get last id 
		$last_id = $this->M_navigation->get_last_id();
		if ($this->input->post('client_st') == 'on') {
			$client_st = '1';
		}else{
			$client_st = '0';
		}
        // process
        if ($this->form_validation->run() !== FALSE) {
			$params = array(
				'nav_id'		=> $last_id,
				'parent_id'		=> $this->input->post('parent_id'),
				'nav_title'		=> $this->input->post('nav_title'), 
				'nav_desc'		=> $this->input->post('nav_desc'),
				'nav_url'		=> $this->input->post('nav_url'),
				'nav_no'		=> $this->input->post('nav_no'),
				'nav_icon'		=> $this->input->post('nav_icon'),
				'active_st'		=> $this->input->post('active_st'),
				'client_st'		=> $client_st,
				'display_st'	=> $this->input->post('display_st'),
				'mdb'			=> $this->get_login('user_id'),
				'mdb_name'		=> $this->get_login('user_name'),
				'mdd'			=> date('Y-m-d H:i:s') 
			);
            // insert
            if ($this->M_navigation->insert('com_menu', $params)) {
				//sukses notif
				$this->notif_msg('sistem/navigation/add', 'Sukses', 'Data berhasil ditambahkan');
            } else {
				// default error
				$this->notif_msg('sistem/navigation/add', 'Error', 'Data gagal ditambahkan !');
            }
        } else {
			// default error
			$this->notif_msg('sistem/navigation/add', 'Error', 'Data gagal ditambahkan');
        }
    }

	public function delete($nav_id='')
	{
		// set page rules
		$this->_set_page_rule("D");
		//cek data
		if (empty($nav_id)) {
			// default error
			$this->notif_msg('sistem/navigation', 'Error', 'Data tidak ditemukan !');
		}
		$menu = $this->M_navigation->get_by_id($nav_id);
		$parent = $this->M_navigation->get_by_id($menu['parent_id']);
		if (!empty($parent)) {
			$parent_title = $parent['nav_title'];
		}else{
			$parent_title = '-';
		}
		//parsing
		$data = [
			'result' 		=> $menu,
			'parent_title'	=> $parent_title
		];
		$this->parsing_template('sistem/navigation/delete', $data);
	}

	public function delete_process()
	{
		// set page rules
		$this->_set_page_rule("D");
		$nav_id = $this->input->post('nav_id', true);
		//cek data
		if (empty($nav_id)) {
			// default error
			$this->notif_msg('sistem/navigation', 'Error', 'Data tidak ditemukan !');
		}

		$where = array(
			'nav_id' => $nav_id
		);
		//process
		if ($this->M_navigation->delete('com_menu', $where)) {
			//sukses notif
			$this->notif_msg('sistem/navigation', 'Sukses', 'Data berhasil dihapus');
		}else{
			//default error
			$this->notif_msg('sistem/navigation', 'Error', 'Data gagal dihapus !');
		}
	}

	public function edit($nav_id='')
	{
		// set page rules
		$this->_set_page_rule("U");
		//default notif
		$notif = $this->session->userdata('sess_notif');
		//cek data
		if (empty($nav_id)) {
			// default error
			$this->notif_msg('sistem/navigation', 'Error', 'Data tidak ditemukan !');
		}
		// get all menu
		$all_menu = $this->M_navigation->get_all_menu();
		//parsing
		$data = [	
			'tipe'		=> $notif['tipe'],
			'pesan' 	=> $notif['pesan'],
			'result' 	=> $this->M_navigation->get_by_id($nav_id),
			'rs_menu'	=> $all_menu	
		];
		//delete session notif
		$this->session->unset_userdata('sess_notif');
		//parsing and view content
		$this->parsing_template('sistem/navigation/edit', $data);
	}

	// edit process
	public function edit_process() {
		// set page rules
		$this->_set_page_rule("U");
        // cek input
        $this->form_validation->set_rules('parent_id', 'Induk Menu', 'trim|required');
		$this->form_validation->set_rules('nav_title', 'Judul Menu', 'required|max_length[50]');
		$this->form_validation->set_rules('nav_url', 'Alamat Menu', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('nav_no', 'Urutan', 'trim|required');
		$this->form_validation->set_rules('active_st', 'Digunakan', 'trim|required');
		$this->form_validation->set_rules('display_st', 'Ditampilkan', 'trim|required');
		// check data
        if (empty($this->input->post('nav_id'))) {
            //sukses notif
			$this->notif_msg('sistem/navigation', 'Error', 'Data tidak ditemukan');
		}
		if ($this->input->post('client_st') == 'on') {
			$client_st = '1';
		}else{
			$client_st = '0';
		}
		$nav_id = $this->input->post('nav_id');
		// process
        if ($this->form_validation->run() !== FALSE) {
			$params = array(
				'parent_id'		=> $this->input->post('parent_id'),
				'nav_title'		=> $this->input->post('nav_title'), 
				'nav_desc'		=> $this->input->post('nav_desc'),
				'nav_url'		=> $this->input->post('nav_url'),
				'nav_no'		=> $this->input->post('nav_no'),
				'nav_icon'		=> $this->input->post('nav_icon'),
				'client_st'		=> $client_st,
				'active_st'		=> $this->input->post('active_st'),
				'display_st'	=> $this->input->post('display_st'),
				'mdb'			=> $this->get_login('user_id'),
				'mdb_name'		=> $this->get_login('user_name'),
				'mdd'			=> date('Y-m-d H:i:s') 
			);
			$where = array(
				'nav_id'	=> $nav_id
			);
            // insert
            if ($this->M_navigation->update('com_menu', $params, $where)) {
				//sukses notif
				$this->notif_msg('sistem/navigation/', 'Sukses', 'Data berhasil diedit');
            } else {
				// default error
				$this->notif_msg('sistem/navigation/edit/'.$role_id, 'Error', 'Data gagal diedit');
            }
        } else {
			// default error
			$this->notif_msg('sistem/navigation/edit/'.$role_id, 'Error', 'Data gagal diedit');
        }
    }
}
