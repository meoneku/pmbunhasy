<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adminact extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$role = $this->session->userdata('role');
		if ($this->session->userdata('inbound') != TRUE) {
			redirect(base_url('webmin/login'));
		} elseif ($role != "admin" && $role != "petugas" && $role != "keuangan") {
			show_404();
		} else {
		}

		$this->load->model('admin_model');
		$this->load->helper('kode');
		$this->load->model('user_model');
		$this->load->model('daftar_model');
	}

	public function index()
	{
		show_404();
	}

	public function simpan_identitas()
	{
		$post 		= $this->input->post();
		$id 		= $post['id'];
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

		$url_id     = url_encode($id);

		$data  		= array(
			'nama'				=> $nama,
			'nik'				=> $nik,
			'tempat_lahir'		=> $tlah,
			'tanggal_lahir'		=> $tgl,
			'gender'			=> $gender,
			'alamat'			=> $alamat,
			'rt'				=> $rt,
			'rw'				=> $rw,
			'desa'				=> $desa,
			'kec'				=> $kec,
			'kab'				=> $kab,
			'prov'				=> $prov,
			'hp'				=> $hp
		);
		$this->user_model->simpanPerubahan($id, $data);
		$this->session->set_flashdata("pesan", "$('.swalDefaultSuccess').ready(function() {
      		Toast.fire({
        		icon: 'success',
        		title: 'Perubahan Data Identitas Diri Berhasil Di Simpan.'
      		})
    	});");
		redirect(base_url('webmin/admin/detil_daftar/') . $url_id);
	}

	public function simpan_pendidikan()
	{
		$post 		= $this->input->post();
		$id 		= $post['id'];
		$asal		= $post['asal'];
		$jurusan	= $post['jurusan'];
		$ns		 	= $post['ns'];
		$instan		= $post['instan'];
		$alamat		= $post['alamat_instan'];
		$telp_instan = $post['telp_instan'];
		$nisn 		= $post['nisn'];
		$nilai		= $post['nilai'];

		$url_id     = url_encode($id);

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
		$this->user_model->simpanPerubahan($id, $data);
		$this->session->set_flashdata("pesan", "$('.swalDefaultSuccess').ready(function() {
      		Toast.fire({
        		icon: 'success',
        		title: 'Perubahan Data Pendidikan Berhasil Di Simpan.'
      		})
    	});");
		redirect(base_url('webmin/admin/detil_daftar/') . $url_id . '#pendidikan');
	}

	public function simpan_ortu()
	{
		$post 		= $this->input->post();
		$id 		= $post['id'];
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

		$url_id     = url_encode($id);

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
		$this->user_model->simpanPerubahan($id, $data);
		$this->session->set_flashdata("pesan", "$('.swalDefaultSuccess').ready(function() {
      		Toast.fire({
        		icon: 'success',
        		title: 'Perubahan Data Orang Tua / Wali Berhasil Di Simpan.'
      		})
    	});");
		redirect(base_url('webmin/admin/detil_daftar/') . $url_id . '#ortu');
	}

	public function simpan_pilihan()
	{
		$post 		= $this->input->post();
		$id 		= $post['id'];
		$jalur		= $post['jalur'];
		$kelas 		= $post['kelas'];
		$pil1	 	= $post['pil1'];
		$pil2		= $post['pil2'];
		$ket 		= $post['ket'];

		$url_id     = url_encode($id);

		$data  		= array(
			'jalur'						=> $jalur,
			'kelas'						=> $kelas,
			'pil1'						=> $pil1,
			'pil2'						=> $pil2,
			'keterangan_pendaftaran'	=> $ket
		);
		$this->user_model->simpanPerubahan($id, $data);
		$this->session->set_flashdata("pesan", "$('.swalDefaultSuccess').ready(function() {
      		Toast.fire({
        		icon: 'success',
        		title: 'Perubahan Data Pilihan Berhasil Di Simpan.'
      		})
    	});");
		redirect(base_url('webmin/admin/detil_daftar/') . $url_id . '#pendidikan');
	}

	public function verifikasi()
	{
		$this->load->helper('string');
		$tgl 		= date('Y-m-d');
		$post 		= $this->input->post();
		$id 		= $post['id'];
		$bayar 		= $post['pembayaran'];
		$link 		= 0;

		$data 		= array('status' => $bayar, 'tanggal_verifikasi' => $tgl);

		$buktitrans = $post['konfir'];
		$alasan     = $post['alasan'];

		$timestamp = date('Y-m-d H:i:s');

		if ($buktitrans != 3) {
			$this->user_model->simpanPerubahan($id, $data);
		}

		if ($buktitrans != 999) {
			$id_b   = $post['id_b'];

			$cdata  = array(
				'status_bukti' => $buktitrans,
				'ket'		   => $alasan
			);
			$this->user_model->ubahBukti($cdata, $id_b);
			if ($buktitrans == 2) {
				$file   = random_string('alnum', 10);
				$data_id = random_string('alnum', 64);
				$data_en = url_encode($data_id);
				$data   = base_url('cek/data/') . $data_en;
				$this->buatQRCode($data, $file);
				$adata  = array(
					'id_kwitansi'	=> $data_id,
					'nomor'			=> $id,
					'id_user'		=> $this->session->userdata('id'),
					'waktu_acc'		=> $timestamp,
					'qrcode'		=> $file . '.png'
				);
				$cekkuwi = $this->user_model->cariQRCode($id);
				if (empty($cekkuwi['qrcode'])) {
					$this->admin_model->simpanKwitansi($adata);
				} else {
					$this->admin_model->ubahKwitansi($adata, $id);
				}

				$pesan  = '<p>Assalamualakum Wr. Wb.</p>
						 <p>Pembayaran Anda Telah Terverifikasi, Silahkan Cetak Bukti Pendaftaran Anda di alamat ini</P>
						 <p><a href="' . base_url('daftar/cetak/') . url_encode($id) . '" target="_blank">' . base_url('daftar/cetak/') . url_encode($id) . '</a></p>
						 <p>Dan harap segera melengkapi berkas KK, KTP, Ijazah Atau  SKL Dan Raport Semester 1-5 dalam bentuk scan dan di upload atau dapat diserahkan ke kantor sekretariat untuk penentu kelulusan</p>
						 <p>Wassalamualaikum Wr. Wb.</p>';
				$link  = 1;
			} elseif ($buktitrans == 3) {
				$pesan  = '<p>Assalamualakum Wr. Wb.</p>
						 <p>Mohon Maaf Upload Bukti Transfer Anda Di Tolak Di Karenakan ' . $alasan . '</P>
						 <p>Wassalamualaikum Wr. Wb.</p>';
				$link  = 2;
			}

			$dpesan = array(
				'id_user'		=> $this->session->userdata('id'),
				'nomor'			=> $id,
				'waktu_pesan'	=> $timestamp,
				'judul_pesan'	=> 'Verifikasi Bukti Transfer',
				'isi_pesan'		=> $pesan,
				'status_pesan'	=> 0
			);

			$this->daftar_model->simpanPesan($dpesan);
			$mail = $this->admin_model->getMail($id);
			sendMail($mail['email'], $pesan, 'Verifikasi Bukti Transfer');
		}

		$this->session->set_flashdata("pesan", "$('.swalDefaultSuccess').ready(function() {
      		Toast.fire({
        		icon: 'success',
        		title: 'Data Berhasil Di Simpan'
      		})
    	});");
		$url_id   = url_encode($id);
		if ($link == 1) {
			redirect(base_url('webmin/admin/cetak_berkas/') . $url_id);
		} else {
			redirect(base_url('webmin/admin/daftar'));
		}
	}

	public function simpan_ajuan()
	{
		$post 		= $this->input->post();
		$id 		= $post['id'];
		$ajuan 		= $post['konfir'];
		$nomor		= $post['nomor'];

		$data 		= array('status_perubahan' => $ajuan);
		$this->admin_model->ubahAjuan($data, $id);

		$buktitrans = $post['konfir'];
		$alasan = $post['alasan'];

		if ($ajuan == 1) {
			$ajalur = $post['jalur'];
			$akelas = $post['kelas'];
			$apil1	= $post['pil1'];
			$apil2	= $post['pil2'];

			$jalura = $post['jalurlama'];
			$kelasa = $post['kelaslama'];
			$pil1a	= $post['pil1lama'];
			$pil2a	= $post['pil2lama'];

			if ($ajalur == "") {
				$jalur = $jalura;
			} else {
				$jalur = $ajalur;
			}

			if ($akelas == "") {
				$kelas = $kelasa;
			} else {
				$kelas = $akelas;
			}

			if ($apil1 == 0) {
				$pil1 = $pil1a;
			} else {
				$pil1 = $apil1;
			}

			if ($apil2 == 0) {
				$pil2 = $pil2a;
			} else {
				$pil2 = $apil2;
			}

			$cdata  = array(
				'jalur'	=> $jalur,
				'kelas' => $kelas,
				'pil1'  => $pil1,
				'pil2'  => $pil2
			);
			$this->user_model->simpanPerubahan($nomor, $cdata);
			$pesan = '<p>Assalamualakum Wr. Wb.</p>
						 <p>Pengajuan Perubahan Anda Diterima dengan rincian sebagai berikut</P>
						 <p>Jalur/Program : ' . $jalur . '</br>
						 	Kelas : ' . $kelas . '</br>
						 	Pilihan Jurusan 1 : ' . getProdi($pil1) . '</br>
						 	Pilihan Jurusan 2 : ' . getProdi($pil2) . ' </p>
						 <p>Wassalamualaikum Wr. Wb.</p>';
			//echo $jalur." ".$kelas." ".$pil1." ".$pil2;
		} else {
			$pesan = '<p>Assalamualakum Wr. Wb.</p>
						 <p>Pengajuan Perubahan Anda Tidak Diterima Di Karenakan' . $alasan . '</P>
						 <p>Wassalamualaikum Wr. Wb.</p>';
		}
		$timestamp = date('Y-m-d H:i:s');
		$dpesan = array(
			'id_user'		=> $this->session->userdata('id'),
			'nomor'			=> $nomor,
			'waktu_pesan'	=> $timestamp,
			'judul_pesan'	=> 'Hasil Pengajuan Perubahan',
			'isi_pesan'		=> $pesan,
			'status_pesan'	=> 0
		);

		$this->daftar_model->simpanPesan($dpesan);
		$mail = $this->admin_model->getMail($nomor);
		sendMail($mail['email'], $pesan, 'Hasil Pengajuan Perubahan');

		$this->session->set_flashdata("pesan", "$('.swalDefaultSuccess').ready(function() {
      		Toast.fire({
        		icon: 'success',
        		title: 'Data Berhasil Di Simpan'
      		})
    	});");

		redirect(base_url('webmin/admin/perubahan'));
	}

	public function ganti_password()
	{
		$post 		= $this->input->post();
		$passlama	= $post['old_password'];
		$passbaru	= $post['new_password'];
		$pass		= $post['cfm_password'];
		$nomor		= $this->session->userdata('id');
		$maba 		= $this->admin_model->getUser($nomor);

		if ($passbaru != $pass) {
			$this->session->set_flashdata("pesan", "$('.swalDefaultSuccess').ready(function() {
      		Toast.fire({
        		icon: 'error',
        		title: 'Password Baru Anda Salah Atau Tidak Sama Dengan Password Yang Anda Ketik Ulang.'
      			})
    		});");
			redirect(base_url('webmin/admin/password'));
		} elseif (md5($passlama) != $maba['password']) {
			$this->session->set_flashdata("pesan", "$('.swalDefaultSuccess').ready(function() {
      		Toast.fire({
        		icon: 'error',
        		title: 'Password Lama Yang Anda Ketikkan Salah Atau Tidak Sama.'
      			})
    		});");
			redirect(base_url('webmin/admin/password'));
		}

		$data  		= array(
			'password'		=> md5($pass)
		);

		$this->admin_model->setPassword($nomor, $data);
		$this->session->set_flashdata("pesan", "$('.swalDefaultSuccess').ready(function() {
      		Toast.fire({
        		icon: 'success',
        		title: 'Perubahan Password Berhasil Di Rubah.'
      		})
    	});");
		redirect(base_url('webmin/admin/password'));
	}

	public function kirim_pesan()
	{
		$post 		= $this->input->post();
		$nomor		= $post['nomor'];
		$email 		= $post['email'];
		$pesan 		= $post['pesan'];

		$timestamp = date('Y-m-d H:i:s');
		$dpesan = array(
			'id_user'		=> $this->session->userdata('id'),
			'nomor'			=> $nomor,
			'waktu_pesan'	=> $timestamp,
			'judul_pesan'	=> 'Pesan Dari Panitia PMB',
			'isi_pesan'		=> $pesan,
			'status_pesan'	=> 0
		);

		$this->daftar_model->simpanPesan($dpesan);
		sendMail($email, $pesan, 'Pesan Dari Panitia PMB');

		$this->session->set_flashdata("pesan", "$('.swalDefaultSuccess').ready(function() {
      		Toast.fire({
        		icon: 'success',
        		title: 'Pesan Berhasil Dikirim'
      		})
    	});");

		redirect(base_url('webmin/admin/pesan'));
	}

	public function buatQRCode($data, $file)
	{
		$this->load->library('ciqrcode');

		$config['cacheable']    = true;
		$config['cachedir']     = './file/';
		$config['errorlog']     = './file/';
		$config['imagedir']     = './file/qrcode/';
		$config['quality']      = true;
		$config['size']         = '1024';
		$config['black']        = array(224, 255, 255);
		$config['white']        = array(70, 130, 180);
		$this->ciqrcode->initialize($config);

		$image_name = $file . '.png';

		$params['data'] = $data;
		$params['level'] = 'H';
		$params['size'] = 10;
		$params['savename'] = FCPATH . $config['imagedir'] . $image_name;
		$this->ciqrcode->generate($params);
	}

	public function reset()
	{
		$post 		= $this->input->post();
		$id 		= $post['id'];
		$pass 		= md5('123456');

		$data 		= array('password'	=> $pass);
		$this->user_model->simpanPerubahan($id, $data);

		$this->session->set_flashdata("pesan", "$('.swalDefaultSuccess').ready(function() {
      		Toast.fire({
        		icon: 'success',
        		title: 'Password berhasil di reset ke 123456'
      		})
    	});");

		redirect(base_url('webmin/admin/daftar'));
	}

	public function verfikasiberkas()
	{
		$post		= $this->input->post();
		$id 		= url_decode($post['id']);
		$stat 		= $post['veri'];
		$nilai		= $post['nilai'];
		$ket 		= $post['ket'];
		$tanggal   	= date('Y-m-d H:i:s');
		$cariMaba 	= $this->user_model->cariMaba($id);

		$data 		= array(
			'nilai'					 => $nilai,
			'keterangan_pendaftaran' => $ket,
			'status_berkas'			 => $stat,
			'waktu_verifikasi_berkas' => $tanggal
		);

		$pesan 	= '<p>Assalamualakum Wr. Wb.</p>
				   <p>Proses Verifikasi Berkas Anda Telah Selesai Di Lakukan Dengan Keterangan:</p>
				   <p>Status : ' . getStatusBerkasAdmin($stat) . '</p>
				   <p>Keterangan : ' . $ket . '</p>
				   <p>Terima Kasih Perhatiannya</p>
				   <p>Wassalamualaikum Wr. Wb.</p>';

		$datac 		= array('status_berkas'	=> '1');
		$timestamp = date('Y-m-d H:i:s');
		$dpesan = array(
			'id_user'		=> $this->session->userdata('id'),
			'nomor'			=> $id,
			'waktu_pesan'	=> $timestamp,
			'judul_pesan'	=> 'Status Verifikasi Berkas',
			'isi_pesan'		=> $pesan,
			'status_pesan'	=> 0
		);

		$this->user_model->simpanPerubahan($id, $data);
		$this->admin_model->ubahBerkas($datac, $id);
		$this->daftar_model->simpanPesan($dpesan);
		sendMail($cariMaba['email'], $pesan, 'Status Verifikasi Berkas');
		$this->session->set_flashdata("pesan", "$('.swalDefaultSuccess').ready(function() {
      		Toast.fire({
        		icon: 'success',
        		title: 'Proses Verifikasi Berkas Berhasil Di Lakukan.'
      		})
    	});");
		redirect(base_url('webmin/admin/berkas/') . $post['id']);
	}

	public function duok()
	{
		$idtemp			  = $this->uri->segment(4);
		$id 			  = url_decode($idtemp);

		$tahun			  = substr(date('Y'), 2);

		$cariMaba 		  = $this->user_model->cariMaba($id);
		$fakultas 		  = getKodeFakultas($cariMaba['prodi']);

		if (strlen($cariMaba['prodi']) == 1) {
			$prodi 		  = '0' . $cariMaba['prodi'];
		} else {
			$prodi 		  = $cariMaba['prodi'];
		}

		if ($cariMaba['prodi'] == 13) {
			$jenjang 	  = 3;
		} elseif ($cariMaba['prodi'] == 22 or $cariMaba['prodi'] == 23) {
			$jenjang	  = 5;
		} else {
			$jenjang	  = 4;
		}

		$count 			  = $this->admin_model->countAProdi($cariMaba['prodi']);
		$nimtemp 		  = 0;

		if ($count == 0) {
			$nim 		  = $tahun . $fakultas . $prodi . $jenjang . '001';
		} else {
			$lastnim 	  = $this->admin_model->cariNIMProdi($cariMaba['prodi'], $count - 1);
			$ambil_nomor  = substr($lastnim['nim'], 7);
			if (substr($ambil_nomor, 0, 1) != 0) {
				$nimtemp  = $ambil_nomor + 1;
			} elseif (substr($ambil_nomor, 0, 1) == 0 and substr($ambil_nomor, 1, 1) != 0) {
				$nilainim = substr($ambil_nomor, 1);
				$nimtemp  = $nilainim + 1;
			} elseif (substr($ambil_nomor, 0, 1) == 0 and substr($ambil_nomor, 1, 1) == 0 and substr($ambil_nomor, 2, 1) != 0) {
				$nilainim = substr($ambil_nomor, 2);
				$nimtemp  = $nilainim + 1;
			}
			if (strlen($nimtemp) == 1) {
				$nim 		  = $tahun . $fakultas . $prodi . $jenjang . '00' . $nimtemp;
			} elseif (strlen($nimtemp) == 2) {
				$nim 		  = $tahun . $fakultas . $prodi . $jenjang . '0' . $nimtemp;
			} else {
				$nim 		  = $tahun . $fakultas . $prodi . $jenjang . $nimtemp;
			}
		}
		//echo $nim;
		$data 	= array(
			'daftar_ulang'	=> 4,
			'nim' 			=> $nim
		);
		$pesan 	= '<p>Assalamualakum Wr. Wb.</p>
				   <p>Proses Verifikasi Daftar Ulang Anda Telah Selesai Di Lakukan, Proses Selanjutnya Anda Dapat Melakukan KRS (Kartu Rencana Studi) Dengan Mengakses siakadonline.unhasy.ac.id Dengan Menghubungi Kontak Person Untuk Menanyakan Mata Kuliah Yang Bisa Di Ambil Atau Menghubungi Fakultas Masing-Masing. Untuk Butki Daftar Ulang Anda Dapat Mengunduh/Mendownload Melalui Tautan Di Bawah Ini:</p>
				   <p><a href="' . base_url('daftar/kdu/') . $idtemp . '" target="_blank">' . base_url('daftar/kdu/') . $idtemp . '</a></p>
				   <p>Terima Kasih Perhatiannya</p>
				   <p>Wassalamualaikum Wr. Wb.</p>';
		$timestamp = date('Y-m-d H:i:s');
		$dpesan = array(
			'id_user'		=> '2',
			'nomor'			=> $id,
			'waktu_pesan'	=> $timestamp,
			'judul_pesan'	=> 'Selamat Daftar Ulang Anda Berhasil',
			'isi_pesan'		=> $pesan,
			'status_pesan'	=> 0
		);

		$this->user_model->simpanPerubahan($id, $data);
		$this->daftar_model->simpanPesan($dpesan);
		sendMail($cariMaba['email'], $pesan, 'Selamat Daftar Ulang Anda Berhasil');
		$this->session->set_flashdata("pesan", "$('.swalDefaultSuccess').ready(function() {
      		Toast.fire({
        		icon: 'success',
        		title: 'Proses Verifikasi Daftar Ulang Selesai Di Lakukan.'
      		})
    	});");
		redirect(base_url('webmin/admin/cetak_berkas_du/') . $idtemp);
	}

	public function duno()
	{
		$idtemp			  = $this->uri->segment(4);
		$id 			  = url_decode($idtemp);
		$cariMaba 		  = $this->user_model->cariMaba($id);

		$timestamp = date('Y-m-d H:i:s');

		$data 	= array('daftar_ulang'	=> 2);
		$pesan 	= '<p>Assalamualakum Wr. Wb.</p>
				   <p>Proses Verifikasi Daftar Ulang Anda Gagal Di Proses, Mohon Cek Kembali Data Diri Anda Kemungkinan Ada Yang Salah Dalam Penulisan Atau Yang Lainnya.</p>
				   <p>Terima Kasih Perhatiannya</p>
				   <p>Wassalamualaikum Wr. Wb.</p>';
		$dpesan = array(
			'id_user'		=> '2',
			'nomor'			=> $id,
			'waktu_pesan'	=> $timestamp,
			'judul_pesan'	=> 'Proses Daftar Ulang Anda Gagal',
			'isi_pesan'		=> $pesan,
			'status_pesan'	=> 0
		);

		$this->user_model->simpanPerubahan($id, $data);
		$this->daftar_model->simpanPesan($dpesan);
		sendMail($cariMaba['email'], $pesan, 'Daftar Ulang Anda Tidak Berhasil');
		$this->session->set_flashdata("pesan", "$('.swalDefaultSuccess').ready(function() {
      		Toast.fire({
        		icon: 'success',
        		title: 'Proses Pembatalan Verifikasi Daftar Ulang Selesai Di Lakukan.'
      		})
    	});");
		redirect(base_url('webmin/admin/daftarls/'));
	}

	public function berkasoffline()
	{
		$post 		= $this->input->post();
		$url_id 	= $post['id'];
		$nomor 		= url_decode($post['id']);
		$kk 		= $post['kk'];
		$ktp 		= $post['ktp'];
		$ijazah		= $post['ijazah'];
		$skhun 		= $post['skhun'];
		$foto 		= $post['kk'];
		$suket_lulus = $post['suket_lulus'];
		$rapot1		= $post['rapot1'];
		$rapot2 	= $post['rapot2'];
		$rapot3 	= $post['rapot3'];
		$rapot4		= $post['rapot4'];
		$rapot5		= $post['rapot5'];
		$suket_prestasi = $post['suket_prestasi'];
		$piagam		= $post['piagam'];
		$tahfidz	= $post['tahfidz'];
		$piagam_tahfidz = $post['piagam_tahfidz'];
		$suket_bkkm	= $post['suket_bkkm'];
		$gaji		= $post['gaji'];
		$pbb		= $post['pbb'];
		$listrik	= $post['listrik'];
		$telp 		= $post['telp'];
		$pdam		= $post['pdam'];
		$kip		= $post['kip'];
		$bkip 		= $post['bkip'];
		$instansi 	= $post['instansi'];
		$time 	    = date('Y-m-d H:i:s');

		$pil 		= $post['pil'];

		if ($pil == 21 or $pil == 22) {
			$formulir = 0;
		} else {
			$formulir = 0;
		}

		$data 		= array(
			'nomor'			=> $nomor,
			'kk'			=> $kk,
			'ktp'			=> $ktp,
			'ijazah'		=> $ijazah,
			'skhun'			=> $skhun,
			'foto'			=> $foto,
			'formulir'		=> $formulir,
			'suket_lulus'	=> $suket_lulus,
			'rapot1'		=> $rapot1,
			'rapot2'		=> $rapot2,
			'rapot3'		=> $rapot3,
			'rapot4'		=> $rapot4,
			'rapot5'		=> $rapot5,
			'suket_prestasi' => $suket_prestasi,
			'piagam'		=> $piagam,
			'tahfidz'		=> $tahfidz,
			'piagam_tahfidz' => $piagam_tahfidz,
			'suket_bkkm'	=> $suket_bkkm,
			'gaji'			=> $gaji,
			'pbb'			=> $pbb,
			'listrik'		=> $listrik,
			'telp'			=> $telp,
			'pdam'			=> $pdam,
			'kip'			=> $kip,
			'bkip'			=> $bkip,
			'instansi'		=> $instansi,
			'waktu_input'	=> $time,
			'id_user'		=> $this->session->userdata('id')
		);

		$cek 		= $this->admin_model->cariPemberkasan($nomor);

		if (empty($cek)) {
			$this->admin_model->simpanPemberkasan($data);
		} else {
			$this->admin_model->ubahPemberkasan($nomor, $data);
		}
		$stat 		= $post['veri'];
		$nilai		= $post['nilai'];
		$ket 		= $post['ket'];

		$datac 		= array(
			'nilai'					 => $nilai,
			'keterangan_pendaftaran' => $ket,
			'status_berkas'			 => $stat
		);

		$this->user_model->simpanPerubahan($nomor, $datac);

		$this->session->set_flashdata("pesan", "$('.swalDefaultSuccess').ready(function() {
      		Toast.fire({
        		icon: 'success',
        		title: 'Proses Penyimpanan Data Berkas Berhasil Di Simpan'
      		})
    	});");
		redirect(base_url('webmin/admin/berkas/') . $url_id);
	}

	public function ubahprodi()
	{
		$post 		= $this->input->post();
		$id 		= url_decode($post['id']);
		$prodi 		= $post['prodi'];
		$waktu 		= date('Y-m-d H:i:s');
		$oldprodi 	= $post['oldprodi'];
		$nama 		= $post['name'];

		$surat_asal = $this->UploadSuratA($id, $nama);
		$surat_terima = $this->UploadSuratT($id, $nama);

		$data 		= array(
			'nomor'			=> $id,
			'surat_asal'	=> $surat_asal,
			'surat_terima'	=> $surat_terima,
			'prodi_asal'	=> $oldprodi,
			'prodi_terima'	=> $prodi,
			'waktu_ubah'	=> $waktu,
			'id_user'		=> $this->session->userdata('id')
		);

		$datac 		= array('prodi' 	=> $prodi);

		if ($surat_asal == '0' or $surat_terima == '0') {
			$this->session->set_flashdata("pesan", "$('.swalDefaultSuccess').ready(function() {
      			Toast.fire({
        			icon: 'success',
        			title: 'Proses Perubahan Prodi Gagal Di Simpan'
      			})
    		});");
			redirect(base_url('webmin/admin/ubahprodi/') . $post['id']);
		} else {
			$this->admin_model->simpanUbahProdi($data);
			$this->user_model->simpanPerubahan($id, $datac);

			$this->session->set_flashdata("pesan", "$('.swalDefaultSuccess').ready(function() {
      			Toast.fire({
        			icon: 'success',
        			title: 'Proses Perubahan Prodi Berhasil Di Simpan'
      			})
    		});");
			redirect(base_url('webmin/admin/daftarls/'));
		}
	}

	public function UploadSuratA($nomor, $name)
	{
		$this->load->helper('string');
		$rand   						= random_string('alnum', 5);
		$nama 							= str_replace('.', '', $name);
		$config['upload_path']          = './file/pindahprodi/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "SuratAsal-" . $nomor . "-" . $nama . "-" . $rand;
		$config['overwrite']			= true;
		$config['max_size']             = 5120; // 5MB

		$this->load->library('upload');

		$this->upload->initialize($config);

		if (!$this->upload->do_upload('suratasal')) {
			$result = "0";
		} else {
			$result = $this->upload->data('file_name');
		}
		return $result;
	}

	public function UploadSuratT($nomor, $name)
	{
		$this->load->helper('string');
		$rand   						= random_string('alnum', 5);
		$nama 							= str_replace('.', '', $name);
		$config['upload_path']          = './file/pindahprodi/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "SuratTerima-" . $nomor . "-" . $nama . "-" . $rand;
		$config['overwrite']			= true;
		$config['max_size']             = 5120; // 5MB

		$this->load->library('upload');

		$this->upload->initialize($config);

		if (!$this->upload->do_upload('suratterima')) {
			$result = "0";
		} else {
			$result = $this->upload->data('file_name');
		}
		return $result;
	}

	public function ubahjas()
	{
		$post 		= $this->input->post();
		$id 		= url_decode($post['id']);
		$jas 		= $post['jas'];

		$data 		= array(
			'ukuran_jas'	=> $jas
		);

		$this->user_model->simpanPerubahan($id, $data);
		$this->session->set_flashdata("pesan", "$('.swalDefaultSuccess').ready(function() {
      		Toast.fire({
        		icon: 'success',
        		title: 'Perubahan Ukuran Jas Almamater Berhasil Di Simpan.'
      		})
    	});");
		redirect(base_url('webmin/admin/ubah_jas/') . $post['id']);
	}
}
