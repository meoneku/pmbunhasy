<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('logindb');
        $this->load->model('user_model');
    }
	
	public function index()
	{
		$this->load->view('public/login');
	}
	
	public function auth()
    {
        $username=htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);

        $cek_login=$this->logindb->auth($username,$password);

        if($cek_login->num_rows() > 0){
            $data=$cek_login->row_array();
            $this->session->set_userdata('masuk',TRUE);
            $this->session->set_userdata('role','maba');
            $this->session->set_userdata('nomor',$data['nomor']);
            $this->session->set_userdata('nama',$data['nama']);
            $this->session->set_userdata('pil',$data['pil1']);
            $this->session->set_userdata('status',$data['lulus_seleksi']);
            redirect(base_url('dlogin'));
        } else {
            $this->session->set_flashdata('errlog', 'Email atau Password Salah');
            $url=base_url('login');
            redirect($url);
			echo "salah";
        }
    }

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }

    public function lupa()
    {
        $this->load->view('public/lupa_password');
    }

    public function cek_mail()
    {
        $this->load->helper('string');

        $post       = $this->input->post();
        $mail       = $post['email'];

        $cek_email  = $this->user_model->getEmail($mail);
        if (empty($cek_email)){
            $this->session->set_flashdata('errlog', 'Email Tidak Ada');
        } else {
            $link   = random_string('alnum', 64);
            $nomor  = $cek_email['nomor'];
            $nama   = $cek_email['nama'];

            $mulai  = date("Y-m-d H:i:s");
            $akhir  = date('Y-m-d H:i:s',strtotime('+30 minutes',strtotime($mulai)));
            $data   = array(
                    'link'      => $link,
                    'email'     => $mail,
                    'nomor'     => $nomor,
                    'exp'       => $akhir);
            $this->user_model->simpanLupa($data);
            $pesan  = 'Assalamualaikum Wr. Wb.</br>
                       Permintaan reset password dengan karena di karenakan lupa atas nama '.$nama.' dengan cara mengklik tautan di bawah ini :</br>
                       <a href="'.base_url('reset/set/').$link.'" target="_blank">'.base_url('reset/set/').$link.'</a></br>
                       Tautan tersebut hanya berlaku selama 30 menit, dan bila Anda tidak merasa melakukan permintaan reset password karena lupa abaikan pesan ini.</br>
                       Wassalamualaikum Wr. Wb.';
            sendMail($mail, $pesan, 'Lupa Password');
            $this->session->set_flashdata('errlog', 'Silahkan Cek Email Anda Untuk Proses Selanjutnya');
        }
        redirect(base_url('login/lupa'));
    }
}
