<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/*
----------------------
Created by : Lathiif Aji Santhosho
Phone : 	082126641201
----------------------
*/

class Contact extends Artdev_Controller {

    // constructor
	public function __construct()
	{
		parent::__construct();
		
		// $this->session->set_userdata('com_user', 'lathiif');
		//load models
		$this->load->model('client/M_kontak');
		
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
			'title' => 'Contact'
		]);
	}

	public function index()
	{
        $result = $this->M_kontak->get_all();
        //parsing
		$data = [
            'rs_data' => $result
		];
		//parsing (template_content, variabel_parsing)
		$this->client_template('client/contact/index', $data);
	}

}
