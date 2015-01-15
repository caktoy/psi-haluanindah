<?php
/**
* 
*/
class Kota extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function add(){
		$id_provinsi = $this->input->post('inputPilihProvinsi');
		$nama_kota = $this->input->post('inputNamaKota');
		//$id_provinsi = $this->mkota->getIdProvinsi($nama_provinsi);
		$data = $this->mkota->addKota($id_provinsi, $nama_kota);
		$this->session->set_flashdata('message', 'Provinsi sudah dibuat');
		redirect('pg_admin/kota_provinsi', 'refresh');
		//echo $nama_provinsi." ".$nama_kota;
	}
}
?>