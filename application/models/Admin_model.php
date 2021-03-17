<?php
class Admin_model extends CI_Model{

	public function cariFoto($nomor)
	{
		return $this->db->get_where("tb_berkas",["nomor" => $nomor])->row_array();
	}

	public function cariMaba($nomor)
	{
		return $this->db->get_where("tb_pendaftaran",["nomor" => $nomor])->row_array();
	}

	public function listMaba()
	{
		$this->db->select("*");
		$this->db->from("tb_pendaftaran");
		$this->db->order_by("tanggal_daftar", "DESC");
		return $this->db->get()->result_array();
	}

	public function listMabaLS()
	{
		$this->db->select("*");
		$this->db->from("tb_pendaftaran");
		$this->db->where(["lulus_seleksi" => 1]);
		$this->db->order_by("prodi", "ASC");
		return $this->db->get()->result_array();
	}

	public function listMababyJalur($jalur)
	{
		$this->db->select("*");
		$this->db->from("tb_pendaftaran");
		$this->db->where(["jalur" => $jalur]);
		$this->db->order_by("tanggal_daftar", "DESC");
		return $this->db->get()->result_array();
	}

	public function cekPembayaran($nomor, $jenis)
	{
		return $this->db->get_where("tb_bukti_pembayaran",["nomor" => $nomor, "jenis_bukti" => $jenis, "status_bukti" => 1])->row_array();
	}

	public function getPembayaran()
	{
		$this->db->select("*");
		$this->db->from("tb_bukti_pembayaran");
		$this->db->join("tb_pendaftaran", "tb_bukti_pembayaran.nomor = tb_pendaftaran.nomor");
		$this->db->where(["tb_bukti_pembayaran.status_bukti" => 1, "tb_bukti_pembayaran.jenis_bukti" => "Pendaftaran"]);
		$this->db->order_by("tb_bukti_pembayaran.tanggal_upload", "DESC");
		return $this->db->get()->result_array();
	}

	public function countPembayaran()
	{
		return $this->db->get_where("tb_bukti_pembayaran",["status_bukti" => 1, "jenis_bukti" => "Pendaftaran"])->num_rows();
	}

	public function getPerubahan()
	{
		$this->db->select("*");
		$this->db->from("tb_perubahan");
		$this->db->join("tb_pendaftaran", "tb_perubahan.nomor = tb_pendaftaran.nomor");
		$this->db->where(["tb_perubahan.status_perubahan" => 0]);
		$this->db->order_by("tb_perubahan.id_perubahan", "DESC");
		return $this->db->get()->result_array();
	}

	public function countPerubahan()
	{
		return $this->db->get_where("tb_perubahan",["status_perubahan" => 0])->num_rows();
	}

	public function countPendaftar()
	{
		return $this->db->get_where("tb_pendaftaran",["status >" => 0])->num_rows();
	}

	public function countPendaftar0()
	{
		return $this->db->get_where("tb_pendaftaran",["status" => 0])->num_rows();
	}

	public function countPendaftarHR()
	{
		$tgl = date('Y-m-d');
		return $this->db->get_where("tb_pendaftaran",["status >" => 0, "tanggal_verifikasi" => $tgl])->num_rows();
	}

	public function countPendaftarHR0()
	{
		$tgl = date('Y-m-d');
		return $this->db->get_where("tb_pendaftaran",["status" => 0, "tanggal_daftar" => $tgl])->num_rows();
	}

	public function countJumlah($pil1,$stat)
	{
		return $this->db->get_where("tb_pendaftaran",["status" => $stat, "pil1" => $pil1])->num_rows();
	}

	public function countJumlahHarian($pil1,$stat)
	{
		$tgl = date('Y-m-d');
		return $this->db->get_where("tb_pendaftaran",["status" => $stat, "pil1" => $pil1, "tanggal_verifikasi" => $tgl])->num_rows();
	}

