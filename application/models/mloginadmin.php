<?php 
/**
* @author Thony Hermawan
*/
class Mloginadmin extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		session_start();
		$this->load->database();
	}	

	function validasi($username, $password)
	{
		$this->db->select('admin_id, admin_name, admin_password');
		$this->db->where('admin_name', $username);
		$this->db->where('admin_password', $password);
		$this->db->limit(1);
		$query = $this->db->get('admin');
		$this->session->set_userdata('lastquery', $this->db->last_query());
		if ($query->num_rows() > 0) {
			$row = $query->row_array();
			return $row;
		} else {
			$this->session->set_flashdata('error', 'Maaf, silahkan coba lagi!');
			return array();
		}
	}
}
?>