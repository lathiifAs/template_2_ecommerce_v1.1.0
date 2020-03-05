<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/*
----------------------
Created by : Lathiif Aji Santhosho
Phone : 	082126641201
----------------------
*/

class Permission extends Artdev_Controller {

    // constructor
	public function __construct()
	{
		parent::__construct();
		
		// $this->session->set_userdata('com_user', 'lathiif');
		//load models
		$this->load->model('sistem/M_role');
		$this->load->model('sistem/M_permission');
        
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
			'title' => 'Hak Akses'
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
		$search = '';
		//create pagination
		$total_row = $this->M_permission->count_all();
		//konfigurasi pagination
		$config['base_url'] = site_url('sistem/permission/index'); //site url
		$config['total_rows'] = $total_row; //total row
		$config['per_page'] = 10;  //show record per halaman
		$config["uri_segment"] = 4;  // uri parameter
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);

		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$limit = array($config["per_page"], $data['page']);
		//panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
		$data['data'] =   $this->M_permission->get_all($limit);           
		$data['pagination'] = $this->pagination->create_links();
		if (empty($data['data'])) {
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
			'result' 		=> $data['data'],
			'page' 			=> $data['page'],
			'rs_group' 		=> $group,
			'pagination'	=> $data['pagination'],
			'no'			=> $no
		];

		// var_dump($data['pagination']);exit;

		//delete session notif
		$this->session->unset_userdata('sess_notif');
		//parsing (template_content, variabel_parsing)
		$this->parsing_template('sistem/permission/index', $data);
	}

	public function edit($role_id='')
	{
		// set page rules
		$this->_set_page_rule("U");
		//default notif
		$notif = $this->session->userdata('sess_notif');
		$result = $this->M_permission->get_detail_role_by_id($role_id);
		//cek data
		if (empty($result)) {
			// default error
			$this->notif_msg('sistem/permission', 'Error', 'Data tidak ditemukan !');
		}
		// get data menu
		$list_menu = self::_display_menu($role_id, 0, "");
		$result = $this->M_role->get_by_id($role_id);
		if (empty($list_menu)) {
			$no = 0;
		}else{
			$no = 1;
		}
		//parsing
		$data = [	
			'tipe'		=> $notif['tipe'],
			'pesan' 	=> $notif['pesan'],
			'result' 	=> $result,
			'no' 		=> $no,
			'list_menu'	=> $list_menu	
		];
		//delete session notif
		$this->session->unset_userdata('sess_notif');
		//parsing and view content
		$this->parsing_template('sistem/permission/edit', $data);
	}

	// edit process
	public function edit_process() {
		// set page rules
		$this->_set_page_rule("U");
        // cek input
        $this->form_validation->set_rules('role_id', 'Role', 'trim|required');
		// check data
        if (empty($this->input->post('role_id'))) {
            //sukses notif
			$this->notif_msg('sistem/permission', 'Error', 'Data tidak ditemukan');
		}
		$role_id = $this->input->post('role_id');
		// process
        if ($this->form_validation->run() !== FALSE) {
			$params = array(
				'role_id'		=> $this->input->post('role_id', TRUE),
			);
			$this->M_permission->delete_role_menu($params);
            // insert
			$rules = $this->input->post('rules');
			if (is_array($rules)) {
                foreach ($rules as $nav => $rule) {
                    // get rule tipe
                    $role_tp = array("C" => "0", "R" => "0", "U" => "0", "D" => "0");
                    $i = 0;
                    foreach ($role_tp as $tp => $val) {
                        if (isset($rule[$tp])) {
                            $role_tp[$tp] = $rule[$tp];
                        }
                        $i++;
                    }
                    $result = implode("", $role_tp);
                    // insert
                    $params = array($this->input->post('role_id'), $nav, $result);
                    $this->M_permission->insert_role_menu($params);
                }
			}
			// default error
			$this->notif_msg('sistem/permission', 'Sukses', 'Data berhasil diedit');			
        } else {
			// default error
			$this->notif_msg('sistem/permission/edit/'.$role_id, 'Error', 'Data gagal diedit');
        }
    }

	private function _display_menu($role_id, $parent_id, $indent)
    {
        $html = "";
        // get data
        $params = array($role_id, $parent_id);
		$rs_id = $this->M_permission->get_all_menu_selected_by_parent($params);
        if (!empty($rs_id)) {
            $no = 0;
            $indent .= "--- ";
            foreach ($rs_id as $rec) {
                $role_tp = array("C" => "0", "R" => "0", "U" => "0", "D" => "0");
                $i = 0;
                foreach ($role_tp as $rule => $val) {
                    $N = substr($rec['role_tp'], $i, 1);
                    $role_tp[$rule] = $N;
                    $i++;
				}
                $checked = "";
                if (array_sum($role_tp) > 0) {
                    $checked = "checked='true'";
				}
                // parse
                $html .= "<tr>";
                $html .= "<td class='text-center'>";
                $html .= '<input type="checkbox" id="' . $rec['nav_id'] . '" class="checked-all r-menu" value="' . $rec['nav_id'] . '" ' . $checked . '><label for="' . $rec['nav_id'] . '"></label> ';
                $html .= "</td>";
                $html .= "<td><label for='" . $rec['nav_id'] . "'>" . $indent . $rec['nav_title'] . "</label></td>";
                $html .= "";
                $html .= '<td class="text-center"><input type="checkbox" id="c-' . $rec['nav_id'] . '" class="r' . $rec['nav_id'] . ' r-menu" name="rules[' . $rec['nav_id'] . '][C]" value="1" ' . ($role_tp['C'] == "1" ? 'checked ="true"' : "") . '><label for="c-' . $rec['nav_id'] . '"></label></td>';
                $html .= '<td class="text-center"><input type="checkbox" id="r-' . $rec['nav_id'] . '" class="r' . $rec['nav_id'] . ' r-menu" name="rules[' . $rec['nav_id'] . '][R]" value="1" ' . ($role_tp['R'] == "1" ? 'checked ="true"' : "") . '><label for="r-' . $rec['nav_id'] . '"></label></td>';
                $html .= '<td class="text-center"><input type="checkbox" id="u-' . $rec['nav_id'] . '" class="r' . $rec['nav_id'] . ' r-menu" name="rules[' . $rec['nav_id'] . '][U]" value="1" ' . ($role_tp['U'] == "1" ? 'checked ="true"' : "") . '><label for="u-' . $rec['nav_id'] . '"></label></td>';
                $html .= '<td class="text-center"><input type="checkbox" id="d-' . $rec['nav_id'] . '" class="r' . $rec['nav_id'] . ' r-menu" name="rules[' . $rec['nav_id'] . '][D]" value="1" ' . ($role_tp['D'] == "1" ? 'checked ="true"' : "") . '><label for="d-' . $rec['nav_id'] . '"></label></td>';
                $html .= "</tr>";
                $html .= $this->_display_menu($role_id, $rec['nav_id'], $indent);
                $no++;
			}
		}
        return $html;
    }

}
