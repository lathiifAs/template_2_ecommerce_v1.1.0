<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
----------------------
Created by : Lathiif Aji Santhosho
Phone : 	082126641201
----------------------
*/

class Welcome extends Artdev_Controller {

    // constructor
	public function __construct()
	{
		parent::__construct();
		
		// $this->session->set_userdata('com_user', 'lathiif');
		/*-------------------------------------------------------
		 kosongkan isi parsing js dan css jika tidak digunakan,
		contoh:
		$this->parsing_js([

			]);
		--------------------------------------------------------*/
		//parsing css url
		$this->parsing_js([
			// 'assets/js/lib/chart-js/Chart.bundle.js',
			// 'assets/js/lib/chart-js/chartjs-init.js',
			]);
		//parsing css url
		$this->parsing_css([
			// 'assets/fontAwesome/css/fontawesome-all.min.css',
			// 'assets/css/lib/themify-icons.css'
			]);

		$this->load->model('sistem/M_dashboard');

		//parsing data tanpa template
		$this->parsing([
			'title' => 'Dashboard',
			'tanggal' => date('d-m-Y')
		]);
	}

	public function index()
	{
		if ($this->get_login('role_id') > 2) {
			redirect($this->get_login('default_page'));
		}
		// //data anggota bisnis
		// $data_pendaftar_bisnis = [];
		// $get_pendaftar_bisnis = $this->M_dashboard->c_pendaftar_bisnis();
		// for ($i=0; $i < count($get_pendaftar_bisnis); $i++) { 
		// 	$data_pendaftar_bisnis[$get_pendaftar_bisnis[$i]['bulan']] = $get_pendaftar_bisnis[$i]['total'];
		// }
		// //data pembelian berhasil
		// $data_pembelian_berhasil = [];
		// $get_pembelian_berhasil = $this->M_dashboard->c_pembelian_berhasil();
		// for ($i=0; $i < count($get_pembelian_berhasil); $i++) { 
		// 	$data_pembelian_berhasil[$get_pembelian_berhasil[$i]['bulan']] = $get_pembelian_berhasil[$i]['total'];
		// }
		// $bulan = array(
		// 	'1' => 'jan',
		// 	'2' => 'feb',
		// 	'3' => 'mar',
		// 	'4' => 'apr',
		// 	'5' => 'mei',
		// 	'6' => 'jun',
		// 	'7' => 'jul',
		// 	'8' => 'agu',
		// 	'9' => 'sep',
		// 	'10' => 'okt',
		// 	'11' => 'nov',
		// 	'12' => 'des',
		// );

		$data = [
			// 'ttl_user' 				=> $this->M_dashboard->total_user(),
		];

		//parsing (template_content, variabel_parsing)
		$this->parsing_template('dashboard/index', $data);
	}
}
