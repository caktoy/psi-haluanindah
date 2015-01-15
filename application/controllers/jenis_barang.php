<?php
/**
* @author Thony Hermawan
*/
class Jenis_barang extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function add(){
		$jenis_barang = $this->input->post('txtJenisBarang');
		$data = $this->mjenis->insert($jenis_barang);
		$this->session->set_flashdata('message', 'Jenis barang sudah dibuat');
		redirect('pg_admin/jenis_barang', 'refresh');
	}

	public function remove($id)
	{
		$data = $this->mjenis->delete($id);
		$this->session->set_flashdata('message', 'Jenis barang sudah dihapus');
		redirect('pg_admin/jenis_barang', 'refresh');
	}

	public function edit($id)
	{
		$data['judul'] = 'Ubah Jenis Barang';
		$data['konten'] = 'admin/edit_jenis';
		$data['jenis'] = $this->mjenis->getJenisById($id);
		$this->load->vars($data);
		$this->load->view('admin/pg_admin', $data, FALSE);
	}

	public function update()
	{
		$id = $this->input->post('txtIdJenisBarang');
		$nama = $this->input->post('txtJenisBarang');
		$data = $this->mjenis->update($id, $nama);
		$this->session->set_flashdata('message', 'Jenis barang sudah diubah');
		redirect('pg_admin/jenis_barang', 'refresh');
	}
}
?>