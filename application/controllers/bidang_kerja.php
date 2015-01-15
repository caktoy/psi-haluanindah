<?php
/**
* 
*/
class Bidang_kerja extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function add(){
		$nama_bidang_kerja = $this->input->post('txtBidangKerja');
		$data = $this->mbidang->insert($nama_bidang_kerja);
		$this->session->set_flashdata('message', 'Bidang kerja sudah dibuat');
		redirect('pg_admin/bidang_kerja', 'refresh');
	}

	public function remove($id)
	{
		$data = $this->mbidang->delete($id);
		$this->session->set_flashdata('message', 'Bidang kerja sudah dihapus');
		redirect('pg_admin/bidang_kerja', 'refresh');
	}
	public function edit($id)
	{
		$data['judul'] = 'Ubah Bidang Kerja';
		$data['konten'] = 'admin/edit_bidang';
		$data['bidang'] = $this->mbidang->getBidangById($id);
		$this->load->vars($data);
		$this->load->view('admin/pg_admin', $data, FALSE);
	}

	public function update()
	{
		$id = $this->input->post('txtIdBidangKerja');
		$nama = $this->input->post('txtNamaBidangKerja');
		$data = $this->mbidang->update($id, $nama);
		$this->session->set_flashdata('message', 'Bidang kerja sudah diubah');
		redirect('pg_admin/bidang_kerja', 'refresh');
	}
}
?>