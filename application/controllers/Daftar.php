<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {
	
	public function __construct(){
        parent::__construct();
        $this->load->model('daftar_model');
	}

	public function index()
	{
		$this->load->view('public/daftar');
		//$this->load->view('public/closed');
	}
	
	public function proses()
	{
		$no_pend 	= 0;
		$tgl 		= date('Y-m-d');
		$r_tgl 		= preg_replace ("/[^0-9]/", "", $tgl);
		$h_tgl 		= substr($r_tgl, 2);

		$post 		= $this->input->post();
		$nama		= $post['nama'];
		$mail		= $post['email'];
		$nik		= $post['nik'];
		$tlah		= $post['tlah'];
		$tgl_lahir	= $post['tgl'];
		$alamat		= $post['alamat'];
		$rt 		= $post['rt'];
		$rw 		= $post['rw'];
		$desa		= $post['desa'];
		$kec		= $post['kec'];
		$kab		= $post['kab'];
		$prov		= $post['prov'];
		$hp			= $post['hp'];
		$status		= 0;
		$capca		= $post['capca'];
		$password	= md5($post['pass']);
		$jk			= $post['jk'];

		$sekolah	= $post['sekolah'];
		$alakolah   = $post['alakolah'];

		$jalur		= $post['jalur'];
		$kelas		= $post['kelas'];
		$pil1		= $post['pil1'];
		$pil2		= $post['pil2'];
		$informasi  = $post['info'];

		$gelombang  = $this->daftar_model->getGelombang($tgl);
		$gel 		= $gelombang['gelombang'];
		if ($pil1 == 22 OR $pil1 == 23) {
			$biaya		= $gelombang['biaya2'];
		} else {
			$biaya		= $gelombang['biaya'];
		}

		if ($capca != $this->session->userdata('captcha')) {
			echo "Capcha tidak sama dengan yang dimasukkan";
		} else {
			$cekmail	= $this->daftar_model->caribyEmail($mail);
			if(empty($cekmail)){
				$coba   = $this->daftar_model->caribyTanggal($tgl);
				if ($coba != 0){
					$coba++;
					$p_coba = strlen($coba);
					if ($p_coba == 1){
						$no_pend = $h_tgl."9"."00".$coba;
					} elseif($p_coba == 2){
						$no_pend = $h_tgl."9"."0".$coba;
					} else {
						$no_pend = $h_tgl."9"."".$coba;
					}
				} else {
					$no_pend = $h_tgl."9"."001";
				}

				$data  		= array(
						'nomor'				=> $no_pend,
						'nama'				=> $nama,
						'email'				=> $mail,
						'nik'				=> $nik,
						'tempat_lahir'		=> $tlah,
						'tanggal_lahir'		=> $tgl_lahir,
						'alamat'			=> $alamat,
						'rt'				=> $rt,
						'rw'				=> $rw,
						'desa'				=> $desa,
						'kec'				=> $kec,
						'kab'				=> $kab,
						'prov'				=> $prov,
						'jalur'				=> $jalur,
						'kelas'				=> $kelas,
						'pil1'				=> $pil1,
						'pil2'				=> $pil2,
						'tanggal_daftar'	=> $tgl,
						'hp'				=> $hp,
						'nama_sekolah'		=> $sekolah,
						'alamat_sekolah'	=> $alakolah,
						'status'			=> $status,
						'gender'			=> $jk,
						'asal_informasi'	=> $informasi,
						'gelombang'			=> $gel,
						'biaya'				=> $biaya,
						'password'			=> $password
					);

				$this->daftar_model->simpanDaftar($data);
				echo "Pendaftaran telah berhasil silahkan melakukan <a href=".base_url('login').">Login</a> menggunakan alamat email dan password yang telah anda daftarkan untuk ke tahap selanjutnya.";

				$rupiah= "Rp " . number_format($biaya,2,',','.');
				$pesan = '<p>Assalamualakum Wr. Wb.</p>
						 <p>Terimakasih kepada '.$nama.' telah mendaftar sebagi mahasiswa baru di Universitas Hasyim Asyari Tebuireng Jombang (UNHASY) di Gelombang '.$gel.' Untuk tahap selanjutnya Anda bisa melengkapi data melakukan pembayaran pendaftaran sebesar'.$rupiah.'.</P>
						 <p>Untuk pembayaran Anda dapat melakukan Transfer ke nomor rekening 142-00-2555444-4 (Bank Mandiri) atau 7108073262 (Bank Mandiri Syariah) Dan melakukan Upload/Unggah bukti transfer melalui menu pada halaman Mahasiswa Baru (login web). Atau Anda juga bisa melakukan pembayaran langsung ke kantor sekretatiat PMB di Jl. Irian Jaya 55 Tebuireng Jombang.</p>
						 <p>Untuk berkas persyaratan Anda dapat memberikan ke kantor sekretatiat atau juga melalui halaman Mahasiswa Baru di web pendaftaran. Bila informasi ini kurang jelas Anda menghubungi Kontak Person PMB dengan nomor +62 8213 3555 859 atau +62 8151 9921 992.</p>
						 <p>Terima kasih atas perhatiannya</p>
						 <p>Wassalamualaikum Wr. Wb.</p>';

				$timestamp = date('Y-m-d H:i:s');
				$dpesan = array(
						'id_user'		=> 2,
						'nomor'			=> $no_pend,
						'waktu_pesan'	=> $timestamp,
						'judul_pesan'	=> 'Selamat Datang',
						'isi_pesan'		=> $pesan,
						'status_pesan'	=> 0);

				$this->daftar_model->simpanPesan($dpesan);
				sendMail($mail, $pesan, 'Selamat Datang');
				} else {
				echo "Email Anda Sudah Terdaftar, mohon menggunakan email lain";
			}
		}
	}

	public function cetak()
	{
		$this->load->model('user_model');
		$this->load->helper('rupiah');
		$this->load->helper('waktu');
		$this->load->helper('kode');

		$idtemp			  = $this->uri->segment(3);
		$id 			  = url_decode($idtemp);
		$cari			  = $this->user_model->cariMaba($id);
		if (empty($cari)){
			show_404();
		}
		$cekfoto		  = $this->user_model->cariFoto($id);
		if($cekfoto['foto'] != ""){
			$foto 		  = $cekfoto['foto'];
		} else {
			$foto 		  = "default.png";
		}
		
		$qrcode           = $this->user_model->cariQRCode($id);
		
		if (empty($qrcode)) {
			show_404();
		}
		$rp  = number_format($cari['biaya'],0,',','.');

		$filename = $cari['nomor'].'-'.$cari['nama'].'.pdf';

		$this->load->library('writer');
		$mpdf = new \Mpdf\Mpdf();
		$mpdf->AddPage("P","","","","","10","10","10","10","","","","","","","","","","","","A4");
        $html 	= '
        <style>
    .isi {
        font-size: 12px;
        height: 18px;
    }

    .petunjuk {
        font-size: 12px;
    }
</style>
    <table border=0 width="890" style="border-bottom: 1px solid black; border-style: dashed; padding:10px 10px 30px 10px;" cellspacing="0" cellpadding="0">
        <tr>
			<td width="250">
                <font size="2" style="font-family: inherit"><b style="font-size:14px">UNHASY JOMBANG </b><br/>Jl.Irian Jaya No.55 Tebuireng <br/>Jombang - Jawa Timur - Indonesia <br/> Telepon/Fax: 0321 861 719 / 0321 874 684</font></td>
			<td width="310" align="center" style="font-weight:bold; font-size: 22px">KWITANSI PENDAFTARAN</td>
            <td align="right" width="280"><img src="'.base_url('file/Unhasy-RBW.png').'" width="75"/> &nbsp;</td>
        </tr>
		<tr><td>&nbsp;</td></tr>
        <tr>
            <td>&nbsp;Nomor Pendaftaran</td>
			<td colspan="2">: &nbsp; '.$cari['nomor'].'</td>
        </tr>
		<tr>
            <td>&nbsp;Banyaknya uang</td>
			<td colspan="2">: &nbsp; <i>'.getTerbilang($cari['biaya']).' Rupiah</i></td>
        </tr>
		<tr>
            <td>&nbsp;Sudah diterima dari</td>
			<td colspan="2">: &nbsp; '.$cari['nama'].'</td>
        </tr>
		<tr>
            <td>&nbsp;Untuk pembayaran</td>
			<td colspan="2">: &nbsp; Pendaftaran calon mahasiswa baru Universitas Hasyim Asyari  Gelombang '.$cari['gelombang'].'.</td>
        </tr>
		<tr>
            <td>&nbsp;</td>
			<td colspan="2">&nbsp; </td>
        </tr>
		<tr>
            <td colspan="2" style="font-weight:bold; font-size: 22px;">Jumlah Rp '.$rp.'</td>
			<td align="center">Jombang, '.getTanggalIndo($cari['tanggal_verifikasi']).'</td>
        </tr>
        <tr>
            <td colspan="2"></td>
			<td align="center"><img src="'.base_url('file/qrcode/').$qrcode['qrcode'].'" width="125"/></td>
        </tr>
    </table>
    <p></p>
    <table style="border: 1px solid black; border-style: dashed;">
        <tr>
            <td align="right"><img src="'.base_url('file/Unhasy-RBW.png').'" width="75"/> &nbsp;</td>
            <td>
                <font size="2" style="font-family: inherit"><b style="font-size:14px">UNIVERSITAS HASYIM ASYARI JOMBANG </b><br/>Jl.Irian Jaya No.55 Tebuireng Jombang <br/> Jawa Timur - Indonesia <br/> Telepon/Fax: 0321 861 719 / 0321 874 684</font></td>
        </tr>
        <tr>
            <td colspan="2" style="border-top: 3px solid black;" align="center" height="40">&nbsp;
                <font size="2" style="font-weight: bold">KARTU BUKTI PENDAFTARAN</font></td>
        </tr>
        <tr>
            <td colspan="2">
                <table style="padding-left: 5px; border: 1px solid black; border-style: dotted;" cellpadding="0" cellspacing="0" width="600">
                    <tr class="isi">
                        <td width="120">Nomor Peserta</td>
                        <td>: &nbsp; '.$cari['nomor'].'</td>
                    </tr>
                    <tr class="isi">
                        <td>Nama Peserta</td>
                        <td>: &nbsp; '.$cari['nama'].'</td>
                    </tr>
                    <tr class="isi">
                        <td>Gelombang</td>
                        <td>: &nbsp; '.$cari['gelombang'].'</td>
                    </tr>
					<tr class="isi">
                        <td>Jalur</td>
                        <td>: &nbsp; '.$cari['jalur'].'</td>
                    </tr>
					<tr class="isi">
                        <td>Kelas</td>
                        <td>: &nbsp; '.$cari['kelas'].'</td>
                    </tr>
                </table>
                <table style="padding-left: 5px; margin-top: 5px; border: 1px solid black; border-style: dotted;" cellpadding="0" cellspacing="0" width="600">
                    <tr class="isi">
                        <td>
							<img src="'.base_url('file/foto/').$foto.'" height="140" width="120" title="noavatar" />                        </td>
                        <td valign="top">
                            <table style="padding-left: 10px">
                                <tr class="isi">
                                    <td width="87">No. Identitas</td>
                                    <td width="175">: '.$cari['nik'].'</td>
                                    <td width="8"></td>
                                </tr>
                                <tr class="isi">
                                    <td valign="top">Alamat Email</td>
                                    <td valign="top">: '.$cari['email'].'</td>
                                    <td></td>
                                </tr>
                                <tr class="isi">
                                    <td>Pilihan 1</td>
                                    <td>: '.getProdi($cari['pil1']).'</td>
                                    <td></td>
                                </tr>
                                <tr class="isi">
                                    <td>Pilihan 2</td>
                                    <td>: '.getProdi($cari['pil2']).'</td>
                                    <td></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table style="padding-left: 5px; margin-top: 5px; padding-top: 5px; border: 1px solid black; border-style: dotted;" cellpadding="0" cellspacing="0" width="600">
                    <tr class="isi">
                        <td>
                            <b>PERLENGKAPAN YANG HARUS DIBAWA SAAT UJIAN MASUK</b>
                        </td>
                    </tr>
                    <tr class="petunjuk">
                        <td> 
                            <ul>
                                <li>Kartu bukti pendaftaran ini.</li>
                                <li>Kartu identitas waktu melakukan pendaftaran.</li>
                                <li>Fotocopy Ijasah yang telah dilegalisasi atau tanda lulus asli.</li>
                            </ul>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>'
        ;
        $mpdf->writeHTML($html);
        $mpdf->Output($filename, \Mpdf\Output\Destination::DOWNLOAD);
        //echo $filename;
	}

	public function cetakdu()
	{
		$this->load->model('user_model');
		$this->load->model('admin_model');
		$this->load->helper('waktu');
		$this->load->helper('kode');

		$idtemp			  = $this->uri->segment(3);
		$id 			  = url_decode($idtemp);
		$cari			  = $this->admin_model->getBiayaByHash($id);
		if (empty($cari)){
			show_404();
		}
		$maba 			  = $this->user_model->cariMaba($cari['nomor']);

		$her			= number_format($cari['her'],0,",",".");
		$spp			= number_format($cari['spp'],0,",",".");
		$ujian			= number_format($cari['ujian'],0,",",".");
		$dpp			= number_format($cari['dpp'],0,",",".");
		$posmaru		= number_format($cari['posmaru'],0,",",".");
		$kopertais		= number_format($cari['kopertais'],0,",",".");
		$jumlahtotal 	= $cari['her'] + $cari['spp']+ $cari['ujian'] + $cari['dpp'] + $cari['posmaru'] + $cari['kopertais'];
		$jumlah 		= number_format($jumlahtotal,0,",",".");

		$filename = 'DU-'.$cari['nomor'].'.pdf';

		$tanggal  = new DateTime($cari['tanggal_biaya']);
		$indotgl  = getTanggalIndo($tanggal->format('Y-m-d'));

		$this->load->library('writer');
		$mpdf = new \Mpdf\Mpdf();
		$mpdf->AddPage("P","","","","","10","10","10","10","","","","","","","","","","","","A4");
        $html 	= '
        <table border="0" cellspacing="1" cellspadding="0" width="900">
<tr><td rowspan="2" align="center"><img src="'.base_url('file/Unhasy-RBW.png').'" width="37"></td><td><strong><span style="font-size:18px;">KWITANSI DAFTAR ULANG</span></strong></td></tr>
<tr><td><strong><span style="font-size:18px;">UNIVERSITAS HASYIM ASYARI TEBUIRENG JOMBANG</span></strong></td></tr>
<tr><td colspan="2"><hr></td></tr>
</table>

<table border="0" cellspacing="1" cellpadding="0" width="900">
<tr><td width="150">Nama</td><td width="5">:</td><td width="290">'.$maba['nama'].'</td><td width="300"></td><td width="30">Semester</td><td width="5">:</td><td width="150">1 (Satu)</td></tr>
<tr><td>Nomor</td><td>:</td><td>'.$maba['nomor'].'</td><td></td><td>Kelas</td><td>:</td><td>'.$maba['kelas'].'</td></tr>
<tr><td>Prodi</td><td>:</td><td colspan="5">'.getProdi($maba['prodi']).'</td></tr>
</table><br>

<table border="1" cellspacing="0" cellpadding="1" width="900">
<tr><td align="center"><strong>No</strong></td><td><strong>Jenis Pembayaran</strong></td><td><strong>Jumlah</strong></td><td><strong>Keterangan</strong></td></tr>
<tr><td align="center">1.</td><td>Her Regritasi</td><td>Rp. '.$her.'</td><td>-</td></tr>
<tr><td align="center">2.</td><td>SPP</td><td>Rp. '.$spp.'</td><td>-</td></tr>
<tr><td align="center">3.</td><td>Ujian (UTS Dan UAS)</td><td>Rp. '.$ujian.'</td><td>-</td></tr>
<tr><td align="center">4.</td><td>DPP</td><td>Rp. '.$dpp.'</td><td>-</td></tr>
<tr><td align="center">5.</td><td>Kopertais</td><td>Rp. '.$kopertais.'</td><td>-</td></tr>
<tr><td align="center">6.</td><td>Lain-lain (Posmaru, Jas Almamater, KTM Dan Lainnya)</td><td>Rp. '.$posmaru.'</td><td>-</td></tr>
<tr><td align="center" colspan="2"><strong>TOTAL</strong></td><td colspan="2"><strong>Rp. '.$jumlah.'</strong></td></tr>
</table><br>

<table border="0" cellspacing="1" cellpadding="0" width="900">
<tr><td width="600"><i>'.$cari['bank'].'</i></td><td>Jombang, '.$indotgl .'</td></tr>
<tr><td></td><td><img src="'.base_url('file/qrcode/').$cari['qrcode'].'.png'.'" height="100"></td></tr>
</table>';
        $mpdf->writeHTML($html);
        $mpdf->Output($filename, \Mpdf\Output\Destination::DOWNLOAD);
        //echo $filename;
	}

	public function kdu()
	{
		$this->load->model('user_model');
		$this->load->model('admin_model');
		$this->load->helper('waktu');
		$this->load->helper('kode');

		$idtemp			  = $this->uri->segment(3);
		$id 			  = url_decode($idtemp);
		$cari 			  = $this->user_model->cariMaba($id);
		if (empty($cari)){
			show_404();
		}
		
		if ($cari['daftar_ulang'] != 4){
			show_404();
		}
		$berkas 		  = $this->admin_model->getBerkasByNomor($id);
		$biaya 			  = $this->admin_model->getBiayaByNomor($id);

		$filename = 'KartuDU-'.$cari['nomor'].'.pdf';

		$tanggal  = new DateTime($cari['tanggal_verifikasi_du']);
		$indotgl  = getTanggalIndo($tanggal->format('Y-m-d'));

		$this->load->library('writer');
		$mpdf = new \Mpdf\Mpdf(stream_get_wrappers());
		$mpdf->AddPage("P","","","","","10","10","10","10","","","","","","","","","","","","A4");
        $html 	= '
        <img src="'.base_url('file/kop.png').'" width="900"><br><br>
<table border="0" cellspacing="1" cellspadding="0" width="900">
		<tr><td align="center"><strong><u>KARTU BUKTI DAFTAR ULANG</u></strong></td></tr>
	</table><br>

<table border="0" cellspacing="1" cellpadding="1" width="900">
<tr><td width="150">Nama</td><td width="5">:</td><td width="395">'.$cari['nama'].'</td><td rowspan="6" align="right"><img src="'.base_url('file/qrcode/').$biaya['qrcode'].'.png" height="110"><img src="'.base_url('file/foto/').$berkas['foto'].'" height="110"></td></tr>
<tr><td>NIM</td><td>:</td><td>'.$cari['nim_pdti'].'</td></tr>
<tr><td>Prodi</td><td>:</td><td>'.getFakultas($cari['prodi']).'</td></tr>
<tr><td>Prodi</td><td>:</td><td>'.getProdi($cari['prodi']).'</td></tr>
<tr><td>Kelas</td><td>:</td><td>'.$cari['kelas'].'</td></tr>
<tr><td>Tanggal Verifikasi</td><td>:</td><td>'.$indotgl.'</td></tr>
</table><br><hr><br>

<img src="'.base_url('file/kop.png').'" width="900"><br><br>
	<table border="0" cellspacing="1" cellspadding="0" width="900" style="font-size:24;">
		<tr><td align="center"><strong><u>BLANKO UKURAN JAS AlMAMATER</u></strong></td></tr>
	</table><br>
		<table border="0" cellspacing="1" cellspadding="0" width="900" style="font-size:20;">
			<tr height="30"><td width="200">Nomor Pendaftaran</td><td width="5">:</td><td>'.$cari['nomor'].'</td></tr>
			<tr height="30"><td>Nama</td><td>:</td><td>'. $cari['nama'].'</td></tr>
			<tr height="30"><td>Fakultas</td><td>:</td><td>'.getFakultas($cari['prodi']).'</td></tr>
			<tr height="30"><td>Prodi</td><td>:</td><td>'.getProdi($cari['prodi']).'</td></tr>
			<tr height="30"><td>Ukuran Jas</td><td>:</td><td><strong>'.$cari['ukuran_jas'].'</strong></td></tr>
		</table><br>
		<table border="0" cellspacing="1" cellspadding="0" width="900" style="font-size:20;">
			<tr><td width="600"></td><td width="300">Jombang,'.$indotgl.'</td></tr>
			<tr><td>Pendaftar</td><td rowspan="3"><img src="'.base_url('file/qrcode/').$biaya['qrcode'].'.png" height="130"></td></tr>
			<tr height="130"><td></td></tr>
			<tr><td><u>'. $cari['nama'].'</u></td></tr>
		</table>
        ';
        $mpdf->writeHTML($html);
        $mpdf->Output($filename, \Mpdf\Output\Destination::DOWNLOAD);

        //echo $html;
	}
	
	public function kduv()
	{
		$this->load->model('user_model');
		$this->load->model('admin_model');
		$this->load->helper('waktu');
		$this->load->helper('kode');

		$idtemp			  = $this->uri->segment(3);
		$id 			  = url_decode($idtemp);
		$cari 			  = $this->user_model->cariMaba($id);
		if (empty($cari)){
			show_404();
		}
		
		if ($cari['daftar_ulang'] != 4){
			show_404();
		}
		$berkas 		  = $this->admin_model->getBerkasByNomor($id);
		$biaya 			  = $this->admin_model->getBiayaByNomor($id);

		//$filename = 'KartuDU-'.$cari['nomor'].'.pdf';

		$tanggal  = new DateTime($cari['tanggal_verifikasi_du']);
		$indotgl  = getTanggalIndo($tanggal->format('Y-m-d'));

		//$this->load->library('writer');
		//$mpdf = new \Mpdf\Mpdf();
		//$mpdf->AddPage("P","","","","","10","10","10","10","","","","","","","","","","","","A4");
        $html 	= '
        <img src="'.base_url('file/kop.png').'" width="900"><br><br>
<table border="0" cellspacing="1" cellspadding="0" width="900">
		<tr><td align="center"><strong><u>KARTU BUKTI DAFTAR ULANG</u></strong></td></tr>
	</table><br>

<table border="0" cellspacing="1" cellpadding="1" width="900">
<tr><td width="150">Nama</td><td width="5">:</td><td width="395">'.$cari['nama'].'</td><td rowspan="6" align="right"><img src="'.base_url('file/qrcode/').$biaya['qrcode'].'.png" height="110"><img src="'.base_url('file/foto/').$berkas['foto'].'" height="110"></td></tr>
<tr><td>NIM</td><td>:</td><td>'.$cari['nim_pdti'].'</td></tr>
<tr><td>Prodi</td><td>:</td><td>'.getFakultas($cari['prodi']).'</td></tr>
<tr><td>Prodi</td><td>:</td><td>'.getProdi($cari['prodi']).'</td></tr>
<tr><td>Kelas</td><td>:</td><td>'.$cari['kelas'].'</td></tr>
<tr><td>Tanggal Verifikasi</td><td>:</td><td>'.$indotgl.'</td></tr>
</table><br><hr><br>

<img src="'.base_url('file/kop.png').'" width="900"><br><br>
	<table border="0" cellspacing="1" cellspadding="0" width="900" style="font-size:24;">
		<tr><td align="center"><strong><u>BLANKO UKURAN JAS AlMAMATER</u></strong></td></tr>
	</table><br>
		<table border="0" cellspacing="1" cellspadding="0" width="900" style="font-size:20;">
			<tr height="30"><td width="200">Nomor Pendaftaran</td><td width="5">:</td><td>'.$cari['nomor'].'</td></tr>
			<tr height="30"><td>Nama</td><td>:</td><td>'. $cari['nama'].'</td></tr>
			<tr height="30"><td>Fakultas</td><td>:</td><td>'.getFakultas($cari['prodi']).'</td></tr>
			<tr height="30"><td>Prodi</td><td>:</td><td>'.getProdi($cari['prodi']).'</td></tr>
			<tr height="30"><td>Ukuran Jas</td><td>:</td><td><strong>'.$cari['ukuran_jas'].'</strong></td></tr>
		</table><br>
		<table border="0" cellspacing="1" cellspadding="0" width="900" style="font-size:20;">
			<tr><td width="600"></td><td width="300">Jombang,'.$indotgl.'</td></tr>
			<tr><td>Pendaftar</td><td rowspan="3"><img src="'.base_url('file/qrcode/').$biaya['qrcode'].'.png" height="130"></td></tr>
			<tr height="130"><td></td></tr>
			<tr><td><u>'. $cari['nama'].'</u></td></tr>
		</table>
        ';
        //$mpdf->writeHTML($html);
        //$mpdf->Output($filename, \Mpdf\Output\Destination::DOWNLOAD);

        echo $html;
	}
	
	public function closed()
	{
	    $this->load->view('public/closed');
	}
}
