<?php
/**
* 
*/
class Biaya extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function add(){
		$kota_asal = $this->input->post('cbKotaAsal');
		$kota_tujuan = $this->input->post('cbKotaTujuan');
		$total_berat = $this->input->post('txtTotalBerat');
		$biaya = $this->input->post('txtBiaya');
		$data = $this->mbiaya->insert($kota_asal, $kota_tujuan, $total_berat, $biaya);
		$this->session->set_flashdata('message', 'Biaya pengiriman sudah dibuat');
		redirect('pg_admin/biaya', 'refresh');
		//echo $kota_asal." ".$kota_tujuan." ".$total_berat." ".$biaya;
	}

	public function remove($id)
	{
		$data = $this->mbiaya->delete($id);
		$this->session->set_flashdata('message', 'Biaya pengiriman sudah dihapus');
		redirect('pg_admin/biaya', 'refresh');
	}

	public function edit($id)
	{
		$data['judul'] = 'Ubah Biaya Pengiriman';
		$data['konten'] = 'admin/edit_biaya';
		$data['biaya'] = $this->mbiaya->getBiayaById($id);
		$data['kota'] = $this->mkota->getAllKota();
		$this->load->vars($data);
		$this->load->view('admin/pg_admin', $data, FALSE);
	}

	public function update()
	{
		$id = $this->input->post('txtIdBiaya');
		$kota_asal = $this->input->post('cbKotaAsal');
		$kota_tujuan = $this->input->post('cbKotaTujuan');
		$total_berat = $this->input->post('txtTotalBerat');
		$biaya = $this->input->post('txtBiaya');
		$data = $this->mbiaya->update($id, $kota_asal, $kota_tujuan, $total_berat, $biaya);
		$this->session->set_flashdata('message', 'Biaya pengiriman sudah diubah');
		redirect('pg_admin/biaya', 'refresh');
		//echo $id." ".$kota_asal." ".$kota_tujuan." ".$total_berat." ".$biaya;
	}
}
?>