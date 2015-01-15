<?php
/**
* @author Thony Hermawan
*/
class Mdetilpengiriman extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function insert($id_barang, $id_pengiriman)
	{
		$data = array('id_barang' => $id_barang, 'id_pengiriman' => $id_pengiriman);
		$this->db->insert('detil_pengiriman', $data);
	}

	public function delete($id_barang, $id_pengiriman)
	{
		$data = array('id_barang' => $id_barang, 'id_pengiriman' => $id_pengiriman);
		$this->db->delete('detil_pengiriman', $data);	
	}

}
?>