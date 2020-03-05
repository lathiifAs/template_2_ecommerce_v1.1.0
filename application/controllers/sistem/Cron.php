<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/*
----------------------
Created by : Lathiif Aji Santhosho
Phone : 	082126641201
----------------------
*/

class Cron extends Artdev_Controller {

    // constructor
	public function __construct()
	{
		parent::__construct();
		
		//load models
		$this->load->model('client/M_transaksi');
        //js
		$this->parsing_js([
		]);
		//parsing css url
		$this->parsing_css([
		]);

	}

	public function index()
	{
		$result_transaksi = $this->M_transaksi->get_all_transaksi();
		$now_date =  Date('Y-m-d H:i:s');
		// $this->cek($result_transaksi);
		foreach ($result_transaksi as $key => $value) {
			$tgl_batas = $value['tgl_batas_bayar'];
			if ($now_date > $tgl_batas) {
				$params = array(
					'transaksi_st' => 'batal'
				);
				$where = array(
					'transaksi_id'  => $value['transaksi_id']
				);
				if (!$this->M_transaksi->update('transaksi', $params, $where)) {
					echo "gagal update status transaksi !";exit;
				}
			}
		}
	}

}