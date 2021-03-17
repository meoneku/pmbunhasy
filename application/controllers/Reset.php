<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reset extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }
	
	public function index()
	{
		show_404();
	}
	
	public function set()
    {
        $link   = $this->uri->segment(3);
        if (empty($link)){
            $this->session->set_flashdata('errlog', 'Link Reset Password Anda Tidak Ada');
            redirect(base_url('login/lupa'));
        } else {
            $getLink    = $this->user_model->getLinkLupa($link);
            if (empty($getLink)){
                $this->session->set_flashdata('errlog', 'Link Reset Password Anda Tidak Ada');
                redirect(base_url('login/lupa'));
            } else {
                $now    = strtotime(date("Y-m-d H:i:s"));
                $time   = strtotime($getLink['exp']);

                if ($now <= $time) {
                    $data['id'] = $link;
                    $this->load->view('public/reset', $data);
                } else {
                    $this->session->set_flashdata('errlog', 'Link Anda Sudah Tidak Berlaku Lagi Silahkan Masuk Email Lagi');
                    redirect(base_url('login/lupa'));
                    //echo $now.'</br>'.$time;
                }
            }
        }
    }

    public function change()
    {
        $post   = $this->input->post();
        $id     = $post['id'];
        $new    = $post['new'];
        $re     = $post['re'];

        if ($new != $re){
            $this->session->set_flashdata('errlog', 'Password Baru Yang Anda Masukkan Tidak Sama Dengan Ketik Ulang Password');
            redirect(base_url('reset/set/').$id);
        } else {
            $cariLink   = $this->user_model->getLinkLupa($id);
            $nomor      = $cariLink['nomor'];
            $pass       = md5($new);

            $data       = array('password'  => $pass);
            
            $this->user_model->simpanPerubahan($nomor, $data);
            $this->session->set_flashdata('errlog', 'Password Sudah Berhasil Di Rubah Silahkan Login Dengan Password Baru Anda');
            redirect(base_url('login'));
        }
    }
}
