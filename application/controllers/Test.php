<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
	
	public function __construct(){
        parent::__construct();
	}

	public function index()
	{
		
	}

	public function sms()
	{
		$this->load->library('sms_gateway');

		$config = Configuration::getDefaultConfiguration();
		$config->setApiKey('Authorization', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTU4NzU2MzIyMCwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjc5NjE5LCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.lmIfYtAYExSB17SpcyA91Rsi_KCsJY5r_T3ihX2VaJg');
		$apiClient = new ApiClient($config);
		$messageClient = new MessageApi($apiClient);

		$kirimpesan = new SendMessageRequest([
    'phoneNumber' => '085784570005',
    'message' => 'test1',
    'deviceId' => 1
]);
	}

	public function rand()
	{
		$this->load->helper('string');

		$real	= random_string('alnum',128);

		$enkrip = url_encode($real);
		$dekrip = url_decode($enkrip);

		echo $real."</br>".$enkrip."</br>".$dekrip;
	}

	public function tahun(){
		$tahun = date('Y-m-d H:i:s');
		echo $tahun;
	}

	public function testbulkmail()
	{
		$this->load->model('admin_model');

		$mail 	= $this->admin_model->getSendMail();
		$jumlah = $this->admin_model->countSendMail();

		if ($jumlah != 0) {
			echo $mail['email'];
			echo '</br>'.$jumlah;
			//sendMail($mail['email'], 'Tes Kirim Email Banyak Abaikan Pesan Ini', 'Pesan Tes Saja');

			$data	= array("status_kirim" => "1");

			$this->admin_model->UpdateSendMail($mail['id_mail'],$data);
		} else {
			echo "Sudah Terkirim Semua";
			echo '</br>'.$jumlah;
		}

		//for($x=0;$x<count($mail);$x++){
			//if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $mail['email'])){
    			//echo "Error</br>";
			//} else {
    			//sendMail($mail[$x], 'Tes Kirim Email Banyak Abaikan Pesan Ini', 'Pesan Tes Saja');
    			//echo $mail['email']."<br/>";
			//}
		//}
	}

	public function timer()
	{
		$this->load->model('admin_model');
		$data['jumlah'] = $this->admin_model->countSendMail();
		$this->load->view("public/tes",$data);
	}

	public function cekbok()
	{
		$post = $this->input->post();
		$cekbok = $post['kk'];
		if (empty($cekbok)){
			$hhh = 'off';
		}

		echo $cekbok;
	}
	
	public function sendmail()
	{
	   sendMail('virmon41@gmail.com', 'Tes Kirim Email Banyak Abaikan Pesan Ini', 'Pesan Tes Saja');
	}
}
