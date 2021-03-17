<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('logindb');
    }
	
	public function index()
	{
		$this->load->view('admin/login');
	}
	
	public function auth()
    {
        $username=htmlspecialchars($this->input->post('user',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);

        $cek_login=$this->logindb->authadmin($username,$password);

        if($cek_login->num_rows() > 0){
            $data=$cek_login->row_array();
            $this->session->set_userdata('inbound',TRUE);
            $this->session->set_userdata('id',$data['id_user']);
            $this->session->set_userdata('role',$data['level']);
            $this->session->set_userdata('nama',$data['nama_user']);
            $this->session->set_userdata('foto',$data['foto']);
            redirect(base_url('webmin/home'));
        } else {
            $this->session->set_flashdata('errlog', 'Username atau Password Salah');
            $url=base_url('webmin/login');
            redirect($url);
			echo "salah";
        }
    }

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url('webmin/login'));
    }
}
