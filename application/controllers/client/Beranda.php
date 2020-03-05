<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/*
----------------------
Created by : Lathiif Aji Santhosho
Phone : 	082126641201
----------------------
*/

class Beranda extends Artdev_Controller {

	const SESSION_SEARCH = 'search_produk';
	const SESSION_SEARCH_KATEGORI = 'search_produk_kategori';
    // constructor
	public function __construct()
	{
		parent::__construct();
		
		//load models
		// $this->load->model('master/M_kategori');

		//parsing data tanpa template
		$this->parsing([
			'title' => 'Beranda'
		]);
	}

	public function index()
	{
		//load model
		// $this->load->model('client/M_banner');
		//default notif
		$notif = $this->session->userdata('sess_notif');
		
		// $result = $this->M_produk->get_all_active();
		// $user_id = $this->get_login('user_id');
		// $rekomendasi = $this->M_produk->get_all_rekomendasi();
		// $kategori = $this->M_kategori->get_all_nf();
		// $main_banner = $this->M_banner->get_main_banner();
		

		// //loop gambar
		// $gambar = array();
		// foreach ($result as $key => $value) {
		// 	$gambar[$key] = $this->M_produk->get_gambar_by_produk($value['produk_id']);
		// }

        //parsing
		$data = [
			'tipe'				=> $notif['tipe'],
			'pesan' 			=> $notif['pesan'],
			// 'kategoris' 		=> $kategori,
			// 'produk' 			=> $result,
			// 'gambar' 			=> $gambar,
			// 'main_banner' 		=> $main_banner,
			// 'rekomendasi'		=> $rekomendasi,
			// 'user_id'			=> $user_id,
			
		];
		//delete session notif
		$this->session->unset_userdata('sess_notif');
		//parsing (template_content, variabel_parsing)
		$this->client_template('client/beranda/index', $data);
	}

	public function search() {

        if ($this->input->post('search', true) == "tampilkan") {
        $params = array(
			'produk_nama' 	=> $this->input->post('produk_nama', true)
			
		);
		// echo"<pre>";print_r($params);die;
        $this->session->set_userdata(self::SESSION_SEARCH, $params);
        } else {
        $this->session->unset_userdata(self::SESSION_SEARCH);
        }
        redirect("client/beranda/cari");
	}

	public function search_by_kategori($kategori_id) {

        // $kategori_id = $this->input->post('kategori_id', true); 
        $params_kategori = array(
			'kategori_id' 	=> $kategori_id
			
		);
		// echo"<pre>";print_r($params_kategori);die;
		if($kategori_id = 0){
			$this->session->unset_userdata(self::SESSION_SEARCH);

		}else{
			$this->session->set_userdata(self::SESSION_SEARCH_KATEGORI, $params_kategori);

		}
        
        redirect("client/beranda/cari");
	}

	public function cari()
	{
		//load model
		$this->load->model('client/M_banner');
		//default notif
		$notif = $this->session->userdata('sess_notif');
		//search
		$search = $this->session->userdata(self::SESSION_SEARCH);
		$search_kategori = $this->session->userdata(self::SESSION_SEARCH_KATEGORI);
		//data
		$params_search = array(
			'produk_nama'	=> $search['produk_nama'],
			'kategori_id'	=> $search_kategori['kategori_id']
		);
		// $this->cek($params_search);
		if (!empty($params_search)){
			$result = $this->M_produk->get_produk_by_search($params_search);
		}else{
			$result = $this->M_produk->get_all_active();
		}

		$kategori = $this->M_kategori->get_all_nf();
		$main_banner = $this->M_banner->get_main_banner();
		//loop gambar
		$gambar = array();
		foreach ($result as $key => $value) {
			$gambar[$key] = $this->M_produk->get_gambar_by_produk($value['produk_id']);
		}

        //parsing
		$data = [
			'tipe'			=> $notif['tipe'],
			'pesan' 		=> $notif['pesan'],
			'kategoris' 	=> $kategori,
			'produk' 		=> $result,
			'gambar' 		=> $gambar,
			'main_banner' 	=> $main_banner,
			'rs_search'		=> $search,
			'rs_search_kategori' => $search_kategori,
		];
		//delete session notif
		$this->session->unset_userdata('sess_notif');
		//parsing (template_content, variabel_parsing)
		$this->client_template('client/beranda/cari', $data);
	}

