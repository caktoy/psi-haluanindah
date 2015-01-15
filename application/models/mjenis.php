<?php
/**
* @author Thony Hermawan
*/
class Mjenis extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getAllJenis()
	{
		$data = array();
		$this->db->select('id_jenis_barang, jenis_barang');
		$this->db->from('jenis_barang');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$data[] = $row;
			}
		}
		$query->free_result();
		return $data;
	}
	
	public function getJenisById($id_jenis_barang)
	{
		$data = array();
		$param = array('id_jenis_barang' => $id_jenis_barang);
		$this->db->select('id_jenis_barang, jenis_barang');
		$query = $this->db->get_where('jenis_barang', $param, 1);
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$data[] = $row;
			}
		}
		$query->free_result();
		return $data;
	}

	public function insert($jenis_barang)
	{
		$data = array('jenis_barang' => $jenis_barang);
		$this->db->insert('jenis_barang', $data);
	}

	public function delete($id_jenis_barang)
	{
		$data = array('id_jenis_barang' => $id_jenis_barang);
		$this->db->delete('jenis_barang', $data);
	}

	public function update($id_jenis_barang, $jenis_barang)
	{
		$data = array('jenis_barang' => $jenis_barang);
		$this->db->where('id_jenis_barang', $id_jenis_barang);
		$this->db->update('jenis_barang', $data);
	}
}
?>