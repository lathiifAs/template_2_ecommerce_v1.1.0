<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/*
----------------------
Created by : Lathiif Aji Santhosho
Phone : 	082126641201
----------------------
*/

class Banner extends Artdev_Controller 
{
    // constructor
	public function __construct()
	{
		parent::__construct();
		
		//load models
		$this->load->model('client/M_banner');
		
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
			'title' => 'Banner Utama'
		]);
	}

	public function index()
	{
		// set page rules
		$this->_set_page_rule("R");
		//default notif
		$notif = $this->session->userdata('sess_notif');
		$main_banner = $this->M_banner->get_main_banner();
		$last_date = $this->M_banner->get_last_date();
		//parsing
		$data = [
			'result'		=> $main_banner,
			'tipe'			=> $notif['tipe'],
			'pesan' 		=> $notif['pesan'],
			'rs_last_date'	=> $last_date,
		];

		//delete session notif
		$this->session->unset_userdata('sess_notif');
		//parsing (template_content, variabel_parsing)
		$this->parsing_template('setclient/banner/index', $data);
	}

	// add process
	public function add_process() {
		// set page rules
		$this->_set_page_rule("C");
        
		$datePrefix = date('ymd');
		// $this->cek($_FILES['files']);
			$filesCount = count($_FILES['files']['name']);
			// $this->cek($filesCount);

			if ($filesCount > 6) {
				// default error
				$this->notif_msg('setclient/banner/', 'Error', 'Jumlah gambar tidak boleh lebih dari 6.');
				redirect('setclient/banner/');
			}
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['file']['name']     = $datePrefix.$_FILES['files']['name'][$i];
                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                $_FILES['file']['error']     = $_FILES['files']['error'][$i];
                $_FILES['file']['size']     = $_FILES['files']['size'][$i];
                
                // File upload configuration
				// $uploadPath = 'uploads/files/';
				$uploadPath = FCPATH.'assets/images/banner/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|jpeg|png';
                
                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                // Upload file to server
                if($this->upload->do_upload('file')){
                    // Uploaded file data
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
                }
			}
			
				foreach ($uploadData as $key => $value) {
					$params_banner = array(
						// 'produk_id'		=> $produk_id,
						'jenis'			=> 'main-banner',
						'nama_gambar'	=> $value['file_name'],
						'mdd'			=> date('Y-m-d H:i:s') 
					);
					// insert to gambar
					if (!$this->M_banner->insert('banner', $params_banner)) {
						// default error
						$this->notif_msg('setclient/banner/', 'Error', 'Data gagal ditambahkan');
						redirect('setclient/banner');
					}
				}
							

			$this->notif_msg('setclient/banner/', 'Sukses', 'Data berhasil ditambahkan');
			redirect('setclient/banner/');	
		
	}

	public function hapus_banner()
	{
		$nama_gambar = $this->input->post('nama_gambar');
		// $this->cek($nama_gambar);
		$where = array(
			'nama_gambar' => $nama_gambar
		);
		// $gambar = $this->M_banner->get_banner_byid($banner_id);
		if ($this->M_banner->delete('banner', $where)) {
			if (unlink(FCPATH.'assets/images/banner/'.$nama_gambar)) {
				echo "true";
			}else{
				echo "false";
			}
		}else{
			echo "false";
		}
	}

	// edit process
	public function edit_process() {
		// set page rules
		$this->_set_page_rule("U");

		//process
		$filesCount = count($_FILES['files']['name']);
		if ($filesCount > 0) {
			$main_banner = $this->M_banner->get_main_banner();
			unlink(FCPATH.'assets/images/banner/'.$main_banner['nama_gambar']);

			$_FILES['file']['name']     = $_FILES['files']['name'];
			$_FILES['file']['type']     = $_FILES['files']['type'];
			$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'];
			$_FILES['file']['error']    = $_FILES['files']['error'];
			$_FILES['file']['size']     = $_FILES['files']['size'];
		
			// File upload configuration
			// $uploadPath = 'uploads/files/';
			$uploadPath = FCPATH.'assets/images/banner/';
			$config['upload_path'] = $uploadPath;
			$config['allowed_types'] = 'jpg|jpeg|png';
			
			// Load and initialize upload library
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			// Upload file to server
			if($this->upload->do_upload('files')){
				// Uploaded file data
				$fileData = $this->upload->data();
				$params = array(
					'nama_gambar'	=> $fileData['file_name'],
					'mdd'			=> date('Y-m-d H:i:s') 
				);
				$where = array(
					'jenis'			=> 'main-banner'
				);
				// insert to gambar
				if (!$this->M_banner->update('banner', $params, $where)) {
					// default error
					$this->notif_msg('setclient/banner', 'Error', 'Data gagal ditambahkan');
				}else{
					// default error
					$this->notif_msg('setclient/banner', 'Sukses', 'Berhasil diganti.');	
				}	
			}else{
				// default error
				$this->notif_msg('setclient/banner', 'Error', 'Gagal diganti!');	
			}

		}else{
			// default error
			$this->notif_msg('setclient/banner', 'Error', 'Gambar tidak boleh kosong !');
		}

    }
}
