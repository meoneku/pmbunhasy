<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller {
	
	public function __construct(){
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('waktu');
        $this->load->helper('kode');
	}

	public function index()
	{
		show_404();
	}
	
	public function tahap()
	{
		$tahap 				= $this->uri->segment(3);
		$data['lulus'] 		= $this->user_model->listLulusSeleksi($tahap);
		$data['info']		= $this->user_model->getInfoLulus($tahap);
		$this->load->view('public/pengumuman',$data);
	}
}
