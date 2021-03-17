<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maba extends CI_Controller {
	
	public function __construct(){
        parent::__construct();
        if($this->session->userdata('masuk') != TRUE){
            redirect(base_url('login'));
        } elseif($this->session->userdata('role') != 'maba'){
            show_404();
        }
        $this->load->model('user_model');
        $this->load->library('upload');
	}

	public function index()
	{
		redirect(base_url('dlogin'));
	}

	public function simpan_identitas()
	{
		$post 		= $this->input->post();
		$nama		= $post['nama'];
		$nik		= $post['nik'];
		$tlah		= $post['tlah'];
		$tgl		= $post['tgl'];
		$gender 	= $post['jk'];
		$alamat		= $post['alamat'];
		$rt 		= $post['rt'];
		$rw 		= $post['rw'];
		$desa		= $post['desa'];
		$kec		= $post['kec'];
		$kab		= $post['kab'];
		$prov		= $post['prov'];
		$hp			= $post['hp'];

		$data  		= array(
					'nama'				=> $nama,
					'nik'				=> $nik,
					'tempat_lahir'		=> $tlah,
					'tanggal_lahir'		=> $tgl,
					'alamat'			=> $alamat,
					'gender'			=> $gender,
					'rt'				=> $rt,
					'rw'				=> $rw,
					'desa'				=> $desa,
					'kec'				=> $kec,
					'kab'				=> $kab,
					'prov'				=> $prov,
					'hp'				=> $hp
		);
		$this->user_model->simpanPerubahan($this->session->userdata('nomor'),$data);
		$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      		Toast.fire({
        		icon: 'success',
        		title: 'Perubahan Data Identitas Diri Berhasil Di Simpan.'
      		})
    	});");
		redirect(base_url('dlogin/identitas'));
	}

	public function simpan_pendidikan()
	{
		$post 		= $this->input->post();
		$asal		= $post['asal'];
		$jurusan	= $post['jurusan'];
		$ns		 	= $post['ns'];
		$instan		= $post['instan'];
		$alamat		= $post['alamat_instan'];
		$telp_instan= $post['telp_instan'];
		$nisn 		= $post['nisn'];
		$nilai		= $post['nilai'];

		$data  		= array(
					'asal_sekolah'		=> $asal,
					'jurusan'			=> $jurusan,
					'status_sekolah'	=> $ns,
					'nama_sekolah'		=> $instan,
					'alamat_sekolah'	=> $alamat,
					'telp_instansi'		=> $telp_instan,
					'nisn'				=> $nisn,
					'nilai'				=> $nilai
		);
		$this->user_model->simpanPerubahan($this->session->userdata('nomor'),$data);
		$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      		Toast.fire({
        		icon: 'success',
        		title: 'Perubahan Data Pendidikan Berhasil Di Simpan.'
      		})
    	});");
		redirect(base_url('dlogin/pendidikan'));
	}

	public function simpan_ortu()
	{
		$post 		= $this->input->post();
		$nm_ayah	= $post['nm_ayah'];
		$nik_ayah	= $post['nik_ayah'];
		$tgl_ayah	= $post['tgl_ayah'];
		$pend_ayah	= $post['pend_ayah'];
		$kerja_ayah	= $post['kerja_ayah'];
		$hasil_ayah = $post['hasil_ayah'];
		$nm_ibu		= $post['nm_ibu'];
		$nik_ibu	= $post['nik_ibu'];
		$tgl_ibu	= $post['tgl_ibu'];
		$pend_ibu	= $post['pend_ibu'];
		$kerja_ibu	= $post['kerja_ibu'];
		$hasil_ibu	= $post['hasil_ibu'];
		$telp 		= $post['telp_ortu'];
		$alamat 	= $post['alamat'];
		$rt 		= $post['rt'];
		$rw			= $post['rw'];
		$desa 		= $post['desa'];
		$kec 		= $post['kec'];
		$kab 		= $post['kab'];
		$prov 		= $post['prov'];

		$data  		= array(
					'nama_ayah'			=> $nm_ayah,
					'nik_ayah'			=> $nik_ayah,
					'tgl_ayah'			=> $tgl_ayah,
					'pendidikan_ayah'	=> $pend_ayah,
					'pekerjaan_ayah'	=> $kerja_ayah,
					'penghasilan_ayah'	=> $hasil_ayah,
					'nama_ibu'			=> $nm_ibu,
					'nik_ibu'			=> $nik_ibu,
					'tgl_ibu'			=> $tgl_ibu,
					'pendidikan_ibu'	=> $pend_ibu,
					'pekerjaan_ibu'		=> $kerja_ibu,
					'penghasilan_ibu'	=> $hasil_ibu,
					'telp_ortu'			=> $telp,
					'alamat_ortu'		=> $alamat,
					'rt_ortu'			=> $rt,
					'rw_ortu'			=> $rw,
					'desa_ortu'			=> $desa,
					'kec_ortu'			=> $kec,
					'kab_ortu'			=> $kab,
					'prov_ortu'			=> $prov
		);
		$this->user_model->simpanPerubahan($this->session->userdata('nomor'),$data);
		$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      		Toast.fire({
        		icon: 'success',
        		title: 'Perubahan Data Orang Tua / Wali Berhasil Di Simpan.'
      		})
    	});");
		redirect(base_url('dlogin/ortu'));
	}

	public function simpan_jurusan()
	{
		$post 		= $this->input->post();
		$jalur		= $post['jalur'];
		$kelas		= $post['kelas'];
		$pil1		= $post['pil1'];
		$pil2		= $post['pil2'];
		$alasan		= $post['alasan'];
		$status 	= 0;
		$nomor		= $this->session->userdata('nomor');

		$data  		= array(
					'nomor'			=> $nomor,
					'jalur_r'			=> $jalur,
					'kelas_r'			=> $kelas,
					'pil1_r'			=> $pil1,
					'pil2_r'			=> $pil2,
					'keterangan'	=> $alasan,
					'status_perubahan'	=> $status
		);
		$this->user_model->simpanUbah($data);
		$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      		Toast.fire({
        		icon: 'success',
        		title: 'Pengajuan Perubahan Jalur/Program, Kelas Dan Jurusan/Prodi Sudah Di Simpan. Proses Verifikasi Membutuhkan Waktun 2x24 Jam.'
      		})
    	});");
		redirect(base_url('dlogin/ubah_jurusan'));
	}

	public function ganti_password()
	{
		$post 		= $this->input->post();
		$passlama	= $post['old_password'];
		$passbaru	= $post['new_password'];
		$pass		= $post['cfm_password'];
		$nomor		= $this->session->userdata('nomor');
		$maba 		= $this->user_model->cariMaba($nomor);

		if ($passbaru != $pass)
		{
			$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      		Toast.fire({
        		icon: 'error',
        		title: 'Password Baru Anda Salah Atau Tidak Sama Dengan Password Yang Anda Ketik Ulang.'
      			})
    		});");
			redirect(base_url('dlogin/password'));
		} elseif (md5($passlama) != $maba['password'])
		{
			$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      		Toast.fire({
        		icon: 'error',
        		title: 'Password Lama Yang Anda Ketikkan Salah Atau Tidak Sama.'
      			})
    		});");
    		redirect(base_url('dlogin/password'));
		}

		$data  		= array(
					'password'		=> md5($pass)
		);

		$this->user_model->setPassword($nomor, $data);
		$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      		Toast.fire({
        		icon: 'success',
        		title: 'Perubahan Password Berhasil Di Rubah.'
      		})
    	});");
		redirect(base_url('dlogin/password'));
	}

	public function simpan_pembayaran()
	{
		$tgl 		= date('Y-m-d');

		$post		= $this->input->post();
		$nomor		= $this->session->userdata('nomor');
		$jenis_bayar= "Pendaftaran";
		$tgl_upload = $tgl;
		$bukti 		= $this->uploadBuktiPembayaran();
		$status 	= 1;

		$data   	= array(
					'nomor'		    => $nomor,
					'jenis_bukti'	=> $jenis_bayar,
					'tanggal_upload'=> $tgl_upload,
					'bukti_daftar'	=> $bukti,
					'status_bukti'	=> $status
		);
		$cekBayar 	= $this->user_model->cekPembayaran($nomor,$jenis_bayar);
		if(empty($cekBayar)){
			if ($bukti != "0") {
				$this->user_model->simpanBukti($data);
    			$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      				Toast.fire({
        				icon: 'success',
        				title: 'Upload Bukti Pembayaran Pendftaran Berhasil Di Simpan. Verifikasi Mengunggu Waktu 2x24 Jam.'
      				})
    			});");
			} else {
				$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      				Toast.fire({
        				icon: 'error',
        				title: 'Ada masalah saat meng-upload/unggah berkas pembayaran silhakan cek kembali apakah dokumen sudah sesuai dengan yang disyaratkan.'
      				})
    			});");
			}
		} else {
			if ($bukti != "0") {
				$this->user_model->ubahBukti($data, $cekBayar['id_bayar']);
				$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      				Toast.fire({
        				icon: 'success',
        				title: 'Upload Bukti Pembayaran Pendftaran Berhasil Di Simpan. Verifikasi Mengunggu Waktu 2x24 Jam.'
      				})
    			});");
			} else {
				$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      				Toast.fire({
        				icon: 'error',
        				title: 'Ada masalah saat meng-upload/unggah berkas pembayaran silhakan cek kembali apakah dokumen sudah sesuai dengan yang disyaratkan.'
      				})
    			});");
			}
		}
		redirect(base_url('dlogin/pembayaran'));
	}

	public function uploadBuktiPembayaran()
	{
	    $nama 							= str_replace('.','',$this->session->userdata('nama'));
		$config['upload_path']          = './file/bukti_pendaftaran/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "Pendaftaran-".$this->session->userdata('nomor')."-".$nama;
		$config['overwrite']			= true;
		$config['max_size']             = 5120; // 5MB

		$this->upload->initialize($config);

		if (!$this->upload->do_upload('bayarpen')) {
			$result = "0";
		}   else {
			$result = $this->upload->data('file_name');
		}
		return $result;
	}

	public function simpan_daftar_ulang()
	{
		$tgl 		= date('Y-m-d');

		$post		= $this->input->post();
		$nomor		= $this->session->userdata('nomor');
		$jenis_bayar= "Daftar Ulang";
		$tgl_upload = $tgl;
		$bukti 		= $this->uploadBuktiDaftarUlang();
		$status 	= 1;

		$data   	= array(
					'nomor'		    => $nomor,
					'jenis_bukti'	=> $jenis_bayar,
					'tanggal_upload'=> $tgl_upload,
					'bukti_daftar'	=> $bukti,
					'status_bukti'	=> $status
		);
		$cekBayar 	= $this->user_model->cekPembayaran($nomor,$jenis_bayar);
		if(empty($cekBayar)){
			if ($bukti != "0") {
				$this->user_model->simpanBukti($data);
				$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      				Toast.fire({
        				icon: 'success',
        				title: 'Upload Bukti Pembayaran Daftar Ulang Anda Berhasil Di Simpan. Verifikasi Mengunggu Waktu 2x24 Jam'
      				})
    			});");
			} else {
				$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      				Toast.fire({
        				icon: 'error',
        				title: 'Ada masalah saat meng-upload/unggah Bukti Pembayaran Daftar Ulang silhakan cek kembali apakah dokumen sudah sesuai dengan yang disyaratkan.'
      				})
    			});");
			}
			
		} else {
			if ($bukti != "0") {
				$this->user_model->ubahBukti($data, $cekBayar['id_bayar']);
				$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      				Toast.fire({
        				icon: 'success',
        				title: 'Upload Bukti Pembayaran Daftar Ulang Anda Berhasil Di Simpan. Verifikasi Mengunggu Waktu 2x24 Jam'
      				})
    			});");
			} else {
				$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      				Toast.fire({
        				icon: 'error',
        				title: 'Ada masalah saat meng-upload/unggah Bukti Pembayaran Daftar Ulang silhakan cek kembali apakah dokumen sudah sesuai dengan yang disyaratkan.'
      				})
    			});");
			}
		}
		redirect(base_url('dlogin/pembayaran'));
	}

	public function simpan_berkas_umum()
	{
		$nomor		= $this->session->userdata('nomor');
		$pil 		= $this->session->userdata('pil');
		$cekBerkas	= $this->user_model->cekBerkas($nomor);

		$post		= $this->input->post();

		if (isset($_FILES['kk']['name']) && $_FILES['kk']['name'] ==""){
			if (empty($cekBerkas['kk']) or $cekBerkas['kk'] == ""){
				$kk 	= "";
			} else {
				$kk 	= $cekBerkas['kk'];
			}
		} else {
			$kk 	= $this->UploadKK();
		}
		
		if (isset($_FILES['ktp']['name']) && $_FILES['ktp']['name'] ==""){
			if (empty($cekBerkas['ktp']) or $cekBerkas['ktp'] == ""){
				$ktp 	= "";
			} else {
				$ktp 	= $cekBerkas['ktp'];
			}
		} else {
			$ktp 	= $this->UploadKTP();
		}

		if (isset($_FILES['ijazah']['name']) && $_FILES['ijazah']['name'] ==""){
			if (empty($cekBerkas['ijazah']) or $cekBerkas['ijazah'] == ""){
				$ijazah	= "";
			} else {
				$ijazah = $cekBerkas['ijazah'];
			}
		} else {
			$ijazah	= $this->UploadIjazah();
		}

		if (isset($_FILES['foto']['name']) && $_FILES['foto']['name'] ==""){
			if (empty($cekBerkas['foto']) or $cekBerkas['foto'] == ""){
				$foto	= "";
			} else {
				$foto 	= $cekBerkas['foto'];
			}
		} else {
			$foto 		= $this->UploadFoto();
		}

		if (isset($_FILES['skhun']['name']) && $_FILES['skhun']['name'] ==""){
			if (empty($cekBerkas['skhun']) or $cekBerkas['skhun'] == ""){
				$skhun	= "";
			} else {
				$skhun 	= $cekBerkas['skhun'];
			}
		} else {
			$skhun 		= $this->UploadSKHUN();
		}

		if ($pil == 23 OR $pil == 24) {
			if (isset($_FILES['formulir']['name']) && $_FILES['formulir']['name'] ==""){
				if (empty($cekBerkas['formulirs2']) or $cekBerkas['formulirs2'] == ""){
					$formulir	= "";
				} else {
					$formulir 	= $cekBerkas['formulirs2'];
				}
			} else {
				$formulir 		= $this->UploadFormulir();
			}
		} else {
			if (empty($cekBerkas['formulirs2']) or $cekBerkas['formulirs2'] == ""){
				$formulir 	= "";
			} else {
				$formulir 	= $cekBerkas['formulirs2'];
			}
		}
		

		$status 	= 0;

		$data   	= array(
					'nomor'		=> $nomor,
					'kk'		=> $kk,
					'ktp'		=> $ktp,
					'ijazah'	=> $ijazah,
					'foto'		=> $foto,
					'skhun'		=> $skhun,
					'formulirs2'=> $formulir,
					'status_berkas' => $status
		);
		if(empty($cekBerkas)){
			if ($kk != "0" && $ktp != "0" && $ijazah != "0" && $foto != "0" && $formulir != "0" && $skhun != "0") {
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
			if ($kk != "0" && $ktp != "0" && $ijazah != "0" && $foto != "0" && $formulir != "0" && $skhun != "0") {
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
		redirect(base_url('dlogin/berkas'));
	}

	public function simpan_berkas_bkkm()
	{
		$nomor		= $this->session->userdata('nomor');
		$cekBerkas	= $this->user_model->cekBerkas($nomor);

		$post		= $this->input->post();

		if (isset($_FILES['surat']['name']) && $_FILES['surat']['name'] ==""){
			if (empty($cekBerkas['surat_bkkm']) or $cekBerkas['surat_bkkm'] == ""){
				$surat 	= "";
			} else {
				$surat 	= $cekBerkas['surat_bkkm'];
			}
		} else {
			$surat 	= $this->UploadSuratBKKM();
		}

		if (isset($_FILES['slip']['name']) && $_FILES['slip']['name'] ==""){
			if (empty($cekBerkas['gaji']) or $cekBerkas['gaji'] == ""){
				$slip	= "";
			} else {
				$slip = $cekBerkas['gaji'];
			}
		} else {
			$slip	= $this->UploadSlip();
		}

		if (isset($_FILES['pbb']['name']) && $_FILES['pbb']['name'] ==""){
			if (empty($cekBerkas['pbb']) or $cekBerkas['pbb'] == ""){
				$pbb	= "";
			} else {
				$pbb 	= $cekBerkas['pbb'];
			}
		} else {
			$pbb 		= $this->UploadPBB();
		}

		if (isset($_FILES['listrik']['name']) && $_FILES['listrik']['name'] ==""){
			if (empty($cekBerkas['listrik']) or $cekBerkas['listrik'] == ""){
				$listrik	= "";
			} else {
				$listrik 	= $cekBerkas['listrik'];
			}
		} else {
			$listrik 		= $this->UploadListrik();
		}

		if (isset($_FILES['telp']['name']) && $_FILES['telp']['name'] ==""){
			if (empty($cekBerkas['s_telp']) or $cekBerkas['s_telp'] == ""){
				$telp	= "";
			} else {
				$telp 	= $cekBerkas['s_telp'];
			}
		} else {
			$telp 		= $this->UploadTelpon();
		}

		if (isset($_FILES['pdam']['name']) && $_FILES['pdam']['name'] ==""){
			if (empty($cekBerkas['pdam']) or $cekBerkas['pdam'] == ""){
				$pdam	= "";
			} else {
				$pdam 	= $cekBerkas['pdam'];
			}
		} else {
			$pdam 		= $this->UploadPDAM();
		}

		if (isset($_FILES['kip']['name']) && $_FILES['kip']['name'] ==""){
			if (empty($cekBerkas['kip']) or $cekBerkas['kip'] == ""){
				$kip	= "";
			} else {
				$kip 	= $cekBerkas['kip'];
			}
		} else {
			$kip 		= $this->UploadKIP();
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
		redirect(base_url('dlogin/berkas'));
	}

	public function simpan_berkas_raport()
	{
		$nomor		= $this->session->userdata('nomor');
		$cekBerkas	= $this->user_model->cekBerkas($nomor);

		$post		= $this->input->post();

		if (isset($_FILES['surat_kepsek']['name']) && $_FILES['surat_kepsek']['name'] ==""){
			if (empty($cekBerkas['surat_rapot']) or $cekBerkas['surat_rapot'] == ""){
				$surat 	= "";
			} else {
				$surat 	= $cekBerkas['surat_rapot'];
			}
		} else {
			$surat 	= $this->UploadSuratRapot();
		}
		
		if (isset($_FILES['rapot1']['name']) && $_FILES['rapot1']['name'] ==""){
			if (empty($cekBerkas['rapot1']) or $cekBerkas['rapot1'] == ""){
				$rapot1 	= "";
			} else {
				$rapot1		= $cekBerkas['rapot1'];
			}
		} else {
			$rapot1 	= $this->UploadRapot("1");
		}

		if (isset($_FILES['rapot2']['name']) && $_FILES['rapot2']['name'] ==""){
			if (empty($cekBerkas['rapot2']) or $cekBerkas['rapot2'] == ""){
				$rapot2 	= "";
			} else {
				$rapot2 	= $cekBerkas['rapot2'];
			}
		} else {
			$rapot2 	= $this->UploadRapot("2");
		}

		if (isset($_FILES['rapot3']['name']) && $_FILES['rapot3']['name'] ==""){
			if (empty($cekBerkas['rapot3']) or $cekBerkas['rapot3'] == ""){
				$rapot3 	= "";
			} else {
				$rapot3 	= $cekBerkas['rapot3'];
			}
		} else {
			$rapot3 	= $this->UploadRapot("3");
		}

		if (isset($_FILES['rapot4']['name']) && $_FILES['rapot4']['name'] ==""){
			if (empty($cekBerkas['rapot4']) or $cekBerkas['rapot4'] == ""){
				$rapot4 	= "";
			} else {
				$rapot4 	= $cekBerkas['rapot4'];
			}
		} else {
			$rapot4 	= $this->UploadRapot("4");
		}

		if (isset($_FILES['rapot5']['name']) && $_FILES['rapot5']['name'] ==""){
			if (empty($cekBerkas['rapot5']) or $cekBerkas['rapot5'] == ""){
				$rapot5 	= "";
			} else {
				$rapot5 	= $cekBerkas['rapot5'];
			}
		} else {
			$rapot5 	= $this->UploadRapot("5");
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
		redirect(base_url('dlogin/berkas'));
	}

	public function simpan_berkas_akademik()
	{
		$nomor		= $this->session->userdata('nomor');
		$cekBerkas	= $this->user_model->cekBerkas($nomor);

		$post		= $this->input->post();

		if (isset($_FILES['surat_kepsek']['name']) && $_FILES['surat_kepsek']['name'] ==""){
			if (empty($cekBerkas['surat_prestasi']) or $cekBerkas['surat_prestasi'] == ""){
				$surat 	= "";
			} else {
				$surat 	= $cekBerkas['surat_prestasi'];
			}
		} else {
			$surat 	= $this->UploadSuratAkademik();
		}
		
		if (isset($_FILES['piagam']['name']) && $_FILES['piagam']['name'] ==""){
			if (empty($cekBerkas['piagam']) or $cekBerkas['piagam'] == ""){
				$piagam 	= "";
			} else {
				$piagam 	= $cekBerkas['piagam'];
			}
		} else {
			$piagam 	= $this->UploadPiagam();
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
		redirect(base_url('dlogin/berkas'));
	}

	public function simpan_berkas_tahfidz()
	{
		$nomor		= $this->session->userdata('nomor');
		$cekBerkas	= $this->user_model->cekBerkas($nomor);

		$post		= $this->input->post();
		$juz        = $post['juz'];

		if (isset($_FILES['surat']['name']) && $_FILES['surat']['name'] ==""){
			if (empty($cekBerkas['tahfidz']) or $cekBerkas['tahfidz'] == ""){
				$surat 	= "";
			} else {
				$surat 	= $cekBerkas['tahfidz'];
			}
		} else {
			$surat 	= $this->UploadTahfidz();
		}

		if (isset($_FILES['piagam']['name']) && $_FILES['piagam']['name'] ==""){
			if (empty($cekBerkas['piagamtahfidz']) or $cekBerkas['piagamtahfidz'] == ""){
				$piagam = "";
			} else {
				$piagam = $cekBerkas['piagamtahfidz'];
			}
		} else {
			$piagam 	= $this->UploadLombaTahfidz();
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
		redirect(base_url('dlogin/berkas'));
	}

	public function simpan_berkas_kip()
	{
		$nomor		= $this->session->userdata('nomor');
		$cekBerkas	= $this->user_model->cekBerkas($nomor);

		$post		= $this->input->post();

		if (isset($_FILES['kip']['name']) && $_FILES['kip']['name'] ==""){
			if (empty($cekBerkas['bkip']) or $cekBerkas['bkip'] == ""){
				$kip 	= "";
			} else {
				$kip 	= $cekBerkas['bkip'];
			}
		} else {
			$kip 	= $this->UploadBKIP();
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
		redirect(base_url('dlogin/berkas'));
	}

	public function uploadBuktiDaftarUlang()
	{
		$nama 							= str_replace('.','',$this->session->userdata('nama'));
		$config['upload_path']          = './file/bukti_daftar_ulang/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "DaftarUlang-".$this->session->userdata('nomor')."-".$nama;
		$config['overwrite']			= true;
		$config['max_size']             = 5120; // 5MB

		$this->upload->initialize($config);

		if (!$this->upload->do_upload('bayarulang')) {
			$result = "0";
		}   else {
			$result = $this->upload->data('file_name');
		}
		return $result;
	}

	public function UploadKK()
	{
		$nama 							= str_replace('.','',$this->session->userdata('nama'));
		$config['upload_path']          = './file/kartu_keluarga/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "KK-".$this->session->userdata('nomor')."-".$nama;
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

	public function UploadKTP()
	{
		$nama 							= str_replace('.','',$this->session->userdata('nama'));
		$config['upload_path']          = './file/ktp/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "KTP-".$this->session->userdata('nomor')."-".$nama;
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

	public function UploadIjazah()
	{
		$nama 							= str_replace('.','',$this->session->userdata('nama'));
		$config['upload_path']          = './file/ijazah/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "Ijazah-".$this->session->userdata('nomor')."-".$nama;
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

	public function UploadFoto()
	{
		$nama 							= str_replace('.','',$this->session->userdata('nama'));
		$config['upload_path']          = './file/foto/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "Foto-".$this->session->userdata('nomor')."-".$nama;
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

	public function UploadSuratRapot()
	{
		$nama 							= str_replace('.','',$this->session->userdata('nama'));
		$config['upload_path']          = './file/raport/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "SuratRaport-".$this->session->userdata('nomor')."-".$nama;
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

	public function UploadRapot($semester)
	{
		$nama 							= str_replace('.','',$this->session->userdata('nama'));
		$config['upload_path']          = './file/raport/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "Raport-".$this->session->userdata('nomor')."-".$nama."-".$semester;
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

	public function UploadSuratAkademik()
	{
		$nama 							= str_replace('.','',$this->session->userdata('nama'));
		$config['upload_path']          = './file/akademik/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "SuratAkademik-".$this->session->userdata('nomor')."-".$nama;
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

	public function UploadPiagam()
	{
		$nama 							= str_replace('.','',$this->session->userdata('nama'));
		$config['upload_path']          = './file/akademik/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "Piagam-".$this->session->userdata('nomor')."-".$nama;
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

	public function UploadTahfidz()
	{
		$nama 							= str_replace('.','',$this->session->userdata('nama'));
		$config['upload_path']          = './file/tahfidz/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "Tahfidz-".$this->session->userdata('nomor')."-".$nama;
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

	public function uploadSuratBKKM()
	{
		$nama 							= str_replace('.','',$this->session->userdata('nama'));
		$config['upload_path']          = './file/bkkm/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "Surat-".$this->session->userdata('nomor')."-".$nama;
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

	public function UploadSlip()
	{
		$nama 							= str_replace('.','',$this->session->userdata('nama'));
		$config['upload_path']          = './file/bkkm/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "Slip-".$this->session->userdata('nomor')."-".$nama;
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

	public function UploadPBB()
	{
		$nama 							= str_replace('.','',$this->session->userdata('nama'));
		$config['upload_path']          = './file/bkkm/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "PBB-".$this->session->userdata('nomor')."-".$nama;
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

	public function UploadTelpon()
	{
		$nama 							= str_replace('.','',$this->session->userdata('nama'));
		$config['upload_path']          = './file/bkkm/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "Telepon-".$this->session->userdata('nomor')."-".$nama;
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

	public function UploadPDAM()
	{
		$nama 							= str_replace('.','',$this->session->userdata('nama'));
		$config['upload_path']          = './file/bkkm/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "PDAM-".$this->session->userdata('nomor')."-".$nama;
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

	public function UploadListrik()
	{
		$nama 							= str_replace('.','',$this->session->userdata('nama'));
		$config['upload_path']          = './file/bkkm/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "Listrik-".$this->session->userdata('nomor')."-".$nama;
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

	public function UploadKIP()
	{
		$nama 							= str_replace('.','',$this->session->userdata('nama'));
		$config['upload_path']          = './file/bkkm/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "KIP-".$this->session->userdata('nomor')."-".$nama;
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

	public function UploadLombaTahfidz()
	{
		$nama 							= str_replace('.','',$this->session->userdata('nama'));
		$config['upload_path']          = './file/tahfidz/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "PiagamTahfidz-".$this->session->userdata('nomor')."-".$nama;
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

	public function UploadFormulir()
	{
		$nama 							= str_replace('.','',$this->session->userdata('nama'));
		$config['upload_path']          = './file/formulir/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "Formulir-".$this->session->userdata('nomor')."-".$nama;
		$config['overwrite']			= true;
		$config['max_size']             = 5120; // 5MB

		$this->upload->initialize($config);

		if (!$this->upload->do_upload('formulir')) {
			$result = "0";
		}   else {
			$result = $this->upload->data('file_name');
		}
		return $result;
	}

	public function UploadSKHUN()
	{
		$nama 							= str_replace('.','',$this->session->userdata('nama'));
		$config['upload_path']          = './file/skhun/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "SKHUN-".$this->session->userdata('nomor')."-".$nama;
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

	public function UploadBKIP()
	{
		$nama 							= str_replace('.','',$this->session->userdata('nama'));
		$config['upload_path']          = './file/kip/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "KIP-".$this->session->userdata('nomor')."-".$nama;
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

	public function simpan_survey()
	{
		$this->load->model('survey_model');
		$post			= $this->input->post();

		$quest		 	= $this->survey_model->listPertanyaan();
		$jawaban 		= array();
		$waktu 			= date('Y-m-d H:i:s');
		foreach ($quest as $tanya) {
			$jwb 		= $post['jawaban'.$tanya['id_pertanyaan']];
			$id_tanya 	= $tanya['id_pertanyaan'];

			$jawaban 	= array('id_pertanyaan'		=> $id_tanya,
								'jawaban'			=> $jwb,
								'nilai'				=> $jwb,
								'created_date'		=> $waktu);

			$this->survey_model->simpanSurvey($jawaban);
		}

		$pesan 			= $post['pesan'];

		$data 			= array('pesan' => $pesan);
		$this->survey_model->simpanPesan($data);

		$datac 			= array('is_survey' => 1);
		$this->user_model->simpanPerubahan($this->session->userdata('nomor'),$datac);

		$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      		Toast.fire({
        		icon: 'success',
        		title: 'Survey Anda Berhasil Di Simpan'
      		})
    	});");
		redirect(base_url('dlogin/survey'));
	}
}