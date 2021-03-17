<?php
class User_model extends CI_Model{

	public function cariFoto($nomor)
	{
		return $this->db->get_where("tb_berkas",["nomor" => $nomor])->row_array();
	}

	public function cariMaba($nomor)
	{
		return $this->db->get_where("tb_pendaftaran",["nomor" => $nomor])->row_array();
	}

	public function simpanPerubahan($nomor, $data)
	{
		$this->db->update("tb_pendaftaran",$data,array('nomor' => $nomor));
	}

	public function cekPembayaran($nomor, $jenis)
	{
		return $this->db->get_where("tb_bukti_pembayaran",["nomor" => $nomor, "jenis_bukti" => $jenis])->row_array();
	}

	public function simpanBukti($data)
	{
		$this->db->insert("tb_bukti_pembayaran",$data);
	}

	public function ubahBukti($data, $id)
	{
		$this->db->update("tb_bukti_pembayaran",$data,array('id_bayar' => $id));
	}

	public function cekBerkas($nomor)
	{
		return $this->db->get_where("tb_berkas",["nomor" => $nomor])->row_array();
	}

	public function simpanBerkas($data)
	{
		$this->db->insert("tb_berkas",$data);
	}

	public function ubahBerkas($data, $id)
	{
		$this->db->update("tb_berkas",$data,array('id_berkas' => $id));
	}

	public function cariUbah($nomor)
	{
		return $this->db->get_where("tb_perubahan",["nomor" => $nomor, "status_perubahan" => 0])->row_array();
	}

	public function simpanUbah($data)
	{
		$this->db->insert("tb_perubahan",$data);
	}

	public function getPesan($nomor)
	{
		$this->db->select("*");
		$this->db->from("tb_pesan");
		$this->db->join("tb_user", "tb_pesan.id_user = tb_user.id_user");
		$this->db->where(["tb_pesan.nomor" => $nomor]);
		$this->db->order_by("tb_pesan.waktu_pesan", "DESC");
		return $this->db->get()->result();
	}

	public function getDetilPesan($id)
	{
		$this->db->select("*");
		$this->db->from("tb_pesan");
		$this->db->join("tb_user", "tb_pesan.id_user = tb_user.id_user");
		$this->db->where(["tb_pesan.id_pesan" => $id]);
		return $this->db->get()->row_array();
	}

	public function cekPesan($nomor)
	{
		return $this->db->get_where("tb_pesan",["nomor" => $nomor, "status_pesan" => 0])->num_rows();
	}

	public function miniPesan($nomor)
	{
		$this->db->select("*");
		$this->db->from("tb_pesan");
		$this->db->join("tb_user", "tb_pesan.id_user = tb_user.id_user");
		$this->db->where(["tb_pesan.nomor" => $nomor, "tb_pesan.status_pesan" => 0]);
		$this->db->order_by("tb_pesan.waktu_pesan", "DESC");
		return $this->db->get()->result();
	}

	public function setPesanDibaca($id)
	{
		$this->db->update("tb_pesan",array('status_pesan' => 1),array('id_pesan' => $id));
	}

	public function setPassword($nomor, $data)
	{
		$this->db->update("tb_pendaftaran",$data,array('nomor' => $nomor));
	}

	public function getPengumuman()
	{
		$this->db->select("*");
		$this->db->from("tb_pengumuman");
		$this->db->order_by("waktu_pengumuman", "DESC");
		$this->db->limit(10);
		return $this->db->get()->result_array();
	}

	public function cariQRCode($nomor)
	{
		$this->db->select("qrcode");
		$this->db->from("tb_ekwitansi");
		$this->db->where(["nomor" => $nomor]);
		return $this->db->get()->row_array();
	}

	public function cariKwitansi($id)
	{
		$this->db->select("*");
		$this->db->from("tb_ekwitansi");
		$this->db->join("tb_pendaftaran", "tb_ekwitansi.nomor = tb_pendaftaran.nomor");
		$this->db->join("tb_user", "tb_ekwitansi.id_user = tb_user.id_user");
		$this->db->where(["tb_ekwitansi.id_kwitansi" => $id]);
		return $this->db->get()->row_array();
	}

	public function getEmail($mail)
	{
		return $this->db->get_where("tb_pendaftaran",["email" => $mail])->row_array();
	}

	public function simpanLupa($data)
	{
		$this->db->insert("tb_lupa_pass",$data);
	}

	public function getLinkLupa($link)
	{
		return $this->db->get_where("tb_lupa_pass",["link" => $link])->row_array();
	}

	public function listLulusSeleksi($tahap)
	{
		$this->db->select("*");
		$this->db->from("tb_pendaftaran");
		$this->db->where(["tahap" => $tahap, "lulus_seleksi" => "1"]);
		$this->db->order_by("prodi", "ASC");
		return $this->db->get()->result_array();
	}

	public function getinfoLulus($tahap)
	{
		return $this->db->get_where("tb_info_lulus",["tahap" => $tahap])->row_array();
	}

	public function getRekening($prodi)
	{
		return $this->db->get_where("ref_rekening",["prodi" => $prodi])->row_array();
	}

	public function cariMabaByEmail($mail)
	{
		return $this->db->get_where("tb_pendaftaran",["email" => $mail])->row_array();
	}

	public function cariDU($id)
	{
		$this->db->select("*");
		$this->db->from("tb_biaya");
		$this->db->join("tb_pendaftaran", "tb_biaya.nomor = tb_pendaftaran.nomor");
		$this->db->join("tb_user", "tb_biaya.id_user = tb_user.id_user");
		$this->db->where(["tb_biaya.has_key" => $id]);
		return $this->db->get()->row_array();
	}
}
?>