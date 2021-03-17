<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct(){
        parent::__construct();
        $role = $this->session->userdata('role');
        if($this->session->userdata('inbound') != TRUE){
            redirect(base_url('webmin/login'));
        } elseif($role != "admin" && $role != "petugas" && $role != "keuangan"){
            show_404();
        } else {
        	
        }

        $this->load->helper('kode');
        $this->load->helper('waktu');
        $this->load->model('admin_model');
	}

	public function index()
	{
		$data['vdaftar']	= $this->admin_model->countPendaftar();
		$data['xdaftar']	= $this->admin_model->countPendaftar0();
		$data['cdaftar']	= $this->admin_model->countPendaftarHR();
		$data['sdaftar']	= $this->admin_model->countPendaftarHR0();
		$data['daftardu']   = $this->admin_model->countDUAll();

		$jumlah		= "";
		for ($i=1;$i<=24;$i++) {
			$prodi = getProdi($i);
			$jmloff	= $this->admin_model->countJumlah($i,1);
			$jmlon	= $this->admin_model->countJumlah($i,2);
			$jjm    = $jmloff + $jmlon;
			$jumlah .= "<tr>
						 <td>$i</td>
						 <td>$prodi</td>
						 <td>$jmloff</td>
						 <td>$jmlon</td>
						 <td>$jjm</td>
						</tr>";
		}
		$data['jumlah'] = $jumlah;

		$jumlah		= "";
		for ($i=1;$i<=24;$i++) {
			$prodi = getSingkatanProdi($i);
			$jmloff	= $this->admin_model->countJumlahHarian($i,1);
			$jmlon	= $this->admin_model->countJumlahHarian($i,2);
			$jjm    = $jmloff + $jmlon;
			$jumlah .= "<tr>
						 <td>$prodi</td>
						 <td>$jmloff</td>
						 <td>$jmlon</td>
						 <td>$jjm</td>
						</tr>";
		}
		$data['hrian'] = $jumlah;

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

		$this->load->view('admin/home', $data);
	}
}
