<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {
	
	public function __construct(){
        parent::__construct();
        if($this->session->userdata('inbound') != TRUE){
            redirect(base_url('webmin/login'));
        } elseif(empty($this->session->userdata('role'))){
            show_404();
        }
        $this->load->model('user_model');
        $this->load->library('upload');
	}

	public function index()
	{
		show_404();
	}

	public function simpan_berkas_umum()
	{
		$post		= $this->input->post();

		$nomor		= url_decode($post['id']);
		$nama 		= $post['nama'];
		$cekBerkas	= $this->user_model->cekBerkas($nomor);

		if (isset($_FILES['kk']['name']) && $_FILES['kk']['name'] ==""){
			if (empty($cekBerkas['kk']) or $cekBerkas['kk'] == ""){
				$kk 	= "";
			} else {
				$kk 	= $cekBerkas['kk'];
			}
		} else {
			$kk 	= $this->UploadKK($nomor,$nama);
		}
		
		if (isset($_FILES['ktp']['name']) && $_FILES['ktp']['name'] ==""){
			if (empty($cekBerkas['ktp']) or $cekBerkas['ktp'] == ""){
				$ktp 	= "";
			} else {
				$ktp 	= $cekBerkas['ktp'];
			}
		} else {
			$ktp 	= $this->UploadKTP($nomor,$nama);
		}

		if (isset($_FILES['ijazah']['name']) && $_FILES['ijazah']['name'] ==""){
			if (empty($cekBerkas['ijazah']) or $cekBerkas['ijazah'] == ""){
				$ijazah	= "";
			} else {
				$ijazah = $cekBerkas['ijazah'];
			}
		} else {
			$ijazah	= $this->UploadIjazah($nomor,$nama);
		}

		if (isset($_FILES['foto']['name']) && $_FILES['foto']['name'] ==""){
			if (empty($cekBerkas['foto']) or $cekBerkas['foto'] == ""){
				$foto	= "";
			} else {
				$foto 	= $cekBerkas['foto'];
			}
		} else {
			$foto 		= $this->UploadFoto($nomor,$nama);
		}

		if (isset($_FILES['skhun']['name']) && $_FILES['skhun']['name'] ==""){
			if (empty($cekBerkas['skhun']) or $cekBerkas['skhun'] == ""){
				$skhun	= "";
			} else {
				$skhun 	= $cekBerkas['skhun'];
			}
		} else {
			$skhun 		= $this->UploadSKHUN($nomor,$nama);
		}

		$status 	= 1;

		$data   	= array(
					'nomor'		=> $nomor,
					'kk'		=> $kk,
					'ktp'		=> $ktp,
					'ijazah'	=> $ijazah,
					'foto'		=> $foto,
					'skhun'		=> $skhun
		);
		if(empty($cekBerkas)){
			if ($kk != "0" && $ktp != "0" && $ijazah != "0" && $ijazah != "0" && $skhun != "0") {
				$this->user_model->simpanBerkas($data);
				$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      				Toast.fire({
        				icon: 'success',
        				title: 'Upload Berkas Pendaftaran Anda Berhasil Di Simpan.'
      				})
    			});");
			} else {
				$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      				Toast.fire({
        				icon: 'error',
        				title: 'Upload Berkas Pendaftaran Anda Gagal Di Simpan. Periksa kembali berkas anda sesuai dengan yang disyaratkan.'
      				})
    			});");
			}
		} else {
			if ($kk != "0" && $ktp != "0" && $ijazah != "0" && $foto != "0" && $skhun != "0") {
				$this->user_model->ubahBerkas($data, $cekBerkas['id_berkas']);
				$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      				Toast.fire({
        				icon: 'success',
        				title: 'Upload Berkas Pendaftaran Anda Berhasil Di Simpan.'
      				})
    			});");
			} else {
				$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      				Toast.fire({
        				icon: 'error',
        				title: 'Upload Berkas Pendaftaran Anda Gagal Di Simpan. Periksa kembali berkas anda sesuai dengan yang disyaratkan.'
      				})
    			});");
			}
		}
		redirect(base_url('webmin/admin/uploadberkas/').url_encode($nomor));
	}

	public function simpan_berkas_bkkm()
	{
		$post		= $this->input->post();

		$nomor		= url_decode($post['id']);
		$nama 		= $post['nama'];
		$cekBerkas	= $this->user_model->cekBerkas($nomor);

		if (isset($_FILES['surat']['name']) && $_FILES['surat']['name'] ==""){
			if (empty($cekBerkas['surat_bkkm']) or $cekBerkas['surat_bkkm'] == ""){
				$surat 	= "";
			} else {
				$surat 	= $cekBerkas['surat_bkkm'];
			}
		} else {
			$surat 	= $this->UploadSuratBKKM($nomor,$nama);
		}

		if (isset($_FILES['slip']['name']) && $_FILES['slip']['name'] ==""){
			if (empty($cekBerkas['gaji']) or $cekBerkas['gaji'] == ""){
				$slip	= "";
			} else {
				$slip = $cekBerkas['gaji'];
			}
		} else {
			$slip	= $this->UploadSlip($nomor,$nama);
		}

		if (isset($_FILES['pbb']['name']) && $_FILES['pbb']['name'] ==""){
			if (empty($cekBerkas['pbb']) or $cekBerkas['pbb'] == ""){
				$pbb	= "";
			} else {
				$pbb 	= $cekBerkas['pbb'];
			}
		} else {
			$pbb 		= $this->UploadPBB($nomor,$nama);
		}

		if (isset($_FILES['listrik']['name']) && $_FILES['listrik']['name'] ==""){
			if (empty($cekBerkas['listrik']) or $cekBerkas['listrik'] == ""){
				$listrik	= "";
			} else {
				$listrik 	= $cekBerkas['listrik'];
			}
		} else {
			$listrik 		= $this->UploadListrik($nomor,$nama);
		}

		if (isset($_FILES['telp']['name']) && $_FILES['telp']['name'] ==""){
			if (empty($cekBerkas['s_telp']) or $cekBerkas['s_telp'] == ""){
				$telp	= "";
			} else {
				$telp 	= $cekBerkas['s_telp'];
			}
		} else {
			$telp 		= $this->UploadTelpon($nomor,$nama);
		}

		if (isset($_FILES['pdam']['name']) && $_FILES['pdam']['name'] ==""){
			if (empty($cekBerkas['pdam']) or $cekBerkas['pdam'] == ""){
				$pdam	= "";
			} else {
				$pdam 	= $cekBerkas['pdam'];
			}
		} else {
			$pdam 		= $this->UploadPDAM($nomor,$nama);
		}

		if (isset($_FILES['kip']['name']) && $_FILES['kip']['name'] ==""){
			if (empty($cekBerkas['kip']) or $cekBerkas['kip'] == ""){
				$kip	= "";
			} else {
				$kip 	= $cekBerkas['kip'];
			}
		} else {
			$kip 		= $this->UploadKIP($nomor,$nama);
		}

		$status 	= 1;

		$data   	= array(
					'nomor'		=> $nomor,
					'surat_bkkm'=> $surat,
					'gaji'		=> $slip,
					'pbb'		=> $pbb,
					'listrik'	=> $listrik,
					's_telp'	=> $telp,
					'pdam'		=> $pdam,
					'kip'		=> $kip

		);
		if(empty($cekBerkas)){
			if ($surat != "0" && $rapot != "0" && $gaji != "0" && $pbb != "0" && $listrik != "0" && $telp != "0" && $pdam != "0" && $kip != "0") {
				$this->user_model->simpanBerkas($data);
				$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      			Toast.fire({
        				icon: 'success',
        				title: 'Upload Berkas Pendaftaran Jalur BKKM Anda Berhasil Di Simpan.'
      				})
    			});");
			} else {
				$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      			Toast.fire({
        				icon: 'error',
        				title: 'Upload Berkas Pendaftaran Jalur BKKM Anda Gagal Di Simpan. Silahkan cek apakah berkas sudah sesuai yang disyaratkan.'
      				})
    			});");
			}
		} else {
			if ($surat != "0" && $rapot != "0" && $gaji != "0" && $pbb != "0" && $listrik != "0" && $telp != "0" && $pdam != "0" && $kip != "0") {
				$this->user_model->ubahBerkas($data, $cekBerkas['id_berkas']);
				$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      			Toast.fire({
        				icon: 'success',
        				title: 'Upload Berkas Pendaftaran Jalur BKKM Anda Berhasil Di Simpan.'
      				})
    			});");
			} else {
				$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      			Toast.fire({
        				icon: 'error',
        				title: 'Upload Berkas Pendaftaran Jalur BKKM Anda Gagal Di Simpan. Silahkan cek apakah berkas sudah sesuai yang disyaratkan.'
      				})
    			});");
			}
		}
		redirect(base_url('webmin/admin/uploadberkas/').url_encode($nomor));
	}

	public function simpan_berkas_raport()
	{
		$post		= $this->input->post();

		$nomor		= url_decode($post['id']);
		$nama 		= $post['nama'];
		$cekBerkas	= $this->user_model->cekBerkas($nomor);

		if (isset($_FILES['surat_kepsek']['name']) && $_FILES['surat_kepsek']['name'] ==""){
			if (empty($cekBerkas['surat_rapot']) or $cekBerkas['surat_rapot'] == ""){
				$surat 	= "";
			} else {
				$surat 	= $cekBerkas['surat_rapot'];
			}
		} else {
			$surat 	= $this->UploadSuratRapot($nomor,$nama);
		}
		
		if (isset($_FILES['rapot1']['name']) && $_FILES['rapot1']['name'] ==""){
			if (empty($cekBerkas['rapot1']) or $cekBerkas['rapot1'] == ""){
				$rapot1 	= "";
			} else {
				$rapot1		= $cekBerkas['rapot1'];
			}
		} else {
			$rapot1 	= $this->UploadRapot("1",$nomor,$nama);
		}

		if (isset($_FILES['rapot2']['name']) && $_FILES['rapot2']['name'] ==""){
			if (empty($cekBerkas['rapot2']) or $cekBerkas['rapot2'] == ""){
				$rapot2 	= "";
			} else {
				$rapot2 	= $cekBerkas['rapot2'];
			}
		} else {
			$rapot2 	= $this->UploadRapot("2",$nomor,$nama);
		}

		if (isset($_FILES['rapot3']['name']) && $_FILES['rapot3']['name'] ==""){
			if (empty($cekBerkas['rapot3']) or $cekBerkas['rapot3'] == ""){
				$rapot3 	= "";
			} else {
				$rapot3 	= $cekBerkas['rapot3'];
			}
		} else {
			$rapot3 	= $this->UploadRapot("3",$nomor,$nama);
		}

		if (isset($_FILES['rapot4']['name']) && $_FILES['rapot4']['name'] ==""){
			if (empty($cekBerkas['rapot4']) or $cekBerkas['rapot4'] == ""){
				$rapot4 	= "";
			} else {
				$rapot4 	= $cekBerkas['rapot4'];
			}
		} else {
			$rapot4 	= $this->UploadRapot("4",$nomor,$nama);
		}

		if (isset($_FILES['rapot5']['name']) && $_FILES['rapot5']['name'] ==""){
			if (empty($cekBerkas['rapot5']) or $cekBerkas['rapot5'] == ""){
				$rapot5 	= "";
			} else {
				$rapot5 	= $cekBerkas['rapot5'];
			}
		} else {
			$rapot5 	= $this->UploadRapot("5",$nomor,$nama);
		}

		$status 	= 1;
		$nilai		= 0;
		$ratas		= $post['nilais'];
		$rata1		= $post['nilai1'];
		$rata2		= $post['nilai2'];
		$rata3		= $post['nilai3'];
		$rata4		= $post['nilai4'];
		$rata5		= $post['nilai5'];

		if (empty($rata1) AND empty($rata2) AND empty($rata3) AND empty($rata4) AND empty($rata5)) {
			$nilai 	= $ratas;
		} else {
			$nilai 	= ($rata1 + $rata2 + $rata3 + $rata4 + $rata5) / 5; 
		}

		$data   	= array(
					'nomor'			=> $nomor,
					'surat_rapot'	=> $surat,
					'ratasurat'		=> $ratas,
					'rapot1'		=> $rapot1,
					'rata1'			=> $rata1,
					'rapot2'		=> $rapot2,
					'rata2'			=> $rata2,
					'rapot3'		=> $rapot3,
					'rata3'			=> $rata3,
					'rapot4'		=> $rapot4,
					'rata4'			=> $rata4,
					'rapot5'		=> $rapot5,
					'rata5'			=> $rata5,
					'rata'			=> $nilai
		);
		
		$zdata		= array(
					'nilai'			=> $nilai);
					
		if(empty($cekBerkas)){
			if ($surat != "0" && $rapot1 != "0" && $rapot2 != "0" && $rapot3 != "0" && $rapot4 != "0" && $rapot5 != "0") {
				$this->user_model->simpanBerkas($data);
				$this->user_model->simpanPerubahan($nomor,$zdata);
				$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      				Toast.fire({
        				icon: 'success',
        				title: 'Upload Berkas Raport Anda Berhasil Di Simpan.'
      				})
    			});");
			} else {
				$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      				Toast.fire({
        				icon: 'error',
        				title: 'Upload Berkas Raport Anda Gagal Di Simpan. Silahkan cek berkas anda sudah sesuai dengan yang disyaratkan.'
      				})
    			});");
			}
		} else {
			if ($surat != "0" && $rapot1 != "0" && $rapot2 != "0" && $rapot3 != "0" && $rapot4 != "0" && $rapot5 != "0") {
				$this->user_model->ubahBerkas($data, $cekBerkas['id_berkas']);
				$this->user_model->simpanPerubahan($nomor,$zdata);
				$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      				Toast.fire({
        				icon: 'success',
        				title: 'Upload Berkas Raport Anda Berhasil Di Simpan.'
      				})
    			});");
			} else {
				$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      				Toast.fire({
        				icon: 'error',
        				title: 'Upload Berkas Raport Anda Gagal Di Simpan. Silahkan cek berkas anda sudah sesuai dengan yang disyaratkan.'
      				})
    			});");
			}
		}
		redirect(base_url('webmin/admin/uploadberkas/').url_encode($nomor));
	}

	public function simpan_berkas_akademik()
	{
		$post		= $this->input->post();

		$nomor		= url_decode($post['id']);
		$nama 		= $post['nama'];
		$cekBerkas	= $this->user_model->cekBerkas($nomor);

		if (isset($_FILES['surat_kepsek']['name']) && $_FILES['surat_kepsek']['name'] ==""){
			if (empty($cekBerkas['surat_prestasi']) or $cekBerkas['surat_prestasi'] == ""){
				$surat 	= "";
			} else {
				$surat 	= $cekBerkas['surat_prestasi'];
			}
		} else {
			$surat 	= $this->UploadSuratAkademik($nomor,$nama);
		}
		
		if (isset($_FILES['piagam']['name']) && $_FILES['piagam']['name'] ==""){
			if (empty($cekBerkas['piagam']) or $cekBerkas['piagam'] == ""){
				$piagam 	= "";
			} else {
				$piagam 	= $cekBerkas['piagam'];
			}
		} else {
			$piagam 	= $this->UploadPiagam($nomor,$nama);
		}
		$status 	= 1;

		$data   	= array(
					'nomor'			=> $nomor,
					'surat_prestasi'=> $surat,
					'piagam'		=> $piagam
		);
		if(empty($cekBerkas)){
			if ($surat != "0" && $piagam != "0"){
				$this->user_model->simpanBerkas($data);
				$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      				Toast.fire({
        				icon: 'success',
        				title: 'Upload Berkas Pendaftaran Jalur Akademik/Non Akademik Anda Berhasil Di Simpan.'
      				})
    			});");
			} else {
				$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      				Toast.fire({
        				icon: 'error',
        				title: 'Upload Berkas Pendaftaran Jalur Akademik/Non Akademik Anda gagal Di Simpan. Silahkan cek apakah berkas sudah sesuai dengan yang disyaratkan.'
      				})
    			});");
			}
		} else {
			if ($surat != "0" && $piagam != "0"){
				$this->user_model->ubahBerkas($data, $cekBerkas['id_berkas']);
				$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      				Toast.fire({
        				icon: 'success',
        				title: 'Upload Berkas Pendaftaran Jalur Akademik/Non Akademik Anda Berhasil Di Simpan.'
      				})
    			});");
			} else {
				$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      				Toast.fire({
        				icon: 'error',
        				title: 'Upload Berkas Pendaftaran Jalur Akademik/Non Akademik Anda gagal Di Simpan. Silahkan cek apakah berkas sudah sesuai dengan yang disyaratkan.'
      				})
    			});");
			}
		}
		redirect(base_url('webmin/admin/uploadberkas/').url_encode($nomor));
	}

	public function simpan_berkas_tahfidz()
	{
		$post		= $this->input->post();

		$nomor		= url_decode($post['id']);
		$nama 		= $post['nama'];
		$cekBerkas	= $this->user_model->cekBerkas($nomor);

		$juz        = $post['juz'];

		if (isset($_FILES['surat']['name']) && $_FILES['surat']['name'] ==""){
			if (empty($cekBerkas['tahfidz']) or $cekBerkas['tahfidz'] == ""){
				$surat 	= "";
			} else {
				$surat 	= $cekBerkas['tahfidz'];
			}
		} else {
			$surat 	= $this->UploadTahfidz($nomor,$nama);
		}

		if (isset($_FILES['piagam']['name']) && $_FILES['piagam']['name'] ==""){
			if (empty($cekBerkas['piagamtahfidz']) or $cekBerkas['piagamtahfidz'] == ""){
				$piagam = "";
			} else {
				$piagam = $cekBerkas['piagamtahfidz'];
			}
		} else {
			$piagam 	= $this->UploadLombaTahfidz($nomor,$nama);
		}
		
		$status 	= 1;

		$data   	= array(
					'nomor'			=> $nomor,
					'tahfidz'		=> $surat,
					'piagamtahfidz' => $piagam
		);
		
		$zdata      = array(
		            'nilai'         => $juz);
		            
		if(empty($cekBerkas)){
			if ($surat != "0" && $piagam != "0") {
				$this->user_model->simpanBerkas($data);
				$this->user_model->simpanPerubahan($nomor,$zdata);
				$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      				Toast.fire({
        				icon: 'success',
        				title: 'Upload Berkas Pendaftaran Jalur Tahfidz Anda Berhasil Di Simpan.'
      				})
    			});");
			} else {
				$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      				Toast.fire({
        				icon: 'error',
        				title: 'Upload Berkas Pendaftaran Jalur Tahfidz Anda Gagal Di Simpan. Silahkan cek apakah berkas sudah sesuai dengan yang disyaratkan.'
      				})
    			});");
			}
		} else {
			if ($surat != "0" && $piagam != "0") {
				$this->user_model->ubahBerkas($data, $cekBerkas['id_berkas']);
				$this->user_model->simpanPerubahan($nomor,$zdata);
				$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      				Toast.fire({
        				icon: 'success',
        				title: 'Upload Berkas Pendaftaran Jalur Tahfidz Anda Berhasil Di Simpan.'
      				})
    			});");
			} else {
				$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      				Toast.fire({
        				icon: 'error',
        				title: 'Upload Berkas Pendaftaran Jalur Tahfidz Anda Gagal Di Simpan. Silahkan cek apakah berkas sudah sesuai dengan yang disyaratkan.'
      				})
    			});");
			}
		}
		redirect(base_url('webmin/admin/uploadberkas/').url_encode($nomor));
	}

	public function simpan_berkas_kip()
	{
		$post		= $this->input->post();
		$nomor		= url_decode($post['id']);
		$nama 		= $post['nama'];
		$cekBerkas	= $this->user_model->cekBerkas($nomor);

		if (isset($_FILES['kip']['name']) && $_FILES['kip']['name'] ==""){
			if (empty($cekBerkas['bkip']) or $cekBerkas['bkip'] == ""){
				$kip 	= "";
			} else {
				$kip 	= $cekBerkas['bkip'];
			}
		} else {
			$kip 	= $this->UploadBKIP($nomor,$nama);
		}
		
		$status 	= 1;

		$data   	= array(
					'nomor'			=> $nomor,
					'bkip'			=> $kip
		);
		            
		if(empty($cekBerkas)){
			if ($kip != "0") {
				$this->user_model->simpanBerkas($data);
				$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      				Toast.fire({
        				icon: 'success',
        				title: 'Upload Berkas KIP Anda Berhasil Di Simpan.'
      				})
    			});");
			} else {
				$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      				Toast.fire({
        				icon: 'error',
        				title: 'Upload Berkas KIP Anda Gagal Di Simpan. Silahkan cek apakah berkas sudah sesuai dengan yang disyaratkan.'
      				})
    			});");
			}
		} else {
			if ($kip != "0") {
				$this->user_model->ubahBerkas($data, $cekBerkas['id_berkas']);
				$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      				Toast.fire({
        				icon: 'success',
        				title: 'Upload Berkas KIP Anda Berhasil Di Simpan.'
      				})
    			});");
			} else {
				$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      				Toast.fire({
        				icon: 'error',
        				title: 'Upload Berkas KIP Anda Gagal Di Simpan. Silahkan cek apakah berkas sudah sesuai dengan yang disyaratkan.'
      				})
    			});");
			}
		}
		redirect(base_url('webmin/admin/uploadberkas/').url_encode($nomor));
	}

	public function UploadKK($nomor,$name)
	{
		$nama 							= str_replace('.','',$name);
		$config['upload_path']          = './file/kartu_keluarga/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "KK-".$nomor."-".$nama;
		$config['overwrite']			= true;
		$config['max_size']             = 5120; // 5MB

		$this->upload->initialize($config);

		if (!$this->upload->do_upload('kk')) {
			$result = "0";
		}   else {
			$result = $this->upload->data('file_name');
		}
		return $result;
	}

	public function UploadKTP($nomor,$name)
	{
		$nama 							= str_replace('.','',$name);
		$config['upload_path']          = './file/ktp/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "KTP-".$nomor."-".$nama;
		$config['overwrite']			= true;
		$config['max_size']             = 5120; // 5MB

		$this->upload->initialize($config);

		if (!$this->upload->do_upload('ktp')) {
			$result = "0";
		}   else {
			$result = $this->upload->data('file_name');
		}
		return $result;
	}

	public function UploadIjazah($nomor,$name)
	{
		$nama 							= str_replace('.','',$name);
		$config['upload_path']          = './file/ijazah/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "Ijazah-".$nomor."-".$nama;
		$config['overwrite']			= true;
		$config['max_size']             = 5120; // 5MB

		$this->upload->initialize($config);

		if (!$this->upload->do_upload('ijazah')) {
			$result = "0";
		}   else {
			$result = $this->upload->data('file_name');
		}
		return $result;
	}

	public function UploadFoto($nomor,$name)
	{
		$nama 							= str_replace('.','',$name);
		$config['upload_path']          = './file/foto/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "Foto-".$nomor."-".$nama;
		$config['overwrite']			= true;
		$config['max_size']             = 5120; // 5MB

		$this->upload->initialize($config);

		if (!$this->upload->do_upload('foto')) {
			$result = "0";
		}   else {
			$result = $this->upload->data('file_name');
		}
		return $result;
	}

	public function UploadSuratRapot($nomor,$name)
	{
		$nama 							= str_replace('.','',$name);
		$config['upload_path']          = './file/raport/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "SuratRaport-".$nomor."-".$nama;
		$config['overwrite']			= true;
		$config['max_size']             = 5120; // 5MB

		$this->upload->initialize($config);

		if (!$this->upload->do_upload('surat_kepsek')) {
			$result = "0";
			//$result = array('error' => $this->upload->display_errors());
		}   else {
			$result = $this->upload->data('file_name');
		}
		return $result;
	}

	public function UploadRapot($semester,$nomor,$name)
	{
		$nama 							= str_replace('.','',$name);
		$config['upload_path']          = './file/raport/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "Raport-".$nomor."-".$nama."-".$semester;
		$config['overwrite']			= true;
		$config['max_size']             = 5120; // 5MB

		$this->upload->initialize($config);

		if (!$this->upload->do_upload('rapot'.$semester)) {
			$result = "0";
		}   else {
			$result = $this->upload->data('file_name');
		}
		return $result;
	}

	public function UploadSuratAkademik($nomor,$name)
	{
		$nama 							= str_replace('.','',$name);
		$config['upload_path']          = './file/akademik/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "SuratAkademik-".$nomor."-".$nama;
		$config['overwrite']			= true;
		$config['max_size']             = 5120; // 5MB

		$this->upload->initialize($config);

		if (!$this->upload->do_upload('surat_kepsek')) {
			$result = "0";
		}   else {
			$result = $this->upload->data('file_name');
		}
		return $result;
	}

	public function UploadPiagam($nomor,$name)
	{
		$nama 							= str_replace('.','',$name);
		$config['upload_path']          = './file/akademik/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "Piagam-".$nomor."-".$nama;
		$config['overwrite']			= true;
		$config['max_size']             = 5120; // 5MB

		$this->upload->initialize($config);

		if (!$this->upload->do_upload('piagam')) {
			$result = "0";
		}   else {
			$result = $this->upload->data('file_name');
		}
		return $result;
	}

	public function UploadTahfidz($nomor,$name)
	{
		$nama 							= str_replace('.','',$name);
		$config['upload_path']          = './file/tahfidz/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "Tahfidz-".$nomor."-".$nama;
		$config['overwrite']			= true;
		$config['max_size']             = 5120; // 5MB

		$this->upload->initialize($config);

		if (!$this->upload->do_upload('surat')) {
			$result = "0";
		}   else {
			$result = $this->upload->data('file_name');
		}
		return $result;
	}

	public function uploadSuratBKKM($nomor,$name)
	{
		$nama 							= str_replace('.','',$name);
		$config['upload_path']          = './file/bkkm/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "Surat-".$nomor."-".$nama;
		$config['overwrite']			= true;
		$config['max_size']             = 5120; // 5MB

		$this->upload->initialize($config);

		if (!$this->upload->do_upload('surat')) {
			$result = "0";
		}   else {
			$result = $this->upload->data('file_name');
		}
		return $result;
	}

	public function UploadSlip($nomor,$name)
	{
		$nama 							= str_replace('.','',$name);
		$config['upload_path']          = './file/bkkm/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "Slip-".$nomor."-".$nama;
		$config['overwrite']			= true;
		$config['max_size']             = 5120; // 5MB

		$this->upload->initialize($config);

		if (!$this->upload->do_upload('slip')) {
			$result = "0";
		}   else {
			$result = $this->upload->data('file_name');
		}
		return $result;
	}

	public function UploadPBB($nomor,$name)
	{
		$nama 							= str_replace('.','',$name);
		$config['upload_path']          = './file/bkkm/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "PBB-".$nomor."-".$nama;
		$config['overwrite']			= true;
		$config['max_size']             = 5120; // 5MB

		$this->upload->initialize($config);

		if (!$this->upload->do_upload('pbb')) {
			$result = "0";
		}   else {
			$result = $this->upload->data('file_name');
		}
		return $result;
	}

	public function UploadTelpon($nomor,$name)
	{
		$nama 							= str_replace('.','',$name);
		$config['upload_path']          = './file/bkkm/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "Telepon-".$nomor."-".$nama;
		$config['overwrite']			= true;
		$config['max_size']             = 5120; // 5MB

		$this->upload->initialize($config);

		if (!$this->upload->do_upload('telp')) {
			$result = "0";
		}   else {
			$result = $this->upload->data('file_name');
		}
		return $result;
	}

	public function UploadPDAM($nomor,$name)
	{
		$nama 							= str_replace('.','',$name);
		$config['upload_path']          = './file/bkkm/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "PDAM-".$nomor."-".$nama;
		$config['overwrite']			= true;
		$config['max_size']             = 5120; // 5MB

		$this->upload->initialize($config);

		if (!$this->upload->do_upload('pdam')) {
			$result = "0";
		}   else {
			$result = $this->upload->data('file_name');
		}
		return $result;
	}

	public function UploadListrik($nomor,$name)
	{
		$nama 							= str_replace('.','',$name);
		$config['upload_path']          = './file/bkkm/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "Listrik-".$nomor."-".$nama;
		$config['overwrite']			= true;
		$config['max_size']             = 5120; // 5MB

		$this->upload->initialize($config);

		if (!$this->upload->do_upload('listrik')) {
			$result = "0";
		}   else {
			$result = $this->upload->data('file_name');
		}
		return $result;
	}

	public function UploadKIP($nomor,$name)
	{
		$nama 							= str_replace('.','',$name);
		$config['upload_path']          = './file/bkkm/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "KIP-".$nomor."-".$nama;
		$config['overwrite']			= true;
		$config['max_size']             = 5120; // 5MB

		$this->upload->initialize($config);

		if (!$this->upload->do_upload('kip')) {
			$result = "0";
		}   else {
			$result = $this->upload->data('file_name');
		}
		return $result;
	}

	public function UploadLombaTahfidz($nomor,$name)
	{
		$nama 							= str_replace('.','',$name);
		$config['upload_path']          = './file/tahfidz/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "PiagamTahfidz-".$nomor."-".$nama;
		$config['overwrite']			= true;
		$config['max_size']             = 5120; // 5MB

		$this->upload->initialize($config);

		if (!$this->upload->do_upload('piagam')) {
			$result = "0";
		}   else {
			$result = $this->upload->data('file_name');
		}
		return $result;
	}

	public function UploadSKHUN($nomor,$name)
	{
		$nama 							= str_replace('.','',$name);
		$config['upload_path']          = './file/skhun/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "SKHUN-".$nomor."-".$nama;
		$config['overwrite']			= true;
		$config['max_size']             = 5120; // 5MB

		$this->upload->initialize($config);

		if (!$this->upload->do_upload('skhun')) {
			$result = "0";
		}   else {
			$result = $this->upload->data('file_name');
		}
		return $result;
	}

	public function UploadBKIP($nomor, $name)
	{
		$nama 							= str_replace('.','',$name);
		$config['upload_path']          = './file/kip/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "KIP-".$nomor."-".$nama;
		$config['overwrite']			= true;
		$config['max_size']             = 5120; // 5MB

		$this->upload->initialize($config);

		if (!$this->upload->do_upload('kip')) {
			$result = "0";
		}   else {
			$result = $this->upload->data('file_name');
		}
		return $result;
	}
}