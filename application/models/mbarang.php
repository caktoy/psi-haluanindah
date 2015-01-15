<?php
/**
* @author Thony Hermawan
*/
class Mbarang extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getAllBarang()
	{
		$data = array();
		//$this->db->select('id_barang, id_jenis_barang, nama_barang, berat_barang, satuan_barang');
		//$this->db->from('barang');
		$this->db->from('view_barang');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$data[] = $row;
			}
		}
		$query->free_result();
		return $data;
	}

	public function getBarangById($id_barang)
	{
		$data = array();
		$param = array('id_barang' => $id_barang);
		$this->db->select('id_barang, id_jenis_barang, nama_barang, berat_barang, satuan_barang');
		$query = $this->db->get_where('barang', $param, 1);
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$data[] = $row;
			}
		}
		$query->free_result();
		return $data;
	}

	public function getLastBarang()
	{
		$data = array();
		$query = $this->db->query('select max(id_barang) as id_barang from barang');
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$data[] = $row;
			}
		}
		$query->free_result();
		return $data;
	}

	public function insert($id_jenis_barang, $nama_barang, $berat_barang, $satuan_barang)
	{
		$data = array(
			'id_jenis_barang' => $id_jenis_barang,
			'nama_barang' => $nama_barang,
			'berat_barang' => $berat_barang,
			'satuan_barang' => $satuan_barang
			);
		$this->db->insert('barang', $data);
	}

	public function delete($id_barang)
	{
		$data = array('id_barang' => $id_barang);
		$this->db->delete('barang', $data);
	}

	public function update($id_barang, $id_jenis_barang, $nama_barang, $berat_barang, $satuan_barang)
	{
		$data = array(
			'id_jenis_barang' => $id_jenis_barang,
			'nama_barang' => $nama_barang,
			'berat_barang' => $berat_barang,
			'satuan_barang' => $satuan_barang
			);
		$this->db->where('id_barang', $id_barang);
		$this->db->update('barang', $data);
	}

	public function jumlah_barang()
	{
		$data = array();
		$query = $this->db->query('select count(*) as jumlah from barang');
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $value) {
				$data[] = $value;
			}
		}
		$query->free_result();
		return $data;
	}

	public function get_list_barang_for_pengiriman($id)
	{
		$data = array();
		$this->db->select('barang.id_barang, barang.nama_barang, barang.berat_barang');
		$this->db->from('barang');
		$this->db->join('detil_pengiriman', 'barang.id_barang = detil_pengiriman.id_barang', 'left');
		$this->db->join('pengiriman', 'pengiriman.id_pengiriman = detil_pengiriman.id_pengiriman', 'left');
		$this->db->where('pengiriman.id_pengiriman', $id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $value) {
				$data[] = $value;
			}
		}
		$query->free_result();
		return $data;
	}
}
?>