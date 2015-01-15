<?php
/**
* @author Thony Hermawan
*/
class Mtracking extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getAllTracking()
	{
		$data = array();
		$this->db->select('no_resi, id_pengiriman, id_cust, status_pengiriman, tanggal, posisi, keterangan');
		$this->db->from('tracking');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$data[] = $row;
			}
		}
		$query->free_result();
		return $data;
	}

	public function getTrackingForCust($id_cust)
	{
		$data = array();
		$query = $this->db->query('select no_resi, id_pengiriman, id_cust, status_pengiriman, tanggal, posisi, keterangan
			from tracking where id_cust = '.$id_cust.' group by no_resi order by tanggal asc');
		//$this->db->select('no_resi, id_pengiriman, id_cust, status_pengiriman, tanggal, posisi, keterangan');
		//$this->db->from('tracking');
		//$this->db->where('id_cust', $id_cust);
		//$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$data[] = $row;
			}
		}
		$query->free_result();
		return $data;
	}

	public function detil_tracking($no_resi)
	{
		$data = array();
		$query = $this->db->query("select no_resi, id_pengiriman, id_cust, status_pengiriman, tanggal, posisi, keterangan
			from tracking where no_resi = '".$no_resi."' order by tanggal desc");
		//$this->db->select('no_resi, id_pengiriman, id_cust, status_pengiriman, tanggal, posisi, keterangan');
		//$this->db->from('tracking');
		//$this->db->where('no_resi', $no_resi);
		//$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$data[] = $row;
			}
		}
		$query->free_result();
		return $data;
	}

	public function det_tracking($no_resi)
	{
		$data = array();
		$param = array('no_resi' => $no_resi);
		$query = $this->db->get_where('view_det_tracking', $param);
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$data[] = $row;
			}
		}
		$query->free_result();
		return $data;
	}

	public function generate_no_resi()
	{
		$karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$angka = '1234567890';
		$string = '';
		for ($i=0; $i < 4; $i++) { 
			$pos = rand(0, strlen($karakter)-1);
			$string .= $karakter{$pos};
		}
		for ($i=0; $i < 6; $i++) { 
			$pos = rand(0, strlen($angka)-1);
			$string .= $angka{$pos};
		}
		return $string;
	}

	public function insert($no_resi, $id_pengiriman, $id_cust, $status_pengiriman, $tanggal, $posisi, $keterangan)
	{
		$data = array('no_resi' => $no_resi, 
			'id_pengiriman' => $id_pengiriman, 
			'id_cust' => $id_cust, 
			'status_pengiriman' => $status_pengiriman,
			'tanggal' => $tanggal,
			'posisi' => $posisi,
			'keterangan' => $keterangan);
		$this->db->insert('tracking', $data);
	}

	public function getNoResi($id_cust, $id_pengiriman)
	{
		$data = array();
		$param = array('id_cust' => $id_cust, 'id_pengiriman' => $id_pengiriman);
		$this->db->select('no_resi');
		$query = $this->db->get_where('tracking', $param, 1);
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$data[] = $row;
			}
		}
		$query->free_result();
		return $data;
	}

	public function ambil_tracking($num, $offset)
	{
		$query = $this->db->get('view_list_tracking', $num, $offset);
		return $query->result_array();
	}

	public function view_list_tracking()
	{
		$query = $this->db->get('view_list_tracking');
		return $query->result_array();
	}

	public function detil_barang($id_cust, $no_resi)
	{
		$param = array('no_resi' => $no_resi, 'id_cust' => $id_cust);
		$query = $this->db->get_where('view_barang_tracking', $param);
		return $query->result_array();
	}

	public function detil_pengiriman($id_cust, $no_resi)
	{
		$param = array('no_resi' => $no_resi, 'id_cust' => $id_cust);
		$query = $this->db->get_where('view_detil_pengiriman_tracking', $param);
		return $query->result_array();
	}
}
?>