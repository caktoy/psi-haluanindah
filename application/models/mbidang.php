<?php
/**
* 
*/
class Mbidang extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getAllBidang()
	{
		$data = array();
		$this->db->select('id_bidang_kerja, nama_bidang_kerja');
		$this->db->from('bidang_kerja');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$data[] = $row;
			}
		}
		$query->free_result();
		return $data;
	}

	public function getBidangById($id_bidang_kerja)
	{
		$data = array();
		$param = array('id_bidang_kerja' => $id_bidang_kerja);
		$this->db->select('id_bidang_kerja, nama_bidang_kerja');
		$query = $this->db->get_where('bidang_kerja', $param, 1);
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$data[] = $row;
			}
		}
		$query->free_result();
		return $data;
	}

	public function insert($nama_bidang_kerja)
	{
		$data = array('nama_bidang_kerja' => $nama_bidang_kerja);
		$this->db->insert('bidang_kerja', $data);
	}

	public function delete($id_bidang_kerja)
	{
		$data = array('id_bidang_kerja' => $id_bidang_kerja);
		$this->db->delete('bidang_kerja', $data);
	}

	public function update($id_bidang_kerja, $nama_bidang_kerja)
	{
		$data = array('nama_bidang_kerja' => $nama_bidang_kerja);
		$this->db->where('id_bidang_kerja', $id_bidang_kerja);
		$this->db->update('bidang_kerja', $data);
	}
}
?>