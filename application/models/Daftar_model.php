<?php
class Daftar_model extends CI_Model{

	public function caribyTanggal($tanggal)
	{
		return $this->db->get_where("tb_pendaftaran",["tanggal_daftar" => $tanggal])->num_rows();
	}

	public function caribyEmail($mail)
	{
		return $this->db->get_where("tb_pendaftaran",["email" => $mail])->result_array();
	}

	public function simpanDaftar($data)
	{
		$this->db->insert("tb_pendaftaran",$data);
	}

	public function getGelombang($tgl)
	{
		return $this->db->get_where("tb_gelombang",["awal <=" => $tgl, "akhir >=" => $tgl])->row_array();
	}

	public function simpanPesan($data)
	{
		$this->db->insert("tb_pesan",$data);
	}

	public function getInformasi()
	{
		$this->db->select("*");
		$this->db->from("tb_informasi");
		$this->db->order_by("waktu", "DESC");
		$this->db->limit(10);
		return $this->db->get()->result_array();
	}
}
?>