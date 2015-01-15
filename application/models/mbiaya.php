<?php
/**
* 
*/
class Mbiaya extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getAllBiaya()
	{
		$data = array();
		$this->db->select('id_biaya, id_kota_asal, id_kota_tujuan, total_berat, biaya');
		$this->db->from('biaya_pengiriman');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$data[] = $row;
			}
		}
		$query->free_result();
		return $data;
	}

	public function getBiayaForView()
	{
		$data = array();
		$this->db->select('id_biaya, nama_kota, total_berat, biaya');
		$this->db->from('biaya_pengiriman');
		$this->db->join('kota', 'biaya_pengiriman.id_kota_tujuan = kota.id_kota');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$data[] = $row;
			}
		}
		$query->free_result();
		return $data;
	}

	public function getBiayaForSearch($id_kota_tujuan)
	{
		$data = array();
		$this->db->select('id_biaya, id_kota_tujuan, nama_kota_tujuan, total_berat, biaya');
		$this->db->from('view_cari_biaya');
		$this->db->where('id_kota_tujuan', $id_kota_tujuan);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$data[] = $row;
			}
		}
		$query->free_result();
		return $data;
	}

	public function getBiayaById($id_biaya)
	{
		$data = array();
		$param = array('id_biaya' => $id_biaya);
		$this->db->select('id_biaya, id_kota_asal, id_kota_tujuan, total_berat, biaya');
		$query = $this->db->get_where('biaya_pengiriman', $param, 1);
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$data[] = $row;
			}
		}
		$query->free_result();
		return $data;
	}

	public function getIdBiaya($asal, $tujuan)
	{
		$data = array();
		$param = array('id_kota_asal' => $asal, 'id_kota_tujuan' => $tujuan);
		$this->db->select('id_biaya, id_kota_asal, id_kota_tujuan, total_berat, biaya');
		$query = $this->db->get_where('biaya_pengiriman', $param, 1);
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$data[] = $row;
			}
		}
		$query->free_result();
		return $data;
	}

	public function insert($kota_asal, $kota_tujuan, $berat, $biaya)
	{
		$data = array(
			'id_kota_asal' => $kota_asal,
			'id_kota_tujuan' => $kota_tujuan,
			'total_berat' => $berat,
			'biaya' => $biaya
			);
		$this->db->insert('biaya_pengiriman', $data);
	}

	public function delete($id_biaya)
	{
		$data = array('id_biaya' => $id_biaya);
		$this->db->delete('biaya_pengiriman', $data);
	}

	public function update($id_biaya, $kota_asal, $kota_tujuan, $berat, $biaya)
	{
		$data = array(
			'id_kota_asal' => $kota_asal,
			'id_kota_tujuan' => $kota_tujuan,
			'total_berat' => $berat,
			'biaya' => $biaya
			);
		$this->db->where('id_biaya', $id_biaya);
		$this->db->update('biaya_pengiriman', $data);
	}
}
?>