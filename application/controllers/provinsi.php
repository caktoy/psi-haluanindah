<?php 
/**
* 
*/
class Provinsi extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function add()
	{
		$nama_provinsi = $this->input->post('inputNamaProvinsi');
		$this->mkota->addProvinsi($nama_provinsi);
		$this->session->set_flashdata('message', 'Provinsi sudah dibuat');
		redirect('pg_admin/kota_provinsi', 'refresh');
	}
}
?>