	public function detail($produk_id = '')
	{
		//default notif
		$notif = $this->session->userdata('sess_notif');
		$produk = $this->M_produk->get_by_id($produk_id);
		//cek data
		if (!$produk) {
			// default error
			$this->notif_msg('client/beranda', 'Error', 'Data tidak ditemukan !');
		}
		$where = array(
			'user_id' 	=> $this->get_login('user_id'),
			'produk_id'	=> $produk_id
		);
		if ($this->M_favorit->is_exist_produk($where)) {
			$favorit = 'yes';
		}else{
			$favorit = 'no';
		}
		//parsing
		$data = [
			'tipe'				=> $notif['tipe'],
			'pesan' 			=> $notif['pesan'],
			'result' 			=> $produk,
			'gambar' 			=> $this->M_produk->get_all_gambar_by_produk($produk_id),
			'favorite_st' 		=> $favorit,
			'status_anggota' 	=> $this->get_login('status_anggota')
		];
		//delete session notif
		$this->session->unset_userdata('sess_notif');
		//parsing (template_content, variabel_parsing)
		$this->client_template('client/beranda/detail', $data);
	}

	public function add_cart_process()
	{
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');
		$this->form_validation->set_rules('produk_id', 'Produk', 'trim|required');
		$produk_id = $this->input->post('produk_id');	
		if (empty($this->get_login())) {
			redirect('welcome');
		}
		//set params
		$where = array(
			'produk_id' 	=> $produk_id,
			'user_id' 		=> $this->get_login('user_id'),
			'transaksi_st'	=> 'cart'
		);
		if ($this->M_cart->is_exist_produk($where)){
			// default error
			$this->notif_msg('client/beranda/detail/'.$produk_id, 'Error', 'Produk yang sama sudah ada di keranjang anda');
		}
		//set nilai
		$nilai_bayar = $this->input->post('jumlah') * $this->input->post('harga');

		// process
		if ($this->form_validation->run() !== FALSE) {
			$params = array(
				'user_id'		=> $this->get_login('user_id'), 
				'produk_id'		=> $produk_id, 
				'jumlah'		=> $this->input->post('jumlah'), 
				'nil_bayar'		=> $nilai_bayar,
				'tgl_insert'	=> date('Y-m-d H:i:s') 
			);
            // insert
            if ($this->M_kategori->insert('cart', $params)) {
                // insert to kategori
				$this->notif_msg('client/beranda/detail/'.$produk_id, 'Sukses', 'Data berhasil ditambahkan');
            } else {
				// default error
				$this->notif_msg('client/beranda/detail/'.$produk_id, 'Error', 'Data gagal ditambahkan');
            }
        } else {
			// default error
			$this->notif_msg('client/beranda/detail/'.$produk_id, 'Error', 'Data gagal ditambahkan');
        }
	}

	public function add_favorit_process($produk_id = '')
	{
		if (empty($produk_id)) {
			// default error
			$this->notif_msg('client/beranda/detail/'.$produk_id, 'Error', 'Data tidak ditemukan');
		}
		if (empty($this->get_login())) {
			redirect('welcome');
		}
		//set params
		$where = array(
			'produk_id' => $produk_id,
			'user_id' 	=> $this->get_login('user_id')
		);

		$params = array(
			'user_id'		=> $this->get_login('user_id'), 
			'produk_id'		=> $produk_id, 
			'date_favorit'	=> date('Y-m-d H:i:s') 
		);
		// insert
		if ($this->M_favorit->insert('favorit', $params)) {
			// insert to kategori
			$this->notif_msg('client/beranda/detail/'.$produk_id, 'Sukses', 'Data berhasil ditambahkan ke list favorit');
		} else {
			// default error
			$this->notif_msg('client/beranda/detail/'.$produk_id, 'Error', 'Gagal ditambahkan ke list favorit');
		}
	}

	public function remove_favorit_process($produk_id = '')
	{
		if (empty($produk_id)) {
			// default error
			$this->notif_msg('client/beranda/detail/'.$produk_id, 'Error', 'Data tidak ditemukan');
		}
		if (empty($this->get_login())) {
			redirect('welcome');
		}
		//set params
		$where = array(
			'produk_id' => $produk_id,
			'user_id' 	=> $this->get_login('user_id')
		);
		// insert
		if ($this->M_favorit->delete('favorit', $where)) {
			// insert to kategori
			$this->notif_msg('client/beranda/detail/'.$produk_id, 'Sukses', 'Data berhasil dihapus dari list favorit');
		} else {
			// default error
			$this->notif_msg('client/beranda/detail/'.$produk_id, 'Error', 'Gagal dihapus dari list favorit');
		}
	}

}
