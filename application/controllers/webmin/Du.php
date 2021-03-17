<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Du extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$role = $this->session->userdata('role');
		if ($this->session->userdata('inbound') != TRUE) {
			redirect(base_url('webmin/login'));
		} elseif ($role != "admin" && $role != "keuangan") {
			show_404();
		} else {
		}

		$this->load->model('admin_model');
		$this->load->helper('kode');
		$this->load->helper('waktu');
		$this->load->model('user_model');
		$this->load->model('daftar_model');
	}

	public function index()
	{
		$data['maba']	= $this->admin_model->listMabaDU();

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

		$this->load->view('admin/pendaftardu', $data);
	}

	public function verifi()
	{
		$idtemp			  = $this->uri->segment(4);
		$id 			  = url_decode($idtemp);
		$data['pendaftar'] = $this->user_model->cariMaba($id);
		$data['transfer'] = $this->admin_model->cekPembayaran($id, "Daftar Ulang");
		$data['bank']	  = $this->user_model->getRekening($data['pendaftar']['prodi']);

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

		$this->load->view('admin/verdaftarulang', $data);
	}

	public function ubah_nim()
	{
		$idtemp			  = $this->uri->segment(4);
		$id 			  = url_decode($idtemp);

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

		$data['personal'] = $this->admin_model->cariMaba($id);
		$this->load->view('admin/ubah_nim', $data);
	}

	public function list()
	{
	}

	public function onlinedu()
	{
		$post 		= $this->input->post();
		$id 		= $post['id'];
		$id_b   	= $post['id_b'];
		$buktitrans = $post['konfir'];
		$alasan     = $post['alasan'];


		if ($buktitrans == 1) {
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

			$data['pendaftar']  = $this->user_model->cariMaba($id);
			$biaya 		    	= $this->admin_model->cariBiaya($id);
			if (empty($biaya)) {
				$data['her']	= 0;
				$data['spp']	= 0;
				$data['ujian']  = 0;
				$data['dpp']	= 0;
				$data['posmaru'] = 0;
				$data['kopertais'] = 0;
				$data['jumlah'] = 0;
			} else {
				$her	= 0;
				$spp	= 0;
				$ujian  = 0;
				$dpp	= 0;
				$posmaru = 0;
				$kopertais = 0;
				foreach ($biaya as $harga) {
					$her	+= $harga['her'];
					$spp	+= $harga['spp'];
					$ujian  += $harga['ujian'];
					$dpp	+= $harga['dpp'];
					$posmaru += $harga['posmaru'];
					$kopertais += $harga['kopertais'];
				}
				$data['her']	= number_format($her, 0, ",", ".");
				$data['spp']	= number_format($spp, 0, ",", ".");
				$data['ujian']  = number_format($ujian, 0, ",", ".");
				$data['dpp']	= number_format($dpp, 0, ",", ".");
				$data['posmaru'] = number_format($posmaru, 0, ",", ".");
				$data['kopertais'] = number_format($kopertais, 0, ",", ".");
				$data['jumlah'] = $her + $spp + $ujian + $dpp + $posmaru + $kopertais;
			}
			$data['nomor']		= $id;
			$data['id_berkas']  = $id_b;

			$this->load->view('admin/verdaftarulang2', $data);
		} elseif ($buktitrans == 2) {
			$pesan  = '<p>Assalamualakum Wr. Wb.</p>
					<p>Mohon Maaf Upload Bukti Transfer Daftar Ulang Anda Di Tolak Anda Di Tolak Di Karenakan ' . $alasan . '</P>
					<p>Wassalamualaikum Wr. Wb.</p>';

			$timestamp = date('Y-m-d H:i:s');

			$data 		= array('daftar_ulang' => '0', 'tanggal_verifikasi_du' => $timestamp);
			$this->user_model->simpanPerubahan($id, $data);

			$cdata  = array(
				'status_bukti' => '2',
				'ket'		   => $alasan
			);
			$this->user_model->ubahBukti($cdata, $id_b);

			$dpesan = array(
				'id_user'		=> $this->session->userdata('id'),
				'nomor'			=> $id,
				'waktu_pesan'	=> $timestamp,
				'judul_pesan'	=> 'Verifikasi Pembayaram Gagal',
				'isi_pesan'		=> $pesan,
				'status_pesan'	=> 0
			);

			$this->daftar_model->simpanPesan($dpesan);
			$mail = $this->admin_model->getMail($id);
			sendMail($mail['email'], $pesan, 'Verifikasi Bukti Transfer Daftar Ulang');

			$this->session->set_flashdata("pesan", "$('.swalDefaultSuccess').ready(function() {
      			Toast.fire({
        			icon: 'success',
        			title: 'Data Berhasil Di Simpan'
      			})
    		});");
			redirect(base_url('webmin/admin/daftarls/'));
		} else {
			redirect(base_url('webmin/home'));
		}
	}

	public function offlinedu()
	{
		$idtemp			  = $this->uri->segment(4);
		$id 			  = url_decode($idtemp);

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

		$data['pendaftar']  = $this->user_model->cariMaba($id);
		$biaya 		    	= $this->admin_model->cariBiaya($id);
		if (empty($biaya)) {
			$data['her']	= 0;
			$data['spp']	= 0;
			$data['ujian']  = 0;
			$data['dpp']	= 0;
			$data['posmaru'] = 0;
			$data['kopertais'] = 0;
			$data['jumlah'] = 0;
		} else {
			$her	= 0;
			$spp	= 0;
			$ujian  = 0;
			$dpp	= 0;
			$posmaru = 0;
			$kopertais = 0;
			foreach ($biaya as $harga) {
				$her	+= $harga['her'];
				$spp	+= $harga['spp'];
				$ujian  += $harga['ujian'];
				$dpp	+= $harga['dpp'];
				$posmaru += $harga['posmaru'];
				$kopertais += $harga['kopertais'];
			}
			$data['her']	= number_format($her, 0, ",", ".");
			$data['spp']	= number_format($spp, 0, ",", ".");
			$data['ujian']  = number_format($ujian, 0, ",", ".");
			$data['dpp']	= number_format($dpp, 0, ",", ".");
			$data['posmaru'] = number_format($posmaru, 0, ",", ".");
			$data['kopertais'] = number_format($kopertais, 0, ",", ".");
			$jumlah 		= $her + $spp + $ujian + $dpp + $posmaru + $kopertais;
			$data['jumlah'] = number_format($jumlah, 0, ",", ".");
		}
		$data['nomor']		= $id;
		$data['id_berkas']  = 0;

		$this->load->view('admin/verdaftarulang2', $data);
	}

	public function edit_du()
	{
		$idtemp			  = $this->uri->segment(4);
		$id 			  = url_decode($idtemp);

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

		$biaya 		    	= $this->admin_model->getBiaya($id);
		$data['pendaftar']  = $this->user_model->cariMaba($biaya['nomor']);
		$her	= $biaya['her'];
		$spp	= $biaya['spp'];
		$ujian  = $biaya['ujian'];
		$dpp	= $biaya['dpp'];
		$posmaru = $biaya['posmaru'];
		$kopertais = $biaya['kopertais'];
		$data['her']	= number_format($her, 0, ",", ".");
		$data['spp']	= number_format($spp, 0, ",", ".");
		$data['ujian']  = number_format($ujian, 0, ",", ".");
		$data['dpp']	= number_format($dpp, 0, ",", ".");
		$data['posmaru'] = number_format($posmaru, 0, ",", ".");
		$data['kopertais'] = number_format($kopertais, 0, ",", ".");
		$jumlah 		= $her + $spp + $ujian + $dpp + $posmaru + $kopertais;
		$data['jumlah'] = number_format($jumlah, 0, ",", ".");

		$data['id_pembayaran']	= $idtemp;
		$data['nomor']			= $biaya['nomor'];
		$data['bank']			= $biaya['bank'];
		$data['ket']			= $biaya['keterangan_biaya'];

		$this->load->view('admin/edit_pembayaran_du', $data);
	}

	public function simpandu()
	{
		$this->load->helper('string');
		$post 		= $this->input->post();
		$id 		= $post['id'];
		$id_b   	= $post['id_b'];
		$bank 		= $post['bank'];

		$her 		= $this->convertToAngka($post['herreg']);
		$spp 		= $this->convertToAngka($post['spp']);
		$ujian 		= $this->convertToAngka($post['ujian']);
		$dpp 		= $this->convertToAngka($post['dpp']);
		$posmaru	= $this->convertToAngka($post['posmaru']);
		$kopertais  = $this->convertToAngka($post['kopertais']);
		$ket 		= $post['ket'];

		$timestamp = date('Y-m-d H:i:s');

		$cekbiaya 	= $this->admin_model->getBiayaByNomor($id);

		if(empty($cekbiaya)) {
			$data 		= array('daftar_ulang' => '2', 'tanggal_verifikasi_du' => $timestamp);
		} else {
			$data 		= array('tanggal_verifikasi_du' => $timestamp);
		}

		$this->user_model->simpanPerubahan($id, $data);
		if ($id_b != 0) {
			$cdata  = array(
				'status_bukti' => '2',
				'ket'		   => $ket
			);
			$this->user_model->ubahBukti($cdata, $id_b);
		}

		$file   = random_string('alnum', 15);
		$data_id = random_string('alnum', 64);
		$data_en = url_encode($data_id);
		$hdata  = base_url('cek/du/') . $data_en;
		$this->buatQRCode($hdata, $file);

		$pesan  = '<p>Assalamualakum Wr. Wb.</p>
					<p>Pembayaran Daftar Anda Telah Terverifikasi, Silahkan Cetak Kwitansi Pembayaran Anda di alamat ini</P>
					<p><a href="' . base_url('daftar/cetakdu/') . $data_en . '" target="_blank">' . base_url('daftar cetakdu/') . $data_en . '</a>. Silahkan lakukan proses selanjutnya pada menu Daftar Ulang.</p>
					<p>Wassalamualaikum Wr. Wb.</p>';

		$dpesan = array(
			'id_user'		=> $this->session->userdata('id'),
			'nomor'			=> $id,
			'waktu_pesan'	=> $timestamp,
			'judul_pesan'	=> 'Verifikasi Pembayaran Daftar Ulang Berhasil',
			'isi_pesan'		=> $pesan,
			'status_pesan'	=> 0
		);

		$this->daftar_model->simpanPesan($dpesan);
		$mail = $this->admin_model->getMail($id);
		//sendMail($mail['email'], $pesan, 'Verifikasi Bukti Transfer Daftar Ulang');
		$bdata 	= array(
			'her'				=> $her,
			'spp'				=> $spp,
			'ujian'				=> $ujian,
			'dpp'				=> $dpp,
			'posmaru'			=> $posmaru,
			'kopertais'			=> $kopertais,
			'nomor' 			=> $id,
			'tanggal_biaya'		=> $timestamp,
			'bank'				=> $bank,
			'keterangan_biaya'	=> $ket,
			'has_key'			=> $data_id,
			'qrcode'			=> $file . '.png',
			'id_user'			=> $this->session->userdata('id')
		);
		$this->admin_model->simpanBiaya($bdata);
		$this->session->set_flashdata("pesan", "$('.swalDefaultSuccess').ready(function() {
      			Toast.fire({
        			icon: 'success',
        			title: 'Data Berhasil Di Simpan'
      			})
    		});");
		$url_id = url_encode($id);
		redirect(base_url('webmin/du/cetak_kuwi/') . $url_id);
	}

	public function editdu()
	{
		$this->load->helper('string');
		$post 		= $this->input->post();
		$id 		= url_decode($post['id']);
		$bank 		= $post['bank'];

		$her 		= $this->convertToAngka($post['herreg']);
		$spp 		= $this->convertToAngka($post['spp']);
		$ujian 		= $this->convertToAngka($post['ujian']);
		$dpp 		= $this->convertToAngka($post['dpp']);
		$posmaru	= $this->convertToAngka($post['posmaru']);
		$kopertais  = $this->convertToAngka($post['kopertais']);
		$ket 		= $post['ket'];

		$timestamp = date('Y-m-d H:i:s');

		$data 	= array(
			'her'				=> $her,
			'spp'				=> $spp,
			'ujian'				=> $ujian,
			'dpp'				=> $dpp,
			'posmaru'			=> $posmaru,
			'kopertais'			=> $kopertais,
			'nomor' 			=> $id,
			'tanggal_biaya'		=> $timestamp,
			'bank'				=> $bank,
			'keterangan_biaya'	=> $ket
		);
		$this->admin_model->ubahBiaya($id, $data);
		$this->session->set_flashdata("pesan", "$('.swalDefaultSuccess').ready(function() {
      			Toast.fire({
        			icon: 'success',
        			title: 'Data Berhasil Di Simpan'
      			})
    		});");
		$url_id = url_encode($id);
		redirect(base_url('webmin/du/cetak_kuwi/') . $url_id);
	}

	public function cetak_kuwi()
	{
		$idtemp			  = $this->uri->segment(4);
		$id 			  = url_decode($idtemp);
		$data['pendaftar'] = $this->user_model->cariMaba($id);
		$data['transfer'] = $this->admin_model->cariBiaya($id);

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

		$this->load->view('admin/kuwi_ulang', $data);
	}

	public function list_edit_du()
	{
		$idtemp			  = $this->uri->segment(4);
		$id 			  = url_decode($idtemp);
		$data['pendaftar'] = $this->user_model->cariMaba($id);
		$data['transfer'] = $this->admin_model->cariBiaya($id);

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

		$this->load->view('admin/list_edit_du', $data);
	}

	public function cetak_kwitansi()
	{
		$idtemp			  = $this->uri->segment(4);
		$id 			  = url_decode($idtemp);
		$data['biaya'] 	  = $this->admin_model->getBiaya($id);
		$data['pendaftar'] = $this->user_model->cariMaba($data['biaya']['nomor']);
		$data['user']	  = $this->admin_model->getUser($data['biaya']['id_user']);

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

		$data['her']	= number_format($data['biaya']['her'], 0, ",", ".");
		$data['spp']	= number_format($data['biaya']['spp'], 0, ",", ".");
		$data['ujian']  = number_format($data['biaya']['ujian'], 0, ",", ".");
		$data['dpp']	= number_format($data['biaya']['dpp'], 0, ",", ".");
		$data['posmaru'] = number_format($data['biaya']['posmaru'], 0, ",", ".");
		$data['kopertais'] = number_format($data['biaya']['kopertais'], 0, ",", ".");
		$jumlahtotal 	= $data['biaya']['her'] + $data['biaya']['spp'] + $data['biaya']['ujian'] + $data['biaya']['dpp'] + $data['biaya']['posmaru'] + $data['biaya']['kopertais'];
		$data['jumlah'] = number_format($jumlahtotal, 0, ",", ".");

		$this->load->view('admin/du_kwitansi', $data);
		//echo $id;
	}

	function convertToAngka($rupiah)
	{
		$int = preg_replace("/[^0-9]/", "", $rupiah);
		return $int;
	}

	public function buatQRCode($data, $file)
	{
		$this->load->library('ciqrcode');

		$config['cacheable']    = true;
		$config['cachedir']     = './file/';
		$config['errorlog']     = './file/';
		$config['imagedir']     = './file/qrcode/';
		$config['quality']      = true;
		$config['size']         = '2048';
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

	public function ubahnim()
	{
		$post 		= $this->input->post();
		$id 		= url_decode($post['id']);
		$nim 		= $post['nim'];

		$data 		= array(
			'nim_pdti'	=> $nim
		);

		$this->user_model->simpanPerubahan($id, $data);
		$this->session->set_flashdata("pesan", "$('.swalDefaultSuccess').ready(function() {
      		Toast.fire({
        		icon: 'success',
        		title: 'Perubahan NIM Di Simpan.'
      		})
    	});");
		redirect(base_url('webmin/admin/daftarls/') . $post['id']);
	}
}
