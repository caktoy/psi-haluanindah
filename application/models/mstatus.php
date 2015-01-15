<?php
/**
* @author Thony Hermawan
*/
class Mstatus extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getAllStatus()
	{
		$data = array();
		$this->db->select('status_pengiriman, keterangan');
		$this->db->from('status_pengiriman');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$data[] = $row;
			}
		}
		$query->free_result();
		return $data;
	}

	public function getStatusById($status)
	{
		$data = array();
		$param = array('status_pengiriman' => $status);
		$this->db->select('status_pengiriman, keterangan');
		$query = $this->db->get_where('status_pengiriman', $param, 1);
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$data[] = $row;
			}
		}
		$query->free_result();
		return $data;
	}

	public function insert($status, $keterangan)
	{
		$data = array('status_pengiriman' => $status, 'keterangan' => $keterangan);
		$this->db->insert('status_pengiriman', $data);
	}

	public function update($status, $keteranga)
	{
		$data = array('status_pengiriman' => $status, 'keterangan' => $keterangan);
		$this->db->where('status_pengiriman', $status);
		$this->db->update('status_pengiriman', $data);
	}

	public function delete($status)
	{
		$data = array('status_pengiriman' => $status);
		$this->db->delete('status_pengiriman', $data);
	}
}
?>