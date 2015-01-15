<?php
/**
* @author Thony Hermawan
*/
class Admin extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function update()
	{
		$id = $this->input->post('txtAdminId');
		$nama = $this->input->post('txtAdminName');
		$pass = $this->input->post('txtAdminPassword');
		$data = $this->madmin->update($id, $nama, $pass);
		$this->session->set_flashdata('message', 'Username dan Password sudah diubah');
		redirect('pg_admin/admin', 'refresh');
		//echo $id.' '.$nama.' '.$pass;
	}
}
?>