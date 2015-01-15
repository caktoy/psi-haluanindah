<?php
/**
* @author Thony Hermawan
*/
class Laporan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function bulanan()
	{
		$tahun = $this->input->post('cbTahun');
		$bulan = $this->input->post('cbBulan');
		$data['judul'] = 'Laporan Bulanan';
		$data['konten'] = 'admin/laporan_bulanan';
		$data['aktif'] = 'active';
		$data['tahun'] = $tahun;
		$data['bulan'] = $bulan;
		$data['laporan'] = $this->mlaporan->get_data_laporan_bulanan($tahun, $bulan);
		$this->load->vars($data);
		$this->load->view('admin/pg_admin', $data, FALSE);
	}

	public function cetak_bulanan($tahun, $bulan)
	{
		$data['tahun'] = $tahun;
		$data['bulan'] = $bulan;
		$data['laporan'] = $this->mlaporan->get_data_laporan_bulanan($tahun, $bulan);
		$this->load->vars($data);
		$this->load->view('admin/cetak_bulanan', $data, FALSE);
	}

	public function tahunan()
	{
		$tahun = $this->input->post('cbTahun1');
		$data['judul'] = 'Laporan Tahunan';
		$data['konten'] = 'admin/laporan_tahunan';
		$data['aktif'] = 'active';
		$data['tahun'] = $tahun;
		$data['jumlah'] = $this->mlaporan->jumlah_pengiriman($tahun);
		$data['laporan'] = $this->mlaporan->get_data_laporan_tahunan($tahun);
		$this->load->vars($data);
		$this->load->view('admin/pg_admin', $data, FALSE);
	}

	public function cetak_tahunan($tahun)
	{
		$data['tahun'] = $tahun;
		$data['jumlah'] = $this->mlaporan->jumlah_pengiriman($tahun);
		$data['laporan'] = $this->mlaporan->get_data_laporan_tahunan($tahun);
		$this->load->vars($data);
		$this->load->view('admin/cetak_tahunan', $data, FALSE);
	}

}
?>