<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
		$this->load->helper('rupiah');
		$this->load->helper('waktu');
		$this->load->model('user_model');
	}

	public function index()
	{
		show_404();
	}

	public function daftar()
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

		$this->load->view('admin/pendaftar_ajax', $data);
		//echo $this->session->userdata('role');
	}

	public function daftar_test()
	{
		$data['maba']            = $this->admin_model->listMaba();

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

		$this->load->view('admin/pendaftar', $data);
	}

	public function daftarls()
	{
		//$data['maba']	= $this->admin_model->listMabaLS();

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

		$this->load->view('admin/pendaftarls_ajax', $data);
		//echo $this->session->userdata('role');
	}

	public function daftardu()
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
		//echo $this->session->userdata('role');
	}

	public function bayardu()
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

		$this->load->view('admin/pendaftar_bayar_du', $data);
		//echo $this->session->userdata('role');
	}

	public function detil_daftar()
	{
		$idtemp			  = $this->uri->segment(4);
		$id 			  = url_decode($idtemp);
		$data['identitas'] = $this->user_model->cariMaba($id);

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
		$this->load->view('admin/detil_pendaftar', $data);
	}

	public function kwitansi()
	{
		$idtemp			  = $this->uri->segment(4);
		$id 			  = url_decode($idtemp);
		$data['kuwi']	  = $this->user_model->cariMaba($id);
		if (empty($data['kuwi']['tanggal_verifikasi'])) {
			$data['tanggal'] = $data['kuwi']['tanggal_daftar'];
		} else {
			$data['tanggal'] = $data['kuwi']['tanggal_verifikasi'];
		}
		$this->load->view('admin/kwitansi', $data);
	}

	public function bukti()
	{
		$idtemp			  = $this->uri->segment(4);
		$id 			  = url_decode($idtemp);
		$data['bukti']	  = $this->user_model->cariMaba($id);
		$cekfoto		  = $this->user_model->cariFoto($id);
		if ($cekfoto['foto'] != "") {
			$data['foto'] = $cekfoto['foto'];
		} else {
			$data['foto'] = "default.png";
		}
		$this->load->view('admin/bukti_pendaftaran', $data);
	}

	public function bdaftar()
	{
		$idtemp			  = $this->uri->segment(4);
		$id 			  = url_decode($idtemp);
		$data['berkas']	  = $this->user_model->cariMaba($id);
		$data['bukti']    = $this->user_model->cekPembayaran($id, "Pendaftaran");

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
		$this->load->view('admin/bukti_daftar', $data);
	}

	public function verifi()
	{
		$idtemp			  = $this->uri->segment(4);
		$id 			  = url_decode($idtemp);
		$data['pendaftar'] = $this->user_model->cariMaba($id);
		$data['transfer'] = $this->admin_model->cekPembayaran($id, "Pendaftaran");

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
		$this->load->view('admin/verifikasi', $data);
	}

	public function perubahan()
	{
		$data['list_perubahan']  = $this->admin_model->listPerubahan();

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

		$this->load->view('admin/perubahan', $data);
	}

	public function kperubahan()
	{
		$idtemp			  = $this->uri->segment(4);
		$id 			  = url_decode($idtemp);
		$data['ubah']  			= $this->admin_model->getPerubahanById($id);

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

		$this->load->view('admin/verifikasi_perubahan', $data);
	}

	public function pemberkasan()
	{
		//$data['list_berkas']  	 = $this->admin_model->listBerkas();

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


		$maba					= $this->admin_model->listMaba();
		$no 					= 1;
		$data['hasil']			= "";
		foreach ($maba as $pendaftar) {
			$pil1 = getProdi($pendaftar['pil1']);
			$data['hasil']  .= '<tr>
				  				<td>' . $no . '</td>
                  				<td>' . $pendaftar['nomor'] . '</td>
                  				<td>' . $pendaftar['nama'] . '</td>
                  				<td>' . $pendaftar['jalur'] . '</td>
                  				<td>' . $pil1 . '</td>
                  				<td>';
			$pembayaran		  	= $this->admin_model->getBayar($pendaftar['nomor']);
			foreach ($pembayaran as $bayar) {
				$data['hasil']  .= $bayar['jenis_bukti'] . ': <a href="' . base_url('file/bukti_pendaftaran/') . $bayar['bukti_daftar'] . '" target="_blank">' . $bayar['bukti_daftar'] . '</a></br>';
			}
			$data['hasil']  .= ' </td>
            				    <td>';
			$pemberkasan		= $this->admin_model->getBerkas($pendaftar['nomor']);
			foreach ($pemberkasan as $berkas) {
				$data['hasil']  .= 'Kartu Keluarga : <a href="' . base_url('file/kartu_keluarga/') . $berkas['kk'] . '" target="_blank">' . $berkas['kk'] . '</a></br>
            					   KTP :  <a href="' . base_url('file/ktp/') . $berkas['ktp'] . '" target="_blank">' . $berkas['ktp'] . '</a></br>
            					   Ijazah :  <a href="' . base_url('file/ijazah/') . $berkas['ijazah'] . '" target="_blank">' . $berkas['ijazah'] . '</a></br>
            					   Foto :  <a href="' . base_url('file/foto/') . $berkas['foto'] . '" target="_blank">' . $berkas['foto'] . '</a></br>
            					   Surat Rapot :  <a href="' . base_url('file/raport/') . $berkas['surat_rapot'] . '" target="_blank">' . $berkas['surat_rapot'] . '</a></br>
            					   Rapot:  <a href="' . base_url('file/raport/') . $berkas['rapot1'] . '" target="_blank">' . $berkas['rapot1'] . '</a></br>
            					   Surat Prestasi:  <a href="' . base_url('file/akademik/') . $berkas['surat_prestasi'] . '" target="_blank">' . $berkas['surat_prestasi'] . '</a></br>
            					   Piagam :  <a href="' . base_url('file/akademik/') . $berkas['piagam'] . '" target="_blank">' . $berkas['piagam'] . '</a></br>
            					   Tahfidz :  <a href="' . base_url('file/tahfidz/') . $berkas['tahfidz'] . '" target="_blank">' . $berkas['tahfidz'] . '</a></br>
            					   Surat BKKM:  <a href="' . base_url('file/bkkm/') . $berkas['surat_bkkm'] . '" target="_blank">' . $berkas['surat_bkkm'] . '</a></br>
            					   Slip Gaji: <a href="' . base_url('file/bkkm/') . $berkas['gaji'] . '" target="_blank">' . $berkas['gaji'] . '</a></br>
            					   Slip PBB : <a href="' . base_url('file/bkkm/') . $berkas['pbb'] . '" target="_blank">' . $berkas['pbb'] . '</a></br>
            					   Slip Listrik : <a href="' . base_url('file/bkkm/') . $berkas['listrik'] . '" target="_blank">' . $berkas['listrik'] . '</a></br>
            					   Slip Telepon : <a href="' . base_url('file/bkkm/') . $berkas['s_telp'] . '" target="_blank">' . $berkas['s_telp'] . '</a></br>
            					   Slip PDAM: <a href="' . base_url('file/bkkm/') . $berkas['pdam'] . '" target="_blank">' . $berkas['pdam'] . '</a></br>';
			}
			$data['hasil']  .= ' </td>
            				   </tr>';
			$no++;
		}

		$this->load->view('admin/pemberkasan', $data);
	}

	public function rekap()
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

		$jumlah		= "";
		$jreguler = 0;
		$jun = 0;
		$jraport = 0;
		$jtahfid = 0;
		$jprea = 0;
		$jprenoa = 0;
		$jbkkm = 0;
		for ($i = 1; $i <= 24; $i++) {
			$prodi = getProdi($i);
			$reguler = $this->admin_model->countJumlahA($i, "Reguler");
			$un	= $this->admin_model->countJumlahA($i, "Nilai UN");
			$raport	= $this->admin_model->countJumlahA($i, "Raport");
			$tahfid	= $this->admin_model->countJumlahA($i, "Tahfidz");
			$prea	= $this->admin_model->countJumlahA($i, "Prestasi Akademik");
			$prenoa	= $this->admin_model->countJumlahA($i, "Prestasi Non Akademik");
			$bkkm	= $this->admin_model->countJumlahA($i, "BKKM");
			$jjm    = $reguler + $un + $raport + $tahfid + $prea + $prenoa + $bkkm;
			$jumlah .= "<tr>
						 <td>$i</td>
						 <td>$prodi</td>
						 <td>$reguler</td>
						 <td>$un</td>
						 <td>$raport</td>
						 <td>$tahfid</td>
						 <td>$prea</td>
						 <td>$prenoa</td>
						 <td>$bkkm</td>
						 <td>$jjm</td>
						</tr>";
			$jreguler += $reguler;
			$jun += $un;
			$jraport += $raport;
			$jtahfid += $tahfid;
			$jprea += $prea;
			$jprenoa += $prenoa;
			$jbkkm += $bkkm;
		}
		$jmltotal = $jreguler + $jun + $jraport + $jtahfid + $jprea + $jprenoa + $jbkkm;
		$jumlah .= "<tr>
					 <td></td>
					 <td>Jumlah Total</td>
					 <td>$jreguler</td>
					 <td>$jun</td>
					 <td>$jraport</td>
					 <td>$jtahfid</td>
					 <td>$jprea</td>
					 <td>$jprenoa</td>
					 <td>$jbkkm</td>
					 <td>$jmltotal</td>
					</tr>";
		$data['jumlah'] = $jumlah;

		$jumlahc		= "";
		$jregulerc = 0;
		$junc = 0;
		$jraportc = 0;
		$jtahfidc = 0;
		$jpreac = 0;
		$jprenoac = 0;
		$jbkkmc = 0;
		for ($k = 1; $k <= 24; $k++) {
			$prodic = getProdi($k);
			$regulerc = $this->admin_model->countJumlahC($k, "Reguler", "1");
			$unc	= $this->admin_model->countJumlahC($k, "Nilai UN", "1");
			$raportc	= $this->admin_model->countJumlahC($k, "Raport", "1");
			$tahfidc	= $this->admin_model->countJumlahC($k, "Tahfidz", "1");
			$preac	= $this->admin_model->countJumlahC($k, "Prestasi Akademik", "1");
			$prenoac	= $this->admin_model->countJumlahC($k, "Prestasi Non Akademik", "1");
			$bkkmc	= $this->admin_model->countJumlahC($k, "BKKM", "1");
			$jjmc    = $regulerc + $unc + $raportc + $tahfidc + $preac + $prenoac + $bkkmc;
			$jumlahc .= "<tr>
						 <td>$k</td>
						 <td>$prodic</td>
						 <td>$regulerc</td>
						 <td>$unc</td>
						 <td>$raportc</td>
						 <td>$tahfidc</td>
						 <td>$preac</td>
						 <td>$prenoac</td>
						 <td>$bkkmc</td>
						 <td>$jjmc</td>
						</tr>";
			$jregulerc += $regulerc;
			$junc += $unc;
			$jraportc += $raportc;
			$jtahfidc += $tahfidc;
			$jpreac += $preac;
			$jprenoac += $prenoac;
			$jbkkmc += $bkkmc;
		}
		$jmltotalc = $jregulerc + $junc + $jraportc + $jtahfidc + $jpreac + $jprenoac + $jbkkmc;
		$jumlahc .= "<tr>
					 <td></td>
					 <td>Jumlah Total</td>
					 <td>$jregulerc</td>
					 <td>$junc</td>
					 <td>$jraportc</td>
					 <td>$jtahfidc</td>
					 <td>$jpreac</td>
					 <td>$jprenoac</td>
					 <td>$jbkkmc</td>
					 <td>$jmltotalc</td>
					</tr>";
		$data['jumlahgelombang1'] = $jumlahc;

		$jumlahd		= "";
		$jregulerd = 0;
		$jund = 0;
		$jraportd = 0;
		$jtahfidd = 0;
		$jpread = 0;
		$jprenoad = 0;
		$jbkkmd = 0;
		for ($k = 1; $k <= 24; $k++) {
			$prodid = getProdi($k);
			$regulerd = $this->admin_model->countJumlahC($k, "Reguler", "2");
			$und	= $this->admin_model->countJumlahC($k, "Nilai UN", "2");
			$raportd	= $this->admin_model->countJumlahC($k, "Raport", "2");
			$tahfidd	= $this->admin_model->countJumlahC($k, "Tahfidz", "2");
			$pread	= $this->admin_model->countJumlahC($k, "Prestasi Akademik", "2");
			$prenoad	= $this->admin_model->countJumlahC($k, "Prestasi Non Akademik", "2");
			$bkkmd	= $this->admin_model->countJumlahC($k, "BKKM", "2");
			$jjmd    = $regulerd + $und + $raportd + $tahfidd + $pread + $prenoad + $bkkmd;
			$jumlahd .= "<tr>
						 <td>$k</td>
						 <td>$prodid</td>
						 <td>$regulerd</td>
						 <td>$und</td>
						 <td>$raportd</td>
						 <td>$tahfidd</td>
						 <td>$pread</td>
						 <td>$prenoad</td>
						 <td>$bkkmd</td>
						 <td>$jjmd</td>
						</tr>";
			$jregulerd += $regulerd;
			$jund += $und;
			$jraportd += $raportd;
			$jtahfidd += $tahfidd;
			$jpread += $pread;
			$jprenoad += $prenoad;
			$jbkkmd += $bkkmd;
		}
		$jmltotald = $jregulerd + $jund + $jraportd + $jtahfidd + $jpread + $jprenoad + $jbkkmd;
		$jumlahd .= "<tr>
					 <td></td>
					 <td>Jumlah Total</td>
					 <td>$jregulerd</td>
					 <td>$jund</td>
					 <td>$jraportd</td>
					 <td>$jtahfidd</td>
					 <td>$jpread</td>
					 <td>$jprenoad</td>
					 <td>$jbkkmd</td>
					 <td>$jmltotald</td>
					</tr>";
		$data['jumlahgelombang2'] = $jumlahd;

		$jumlahe	= "";
		$jregulere = 0;
		$june = 0;
		$jraporte = 0;
		$jtahfide = 0;
		$jpreae = 0;
		$jprenoae = 0;
		$jbkkme = 0;
		for ($k = 1; $k <= 24; $k++) {
			$prodie = getProdi($k);
			$regulere = $this->admin_model->countJumlahC($k, "Reguler", "3");
			$une	= $this->admin_model->countJumlahC($k, "Nilai UN", "3");
			$raporte	= $this->admin_model->countJumlahC($k, "Raport", "3");
			$tahfide	= $this->admin_model->countJumlahC($k, "Tahfidz", "3");
			$preae	= $this->admin_model->countJumlahC($k, "Prestasi Akademik", "3");
			$prenoae	= $this->admin_model->countJumlahC($k, "Prestasi Non Akademik", "3");
			$bkkme	= $this->admin_model->countJumlahC($k, "BKKM", "3");
			$jjme    = $regulere + $une + $raporte + $tahfide + $preae + $prenoae + $bkkme;
			$jumlahe .= "<tr>
						 <td>$k</td>
						 <td>$prodie</td>
						 <td>$regulere</td>
						 <td>$une</td>
						 <td>$raporte</td>
						 <td>$tahfide</td>
						 <td>$preae</td>
						 <td>$prenoae</td>
						 <td>$bkkme</td>
						 <td>$jjme</td>
						</tr>";
			$jregulere += $regulere;
			$june += $une;
			$jraporte += $raporte;
			$jtahfide += $tahfide;
			$jpreae += $preae;
			$jprenoae += $prenoae;
			$jbkkme += $bkkme;
		}
		$jmltotale = $jregulere + $june + $jraporte + $jtahfide + $jpreae + $jprenoae + $jbkkme;
		$jumlahe .= "<tr>
					 <td></td>
					 <td>Jumlah Total</td>
					 <td>$jregulere</td>
					 <td>$june</td>
					 <td>$jraporte</td>
					 <td>$jtahfide</td>
					 <td>$jpreae</td>
					 <td>$jprenoae</td>
					 <td>$jbkkme</td>
					 <td>$jmltotale</td>
					</tr>";
		$data['jumlahgelombang3'] = $jumlahe;

		$jumlahf	= "";
		$jregulerf = 0;
		$junf = 0;
		$jraportf = 0;
		$jtahfidf = 0;
		$jpreaf = 0;
		$jprenoaf = 0;
		$jbkkmf = 0;
		for ($k = 1; $k <= 24; $k++) {
			$prodif = getProdi($k);
			$regulerf = $this->admin_model->countJumlahC($k, "Reguler", "4");
			$unf	= $this->admin_model->countJumlahC($k, "Nilai UN", "4");
			$raportf	= $this->admin_model->countJumlahC($k, "Raport", "4");
			$tahfidf	= $this->admin_model->countJumlahC($k, "Tahfidz", "4");
			$preaf	= $this->admin_model->countJumlahC($k, "Prestasi Akademik", "4");
			$prenoaf	= $this->admin_model->countJumlahC($k, "Prestasi Non Akademik", "4");
			$bkkmf	= $this->admin_model->countJumlahC($k, "BKKM", "4");
			$jjmf    = $regulerf + $unf + $raportf + $tahfidf + $preaf + $prenoaf + $bkkmf;
			$jumlahf .= "<tr>
						 <td>$k</td>
						 <td>$prodif</td>
						 <td>$regulerf</td>
						 <td>$unf</td>
						 <td>$raportf</td>
						 <td>$tahfidf</td>
						 <td>$preaf</td>
						 <td>$prenoaf</td>
						 <td>$bkkmf</td>
						 <td>$jjmf</td>
						</tr>";
			$jregulerf += $regulerf;
			$junf += $unf;
			$jraportf += $raportf;
			$jtahfidf += $tahfidf;
			$jpreaf += $preaf;
			$jprenoaf += $prenoaf;
			$jbkkmf += $bkkmf;
		}
		$jmltotalf = $jregulerf + $junf + $jraportf + $jtahfidf + $jpreaf + $jprenoaf + $jbkkmf;
		$jumlahf .= "<tr>
					 <td></td>
					 <td>Jumlah Total</td>
					 <td>$jregulerf</td>
					 <td>$junf</td>
					 <td>$jraportf</td>
					 <td>$jtahfidf</td>
					 <td>$jpreaf</td>
					 <td>$jprenoaf</td>
					 <td>$jbkkmf</td>
					 <td>$jmltotalf</td>
					</tr>";
		$data['jumlahgelombang4'] = $jumlahf;

		$this->load->view('admin/rekap', $data);
	}

	public function password()
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

		$this->load->view('admin/password', $data);
	}

	public function pesan()
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

		$idtemp			  = $this->uri->segment(4);
		$id 			  = url_decode($idtemp);
		$data['ubah']  	  = $this->admin_model->cariMaba('$id');

		$this->load->view('admin/pesan', $data);
	}

	public function modalreset()
	{
		$post = $this->input->post();
		$id   = url_decode($post['idx']);
		$data['maba'] = $this->admin_model->cariMaba($id);
		$this->load->view('admin/_modal/modal_reset', $data);
	}

	public function modalberkas()
	{
		$post = $this->input->post();
		$id   = url_decode($post['idx']);
		$data['maba'] = $this->admin_model->cariMaba($id);
		$this->load->view('admin/_modal/modal_berkas', $data);
	}

	public function berkas()
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

		$data['berkas']	  = $this->admin_model->getBerkasByNomor($id);
		$data['personal'] = $this->admin_model->cariMaba($id);
		$data['cekberkas'] = $this->admin_model->cariPemberkasan($id);

		$this->load->view('admin/berkas', $data);
	}

	public function cetak_berkas()
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
		$data['idx']	  = $idtemp;
		$this->load->view('admin/cetak_berkas', $data);
	}

	public function stat()
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

		$reguler = $this->admin_model->countJumlahB("Reguler");
		$un	    = $this->admin_model->countJumlahB("Nilai UN");
		$raport	= $this->admin_model->countJumlahB("Raport");
		$tahfid	= $this->admin_model->countJumlahB("Tahfidz");
		$prea	= $this->admin_model->countJumlahB("Prestasi Akademik");
		$prenoa	= $this->admin_model->countJumlahB("Prestasi Non Akademik");
		$bkkm	= $this->admin_model->countJumlahB("BKKM");
		$pres 	= $prea + $prenoa;

		$data['jalur'] = "$reguler,$un,$raport,$tahfid,$pres,$bkkm";

		$mhsun  = $this->admin_model->countAsalInfo("Mahasiswa UNHASY");
		$teman  = $this->admin_model->countAsalInfo("Teman");
		$guru  	= $this->admin_model->countAsalInfo("Guru");
		$meca	= $this->admin_model->countAsalInfo("Media Cetak (Brosur/Banner/Spanduk)");
		$meso   = $this->admin_model->countAsalInfo("Media Sosial (Instagram/Facebook)");
		$meel   = $this->admin_model->countAsalInfo("Media Elektronik (Radio/Televisi)");
		$dosen  = $this->admin_model->countAsalInfo("Dosen / Karyawan UNHASY");
		$alumni = $this->admin_model->countAsalInfo("Alumni");
		$web    = $this->admin_model->countAsalInfo("Website UNHASY");
		$pamer  = $this->admin_model->countAsalInfo("Pameran/Sosialisai Sekolah");

		$data['asalinfo'] = "$pamer,$meso,$meel,$meca,$web,$teman,$mhsun,$alumni,$guru,$dosen";

		$januari	= $this->admin_model->cariJumlahByBulan("01");
		$februari	= $this->admin_model->cariJumlahByBulan("02");
		$maret 		= $this->admin_model->cariJumlahByBulan("03");
		$april		= $this->admin_model->cariJumlahByBulan("04");
		$mei 		= $this->admin_model->cariJumlahByBulan("05");
		$juni 		= $this->admin_model->cariJumlahByBulan("06");
		$juli 		= $this->admin_model->cariJumlahByBulan("07");
		$agustus	= $this->admin_model->cariJumlahByBulan("08");
		$september	= $this->admin_model->cariJumlahByBulan("09");
		$oktober	= $this->admin_model->cariJumlahByBulan("10");
		$november	= $this->admin_model->cariJumlahByBulan("11");
		$desember	= $this->admin_model->cariJumlahByBulan("12");

		$data['jumlahbulan'] = "$januari,$februari,$maret,$april,$mei,$juni,$juli,$agustus,$september,$oktober,$november,$desember";

		$dtapro1 = "";
		$dtapro2 = "";
		for ($i = 1; $i <= 24; $i++) {
			$jmlprodi1 = $this->admin_model->countProdi1($i);
			$dtapro1 .= "$jmlprodi1,";
		}

		for ($k = 1; $k <= 24; $k++) {
			$jmlprodi2 = $this->admin_model->countProdi2($k);
			$dtapro2 .= "$jmlprodi2,";
		}

		$data['jumlahpil1'] = $dtapro1;
		$data['jumlahpil2'] = $dtapro2;

		$offline			= $this->admin_model->countStatusPendaftar(1);
		$online				= $this->admin_model->countStatusPendaftar(2);

		$data['onof']		= "$offline,$online";

		$this->load->view('admin/statistik', $data);
	}

	public function uploadberkas()
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

		$data['berkas']	  = $this->admin_model->getBerkasByNomor($id);
		$data['personal'] = $this->admin_model->cariMaba($id);
		$this->load->view('admin/uploadberkas', $data);
	}

	public function report()
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

		$this->load->view('admin/report', $data);
	}

	public function du()
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

		$data['pendaftar']		 = $this->admin_model->cariMaba($id);
		$data['berkas']	  		 = $this->admin_model->getBerkasByNomor($id);

		if ($data['pendaftar']['daftar_ulang'] != 3) {
			redirect(base_url('webmin/admin/daftarls/'));
		}

		$this->load->view('admin/verdu', $data);
	}

	public function cetak_du()
	{
		$idtemp			  = $this->uri->segment(4);
		$id 			  = url_decode($idtemp);

		$data['pendaftar']		 = $this->admin_model->cariMaba($id);
		$data['berkas']	  		 = $this->admin_model->getBerkasByNomor($id);
		$data['biaya']			 = $this->admin_model->getBiayaByNomor($id);

		$this->load->view('admin/cetak_du', $data);
	}

	public function cetak_berkas_du()
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

		$data['pendaftar']		 = $this->admin_model->cariMaba($id);

		if ($data['pendaftar']['daftar_ulang'] != 4) {
			redirect(base_url('webmin/admin/daftarls/'));
		}

		$this->load->view('admin/cetak_berkas_du', $data);
	}

	public function cetak_penerimaan_berkas()
	{
		$idtemp			  = $this->uri->segment(4);
		$id 			  = url_decode($idtemp);

		$data['pendaftar'] = $this->admin_model->cariMaba($id);
		$data['berkas']	  = $this->admin_model->cariPemberkasan($id);
		$data['user']	  = $this->admin_model->getUser($data['berkas']['id_user']);

		$tanggal 		  = new DateTime($data['berkas']['waktu_input']);
		$data['tanggalindo'] = getTanggalIndo($tanggal->format('Y-m-d'));

		$this->load->view('admin/cetak_pemberkasan', $data);
	}

	public function ubahprodi()
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

		$data['pendaftar']		 = $this->admin_model->cariMaba($id);

		$this->load->view('admin/ubah_prodi', $data);
	}

	public function modalriwayat()
	{
		$post = $this->input->post();
		$id   = url_decode($post['idx']);
		$data['history'] 		 = $this->admin_model->cariHisPerubahan($id);
		$data['pendaftar']		 = $this->admin_model->cariMaba($id);
		$this->load->view('admin/_modal/modal_riwayat_pendaftaran', $data);
	}

	public function modalriwayatls()
	{
		$post = $this->input->post();
		$id   = url_decode($post['idx']);
		$data['history'] 		 = $this->admin_model->cariHisProdi($id);
		$data['pendaftar']		 = $this->admin_model->cariMaba($id);
		$this->load->view('admin/_modal/modal_riwayat_prodi', $data);
	}

	public function rekapls()
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

		$jumlah		= "";
		$jreguler = 0;
		$jun = 0;
		$jraport = 0;
		$jtahfid = 0;
		$jprea = 0;
		$jprenoa = 0;
		$jbkkm = 0;
		for ($i = 1; $i <= 24; $i++) {
			$prodi = getProdi($i);
			$reguler = $this->admin_model->countLSJumlahA($i, "Reguler");
			$un	= $this->admin_model->countLSJumlahA($i, "Nilai UN");
			$raport	= $this->admin_model->countLSJumlahA($i, "Raport");
			$tahfid	= $this->admin_model->countLSJumlahA($i, "Tahfidz");
			$prea	= $this->admin_model->countLSJumlahA($i, "Prestasi Akademik");
			$prenoa	= $this->admin_model->countLSJumlahA($i, "Prestasi Non Akademik");
			$bkkm	= $this->admin_model->countLSJumlahA($i, "BKKM");
			$jjm    = $reguler + $un + $raport + $tahfid + $prea + $prenoa + $bkkm;
			$jumlah .= "<tr>
						 <td>$i</td>
						 <td>$prodi</td>
						 <td>$reguler</td>
						 <td>$un</td>
						 <td>$raport</td>
						 <td>$tahfid</td>
						 <td>$prea</td>
						 <td>$prenoa</td>
						 <td>$bkkm</td>
						 <td>$jjm</td>
						</tr>";
			$jreguler += $reguler;
			$jun += $un;
			$jraport += $raport;
			$jtahfid += $tahfid;
			$jprea += $prea;
			$jprenoa += $prenoa;
			$jbkkm += $bkkm;
		}
		$jmltotal = $jreguler + $jun + $jraport + $jtahfid + $jprea + $jprenoa + $jbkkm;
		$jumlah .= "<tr>
					 <td></td>
					 <td>Jumlah Total</td>
					 <td>$jreguler</td>
					 <td>$jun</td>
					 <td>$jraport</td>
					 <td>$jtahfid</td>
					 <td>$jprea</td>
					 <td>$jprenoa</td>
					 <td>$jbkkm</td>
					 <td>$jmltotal</td>
					</tr>";
		$data['jumlah'] = $jumlah;

		$jumlahc		= "";
		$jregulerc = 0;
		$junc = 0;
		$jraportc = 0;
		$jtahfidc = 0;
		$jpreac = 0;
		$jprenoac = 0;
		$jbkkmc = 0;
		for ($k = 1; $k <= 24; $k++) {
			$prodic = getProdi($k);
			$regulerc = $this->admin_model->countLSJumlahC($k, "Reguler", "1");
			$unc	= $this->admin_model->countLSJumlahC($k, "Nilai UN", "1");
			$raportc	= $this->admin_model->countLSJumlahC($k, "Raport", "1");
			$tahfidc	= $this->admin_model->countLSJumlahC($k, "Tahfidz", "1");
			$preac	= $this->admin_model->countLSJumlahC($k, "Prestasi Akademik", "1");
			$prenoac	= $this->admin_model->countLSJumlahC($k, "Prestasi Non Akademik", "1");
			$bkkmc	= $this->admin_model->countLSJumlahC($k, "BKKM", "1");
			$jjmc    = $regulerc + $unc + $raportc + $tahfidc + $preac + $prenoac + $bkkmc;
			$jumlahc .= "<tr>
						 <td>$k</td>
						 <td>$prodic</td>
						 <td>$regulerc</td>
						 <td>$unc</td>
						 <td>$raportc</td>
						 <td>$tahfidc</td>
						 <td>$preac</td>
						 <td>$prenoac</td>
						 <td>$bkkmc</td>
						 <td>$jjmc</td>
						</tr>";
			$jregulerc += $regulerc;
			$junc += $unc;
			$jraportc += $raportc;
			$jtahfidc += $tahfidc;
			$jpreac += $preac;
			$jprenoac += $prenoac;
			$jbkkmc += $bkkmc;
		}
		$jmltotalc = $jregulerc + $junc + $jraportc + $jtahfidc + $jpreac + $jprenoac + $jbkkmc;
		$jumlahc .= "<tr>
					 <td></td>
					 <td>Jumlah Total</td>
					 <td>$jregulerc</td>
					 <td>$junc</td>
					 <td>$jraportc</td>
					 <td>$jtahfidc</td>
					 <td>$jpreac</td>
					 <td>$jprenoac</td>
					 <td>$jbkkmc</td>
					 <td>$jmltotalc</td>
					</tr>";
		$data['jumlahgelombang1'] = $jumlahc;

		$jumlahd		= "";
		$jregulerd = 0;
		$jund = 0;
		$jraportd = 0;
		$jtahfidd = 0;
		$jpread = 0;
		$jprenoad = 0;
		$jbkkmd = 0;
		for ($k = 1; $k <= 24; $k++) {
			$prodid = getProdi($k);
			$regulerd = $this->admin_model->countLSJumlahC($k, "Reguler", "2");
			$und	= $this->admin_model->countLSJumlahC($k, "Nilai UN", "2");
			$raportd	= $this->admin_model->countLSJumlahC($k, "Raport", "2");
			$tahfidd	= $this->admin_model->countLSJumlahC($k, "Tahfidz", "2");
			$pread	= $this->admin_model->countLSJumlahC($k, "Prestasi Akademik", "2");
			$prenoad	= $this->admin_model->countLSJumlahC($k, "Prestasi Non Akademik", "2");
			$bkkmd	= $this->admin_model->countLSJumlahC($k, "BKKM", "2");
			$jjmd    = $regulerd + $und + $raportd + $tahfidd + $pread + $prenoad + $bkkmd;
			$jumlahd .= "<tr>
						 <td>$k</td>
						 <td>$prodid</td>
						 <td>$regulerd</td>
						 <td>$und</td>
						 <td>$raportd</td>
						 <td>$tahfidd</td>
						 <td>$pread</td>
						 <td>$prenoad</td>
						 <td>$bkkmd</td>
						 <td>$jjmd</td>
						</tr>";
			$jregulerd += $regulerd;
			$jund += $und;
			$jraportd += $raportd;
			$jtahfidd += $tahfidd;
			$jpread += $pread;
			$jprenoad += $prenoad;
			$jbkkmd += $bkkmd;
		}
		$jmltotald = $jregulerd + $jund + $jraportd + $jtahfidd + $jpread + $jprenoad + $jbkkmd;
		$jumlahd .= "<tr>
					 <td></td>
					 <td>Jumlah Total</td>
					 <td>$jregulerd</td>
					 <td>$jund</td>
					 <td>$jraportd</td>
					 <td>$jtahfidd</td>
					 <td>$jpread</td>
					 <td>$jprenoad</td>
					 <td>$jbkkmd</td>
					 <td>$jmltotald</td>
					</tr>";
		$data['jumlahgelombang2'] = $jumlahd;

		$jumlahe	= "";
		$jregulere = 0;
		$june = 0;
		$jraporte = 0;
		$jtahfide = 0;
		$jpreae = 0;
		$jprenoae = 0;
		$jbkkme = 0;
		for ($k = 1; $k <= 24; $k++) {
			$prodie = getProdi($k);
			$regulere = $this->admin_model->countLSJumlahC($k, "Reguler", "3");
			$une	= $this->admin_model->countLSJumlahC($k, "Nilai UN", "3");
			$raporte	= $this->admin_model->countLSJumlahC($k, "Raport", "3");
			$tahfide	= $this->admin_model->countLSJumlahC($k, "Tahfidz", "3");
			$preae	= $this->admin_model->countLSJumlahC($k, "Prestasi Akademik", "3");
			$prenoae	= $this->admin_model->countLSJumlahC($k, "Prestasi Non Akademik", "3");
			$bkkme	= $this->admin_model->countLSJumlahC($k, "BKKM", "3");
			$jjme    = $regulere + $une + $raporte + $tahfide + $preae + $prenoae + $bkkme;
			$jumlahe .= "<tr>
						 <td>$k</td>
						 <td>$prodie</td>
						 <td>$regulere</td>
						 <td>$une</td>
						 <td>$raporte</td>
						 <td>$tahfide</td>
						 <td>$preae</td>
						 <td>$prenoae</td>
						 <td>$bkkme</td>
						 <td>$jjme</td>
						</tr>";
			$jregulere += $regulere;
			$june += $une;
			$jraporte += $raporte;
			$jtahfide += $tahfide;
			$jpreae += $preae;
			$jprenoae += $prenoae;
			$jbkkme += $bkkme;
		}
		$jmltotale = $jregulere + $june + $jraporte + $jtahfide + $jpreae + $jprenoae + $jbkkme;
		$jumlahe .= "<tr>
					 <td></td>
					 <td>Jumlah Total</td>
					 <td>$jregulere</td>
					 <td>$june</td>
					 <td>$jraporte</td>
					 <td>$jtahfide</td>
					 <td>$jpreae</td>
					 <td>$jprenoae</td>
					 <td>$jbkkme</td>
					 <td>$jmltotale</td>
					</tr>";
		$data['jumlahgelombang3'] = $jumlahe;

		$jumlahf	= "";
		$jregulerf = 0;
		$junf = 0;
		$jraportf = 0;
		$jtahfidf = 0;
		$jpreaf = 0;
		$jprenoaf = 0;
		$jbkkmf = 0;
		for ($k = 1; $k <= 24; $k++) {
			$prodif = getProdi($k);
			$regulerf = $this->admin_model->countLSJumlahC($k, "Reguler", "4");
			$unf	= $this->admin_model->countLSJumlahC($k, "Nilai UN", "4");
			$raportf	= $this->admin_model->countLSJumlahC($k, "Raport", "4");
			$tahfidf	= $this->admin_model->countLSJumlahC($k, "Tahfidz", "4");
			$preaf	= $this->admin_model->countLSJumlahC($k, "Prestasi Akademik", "4");
			$prenoaf	= $this->admin_model->countLSJumlahC($k, "Prestasi Non Akademik", "4");
			$bkkmf	= $this->admin_model->countLSJumlahC($k, "BKKM", "4");
			$jjmf    = $regulerf + $unf + $raportf + $tahfidf + $preaf + $prenoaf + $bkkmf;
			$jumlahf .= "<tr>
						 <td>$k</td>
						 <td>$prodif</td>
						 <td>$regulerf</td>
						 <td>$unf</td>
						 <td>$raportf</td>
						 <td>$tahfidf</td>
						 <td>$preaf</td>
						 <td>$prenoaf</td>
						 <td>$bkkmf</td>
						 <td>$jjmf</td>
						</tr>";
			$jregulerf += $regulerf;
			$junf += $unf;
			$jraportf += $raportf;
			$jtahfidf += $tahfidf;
			$jpreaf += $preaf;
			$jprenoaf += $prenoaf;
			$jbkkmf += $bkkmf;
		}
		$jmltotalf = $jregulerf + $junf + $jraportf + $jtahfidf + $jpreaf + $jprenoaf + $jbkkmf;
		$jumlahf .= "<tr>
					 <td></td>
					 <td>Jumlah Total</td>
					 <td>$jregulerf</td>
					 <td>$junf</td>
					 <td>$jraportf</td>
					 <td>$jtahfidf</td>
					 <td>$jpreaf</td>
					 <td>$jprenoaf</td>
					 <td>$jbkkmf</td>
					 <td>$jmltotalf</td>
					</tr>";
		$data['jumlahgelombang4'] = $jumlahf;

		$this->load->view('admin/rekapls', $data);
	}

	public function rekapdu()
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

		$hasil		= "";
		$total 		= 0;
		$jumlah 	= 0;

		for ($i = 1; $i <= 24; $i++) {
			$prodi = getProdi($i);
			$jumlah = $this->admin_model->countDU($i);
			$hasil .= "<tr>
						 <td class='text-center'>$i</td>
						 <td>$prodi</td>
						 <td class='text-center'>$jumlah</td>
						</tr>";
			$total += $jumlah;
		}
		$hasil	 .= "<tr>
					 <td colspan='2' class='text-center'>Jumlah Total Daftar Ulang</td>
					 <td class='text-center'>$total</td>
					</tr>";
		$data['jumlah'] = $hasil;

		$this->load->view('admin/rekapdu', $data);
	}

	public function rekapjas()
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

		$hasil		= "";
		$total 		= 0;
		$s 			= 0;
		$m 			= 0;
		$l 			= 0;
		$xl 		= 0;
		$xxl 		= 0;
		$xxxl		= 0;
		$jumlahs 	= 0;
		$jumlahm 	= 0;
		$jumlahl 	= 0;
		$jumlahxl 	= 0;
		$jumlahxxl 	= 0;
		$jumlahxxxl = 0;

		for ($i = 1; $i <= 24; $i++) {
			$jumlah = 0;
			$prodi 	= getProdi($i);
			$s 	   	= $this->admin_model->countJas($i, 'S');
			$m 	   	= $this->admin_model->countJas($i, 'm');
			$l 	   	= $this->admin_model->countJas($i, 'l');
			$xl	   	= $this->admin_model->countJas($i, 'xl');
			$xxl	= $this->admin_model->countJas($i, 'xxl');
			$xxxl	= $this->admin_model->countJas($i, 'xxxl');
			$jumlahs += $s;
			$jumlahm += $m;
			$jumlahl += $l;
			$jumlahxl += $xl;
			$jumlahxxl += $xxl;
			$jumlahxxxl += $xxxl;
			$jumlah += $s + $m + $l + $xl + $xxl + $xxxl;
			$hasil .= "<tr>
						 <td class='text-center'>$i</td>
						 <td>$prodi</td>
						 <td class='text-center'>$s</td>
						 <td class='text-center'>$m</td>
						 <td class='text-center'>$l</td>
						 <td class='text-center'>$xl</td>
						 <td class='text-center'>$xxl</td>
						 <td class='text-center'>$xxxl</td>
						 <td class='text-center'>$jumlah</td>
						</tr>";
			$total += $jumlah;
		}
		$hasil	 .= "<tr>
					 <td colspan='2' class='text-center'>Jumlah Total</td>
					 <td class='text-center'>$jumlahs</td>
					 <td class='text-center'>$jumlahm</td>
					 <td class='text-center'>$jumlahl</td>
					 <td class='text-center'>$jumlahxl</td>
					 <td class='text-center'>$jumlahxxl</td>
					 <td class='text-center'>$jumlahxxxl</td>
					 <td class='text-center'>$total</td>
					</tr>";
		$data['jumlah'] = $hasil;

		$this->load->view('admin/rekapjas', $data);
	}

	public function cetakujas()
	{
		$idtemp			  = $this->uri->segment(4);
		$id 			  = url_decode($idtemp);

		$data['petugas']  = $this->admin_model->cariUser($this->session->userdata('id'));

		$data['pendaftar'] = $this->user_model->cariMaba($id);

		$this->load->view('admin/cetak_ujas', $data);
	}

	public function ubah_jas()
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
		$this->load->view('admin/ubahjas', $data);
	}

	public function reportdu()
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

		$this->load->view('admin/reportdu', $data);
	}
}