	public function listPerubahan()
	{
		$this->db->select("*");
		$this->db->from("tb_perubahan");
		$this->db->join("tb_pendaftaran", "tb_perubahan.nomor = tb_pendaftaran.nomor");
		$this->db->order_by("tb_perubahan.id_perubahan", "DESC");
		return $this->db->get()->result_array();
	}

	public function getPerubahanById($id)
	{
		$this->db->select("*");
		$this->db->from("tb_perubahan");
		$this->db->join("tb_pendaftaran", "tb_perubahan.nomor = tb_pendaftaran.nomor");
		$this->db->where(["tb_perubahan.id_perubahan" => $id]);
		return $this->db->get()->row_array();
	}

	public function ubahAjuan($data, $id)
	{
		$this->db->update("tb_perubahan",$data,array('id_perubahan' => $id));
	}

	public function getBayar($nomor)
	{
		return $this->db->get_where("tb_bukti_pembayaran",["nomor" => $nomor])->result_array();
	}

	public function getBerkas($nomor)
	{
		return $this->db->get_where("tb_berkas",["nomor" => $nomor])->result_array();
	}

	public function getBerkasByNomor($nomor)
	{
		return $this->db->get_where("tb_berkas",["nomor" => $nomor])->row_array();
	}

	public function countJumlahA($pil1,$jalur)
	{
		return $this->db->get_where("tb_pendaftaran",["jalur" => $jalur, "pil1" => $pil1, "status >" => 0])->num_rows();
	}

	public function countJumlahB($jalur)
	{
		return $this->db->get_where("tb_pendaftaran",["jalur" => $jalur, "status >" => 0])->num_rows();
	}

	public function countJumlahC($pil1,$jalur,$gelombang)
	{
		return $this->db->get_where("tb_pendaftaran",["jalur" => $jalur, "pil1" => $pil1, "gelombang" => $gelombang, "status >" => 0])->num_rows();
	}

	public function setPassword($id, $data)
	{
		$this->db->update("tb_user",$data,array('id_user' => $id));
	}

	public function getUser($id)
	{
		return $this->db->get_where("tb_user",["id_user" => $id])->row_array();
	}

	public function getMail($nomor)
	{
		$this->db->select("email");
		$this->db->from("tb_pendaftaran");
		$this->db->where(["nomor" => $nomor]);
		return $this->db->get()->row_array();
	}

	public function simpanKwitansi($data)
	{
		$this->db->insert("tb_ekwitansi",$data);
	}

	public function ubahKwitansi($data, $nomor)
	{
		$this->db->update("tb_ekwitansi",$data,array('nomor' => $nomor));
	}

	public function countAsalInfo($asal)
	{
		return $this->db->get_where("tb_pendaftaran",["asal_informasi" => $asal, "status >" => 0])->num_rows();
	}

	public function cariJumlahByBulan($bulan)
	{
		return $this->db->get_where("tb_pendaftaran",["month(tanggal_daftar)" => $bulan, "status >" => 0])->num_rows();
	}

	public function countProdi1($pil1)
	{
		return $this->db->get_where("tb_pendaftaran",["pil1" => $pil1, "status >" => 0])->num_rows();
	}

	public function countProdi2($pil2)
	{
		return $this->db->get_where("tb_pendaftaran",["pil2" => $pil2, "status >" => 0])->num_rows();
	}

	public function getMabaBy($prodi,$jalur,$gelombang,$way,$berkas,$lulus)
	{
		$this->db->select("*");
		$this->db->from("tb_pendaftaran");
		if ($prodi != 0){
			$this->db->where(["pil1" => $prodi]);
		}
		if ($jalur != "Semua"){
			$this->db->where(["jalur" => $jalur]);
		}
		if ($gelombang != 0){
			$this->db->where(["gelombang" => $gelombang]);
		}
		if ($way != 0){
			$this->db->where(["status" => $way]);
		}
		if ($berkas != 0){
			$this->db->where(["status_berkas" => $berkas]);
		}
		if ($lulus != 0){
			if ($lulus == 2){
				$this->db->where(["lulus_seleksi" => NULL]);
			} else {
				$this->db->where(["lulus_seleksi" => $lulus]);
			}
		}
		$this->db->where(["status !=" => 0]);
		$this->db->order_by("tanggal_daftar", "DESC");
		return $this->db->get()->result_array();
	}

