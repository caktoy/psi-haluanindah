<?php 
/**
* 
*/
class Mprovinsi extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getAllProvinsi()
	{
		$data = array();
		//$this->db->select('nama_provinsi');
		//$this->db->from('provinsi');
		$query = $this->db->get('provinsi');
		//$this->db->order_by('nama_provinsi', 'asc');
		if ($query->num_rows() > 0) {
			foreach ($query->result_array as $row) {
				$data[] = $row;
			}
		}
		$query->free_result();
		return $data;
	}

	public function getIdProvinsi($provinsi)
	{
		$data = array();
		$param = array('nama_provinsi' => $provinsi);
		$this->db->select('id_provinsi');
		$query = $this->db->get_where('provinsi', $param, 1);
		if ($query->num_rows() > 0) {
			$data[] = $query->row_array();
		}
		$query->free_result();
		return $data;
	}

	public function addProvinsi($nama_provinsi)
	{
		$data = array('nama_provinsi' => $nama_provinsi);
		$this->db->insert('provinsi', $data);
	}

	public function updateProvinsi($id_provinsi, $nama_provinsi)
	{
		$data = array('nama_provinsi' => $nama_provinsi);
		$this->db->where('id_provinsi', $id_provinsi);
		$this->db->update('provinsi', $data);
	}

	public function removeProvinsi($id_provinsi)
	{
		$this->db->where('id_provinsi', $id_provinsi);
		$this->db->delete('provinsi');
	}
}
?>