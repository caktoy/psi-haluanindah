<?php
/**
* @author Thony Hermawan
*/
class Mlaporan extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getTahunPengiriman()
	{
		$data = array();
		$query = $this->db->query('select distinct(year(tgl_pengiriman)) as tahun from pengiriman');
		if (count($query) > 0) {
			foreach ($query->result_array() as $value) {
				$data[] = $value;
			}
		}
		$query->free_result();
		return $data;
	}

	public function getBulanPengiriman()
	{
		$data = array();
		$query = $this->db->query('select distinct(month(tgl_pengiriman)) as tahun from pengiriman');
		if (count($query) > 0) {
			foreach ($query->result_array() as $value) {
				$data[] = $value;
			}
		}
		$query->free_result();
		return $data;
	}

	public function get_data_laporan_bulanan($thn, $bln)
	{
		$data = array();
		$param = array('bulan' => $bln, 'tahun' => $thn);
		$query = $this->db->get_where('view_laporan_pengiriman_bulanan', $param);
		if (count($query) > 0) {
			foreach ($query->result_array() as $value) {
				$data[] = $value;
			}
		}
		$query->free_result();
		return $data;
	}

	public function get_data_laporan_tahunan($thn)
	{
		$data = array();
		$param = array('tahun' => $thn);
		$query = $this->db->get_where('view_jumlah_pengiriman', $param);
		if (count($query) > 0) {
			foreach ($query->result_array() as $value) {
				$data[] = $value;
			}
		}
		$query->free_result();
		return $data;
	}

	public function jumlah_pengiriman($thn)
	{
		$data = array();
		$query = $this->db->query('select count(*) as jumlah_pengiriman from pengiriman where year(tgl_pengiriman) = '.$thn);
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