	public function CekStatusBerkas()
	{
		return $this->db->get_where("tb_berkas",["status_berkas" => 0])->num_rows();
	}

	public function getListBerkas()
	{
		$this->db->select("*");
		$this->db->from("tb_berkas");
		$this->db->join("tb_pendaftaran", "tb_berkas.nomor = tb_pendaftaran.nomor");
		$this->db->where(["tb_berkas.status_berkas" => 0]);
		$this->db->order_by("tb_berkas.waktu_berkas", "DESC");
		return $this->db->get()->result_array();
	}

	public function ubahBerkas($data, $id)
	{
		$this->db->update("tb_berkas",$data,array('nomor' => $id));
	}

	public function simpanInfo($data)
	{
		$this->db->insert("tb_info_lulus",$data);
	}

	public function simpanInformasi($data)
	{
		$this->db->insert("tb_informasi",$data);
	}

	public function simpanPengumuman($data)
	{
		$this->db->insert("tb_pengumuman",$data);
	}

	public function listInfo()
	{
		$this->db->select("*");
		$this->db->from("tb_info_lulus");
		$this->db->order_by("waktu", "DESC");
		return $this->db->get()->result_array();
	}

	public function listInformasi()
	{
		$this->db->select("*");
		$this->db->from("tb_informasi");
		$this->db->order_by("waktu", "DESC");
		return $this->db->get()->result_array();
	}

	public function listPengumuman()
	{
		$this->db->select("*");
		$this->db->from("tb_pengumuman");
		$this->db->order_by("waktu_pengumuman", "DESC");
		return $this->db->get()->result_array();
	}

	public function getDaftarUlang()
	{
		$this->db->select("*");
		$this->db->from("tb_bukti_pembayaran");
		$this->db->join("tb_pendaftaran", "tb_bukti_pembayaran.nomor = tb_pendaftaran.nomor");
		$this->db->where(["tb_bukti_pembayaran.status_bukti" => 1, "tb_bukti_pembayaran.jenis_bukti" => "Daftar Ulang"]);
		$this->db->order_by("tb_bukti_pembayaran.tanggal_upload", "DESC");
		return $this->db->get()->result_array();
	}

	public function countDaftarUlang()
	{
		return $this->db->get_where("tb_bukti_pembayaran",["status_bukti" => 1, "jenis_bukti" => "Daftar Ulang"])->num_rows();
	}

	public function getSendMail()
	{
		return $this->db->get_where("tb_mail",["status_kirim" => 0])->row_array();
	}

	public function countSendMail()
	{
		return $this->db->get_where("tb_mail",["status_kirim" => 0])->num_rows();
	}

	public function UpdateSendMail($id,$data)
	{
		$this->db->update("tb_mail",$data,array('id_mail' => $id));
	}

	public function simpanKirimEmail($data)
	{
		$this->db->insert("tb_mail",$data);
	}

	public function listMabaDU()
	{
		$this->db->select("*");
		$this->db->from("tb_pendaftaran");
		$this->db->where(["daftar_ulang" => 4]);
		$this->db->order_by("tanggal_daftar", "DESC");
		return $this->db->get()->result_array();
	}

	public function cariBiaya($nomor)
	{
		return $this->db->get_where("tb_biaya",["nomor" => $nomor])->result_array();
	}

	public function getBiaya($id)
	{
		return $this->db->get_where("tb_biaya",["id_biaya" => $id])->row_array();
	}

	public function getBiayaByNomor($nomor)
	{
		return $this->db->get_where("tb_biaya",["nomor" => $nomor])->row_array();
	}

