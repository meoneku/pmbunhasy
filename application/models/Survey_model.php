<?php
class Survey_model extends CI_Model{
	public function simpanPertanyaan($data)
	{
		$this->db->insert("tb_survey_pertanyaan",$data);
	}

	public function ubahPertanyaan($id, $data)
	{
		$this->db->update("tb_survey_pertanyaan",$data,array('id_pertanyaan' => $id));
	}

	public function cariPertanyaan($id)
	{
		return $this->db->get_where("tb_survey_pertanyaan",["id_pertanyaan" => $id])->row_array();
	}

	public function listPertanyaan()
	{
		$this->db->select("*");
		$this->db->from("tb_survey_pertanyaan");
		$this->db->order_by("id_pertanyaan", "ASC");
		return $this->db->get()->result_array();
	}

	public function simpanSurvey($data)
	{
		$this->db->insert("tb_survey",$data);
	}

	public function cariSurvey($id)
	{
		return $this->db->get_where("tb_survey",["id_pertanyaan" => $id])->result_array();
	}

	public function hapusPertanyaan($id)
	{
		$this->db->where(array('id_pertanyaan' => $id));
		$this->db->delete('tb_survey_pertanyaan');
	}

	public function listPesan()
	{
		$this->db->select("*");
		$this->db->from("tb_detil_survey");
		$this->db->order_by("id_ds", "DESC");
		return $this->db->get()->result_array();
	}

	public function simpanPesan($data)
	{
		$this->db->insert("tb_detil_survey",$data);
	}

	public function countSurvey($tanya,$jawab)
	{
		return $this->db->get_where("tb_survey",["id_pertanyaan" => $tanya, "jawaban" => $jawab])->num_rows();
	}

	public function countResponden()
	{
		return $this->db->get_where("tb_pendaftaran",["is_survey" => 1])->num_rows();
	}
}
?>