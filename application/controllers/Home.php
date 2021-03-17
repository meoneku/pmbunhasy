<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct(){
        parent::__construct();
        $this->load->model('daftar_model');
        $this->load->helper('waktu');
	}

	public function index()
	{
		$data['informasi'] = $this->daftar_model->getInformasi();
		$this->load->view('public/index', $data);
	}
	
	function recp()
	{
		$this->load->library('cool_captcha');
   		$this->cool_captcha->createImage();
	}
}