	public function getBiayaByHash($hash)
	{
		return $this->db->get_where("tb_biaya",["has_key" => $hash])->row_array();
	}

	public function ubahBiaya($id, $data)
	{
		$this->db->update("tb_biaya",$data,array('id_biaya' => $id));
	}

	public function simpanBiaya($data)
	{
		$this->db->insert("tb_biaya",$data);
	}

	public function CountStatusDU()
	{
		return $this->db->get_where("tb_pendaftaran",["daftar_ulang" => 3])->num_rows();
	}

	public function ListStatusDU()
	{
		return $this->db->get_where("tb_pendaftaran",["daftar_ulang" => 3])->result_array();
	}

	public function countAProdi($prodi)
	{
		return $this->db->get_where("tb_pendaftaran",["prodi" => $prodi, "daftar_ulang" => 4])->num_rows();
	}

	public function cariNIMProdi($prodi,$count)
	{
		$this->db->select("nim");
		$this->db->from("tb_pendaftaran");
		$this->db->where(["prodi" => $prodi, "daftar_ulang" => 4]);
		$this->db->order_by("nim", "ASC");
		$this->db->limit(1, $count);
		return $this->db->get()->row_array();
	}

	public function simpanPemberkasan($data)
	{
		$this->db->insert("tb_pemberkasan",$data);
	}

	public function ubahPemberkasan($nomor, $data)
	{
		$this->db->update("tb_pemberkasan",$data,array('nomor' => $nomor));
	}

	public function cariPemberkasan($nomor)
	{
		return $this->db->get_where("tb_pemberkasan",["nomor" => $nomor])->row_array();
	}

	public function simpanUbahProdi($data)
	{
		$this->db->insert("his_ubah_prodi",$data);
	}

	public function cariHisPerubahan($nomor)
	{
		return $this->db->get_where("his_pendaftaran",["nomor" => $nomor])->result_array();
	}

	public function cariHisProdi($nomor)
	{
		return $this->db->get_where("his_ubah_prodi",["nomor" => $nomor])->result_array();
	}

		public function countLSJumlahA($prodi,$jalur)
	{
		return $this->db->get_where("tb_pendaftaran",["jalur" => $jalur, "prodi" => $prodi, "lulus_seleksi" => 1])->num_rows();
	}

	public function countLSJumlahB($jalur)
	{
		return $this->db->get_where("tb_pendaftaran",["jalur" => $jalur, "lulus_seleksi" => 1])->num_rows();
	}

	public function countLSJumlahC($prodi,$jalur,$tahap)
	{
		return $this->db->get_where("tb_pendaftaran",["jalur" => $jalur, "prodi" => $prodi, "tahap" => $tahap, "lulus_seleksi" => 1])->num_rows();
	}

	public function countStatusPendaftar($status)
	{
		return $this->db->get_where("tb_pendaftaran",["status" => $status])->num_rows();
	}

	public function cariUser($id)
	{
		return $this->db->get_where("tb_user",["id_user" => $id])->row_array();
	}

	public function countDU($prodi)
	{
		return $this->db->get_where("tb_pendaftaran",["prodi" => $prodi, "daftar_ulang" => 4])->num_rows();
	}

	public function countJas($prodi,$ukuran)
	{
		return $this->db->get_where("tb_pendaftaran",["prodi" => $prodi, "daftar_ulang" => 4, "ukuran_jas" => $ukuran])->num_rows();
	}

	public function getMabaDU($prodi)
	{
		$this->db->select("*");
		$this->db->from("tb_pendaftaran");
		if ($prodi != 0){
			$this->db->where(["prodi" => $prodi]);
		}
		$this->db->where(["daftar_ulang" => '4']);
		$this->db->order_by("NIM", "ASC");
		return $this->db->get()->result_array();
	}
	
	public function countDUAll()
	{
	    return $this->db->get_where("tb_pendaftaran",["daftar_ulang" => 4])->num_rows();
	}
}
