<?php
/**
* @author Thony Hermawan
*/
class Mpengiriman extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function genIdPengiriman()
	{
		$data = array();
		//$this->db->select_max('id_pengiriman', 'new_id');
		$query = $this->db->query('select max(id_pengiriman)+1 as new_id from pengiriman');
		//$query = $this->db->get('pengiriman');
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$data = $row;
			}
		}
		$query->free_result();
		return $data;
	}

	public function getAllPengiriman()
	{
		$data = array();
		//$this->db->select('id_biaya, id_kota_asal, id_kota_tujuan, total_berat, biaya');
		$this->db->from('view_pengiriman');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$data[] = $row;
			}
		}
		$query->free_result();
		return $data;
	}

	public function getPengirimanById($id)
	{
		$data = array();
		$param = array('id_pengiriman' => $id);
		//$this->db->select('id_biaya, id_kota_asal, id_kota_tujuan, total_berat, biaya');
		$query = $this->db->get_where('view_pengiriman', $param, 1);
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$data[] = $row;
			}
		}
		$query->free_result();
		return $data;
	}

	public function getLastPengiriman()
	{
		$data = array();
		$query = $this->db->query('select max(id_pengiriman) as id_pengiriman from pengiriman');
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$data = $row;
			}
		}
		$query->free_result();
		return $data;
	}

	public function getDetilPengiriman($id_pengiriman)
	{
		$data = array();
		$param = array('id_pengiriman' => $id_pengiriman);
		//$this->db->select('id_biaya, id_kota_asal, id_kota_tujuan, total_berat, biaya');
		$query = $this->db->get_where('view_detil_pengiriman_barang', $param, 1);
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$data[] = $row;
			}
		}
		$query->free_result();
		return $data;
	}

	public function sumBerat($id_pengiriman)
	{
		$data = array();
		$this->db->select('id_pengiriman, tot_berat');
		$param = array('id_pengiriman' => $id_pengiriman);
		$query = $this->db->get_where('view_sum_berat_pengiriman', $param, 1);
		if ($query->num_rows() > 0) {
			foreach ($query->result_array as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}

	public function insert($id_pengiriman, $id_biaya, $tgl, $biaya, $nama, $tujuan, $alamat, $berat)
	{
		$data = array(
			'id_pengiriman' => $id_pengiriman,
			'id_biaya' => $id_biaya,
			'tgl_pengiriman' => $tgl,
			'biaya_pengiriman' => $biaya,
			'nama_penerima' => $nama,
			'tujuan_pengiriman' => $tujuan,
			'alamat_penerima' => $alamat,
			'berat_pengiriman' => $berat
			);
		$this->db->insert('pengiriman', $data);
	}

	public function delete($id)
	{
		$data = array('id_pengiriman' => $id);
		$this->db->delete('pengiriman', $data);
	}

	public function update($id, $tgl, $nama, $tujuan, $alamat)
	{
		$data = array(
			'tgl_pengiriman' => $tgl,
			'nama_penerima' => $nama,
			'tujuan_pengiriman' => $tujuan,
			'alamat_penerima' => $alamat
			);
		$this->db->where('id_pengiriman', $id);
		$this->db->update('pengiriman', $data);
	}

	public function insert_detil_pengiriman($id_barang, $id_pengiriman)
	{
		$data = array('id_barang' => $id_barang, 'id_pengiriman' => $id_pengiriman);
		$this->db->insert('detil_pengiriman', $data);
	}
	public function delete_detil_pengiriman($id_barang, $id_pengiriman)
	{
		$data = array('id_barang' => $id_barang, 'id_pengiriman' => $id_pengiriman);
		$this->db->delete('detil_pengiriman', $data);
	}

	public function getHistoryPengiriman($id_cust)
	{
		$data = array();
		$param = array('id_cust' => $id_cust);
		$this->db->select('distinct(id_pengiriman), id_cust, no_resi, tgl_pengiriman, nama_penerima, tujuan_pengiriman');
		$query = $this->db->get_where('view_history_pengiriman', $param);
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$data[] = $row;
			}
		}
		$query->free_result();
		return $data;
	}

	public function detil_pengiriman($id_cust, $id_pengiriman)
	{
		$data = array();
		$param = array('id_cust' => $id_cust, 'id_pengiriman' => $id_pengiriman);
		$this->db->select('distinct(id_pengiriman), id_cust, id_barang, nama_barang, berat_barang');
		$query = $this->db->get_where('view_detil_pengiriman_barang', $param);
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$data[] = $row;
			}
		}
		$query->free_result();
		return $data;
	}

	public function sum_berat($id_pengiriman)
	{
		$data = array();
		$param = array('id_pengiriman' => $id_pengiriman);
		$query = $this->db->query('select * from view_sum_berat_pengiriman where id_pengiriman = '.$id_pengiriman);
		if (count($query) > 0) {
			foreach ($query->result_array() as $row) {
				$data[] = $row;
			}
		}
		$query->free_result();
		return $data;
	}

	public function update_berat_pengiriman($id_pengiriman, $berat_pengiriman)
	{
		$data = array('berat_pengiriman' => $berat_pengiriman);
		$this->db->where('id_pengiriman', $id_pengiriman);
		$this->db->update('pengiriman', $data);
	}

	public function data_surat_pengiriman($id_pengiriman)
	{
		$data = array();
		$query = $this->db->query('select * from view_surat_pengiriman where id_pengiriman = '.$id_pengiriman);
		if (count($query) > 0) {
			foreach ($query->result_array() as $value) {
				$data[] = $value;
			}
		}
		$query->free_result();
		return $data;
	}

	public function detil_barang_surat_pengiriman($id_pengiriman)
	{
		$data = array();
		$query = $this->db->query('select * from view_detil_barang_pengiriman where id_pengiriman = '.$id_pengiriman);
		if (count($query) > 0) {
			foreach ($query->result_array() as $value) {
				$data[] = $value;
			}
		}
		$query->free_result();
		return $data;
	}
}
?>