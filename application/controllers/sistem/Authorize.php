<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/*
----------------------
Created by : Lathiif Aji Santhosho
Phone : 	082126641201
----------------------
*/

class Authorize extends Artdev_Controller {

    // constructor
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		echo $this->blade->view()->make('sistem/authorize/401');
	}

	public function kembali()
	{
		if (!empty($this->get_login())) {
			redirect('welcome');
		}else{
			redirect('sistem/login/logout');
		}
	}
	
}
