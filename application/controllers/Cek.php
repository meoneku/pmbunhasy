<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cek extends CI_Controller {
	
	public function __construct(){
        parent::__construct();
        $this->load->helper('kode');
        $this->load->helper('waktu');
	}

	public function index()
	{
		echo "Nothing Here";
	}

	public function data()
	{
		$this->load->model('user_model');
		$this->load->helper('kode');

		$idtemp			  = $this->uri->segment(3);
		if(empty($idtemp)) {
			show_404();
		}
		$id 			  = url_decode($idtemp);
		$data['verifi']	  = $this->user_model->cariKwitansi($id);

		//print_r($data['verifi']);

		$this->load->view('admin/cek_kwitansi', $data);
	}

	public function du()
	{
		$this->load->model('user_model');
		$this->load->helper('kode');

		$idtemp			  = $this->uri->segment(3);
		if(empty($idtemp)) {
			show_404();
		}
		$id 			  = url_decode($idtemp);
		$data['verifi']	  = $this->user_model->cariDU($id);

		//print_r($data['verifi']);

		$this->load->view('admin/cek_du', $data);
	}
}
