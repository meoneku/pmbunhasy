<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/third_party/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Report extends CI_Controller {
	
	public function __construct(){
        parent::__construct();
        $role = $this->session->userdata('role');
        if($this->session->userdata('inbound') != TRUE){
            redirect(base_url('webmin/login'));
        } elseif($role != "admin" && $role != "petugas" && $role != "keuangan"){
            show_404();
        } else {
        	
        }
        
        $this->load->model('admin_model');
        $this->load->model('user_model');
        $this->load->helper('kode');
        $this->load->helper('waktu');
	}

	public function index()
	{
		show_404();
	}

	public function view()
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

		$post			= $this->input->post();
		$jurusan		= $post['jurusan'];
		$jalur 			= $post['jalur'];
		$gelombang		= $post['gel'];
		$status 		= $post['onoff'];
		$berkas			= $post['berkas'];
		$lulus 			= $post['lulus'];

		$data['maba']	= $this->admin_model->getMabaBy($jurusan,$jalur,$gelombang,$status,$berkas,$lulus);
		$data['link'] 	= '/'.$jurusan.'/'.$jalur.'/'.$gelombang.'/'.$status.'/'.$berkas.'/'.$lulus;

		$this->load->view('admin/report/view', $data);
		//print_r($this->db->last_query());  
	}

	public function viewdu()
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

		$post			= $this->input->post();
		$prodi			= $post['jurusan'];

		$data['maba']	= $this->admin_model->getMabaDU($prodi);
		$data['link'] 	= '/'.$prodi;

		$this->load->view('admin/report/viewdu', $data);
		//print_r($this->db->last_query());  
	}

	public function topdf()
	{
		$jurusan		  = $this->uri->segment(4);
		$jalur			  = $this->uri->segment(5);
		$gelombang		  = $this->uri->segment(6);
		$status			  = $this->uri->segment(7);
		$berkas			  = $this->uri->segment(8);
		$lulus			  = $this->uri->segment(9);

		$maba 		      = $this->admin_model->getMabaDU($jurusan,$jalur,$gelombang,$status,$berkas,$lulus);

		$this->load->library('writer');
		$mpdf = new \Mpdf\Mpdf();
		$mpdf->AddPage("L","","","","","10","10","10","10","","","","","","","","","","","","A4");
        $html 	= '<h4>Rekap Data Calon Mahasiswa UNHASY 2020</h4>
<table border="1" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
			<th>No.</th>
            <th>Pendaftaran</th>
            <th>Nama Lengkap</th>
            <th>Jalur</th>
            <th>Prodi</th>
			<th>No. HP</th>
			<th>Kab. Asal</th>
			<th>Prov. Asal</th>
			<th>Asal Pendidikan</th>
			<th>Nilai/Juz</th>
        </tr>
    </thead>
    <tbody>';
    	$no 			= 1;
    	foreach ($maba as $personal) {
    		$prodi 		= getSingkatanProdi($personal['pil1']);
    $html  .= '
        <tr>
			<td align="center">'.$no.'</td>
			<td align="center">'.$personal['nomor'].'</td>
            <td width="250px">'.$personal['nama'].'</td>
            <td align="center" width="150px">'.$personal['jalur'].'</td>
            <td align="center" width="50px">'.$prodi.'</td>
            <td width="100px">'.$personal['hp'].'</td>
			<td width="100px">'.$personal['kab'].'</td>
			<td width="120px">'.$personal['prov'].'</td>
			<td width="200px">'.$personal['nama_sekolah'].'</td>
			<td align="center">'.$personal['nilai'].'</td>
        </tr>';
        	$no++;
    	}

    $html   .= '
    </tbody>
</table>
        '
        ;
        $mpdf->writeHTML($html);
        $mpdf->Output('Rekap-PMB-2020', \Mpdf\Output\Destination::DOWNLOAD);
        //echo $filename;
	}

	public function toxlsx()
	{
		$jurusan		  = $this->uri->segment(4);
		$jalur			  = $this->uri->segment(5);
		$gelombang		  = $this->uri->segment(6);
		$status			  = $this->uri->segment(7);
		$berkas			  = $this->uri->segment(8);
		$lulus			  = $this->uri->segment(9);

		$maba 		      = $this->admin_model->getMabaBy($jurusan,$jalur,$gelombang,$status,$berkas,$lulus);		

		$spreadsheet	  = new Spreadsheet();
		$sheet 			  = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Rekap Data Calon Mahasiswa Baru UNHASY 2020');
		$sheet->setCellValue('A3', 'No');
		$sheet->setCellValue('B3', 'No Pendaftaran');
		$sheet->setCellValue('C3', 'Nama');
		$sheet->setCellValue('D3', 'Jalur');
		$sheet->setCellValue('E3', 'Prodi');
		$sheet->setCellValue('F3', 'HP');
		$sheet->setCellValue('G3', 'Kabupaten');
		$sheet->setCellValue('H3', 'Provinsi');
		$sheet->setCellValue('I3', 'Asal Pendidikan');
		$sheet->setCellValue('J3', 'Nilai/Juz');
		$sheet->setCellValue('K3', 'KK');
		$sheet->setCellValue('L3', 'KTP');
		$sheet->setCellValue('M3', 'Ijazah');
		$sheet->setCellValue('N3', 'Keterangan');

		$i 				  = 4;
		$no 			  = 1;

		foreach ($maba as $p)
		{
			$berkas 	  = $this->user_model->cekBerkas($p['nomor']);
			if (empty($berkas)){
				$kk 	  = '-';
				$ktp 	  = '-';
				$ijazah	  = '-';
			} else {
				if ($berkas['kk'] == NULL) {
					$kk  	  = '-';
				} else {
					$kk 	  = 'v';
				}
				if ($berkas['ktp'] == NULL) {
					$ktp  	  = '-';
				} else {
					$ktp 	  = 'v';
				}
				if ($berkas['ijazah'] == NULL) {
					$ijazah   = '-';
				} else {
					$ijazah   = 'v';
				}
			}
			
			$sheet->setCellValue('A'.$i, $no);
			$sheet->setCellValue('B'.$i, $p['nomor']);
			$sheet->setCellValue('C'.$i, $p['nama']);
			$sheet->setCellValue('D'.$i, $p['jalur']);
			$sheet->setCellValue('E'.$i, getProdi($p['pil1']));
			$sheet->setCellValue('F'.$i, $p['hp']);
			$sheet->setCellValue('G'.$i, $p['kab']);
			$sheet->setCellValue('H'.$i, $p['prov']);
			$sheet->setCellValue('I'.$i, $p['nama_sekolah']);
			$sheet->setCellValue('J'.$i, $p['nilai']);
			$sheet->setCellValue('k'.$i, $kk);
			$sheet->setCellValue('l'.$i, $ktp);
			$sheet->setCellValue('m'.$i, $ijazah);
			$sheet->setCellValue('n'.$i, $p['keterangan_pendaftaran']);
			$no++;
			$i++;
		}

		$styleArray = [
			'borders' => [
				'allBorders' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
				],
			],
		];
		
		$i = $i - 1;
		$sheet->getStyle('A3:N'.$i)->applyFromArray($styleArray);
 
		$writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
	  	header('Content-Disposition: attachment;filename="Rekap-PMB-2020.xlsx"');
	  	header('Cache-Control: max-age=0');

	  	$writer->save('php://output');
	}

	public function duxlsx()
	{
		$jurusan		  = $this->uri->segment(4);


		$maba 		      = $this->admin_model->getMabaDU($jurusan);		

		$spreadsheet	  = new Spreadsheet();
		$sheet 			  = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Rekap Data Mahasiswa Baru UNHASY 2020');
		$sheet->setCellValue('A3', 'No');
		$sheet->setCellValue('B3', 'NIM');
		$sheet->setCellValue('C3', 'Nama');
		$sheet->setCellValue('D3', 'Jenis Kelamin');
		$sheet->setCellValue('E3', 'No. HP');
		$sheet->setCellValue('F3', 'NIK');
		$sheet->setCellValue('G3', 'Prodi');
		$sheet->setCellValue('H3', 'Kelas');
		$sheet->setCellValue('I3', 'Tempat, Tanggal Lahir');
		$sheet->setCellValue('J3', 'Alamat');
		$sheet->setCellValue('K3', 'Asal Instansi Pendidikan');
		$sheet->setCellValue('L3', 'Jurusan');
		$sheet->setCellValue('M3', 'Status Instansi');
		$sheet->setCellValue('N3', 'Nama Instansi Pendidikan');
		$sheet->setCellValue('O3', 'Alamat Instansi Pendidikan');
		$sheet->setCellValue('P3', 'Telp Instansi');
		$sheet->setCellValue('Q3', 'NISN');
		$sheet->setCellValue('R3', 'Nama Ayah');
		$sheet->setCellValue('S3', 'NIK Ayah');
		$sheet->setCellValue('T3', 'Tanggal Lahir Ayah');
		$sheet->setCellValue('U3', 'Pendidikan Ayah');
		$sheet->setCellValue('V3', 'Pekerjaan Ayah');
		$sheet->setCellValue('W3', 'Penghasilan Ayah');
		$sheet->setCellValue('X3', 'Nama Ibu');
		$sheet->setCellValue('Y3', 'NIK Ibu');
		$sheet->setCellValue('Z3', 'Tanggal Lahir Ibu');
		$sheet->setCellValue('AA3', 'Pendidikan Ibu');
		$sheet->setCellValue('AB3', 'Pekerjaan Ibu');
		$sheet->setCellValue('AC3', 'Penghasilan Ibu');
		$sheet->setCellValue('AD3', 'No Kontak Ortu');
		$sheet->setCellValue('AE3', 'Alamat Ortu');

		$i 				  = 4;
		$no 			  = 1;

		foreach ($maba as $p)
		{
			$sheet->setCellValue('A'.$i, $no);
			$sheet->setCellValue('B'.$i, $p['nim_pdti']);
			$sheet->setCellValue('C'.$i, $p['nama']);
			$sheet->setCellValue('D'.$i, $p['gender']);
			$sheet->setCellValue('E'.$i, $p['hp']);
			//$sheet->setCellValue('F'.$i, $p['nik']);
			$sheet->setCellValueExplicit('F'.$i,$p['nik'],\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
			$sheet->setCellValue('G'.$i, getProdi($p['prodi']));
			$sheet->setCellValue('H'.$i, $p['kelas']);
			$sheet->setCellValue('I'.$i, $p['tempat_lahir'].', '.getTanggalIndo($p['tanggal_lahir']));
			$sheet->setCellValue('J'.$i, $p['alamat'].' RT '.$p['rt'].' RW '.$p['rw'].' Desa/Kel '.$p['desa'].' Kec. '.$p['kec'].' Kab. '.$p['kab'].' Prov. '.$p['prov']);
			$sheet->setCellValue('K'.$i, getAsalSekolah($p['asal_sekolah']));
			$sheet->setCellValue('L'.$i, $p['jurusan']);
			$sheet->setCellValue('M'.$i, $p['status_sekolah']);
			$sheet->setCellValue('N'.$i, $p['nama_sekolah']);
			$sheet->setCellValue('O'.$i, $p['alamat_sekolah']);
			//$sheet->setCellValue('P'.$i, $p['telp_instansi']);
			$sheet->setCellValueExplicit('P'.$i,$p['telp_instansi'],\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
			//$sheet->setCellValue('Q'.$i, $p['nisn']);
			$sheet->setCellValueExplicit('Q'.$i,$p['nisn'],\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
			$sheet->setCellValue('R'.$i, $p['nama_ayah']);
			//$sheet->setCellValue('S'.$i, $p['nik_ayah']);
			$sheet->setCellValueExplicit('S'.$i,$p['nik_ayah'],\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
			$sheet->setCellValue('T'.$i, getTanggalIndo($p['tgl_ayah']));
			$sheet->setCellValue('U'.$i, getPendidikanOrtu($p['pendidikan_ayah']));
			$sheet->setCellValue('V'.$i, getPekerjaan($p['pekerjaan_ayah']));
			$sheet->setCellValue('W'.$i, getPenghasilan($p['penghasilan_ayah']));
			$sheet->setCellValue('X'.$i, $p['nama_ibu']);
			//$sheet->setCellValue('Y'.$i, $p['nik_ibu']);
			$sheet->setCellValueExplicit('Y'.$i,$p['nik_ibu'],\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
			$sheet->setCellValue('Z'.$i, getTanggalIndo($p['tgl_ibu']));
			$sheet->setCellValue('AA'.$i, getPendidikanOrtu($p['pendidikan_ibu']));
			$sheet->setCellValue('AB'.$i, getPekerjaan($p['pekerjaan_ibu']));
			$sheet->setCellValue('AC'.$i, getPenghasilan($p['penghasilan_ibu']));
			$sheet->setCellValue('AD'.$i, $p['telp_ortu']);
			$sheet->setCellValue('AE'.$i, $p['alamat_ortu'].' RT '.$p['rt_ortu'].' RW '.$p['rw_ortu'].' Desa/Kel '.$p['desa_ortu'].' Kec. '.$p['kec_ortu'].' Kab. '.$p['kab_ortu'].' Prov. '.$p['prov_ortu']);
			$no++;
			$i++;
		}

		$styleArray = [
			'borders' => [
				'allBorders' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
				],
			],
		];
		
		$i = $i - 1;
		$sheet->getStyle('A3:AE'.$i)->applyFromArray($styleArray);
 
		$writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
	  	header('Content-Disposition: attachment;filename="Rekap-DU-PMB-2020.xlsx"');
	  	header('Cache-Control: max-age=0');

	  	$writer->save('php://output');
	}
}
