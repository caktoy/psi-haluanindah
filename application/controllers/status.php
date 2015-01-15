<?php
/**
* @author Thony Hermawan
*/
class Status extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function add()
	{
		$status_pengiriman = $this->input->post('txtStatusPengiriman');
		$keterangan = $this->input->post('txtKeterangan');
		$data = $this->mstatus->insert($status_pengiriman, $keterangan);
		$this->session->set_flashdata('message', 'Status pengiriman sudah dibuat');
		redirect('pg_admin/status', 'refresh');
	}

	public function edit($status_pengiriman)
	{
		$data['judul'] = 'Ubah Status Pengiriman';
		$data['konten'] = 'admin/edit_status';
		$data['status'] = $this->mstatus->getStatusById($status_pengiriman);
		$this->load->vars($data);
		$this->load->view('admin/pg_admin', $data, FALSE);
	}

	public function remove($status_pengiriman)
	{
		$data = $this->mstatus->delete($status_pengiriman);
		$this->session->set_flashdata('message', 'Status pengiriman sudah dihapus');
		redirect('pg_admin/status', 'refresh');
	}

	public function update()
	{
		$status_pengiriman = $this->input->post('txtStatusPengiriman');
		$keterangan = $this->input->post('txtKeterangan');
		$data = $this->mstatus->update($status_pengiriman, $keterangan);
		$this->session->set_flashdata('message', 'Status pengiriman sudah diubah');
		redirect('pg_admin/status', 'refresh');
	}
}
?>