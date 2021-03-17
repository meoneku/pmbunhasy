<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Survey extends CI_Controller {
	
	public function __construct(){
        parent::__construct();
        $role = $this->session->userdata('role');
        if($this->session->userdata('inbound') != TRUE){
            redirect(base_url('webmin/login'));
        } elseif($role != "admin"){
            show_404();
        } else {
        	
        }

        $this->load->helper('waktu');
        $this->load->model('survey_model');
        $this->load->model('admin_model');
	}

	public function index()
	{
		$data['mini_pembayaran'] = $this->admin_model->getPembayaran();
		$jmlpembayaran 			 = $this->admin_model->countPembayaran();

		$data['mini_perubahan']  = $this->admin_model->getPerubahan();
		$jmlperubahan 			 = $this->admin_model->countPerubahan();

		$data['jmlberkasn']	 	 = $this->admin_model->CekStatusBerkas();
		$data['mini_berkas']	 = $this->admin_model->getListBerkas();

		$data['mini_ulang'] 	 = $this->admin_model->getDaftarUlang();
		$data['jumlah_ulang'] 	 = $this->admin_model->countDaftarUlang();

		$data['mini_du']		 = $this->admin_model->ListStatusDU();
		$data['jumlah_du']		 = $this->admin_model->CountStatusDU();

		$data['jumlah_notif']    = $jmlpembayaran + $jmlperubahan;

		$data['question']		 = $this->survey_model->listPertanyaan();

		$this->load->view('admin/list_survey', $data);
	}

	public function add()
	{
		$data['mini_pembayaran'] = $this->admin_model->getPembayaran();
		$jmlpembayaran 			 = $this->admin_model->countPembayaran();

		$data['mini_perubahan']  = $this->admin_model->getPerubahan();
		$jmlperubahan 			 = $this->admin_model->countPerubahan();

		$data['jmlberkasn']	 	 = $this->admin_model->CekStatusBerkas();
		$data['mini_berkas']	 = $this->admin_model->getListBerkas();

		$data['mini_ulang'] 	 = $this->admin_model->getDaftarUlang();
		$data['jumlah_ulang'] 	 = $this->admin_model->countDaftarUlang();

		$data['mini_du']		 = $this->admin_model->ListStatusDU();
		$data['jumlah_du']		 = $this->admin_model->CountStatusDU();

		$data['jumlah_notif']    = $jmlpembayaran + $jmlperubahan;

		$this->load->view('admin/add_survey', $data);
	}

	public function simpan()
	{
		$post		= $this->input->post();
		$pertanyaan = $post['pertanyaan'];
		$waktu 		= date('Y-m-d H:i:s');

		$data 		= array('pertanyaan' => $pertanyaan,
							'created_time' => $waktu);
		$this->survey_model->simpanPertanyaan($data);

		$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      		Toast.fire({
        		icon: 'success',
        		title: 'Pertanyaan Kuesioner Berhasil Di Tambahkan.'
      		})
    	});");
		redirect(base_url('webmin/survey'));
	}

	public function ubah()
	{
		$post		= $this->input->post();
		$pertanyaan = $post['pertanyaan'];
		$id 		= $post['id'];

		$data 		= array('pertanyaan' => $pertanyaan);
		$this->survey_model->ubahPertanyaan($id,$data);

		$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      		Toast.fire({
        		icon: 'success',
        		title: 'Pertanyaan Kuesioner Berhasil Di Rubah.'
      		})
    	});");
		redirect(base_url('webmin/survey'));
	}

	public function edit()
	{
		$id 					 = $this->uri->segment(4);

		$data['mini_pembayaran'] = $this->admin_model->getPembayaran();
		$jmlpembayaran 			 = $this->admin_model->countPembayaran();

		$data['mini_perubahan']  = $this->admin_model->getPerubahan();
		$jmlperubahan 			 = $this->admin_model->countPerubahan();

		$data['jmlberkasn']	 	 = $this->admin_model->CekStatusBerkas();
		$data['mini_berkas']	 = $this->admin_model->getListBerkas();

		$data['mini_ulang'] 	 = $this->admin_model->getDaftarUlang();
		$data['jumlah_ulang'] 	 = $this->admin_model->countDaftarUlang();

		$data['mini_du']		 = $this->admin_model->ListStatusDU();
		$data['jumlah_du']		 = $this->admin_model->CountStatusDU();

		$data['jumlah_notif']    = $jmlpembayaran + $jmlperubahan;

		$data['pertanyaan']		 = $this->survey_model->cariPertanyaan($id);

		$this->load->view('admin/edit_survey', $data);
	}

	public function hapus_survey()
	{
		$post			= $this->input->post();
		$id 			= url_decode($post['idx']);

		$data['survey'] = $this->survey_model->cariPertanyaan($id);

		$this->load->view('admin/_modal/modal_hapus_survey', $data);
	}

	public function hapus()
	{
		$post			= $this->input->post();
		$id 			= $post['id'];

		$this->survey_model->hapusPertanyaan($id);
		$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      		Toast.fire({
        		icon: 'success',
        		title: 'Pertanyaan Kuesioner Berhasil Di Hapus.'
      		})
    	});");
		redirect(base_url('webmin/survey'));
	}

	public function hasil()
	{
		$data['mini_pembayaran'] = $this->admin_model->getPembayaran();
		$jmlpembayaran 			 = $this->admin_model->countPembayaran();

		$data['mini_perubahan']  = $this->admin_model->getPerubahan();
		$jmlperubahan 			 = $this->admin_model->countPerubahan();

		$data['jmlberkasn']	 	 = $this->admin_model->CekStatusBerkas();
		$data['mini_berkas']	 = $this->admin_model->getListBerkas();

		$data['mini_ulang'] 	 = $this->admin_model->getDaftarUlang();
		$data['jumlah_ulang'] 	 = $this->admin_model->countDaftarUlang();

		$data['mini_du']		 = $this->admin_model->ListStatusDU();
		$data['jumlah_du']		 = $this->admin_model->CountStatusDU();

		$data['jumlah_notif']    = $jmlpembayaran + $jmlperubahan;

		$quest		 			 = $this->survey_model->listPertanyaan();
		$hasil 					 = "";
		$no 					 = 1;
		$responden 				 = $this->survey_model->countResponden();

		foreach ($quest as $tanya) {
			$respon1 			 = $this->survey_model->countSurvey($tanya['id_pertanyaan'],1);
			$respon2 			 = $this->survey_model->countSurvey($tanya['id_pertanyaan'],2);
			$respon3 			 = $this->survey_model->countSurvey($tanya['id_pertanyaan'],3);
			$respon4 			 = $this->survey_model->countSurvey($tanya['id_pertanyaan'],4);
			$respon5 			 = $this->survey_model->countSurvey($tanya['id_pertanyaan'],5);

			$sangat_baik		 = number_format($respon5/$responden*100,2,",","");
			$baik 				 = number_format($respon4/$responden*100,2,",","");
			$cukup_baik 		 = number_format($respon3/$responden*100,2,",","");
			$kurang_baik 		 = number_format($respon2/$responden*100,2,",","");
			$tidak_baik 		 = number_format($respon1/$responden*100,2,",","");
			$hasil 				.= '<tr><td align="center">'.$no.'</td><td>'.$tanya['pertanyaan'].'</td><td align="center">'.$sangat_baik.'%</td><td align="center">'.$baik.'%</td><td align="center">'.$cukup_baik.'%</td><td align="center">'.$kurang_baik.'%</td><td align="center">'.$tidak_baik.'%</td></tr>';
			$no++;
		}

		$data['hasil']			 = $hasil;
		$data['responden']		 = $responden;

		$data['pesan']			 = $this->survey_model->listPesan();

		$this->load->view('admin/hasil_survey', $data);
		//echo $hasil;
	}
}
