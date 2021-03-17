<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {
	
	public function __construct(){
        parent::__construct();
        $role = $this->session->userdata('role');
        if($this->session->userdata('inbound') != TRUE){
            redirect(base_url('webmin/login'));
        } elseif($role != "admin"){
            show_404();
        } else {
        	
        }

        $this->load->helper('kode');
        $this->load->helper('waktu');
        $this->load->model('admin_model');
        $this->load->model('user_model');
	}

	public function index()
	{
		$mahasiswa = $this->admin_model->listMabaDU();

		foreach ($mahasiswa as $data) {
			$filename = 'BuktiDU-'.$data['prodi'].'-'.$data['nim_pdti'].'-'.$data['nama'].'.pdf';
			//echo $filename.'<br>';
			$qr = $this->admin_model->getBiayaByNomor($data['nomor']);
			$foto = $this->user_model->cariFoto($data['nomor']);
			$tanggal = new DateTime($data['tanggal_verifikasi_du']);
			$indotgl = getTanggalIndo($tanggal->format('Y-m-d'));
			$this->load->library('writer');
			$mpdf = new \Mpdf\Mpdf();
			$mpdf->AddPage("P","","","","","10","10","10","10","","","","","","","","","","","","Legal");
	        $html 	= '
    <style>
        body{
            font-family: Segoe UI, Tahoma, Geneva, Verdana, sans-serif;
            font-size: 14px;
        }
    </style>
    <title>Data</title>
</head>
<body>
    <center><img src="'.base_url('file/kop.png').'" width="900"></center>
    <table width="900">
        <tr>
            <td align="center"><h2>BERKAS DAFTAR ULANG</h2></td>
        </tr>
    </table>
    <table width="900" cellpadding="4">
        <tr>
            <td colspan="3" align="center"><strong>Indentitas Diri</strong></td>
        </tr>
        <tr>
            <td width="300"><strong>Nomor Induk Mahasiswa (NIM)</strong></td>
            <td width="5">:</td>
            <td><strong>'.$data['nim_pdti'].'</strong></td>
        </tr>
        <tr>
            <td><strong>Nama Lenkap</strong></td>
            <td>:</td>
            <td><strong>'.$data['nama'].'</strong></td>
        </tr>
        <tr>
            <td><strong>Jenis Kelamin</strong></td>
            <td>:</td>
            <td><strong>'.$data['gender'].'</strong></td>
        </tr>
        <tr>
            <td><strong>Nomor HP</strong></td>
            <td>:</td>
            <td><strong>'.$data['hp'].'</strong></td>
        </tr>
        <tr>
            <td><strong>Email</strong></td>
            <td>:</td>
            <td><strong>'.$data['email'].'</strong></td>
        </tr>
        <tr>
            <td><strong>Nomor Induk Kependudukan (NIK)</strong></td>
            <td>:</td>
            <td><strong>'.$data['nik'].'</strong></td>
        </tr>
        <tr>
            <td><strong>Tempat Tanggal Lahir</strong></td>
            <td>:</td>
            <td><strong>'.$data['tempat_lahir'].', '.getTanggalindo($data['tanggal_lahir']).'</strong></td>
        </tr>
        <tr>
            <td><strong>Alamat</strong></td>
            <td>:</td>
            <td><strong>'.$data['alamat'].' RT '.$data['rt'].' RW '.$data['rw'].' Desa/Kel '.$data['desa'].' Kec. '.$data['kec'].' Kab. '.$data['kab'].' Provinsi '.$data['prov'].'</strong></td>
        </tr>
        <tr>
            <td><strong>Prodi</strong></td>
            <td>:</td>
            <td><strong>'.getProdi($data['prodi']).'</strong></td>
        </tr>
        <tr>
            <td><strong>Kelas</strong></td>
            <td>:</td>
            <td><strong>'.$data['kelas'].'</strong></td>
        </tr>
        <tr>
            <td><strong></strong></td>
            <td></td>
            <td><strong></strong></td>
        </tr>
        <tr>
            <td colspan="3" align="center"><strong>Asal Pendidikan Terakhir</strong></td>
        </tr>
        <tr>
            <td><strong>Asal Pendidikan/Sekolah</strong></td>
            <td>:</td>
            <td><strong>'.getAsalSekolah($data['asal_sekolah']).'</strong></td>
        </tr>
        <tr>
            <td><strong>Jurusan</strong></td>
            <td>:</td>
            <td><strong>'.$data['jurusan'].'</strong></td>
        </tr>
        <tr>
            <td><strong>Status Pendidikan/Sekolah</strong></td>
            <td>:</td>
            <td><strong>'.$data['status_sekolah'].'</strong></td>
        </tr>
        <tr>
            <td><strong>Nama Instansi Pendidikan/Sekolah</strong></td>
            <td>:</td>
            <td><strong>'.$data['nama_sekolah'].'</strong></td>
        </tr>
        <tr>
            <td><strong>Alamat Instansi Pendidikan/Sekolah</strong></td>
            <td>:</td>
            <td><strong>'.$data['alamat_sekolah'].'</strong></td>
        </tr>
        <tr>
            <td><strong>Telepon Instansi Pendidikan/Sekolah</strong></td>
            <td>:</td>
            <td><strong>'.$data['telp_instansi'].'</strong></td>
        </tr>
        <tr>
            <td><strong>NISN</strong></td>
            <td>:</td>
            <td><strong>'.$data['nisn'].'</strong></td>
        </tr>
        <tr>
            <td><strong></strong></td>
            <td></td>
            <td><strong></strong></td>
        </tr>
        <tr>
            <td colspan="3" align="center"><strong>Data Orang Tua/Wali</strong></td>
        </tr>
        <tr>
            <td colspan="3"><strong><u>Data Ayah</u></strong></td>
        </tr>
        <tr>
            <td><strong>Nama Lengkap</strong></td>
            <td>:</td>
            <td><strong>'.$data['nama_ayah'].'</strong></td>
        </tr>
        <tr>
            <td><strong>Nomor Induk Kependudukan (NIK)</strong></td>
            <td>:</td>
            <td><strong>'.$data['nik_ayah'].'</strong></td>
        </tr>
        <tr>
            <td><strong>Tanggal Lahir</strong></td>
            <td>:</td>
            <td><strong>'.getTanggalindo($data['tgl_ayah']).'</strong></td>
        </tr>
        <tr>
            <td><strong>Pendidikan Terakhir</strong></td>
            <td>:</td>
            <td><strong>'.getPendidikanOrtu($data['pendidikan_ayah']).'</strong></td>
        </tr>
        <tr>
            <td><strong>Pekerjaan</strong></td>
            <td>:</td>
            <td><strong>'.getPekerjaan($data['pekerjaan_ayah']).'</strong></td>
        </tr>
        <tr>
            <td><strong>Penghasilan Perbulan</strong></td>
            <td>:</td>
            <td><strong>'.getPenghasilan($data['penghasilan_ayah']).'</strong></td>
        </tr>
        <tr>
            <td colspan="3"><strong><u>Data Ibu</u></strong></td>
        </tr>
        <tr>
            <td><strong>Nama Lengkap</strong></td>
            <td>:</td>
            <td><strong>'.$data['nama_ibu'].'</strong></td>
        </tr>
        <tr>
            <td><strong>Nomor Induk Kependudukan (NIK)</strong></td>
            <td>:</td>
            <td><strong>'.$data['nik_ibu'].'</strong></td>
        </tr>
        <tr>
            <td><strong>Tanggal Lahir</strong></td>
            <td>:</td>
            <td><strong>'.getTanggalindo($data['tgl_ibu']).'</strong></td>
        </tr>
        <tr>
            <td><strong>Pendidikan Terakhir</strong></td>
            <td>:</td>
            <td><strong>'.getPendidikanOrtu($data['pendidikan_ibu']).'</strong></td>
        </tr>
        <tr>
            <td><strong>Pekerjaan</strong></td>
            <td>:</td>
            <td><strong>'.getPekerjaan($data['pekerjaan_ibu']).'</strong></td>
        </tr>
        <tr>
            <td><strong>Penghasilan Perbulan</strong></td>
            <td>:</td>
            <td><strong>'.getPenghasilan($data['penghasilan_ibu']).'</strong></td>
        </tr>
        <tr>
            <td><strong></strong></td>
            <td></td>
            <td><strong></strong></td>
        </tr>
        <tr>
            <td><strong>Nomor HP</strong></td>
            <td>:</td>
            <td><strong>'.$data['telp_ortu'].'</strong></td>
        </tr>
        <tr>
            <td><strong>Alamat Orang Tua/Wali</strong></td>
            <td>:</td>
            <td><strong>'.$data['alamat_ortu'].' RT '.$data['rt_ortu'].' RW '.$data['rw_ortu'].' Desa/Kel '.$data['desa_ortu'].' Kec. '.$data['kec_ortu'].' Kab. '.$data['kab_ortu'].' Provinsi '.$data['prov_ortu'].'</strong></td>
        </tr>
    </table><br>
    <table width="900">
        <tr>
            <td width="300"><img width="160" height="160" src="http://pmbunhasy.ac.id/file/qrcode/'.$qr['qrcode'].'.png"></td>
            <td width="300"><img width="120" height="160" src="http://pmbunhasy.ac.id/file/foto/'.$foto['foto'].'"></td>
            <td width="300">Jombang, '.$indotgl.'<br><br><br><br><br><br><br>'.$data['nama'].'</td>
        </tr>
    </table>
</body>
</html>';
			$mpdf->writeHTML($html);
        	$mpdf->Output('file/berkasan/'.$filename, 'F');
		}
	}
}
