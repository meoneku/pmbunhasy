<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dlogin extends CI_Controller {
	
	public function __construct(){
        parent::__construct();
        if($this->session->userdata('masuk') != TRUE){
            redirect(base_url('login'));
        } elseif($this->session->userdata('role') != 'maba'){
            show_404();
        }
        $this->load->model('user_model');
        $this->load->helper('kode');
        $this->load->helper('waktu');
	}

	public function index()
	{
		$data['nama']	= $this->session->userdata('nama');
		$cekfoto		= $this->user_model->cariFoto($this->session->userdata('nomor'));
		$data['jpesan'] = $this->user_model->cekPesan($this->session->userdata('nomor'));
		$data['mpesan'] = $this->user_model->miniPesan($this->session->userdata('nomor'));
		if($cekfoto['foto'] != ""){
			$data['foto'] = $cekfoto['foto'];
		} else {
			$data['foto'] = "default.png";
		}
		$data['maba']	= $this->user_model->cariMaba($this->session->userdata('nomor'));
		$cekjalur 		= $data['maba']['jalur'];

		$cekLulus 		= $data['maba']['lulus_seleksi'];

		if ($cekLulus == '1') {
			$rekening 	= $this->user_model->getRekening($data['maba']['prodi']);
			$data['bank'] = $rekening['bank'];
			$data['rek']  = $rekening['rekening'];
		} else {
			$data['bank'] = "";
			$data['rek']  = "";
		}
		$this->load->view('public/login/home', $data);
	}

	public function identitas()
	{
		$data['nama']	= $this->session->userdata('nama');
		$cekfoto		= $this->user_model->cariFoto($this->session->userdata('nomor'));
		$data['jpesan'] = $this->user_model->cekPesan($this->session->userdata('nomor'));
		$data['mpesan'] = $this->user_model->miniPesan($this->session->userdata('nomor'));
		if($cekfoto['foto'] != ""){
			$data['foto'] = $cekfoto['foto'];
		} else {
			$data['foto'] = "default.png";
		}
		$data['identitas']= $this->user_model->cariMaba($this->session->userdata('nomor'));
		$this->load->view('public/login/i_identitas_diri', $data);
	}
	
	public function pendidikan()
	{
		$data['nama']	= $this->session->userdata('nama');
		$cekfoto		= $this->user_model->cariFoto($this->session->userdata('nomor'));
		$data['jpesan'] = $this->user_model->cekPesan($this->session->userdata('nomor'));
		$data['mpesan'] = $this->user_model->miniPesan($this->session->userdata('nomor'));
		if($cekfoto['foto'] != ""){
			$data['foto'] = $cekfoto['foto'];
		} else {
			$data['foto'] = "default.png";
		}
		$data['pendidikan']= $this->user_model->cariMaba($this->session->userdata('nomor'));
		$this->load->view('public/login/i_pendidikan', $data);
	}
	
	public function ortu()
	{
		$data['nama']	= $this->session->userdata('nama');
		$cekfoto		= $this->user_model->cariFoto($this->session->userdata('nomor'));
		$data['jpesan'] = $this->user_model->cekPesan($this->session->userdata('nomor'));
		$data['mpesan'] = $this->user_model->miniPesan($this->session->userdata('nomor'));
		if($cekfoto['foto'] != ""){
			$data['foto'] = $cekfoto['foto'];
		} else {
			$data['foto'] = "default.png";
		}
		$data['ortu']= $this->user_model->cariMaba($this->session->userdata('nomor'));
		$this->load->view('public/login/i_ortu',$data);
	}
	
	public function pembayaran()
	{
		$data['nama']	= $this->session->userdata('nama');
		$cekfoto		= $this->user_model->cariFoto($this->session->userdata('nomor'));
		$data['jpesan'] = $this->user_model->cekPesan($this->session->userdata('nomor'));
		$data['mpesan'] = $this->user_model->miniPesan($this->session->userdata('nomor'));
		if($cekfoto['foto'] != ""){
			$data['foto'] = $cekfoto['foto'];
		} else {
			$data['foto'] = "default.png";
		}
		$data['bayarpen'] = $this->user_model->cekPembayaran($this->session->userdata('nomor'),"Pendaftaran");
		$data['bayarulang']= $this->user_model->cekPembayaran($this->session->userdata('nomor'),"Daftar Ulang");
		$data['iden']= $this->user_model->cariMaba($this->session->userdata('nomor'));
		$this->load->view('public/login/i_pembayaran',$data);
		//$this->load->view('public/login/closed_forever', $data);
	}

	public function berkas()
	{
		$data['nama']	= $this->session->userdata('nama');
		$cekfoto		= $this->user_model->cariFoto($this->session->userdata('nomor'));
		$data['jpesan'] = $this->user_model->cekPesan($this->session->userdata('nomor'));
		$data['mpesan'] = $this->user_model->miniPesan($this->session->userdata('nomor'));
		if($cekfoto['foto'] != ""){
			$data['foto'] = $cekfoto['foto'];
		} else {
			$data['foto'] = "default.png";
		}
		$data['berkas']	  = $this->user_model->cekBerkas($this->session->userdata('nomor'));
		$data['identitas']= $this->user_model->cariMaba($this->session->userdata('nomor'));
		$this->load->view('public/login/i_berkas',$data);
		//$this->load->view('public/login/closed_forever', $data);
	}

	public function ubah_jurusan()
	{
		$data['nama']	= $this->session->userdata('nama');
		$cekfoto		= $this->user_model->cariFoto($this->session->userdata('nomor'));
		$data['jpesan'] = $this->user_model->cekPesan($this->session->userdata('nomor'));
		$data['mpesan'] = $this->user_model->miniPesan($this->session->userdata('nomor'));
		if($cekfoto['foto'] != ""){
			$data['foto'] = $cekfoto['foto'];
		} else {
			$data['foto'] = "default.png";
		}
		$data['jurusan']  = $this->user_model->cariMaba($this->session->userdata('nomor'));
		$cekajuan		= $this->user_model->cariUbah($this->session->userdata('nomor'));
		if(empty($cekajuan)) {
			$data['ajuan']= 0;
			$data['prote']= "";
		} else {
			$data['ajuan']= 1;
			$data['prote']= "disabled";
		}

		$ceklulus		= $data['jurusan']['lulus_seleksi'];
		if ($ceklulus == '1') {
			$this->load->view('public/login/i_jurusan_warning',$data);
			// $this->load->view('public/login/closed_forever', $data);
		} else {
			$this->load->view('public/login/i_jurusan',$data);
			// $this->load->view('public/login/closed_forever', $data);
		}
	}

	public function inbox()
	{
		$data['nama']	= $this->session->userdata('nama');
		$cekfoto		= $this->user_model->cariFoto($this->session->userdata('nomor'));
		$data['jpesan'] = $this->user_model->cekPesan($this->session->userdata('nomor'));
		$data['mpesan'] = $this->user_model->miniPesan($this->session->userdata('nomor'));
		if($cekfoto['foto'] != ""){
			$data['foto'] = $cekfoto['foto'];
		} else {
			$data['foto'] = "default.png";
		}
		$data['pesan']	= $this->user_model->getPesan($this->session->userdata('nomor'));
		$this->load->view('public/login/inbox', $data);
	}

	public function bacainbox()
	{
		$idtemp			= $this->uri->segment(3);
		$id 			= url_decode($idtemp);
		$this->user_model->setPesanDibaca($id);
		$data['nama']	= $this->session->userdata('nama');
		$cekfoto		= $this->user_model->cariFoto($this->session->userdata('nomor'));
		$data['jpesan'] = $this->user_model->cekPesan($this->session->userdata('nomor'));
		$data['mpesan'] = $this->user_model->miniPesan($this->session->userdata('nomor'));
		if($cekfoto['foto'] != ""){
			$data['foto'] = $cekfoto['foto'];
		} else {
			$data['foto'] = "default.png";
		}
		$data['isipesan'] = $this->user_model->getDetilPesan($id);
		$this->load->view('public/login/r_inbox', $data);
	}

	public function password()
	{
		$data['nama']	= $this->session->userdata('nama');
		$cekfoto		= $this->user_model->cariFoto($this->session->userdata('nomor'));
		$data['jpesan'] = $this->user_model->cekPesan($this->session->userdata('nomor'));
		$data['mpesan'] = $this->user_model->miniPesan($this->session->userdata('nomor'));
		if($cekfoto['foto'] != ""){
			$data['foto'] = $cekfoto['foto'];
		} else {
			$data['foto'] = "default.png";
		}
		$this->load->view('public/login/i_password', $data);
	}

	public function pengumuman()
	{
		$data['nama']	= $this->session->userdata('nama');
		$cekfoto		= $this->user_model->cariFoto($this->session->userdata('nomor'));
		$data['jpesan'] = $this->user_model->cekPesan($this->session->userdata('nomor'));
		$data['mpesan'] = $this->user_model->miniPesan($this->session->userdata('nomor'));
		if($cekfoto['foto'] != ""){
			$data['foto'] = $cekfoto['foto'];
		} else {
			$data['foto'] = "default.png";
		}
		$data['umum']	= $this->user_model->getPengumuman();
		$this->load->view('public/login/pengumuman', $data);
	}

	public function daftar_ulang()
	{
		if ($this->session->userdata('dustep') == 2) {
			redirect(base_url('dlogin/daftar_ulang_2'));
		} elseif ($this->session->userdata('dustep') == 3) {
			redirect(base_url('dlogin/daftar_ulang_3'));
		}
		$data['nama']	= $this->session->userdata('nama');
		$cekfoto		= $this->user_model->cariFoto($this->session->userdata('nomor'));
		$data['jpesan'] = $this->user_model->cekPesan($this->session->userdata('nomor'));
		$data['mpesan'] = $this->user_model->miniPesan($this->session->userdata('nomor'));
		if($cekfoto['foto'] != ""){
			$data['foto'] = $cekfoto['foto'];
		} else {
			$data['foto'] = "default.png";
		}
		$data['pendaftar']= $this->user_model->cariMaba($this->session->userdata('nomor'));
		$rekening 		  = $this->user_model->getRekening($data['pendaftar']['prodi']);
		$data['bayarulang']= $this->user_model->cekPembayaran($this->session->userdata('nomor'),"Daftar Ulang");
		$data['bank'] 	  = $rekening['bank'];
		$data['rek']  	  = $rekening['rekening'];

		//For Data Diri
		$nama 			= $data['pendaftar']['nama'];
		$nik			= $data['pendaftar']['nik'];
		$tlah			= $data['pendaftar']['tempat_lahir'];
		$tgl			= $data['pendaftar']['tanggal_lahir'];
		$alamat			= $data['pendaftar']['alamat'];
		$rt 			= $data['pendaftar']['rt'];
		$rw 			= $data['pendaftar']['rw'];
		$desa			= $data['pendaftar']['desa'];
		$kec			= $data['pendaftar']['kec'];
		$kab			= $data['pendaftar']['kab'];
		$prov			= $data['pendaftar']['prov'];
		$hp				= $data['pendaftar']['hp'];

		//For Pendidikan
		$asal			= $data['pendaftar']['asal_sekolah'];
		$jurusan		= $data['pendaftar']['jurusan'];
		$ns		 		= $data['pendaftar']['status_sekolah'];
		$instan			= $data['pendaftar']['nama_sekolah'];
		$alamat_instan	= $data['pendaftar']['alamat_sekolah'];
		$telp_instan	= $data['pendaftar']['telp_instansi'];

		//For Ortu/Wali
		$nm_ayah		= $data['pendaftar']['nama_ayah'];
		$nik_ayah		= $data['pendaftar']['nik_ayah'];
		$tgl_ayah		= $data['pendaftar']['tgl_ayah'];
		$pend_ayah		= $data['pendaftar']['pendidikan_ayah'];
		$kerja_ayah		= $data['pendaftar']['pekerjaan_ayah'];
		$hasil_ayah 	= $data['pendaftar']['penghasilan_ayah'];
		$nm_ibu			= $data['pendaftar']['nama_ibu'];
		$nik_ibu		= $data['pendaftar']['nik_ibu'];
		$tgl_ibu		= $data['pendaftar']['tgl_ibu'];
		$pend_ibu		= $data['pendaftar']['pendidikan_ibu'];
		$kerja_ibu		= $data['pendaftar']['pekerjaan_ibu'];
		$hasil_ibu		= $data['pendaftar']['penghasilan_ibu'];
		$telp 			= $data['pendaftar']['telp_ortu'];
		$alamatortu 	= $data['pendaftar']['alamat_ortu'];
		$rtortu  		= $data['pendaftar']['rt_ortu'];
		$rwortu 		= $data['pendaftar']['rw_ortu'];
		$desaortu  		= $data['pendaftar']['desa_ortu'];
		$kecortu  		= $data['pendaftar']['kec_ortu'];
		$kabortu  		= $data['pendaftar']['kab_ortu'];
		$provortu  		= $data['pendaftar']['prov_ortu'];

		if (empty($nama) || empty($nik) || empty($tlah) || empty($tgl) || empty($alamat) || empty($rt) || empty($rw) || empty($desa) || empty($kec) || empty($kab) || empty($prov) || empty($hp)) {
			$data['identitasku']	= "0";
		} else {
			$data['identitasku']	= "1";
		}

		if (empty($asal) || empty($jurusan) || empty($ns) || empty($instan) || empty($alamat_instan) || empty($telp_instan)) {
			$data['pendidikanku']	= "0";
		} else {
			$data['pendidikanku']	= "1";
		}

		if (empty($nm_ayah) || empty($nik_ayah) || empty($tgl_ayah) || empty($pend_ayah) || empty($kerja_ayah) || empty($nm_ibu) || empty($nik_ibu) || empty($tgl_ibu) || empty($pend_ibu) || empty($kerja_ibu) || empty($telp) || empty($alamatortu) || empty($rtortu) || empty($rwortu) || empty($desaortu) || empty($kecortu) || empty($kabortu) || empty($provortu)) {
			$data['waliku']	= "0";
		} else {
			$data['waliku']	= "1";
		}

		$data['berkas']	  = $this->user_model->cekBerkas($this->session->userdata('nomor'));
		//echo $data['identitasku'].'<br>'.$data['pendidikanku'].'<br>'.$data['waliku'];
		$this->load->view('public/login/daftar_ulang', $data);
		// $this->load->view('public/login/closed_forever', $data);
	}

	public function daftar_ulang_2()
	{
		$data['nama']	= $this->session->userdata('nama');
		$cekfoto		= $this->user_model->cariFoto($this->session->userdata('nomor'));
		$data['jpesan'] = $this->user_model->cekPesan($this->session->userdata('nomor'));
		$data['mpesan'] = $this->user_model->miniPesan($this->session->userdata('nomor'));
		if($cekfoto['foto'] != ""){
			$data['foto'] = $cekfoto['foto'];
		} else {
			$data['foto'] = "default.png";
		}
		$data['pendaftar']= $this->user_model->cariMaba($this->session->userdata('nomor'));
		$data['berkas']	  = $this->user_model->cekBerkas($this->session->userdata('nomor'));

		$this->load->view('public/login/daftar_ulang_2', $data);
		// $this->load->view('public/login/closed_forever', $data);
	}

	public function daftar_ulang_3()
	{
		$data['nama']	= $this->session->userdata('nama');
		$cekfoto		= $this->user_model->cariFoto($this->session->userdata('nomor'));
		$data['jpesan'] = $this->user_model->cekPesan($this->session->userdata('nomor'));
		$data['mpesan'] = $this->user_model->miniPesan($this->session->userdata('nomor'));
		if($cekfoto['foto'] != ""){
			$data['foto'] = $cekfoto['foto'];
		} else {
			$data['foto'] = "default.png";
		}
		$data['pendaftar']= $this->user_model->cariMaba($this->session->userdata('nomor'));
		$data['berkas']	  = $this->user_model->cekBerkas($this->session->userdata('nomor'));

		$this->load->view('public/login/daftar_ulang_3', $data);
		//echo $this->session->userdata('dustep');
		// $this->load->view('public/login/closed_forever', $data);
	}

	public function proses_daftar_ulang_1()
	{
		$this->session->set_userdata('dustep','2');

		redirect(base_url('dlogin/daftar_ulang_2'));
	}

	public function proses_daftar_ulang_2()
	{
		$this->input->post();
		$cekBerkas	= $this->user_model->cekBerkas($this->session->userdata('nomor'));
		$pendaftar  = $this->user_model->cariMaba($this->session->userdata('nomor'));

		$nama 		= $pendaftar['nama'];
		$nomor 		= $pendaftar['nomor'];

		if (isset($_FILES['foto']['name']) && $_FILES['foto']['name'] ==""){
			if (empty($cekBerkas['foto']) or $cekBerkas['foto'] == ""){
				$foto	= "";
			} else {
				$foto 	= $cekBerkas['foto'];
			}
		} else {
			$foto 		= $this->UploadFoto($nomor,$nama);
		}

		$data   	= array(
					'nomor'		=> $nomor,
					'foto'		=> $foto
		);

		if(empty($cekBerkas)){
			if ($foto != "0" && $foto != "") {
				$this->user_model->simpanBerkas($data);
				$this->session->set_userdata('dustep','3');
				redirect(base_url('dlogin/daftar_ulang_3'));
				//echo 'hor';
			} else {
				$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      				Toast.fire({
        				icon: 'error',
        				title: 'Upload Foto Anda Gagal Di Simpan. Periksa kembali berkas anda sesuai dengan yang disyaratkan.'
      				})
    			});");
    			redirect(base_url('dlogin/daftar_ulang_2'));
			}
		} else {
			if ($foto != "0" && $foto != "") {
				$this->user_model->ubahBerkas($data, $cekBerkas['id_berkas']);
				$this->session->set_userdata('dustep','3');
				redirect(base_url('dlogin/daftar_ulang_3'));
				//echo 'jor';
			} else {
				$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      				Toast.fire({
        				icon: 'error',
        				title: 'Upload Foto Anda Gagal Di Simpan. Periksa kembali berkas anda sesuai dengan yang disyaratkan.'
      				})
    			});");
    			redirect(base_url('dlogin/daftar_ulang_2'));
			}
		}
	}

	public function kembali_daftar_ulang_1()
	{
		$this->session->set_userdata('dustep','1');

		redirect(base_url('dlogin/daftar_ulang'));
	}

	public function kembali_daftar_ulang_2()
	{
		$this->session->set_userdata('dustep','2');

		redirect(base_url('dlogin/daftar_ulang_2'));
	}

	public function finish_daftar_ulang()
	{
		$this->load->model('admin_model');
		$this->session->set_userdata('dustep','1');
		$post 		= $this->input->post();
		$jas 		= $post['jas'];

		$nomor		= $this->session->userdata('nomor');

		$data 		= array('daftar_ulang'   => '3',
							'ukuran_jas'	 => $jas);
		$this->user_model->simpanPerubahan($nomor,$data);

		redirect(base_url('dlogin/daftar_ulang'));
	}

	public function cekberkas()
	{
		$data['nama']	= $this->session->userdata('nama');
		$cekfoto		= $this->user_model->cariFoto($this->session->userdata('nomor'));
		$data['jpesan'] = $this->user_model->cekPesan($this->session->userdata('nomor'));
		$data['mpesan'] = $this->user_model->miniPesan($this->session->userdata('nomor'));
		if($cekfoto['foto'] != ""){
			$data['foto'] = $cekfoto['foto'];
		} else {
			$data['foto'] = "default.png";
		}
		$data['pendaftar']= $this->user_model->cariMaba($this->session->userdata('nomor'));

		$this->load->view('public/login/cekberkas', $data);
	}

	public function UploadFoto($nomor,$name)
	{
		$nama 							= str_replace('.','',$name);
		$config['upload_path']          = './file/foto/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png';
		$config['file_name']            = "Foto-".$nomor."-".$nama;
		$config['overwrite']			= true;
		$config['max_size']             = 5120; // 5MB

		$this->load->library('upload');
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('foto')) {
			$result = "0";
		}   else {
			$result = $this->upload->data('file_name');
		}
		return $result;
	}

	public function survey()
	{
		$this->load->model('survey_model');
		$data['nama']	= $this->session->userdata('nama');
		$cekfoto		= $this->user_model->cariFoto($this->session->userdata('nomor'));
		$data['jpesan'] = $this->user_model->cekPesan($this->session->userdata('nomor'));
		$data['mpesan'] = $this->user_model->miniPesan($this->session->userdata('nomor'));
		if($cekfoto['foto'] != ""){
			$data['foto'] = $cekfoto['foto'];
		} else {
			$data['foto'] = "default.png";
		}

		$data['question']		 = $this->survey_model->listPertanyaan();
		$data['pendaftar']		 = $this->user_model->cariMaba($this->session->userdata('nomor'));

		$this->load->view('public/login/survey', $data);
	}
}
