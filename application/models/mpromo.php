<?php
/**
* @author Thony Hermawan
*/
class Mpromo extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getAllPromo()
	{
		$data = array();
		$this->db->select('promo_id, promo_name, promo_date_start, promo_date_end, promo_desc');
		$this->db->from('promo');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$data[] = $row;
			}
		}
		$query->free_result();
		return $data;
	}
	public function getPromoById($promo_id)
	{
		$data = array();
		$param = array('promo_id' => $promo_id);
		$this->db->select('promo_id, promo_name, promo_date_start, promo_date_end, promo_desc');
		$query = $this->db->get_where('promo', $param, 1);
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$data[] = $row;
			}
		}
		$query->free_result();
		return $data;
	}

	public function insert($promo_name, $promo_date_start, $promo_date_end, $promo_desc)
	{
		$data = array('promo_name' => $promo_name, 
					'promo_date_start' => $promo_date_start,
					'promo_date_end' => $promo_date_end,
					'promo_desc' => $promo_desc
			);
		$this->db->insert('promo', $data);
	}

	public function delete($promo_id)
	{
		$data = array('promo_id' => $promo_id);
		$this->db->delete('promo', $data);
		//return $data;
	}

	public function edit($promo_id, $promo_name, $promo_date_start, $promo_date_end, $promo_desc)
	{
		$data = array('promo_name' => $promo_name, 
					'promo_date_start' => $promo_date_start,
					'promo_date_end' => $promo_date_end,
					'promo_desc' => $promo_desc);
		$this->db->where('promo_id', $promo_id);
		$this->db->update('promo', $data);
	}
}
?>