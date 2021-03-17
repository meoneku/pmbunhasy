<?php
require APPPATH.'/third_party/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends CI_Controller {
	
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

		$data['kelulusan']		 = $this->admin_model->listInfo();
		$data['informasi']		 = $this->admin_model->listInformasi();
		$data['pengumuman']		 = $this->admin_model->listPengumuman();

		$this->load->view('admin/listinfo', $data);
	}

	public function pengumuman()
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
		$this->load->view('admin/buatpengumuman', $data);
	}

	public function buatpengumuman()
	{
		$this->load->model('daftar_model');
		$post		= $this->input->post();

		$judul 		= $post['judul'];
		$tahap 		= $post['tahap'];
		$isi 		= $post['isi'];
		$waktu 		= date('Y-m-d H:i:s');

		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
 
		if(isset($_FILES['xls']['name']) && in_array($_FILES['xls']['type'], $file_mimes)) {
 
    		$arr_file = explode('.', $_FILES['xls']['name']);
    		$extension = end($arr_file);
 
    		if('csv' == $extension) {
        		$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
   			} else {
        		$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    		}
 
    		$spreadsheet = $reader->load($_FILES['xls']['tmp_name']);
     
    		$sheetData = $spreadsheet->getActiveSheet()->toArray();
			for($i = 1;$i < count($sheetData);$i++)
			{
        		$nomor 		= $sheetData[$i]['1'];
        		$nama 		= $sheetData[$i]['2'];
        		$prodi 		= $sheetData[$i]['3'];
        		$jalur 		= $sheetData[$i]['4'];
        		$point 		= $sheetData[$i]['5'];
        		$status 	= $sheetData[$i]['6'];
        		$lulus		= '1';
        		$ptahap 	= $tahap;
        		$dataupdate = array('prodi'  => $prodi,
        							'jalur'  => $jalur,
        							'point'  => $point,
        							'info'	 => $status,
        							'tahap'  => $ptahap,
        							'lulus_seleksi' => $lulus);
        		$this->user_model->simpanPerubahan($nomor,$dataupdate);
        		//print_r($dataupdate);
        		$bank 		= $this->user_model->getRekening($prodi);
        		$pesan 	= 'Assalamualaikum Wr. Wb.</br>Kami Informasikan Kepada '.$nama.' Dengan Nomor Pendaftaran '.$nomor.' Kami Ucapkan Selamat Karena Di Nyatakan Lulus Seleksi Tahap '.$ptahap.' Di Program Studi (Prodi) '.getProdi($prodi).' Dengan Jalur '.$jalur.'. Dan Anda Sudah Tidak Di Perkenankan Untuk Melakukan Pindah Prodi Di Karenakan Sudah Di Terima Di Prodi '.getProdi($prodi).'</br>Proses Selanjutnya Anda Dapat Melakukan Pembayaran Daftar Ulang Dengan Jumlah Sesuai Dengan Prodi Di Terima Dengan Mentransfer Ke '.$bank['bank'].' Dengan Nomor Rekening <strong>'.$bank['rekening'].'</strong> Dengan Nomor Referensi Atau Keterangan Mencantumkan Nomor Pendaftaran Dan Meng-upload/Unggah Bukti Transfer Ke Menu Pemberkasan->Bukti Pembayaran->Tab Daftar Ulang. Dan Harap Isi Semua <strong>Data Diri</strong> Melalui Menu Data Diri. Untuk Informasi Lebih Lengkap Dapat Menhubungi Ke Nomor Kontak Person Di +62 8213 3555 859 Atau +62 8151 9921 992.</br>Wassalamualaikum Wr. Wb.';
        		$dpesan = array(
						'id_user'		=> 2,
						'nomor'			=> $nomor,
						'waktu_pesan'	=> $waktu,
						'judul_pesan'	=> 'Informasi Lulus Seleksi',
						'isi_pesan'		=> $pesan,
						'status_pesan'	=> 0);

        		$this->daftar_model->simpanPesan($dpesan);
        		$CariMail = $this->admin_model->getMail($nomor);
        		$mail 	  = $CariMail['email'];
        		if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $mail)){
    				// Return Error - Invalid Email
				} else {
    				// Return Success - Valid Email
    				$data = array('email' 		 => $mail,
								  'status_kirim' => '0');
    				$this->admin_model->simpanKirimEmail($data);
				}
        		//sendMail($mail, $pesan, 'Informasi Lulus Seleksi');
    		}
		}

		$scan 	= $this->UploadScanSK($tahap);

		$info 	= 'Berikut kami informasikan kepada calon mahasiswa Universitas Hasyim Asyari (UNHASY) yang berhasil lulus seleksi tahap '.$tahap.'. dengan mengklik <a href="'.base_url('pengumuman/tahap/').$tahap.'">link ini</a>. Dan untuk yang sudah dinyatakan diterima pada Jurusan/Program Studi (Prodi) sudah tidak dapat melakukan perubaha/perpindahan Jurusan/Prodi.';

		$datai 	= array('tahap'		=> $tahap,
						'judul_info'=> $judul,
						'isi_info'	=> $isi,
						'file_scan' => $scan,
						'waktu'		=> $waktu);
		$datap  = array('judul_pengumuman' => $judul,
						'isi_pengumuman'   => $info,
						'waktu_pengumuman' => $waktu);
		$dataz  = array('judul_informasi'  => $judul,
						'isi_informasi'	   => $info,
						'image'			   => "kelulusan.svg",
						'waktu'			   => $waktu);

		$this->admin_model->simpanInfo($datai);
		$this->admin_model->simpanPengumuman($datap);
		$this->admin_model->simpanInformasi($dataz);

		$this->session->set_flashdata("pesan","$('.swalDefaultSuccess').ready(function() {
      				Toast.fire({
        				icon: 'success',
        				title: 'Pembuatan Pengumuman Lulus Seleksi Telah Selesai Di Buat.'
      				})
    			});");
		redirect(base_url('webmin/informasi/mailsender'));
	}

	public function UploadScanSK($tahap)
	{
		$tahun 							= date('Y');
		$config['upload_path']          = './file/pengumuman/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['file_name']            = "SK-Pengumuman-PMB-".$tahun."-Tahap-".$tahap;
		$config['overwrite']			= true;
		$config['max_size']             = 10240; // 5MB

		$this->load->library('upload');
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('scan')) {
			$result = "0";
		}   else {
			$result = $this->upload->data('file_name');
		}
		return $result;
	}

	public function mailsender()
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

		$data['jumlah'] = $this->admin_model->countSendMail();
		$this->load->view("admin/mailsend",$data);
	}

	public function sentmail()
	{
		$mail 	= $this->admin_model->getSendMail();
		$jumlah = $this->admin_model->countSendMail();

		$maba 	= $this->user_model->cariMabaByEmail($mail['email']);
		$nama 	= $maba['nama'];
		$nomor 	= $maba['nomor'];
		$prodi 	= $maba['prodi'];
		$jalur 	= $maba['jalur'];
		$ptahap	= $maba['tahap'];

		$bank 		= $this->user_model->getRekening($prodi);
        $pesan 	= '<p>Assalamualaikum Wr. Wb.</p>
        	<p>Kami Informasikan Kepada '.$nama.' Dengan Nomor Pendaftaran '.$nomor.' Kami Ucapkan Selamat Karena Di Nyatakan Lulus Seleksi Tahap '.$ptahap.' Di Program Studi (Prodi) '.getProdi($prodi).' Dengan Jalur '.$jalur.'. Dan Anda Sudah Tidak Di Perkenankan Untuk Melakukan Pindah Prodi Di Karenakan Sudah Di Terima Di Prodi '.getProdi($prodi).'</p>
        	<p>Proses Selanjutnya Anda Dapat Melakukan Pembayaran Daftar Ulang Dengan Jumlah Sesuai Dengan Prodi Di Terima Dengan Mentransfer Ke '.$bank['bank'].' Dengan Nomor Rekening <strong>'.$bank['rekening'].'</strong> Dengan Nomor Referensi Atau Keterangan Mencantumkan Nomor Pendaftaran Dan Meng-upload/Unggah Bukti Transfer Melalui Laman pmbunhasy.ac.id/login Kemudian Lewat Menu Pemberkasan->Bukti Pembayaran->Tab Daftar Ulang. Dan Harap Isi Semua <strong>Data Diri</strong> Melalui Menu Data Diri. Untuk Informasi Lebih Lengkap Dapat Menhubungi Ke Nomor Kontak Person Di +62 8213 3555 859 Atau +62 8151 9921 992.</p>
        	<p>Pengumuman Lulus Seleksi Dapat Di Lihat Di Link <a href="'.base_url('pengumuman/tahap/').$ptahap.'">'.base_url('pengumuman/tahap/').$ptahap.'</a>.
        	<p>Wassalamualaikum Wr. Wb.</p>';

		if ($jumlah != 0) {
			echo $mail['email'];
			sendMail($mail['email'], $pesan, 'Informasi Hasil Seleksi Calon Mahasiswa UNHASY');
			$data	= array("status_kirim" => "1");
			$this->admin_model->UpdateSendMail($mail['id_mail'],$data);
		} else {
			echo '<button type="button" class="btn btn-block btn-success">Telah Terkirim Semua</button>';
		}
	}

	public function sentmailsisa()
	{
		$jumlah = $this->admin_model->countSendMail();
		echo '<button type="button" class="btn btn-block btn-danger">'.$jumlah.'</button>';
	}

	public function sentmailstatus()
	{
		$jumlah = $this->admin_model->countSendMail();
		if ($jumlah != 0) {
			echo '<button type="button" class="btn btn-block btn-warning">Ongoing</button>';
		} else {
			echo '<button type="button" class="btn btn-block btn-success">Selesai</button>';
		}
	}
}
