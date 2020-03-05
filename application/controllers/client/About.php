<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/*
----------------------
Created by : Lathiif Aji Santhosho
Phone : 	082126641201
----------------------
*/

class About extends Artdev_Controller {

    // constructor
	public function __construct()
	{
		parent::__construct();
		
		// $this->session->set_userdata('com_user', 'lathiif');
		//load models
		// $this->load->model('sistem/M_user');
		
		//parsing js url
		$this->parsing_js([
			// 'assets/js/jquery.smartWizard.js'
			// 'assets/vendor/jquery-validation/dist/jquery.validate.min.js',
		   ]);
		//parsing css url
		$this->parsing_css([
			// 'assets/css/smart_wizard.css',
			// 'assets/css/smart_wizard_theme_dots.css'
			]);

		//parsing data tanpa template
		$this->parsing([
			'title' => 'Beranda'
		]);
	}

	public function index()
	{
        //parsing
		$data = [
		];
		//parsing (template_content, variabel_parsing)
		$this->client_template('client/about/index', $data);
	}

}
