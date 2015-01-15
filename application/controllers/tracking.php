<?php
/**
* @author Thony Hermawan
*/
class Tracking extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function detil($no_resi)
	{
		$id_cust = $this->session->userdata('id_cust');
		$data['judul'] = 'Detil Tracking';
		$data['konten'] = 'guest/det_tracking';
		$data['aktif'] = 'active';
		$data['detil_barang'] = $this->mtracking->detil_barang($id_cust, $no_resi);
		$data['detil_pengiriman'] = $this->mtracking->detil_pengiriman($id_cust, $no_resi);
		$data['tracking'] = $this->mtracking->detil_tracking($no_resi);
		$this->load->view('guest/page', $data);
	}

	public function page_detil($no_resi)
	{
		$data['judul'] = 'Detil Tracking';
		$data['konten'] = 'admin/det_tracking';
		$data['aktif'] = 'active';
		$data['status'] = $this->mstatus->getAllStatus();
		$data['tracking'] = $this->mtracking->detil_tracking($no_resi);
		$this->load->view('admin/pg_admin', $data);
	}

	public function perbarui_data()
	{
		$no_resi = $this->input->post('txtNoResi');
		$id_pengiriman = $this->input->post('txtIdPengiriman');
		$id_cust = $this->input->post('txtIdCust');
		$status_pengiriman = $this->input->post('cbStatusPengiriman');
		$tanggal = $this->input->post('txtTanggalTracking');
		$posisi = $this->input->post('txtPosisi');
		$ket = $this->input->post('txtKeterangan');
		if (empty($ket)) $keterangan = ""; else $keterangan = $ket;
		$this->mtracking->insert($no_resi, $id_pengiriman, $id_cust, $status_pengiriman, $tanggal, $posisi, $keterangan);
		$this->session->set_flashdata('message', 'Status pengiriman sudah diperbarui.');
		redirect('tracking/page_detil/'.$no_resi, 'refresh');
		//echo $no_resi." ".$id_pengiriman." ".$id_cust." ".$status_pengiriman." ".$tanggal." ".$posisi." ".$keterangan;
	}
}
?>