<?php
/**
* @author Thony Hermawan
*/
class Pengiriman extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function buat_permintaan_pengiriman()
	{
		$data['judul'] = 'Permintaan Pengiriman Baru';
		$data['kota'] = $this->mkota->getAllKota();

		$ipengiriman = $this->mpengiriman->genIdPengiriman();
		foreach ($ipengiriman as $val) {
			$id_pengiriman = $val['new_id'];
		}
		$data['id'] = $id_pengiriman;
		$this->load->vars($data);
		$this->load->view('admin/buat_permintaan', $data, FALSE);
	}

	public function barang()
	{
		$data['judul'] = 'Tambah Barang';
		$data['jenis'] = $this->mjenis->getAllJenis();
		$this->load->vars($data);
		$this->load->view('admin/assist_barang_pengiriman', $data, FALSE);
	}

	public function detil($id)
	{
		$data['judul'] = 'Detil Pengiriman';
		$data['pengiriman'] = $this->mpengiriman->getPengirimanById($id);
		$this->load->vars($data);
		$this->load->view('admin/detil_pengiriman', $data, FALSE);
	}

	public function edit($id)
	{
		$data['judul'] = 'Edit Data Pengiriman';
		$data['konten'] = 'admin/edit_pengiriman';
		$data['pengiriman'] = $this->mpengiriman->getPengirimanById($id);
		$data['kota'] = $this->mkota->getAllKota();
		$this->load->vars($data);
		//$this->load->view('admin/edit_pengiriman', $data, FALSE);
		$this->load->view('admin/pg_admin', $data, FALSE);
	}

	public function hapus($id)
	{
		$this->mpengiriman->delete($id);
		$this->session->set_flashdata('message', 'Data pengiriman sudah dihapus');
		redirect('pg_admin/pengiriman', 'refresh');
	}

	public function update()
	{
		$id 			= $this->input->post('txtNoPengiriman');
		$tgl			= $this->input->post('txtTglPengiriman');
		$nama			= $this->input->post('txtNamaPenerima');
		$tujuan			= $this->input->post('txtTujuanPengiriman');
		$alamat			= $this->input->post('txtAlamatPenerima');
		$this->mpengiriman->update($id, $tgl, $nama, $tujuan, $alamat);
		//echo "Perubahan sudah disimpan, klik <a href='javascript:window.close();'>disini</a> untuk keluar.";
		//echo $id." ".$tgl." ".$nama." ".$tujuan." ".$alamat;
		$this->session->set_flashdata('message', 'Data pengiriman sudah diubah');
		redirect('pg_admin/pengiriman', 'refresh');
	}

	public function buat_pengiriman_cust()
	{
		$id_cust = $this->session->userdata('id_cust');
		$id = $this->input->post('txtIdPengiriman');
		$id_kota_asal = $this->input->post('cbKotaAsal');
		$id_kota_tujuan = $this->input->post('cbKotaTujuan');
		$id_b = $this->mbiaya->getIdBiaya($id_kota_asal, $id_kota_tujuan);
		foreach ($id_b as $data) {
			$id_biaya = $data['id_biaya'];
			$biaya = $data['biaya'];
		}
		$tgl = $this->input->post('txtTglPengiriman');
		//$biaya = $this->input->post();
		$nama = $this->input->post('txtNamaPenerima');
		$tujuan = $this->input->post('txtTujuanPengiriman');
		$alamat = $this->input->post('txtAlamatPenerima');
		$berat = "null";
		$no_resi = $this->mtracking->generate_no_resi();
		$date = date('Y-m-d');
		$this->mpengiriman->insert($id, $id_biaya, $tgl, $biaya, $nama, $tujuan, $alamat, $berat);	
		//echo $id." ".$id_biaya." ".$tgl." ".$biaya." ".$nama." ".$tujuan." ".$alamat." ".$berat;
		$this->mtracking->insert($no_resi, $id, $id_cust, 'Sedang Diproses', $date, 'Surabaya', '');
		$this->session->set_flashdata('message', 'Data pengiriman sudah dibuat');
		redirect('pengiriman/view_detil_pengiriman/'.$id, 'refresh');
	}

	public function data_barang()
	{
		$id_pengiriman = $this->session->userdata('id_pengiriman');
		$data['judul'] = 'Data Barang Pengiriman';
		$data['konten'] = 'guest/pengiriman_barang';
		$data['pengiriman'] = $this->mpengiriman->getPengirimanById($id_pengiriman);
		$data['detil_pengiriman'] = $this->mpengiriman->getDetilPengiriman($id_pengiriman);
		$data['sum_berat'] = $this->mpengiriman->sumBerat($id_pengiriman);
		$data['jenis'] = $this->mjenis->getAllJenis();
		$this->load->vars($data);
		$this->load->view('guest/page', $data, FALSE);
	}

	public function list_pengiriman($id_cust)
	{
		$data['judul'] = 'History Pengiriman';
		$data['konten'] = 'guest/history_pengiriman';
		$data['aktif'] = 'active';
		$data['pengiriman'] = $this->mpengiriman->getHistoryPengiriman($id_cust);
		$this->load->vars($data);
		$this->load->view('guest/page', $data, FALSE);
	}

	public function view_detil_pengiriman($id_pengiriman)
	{
		$id_cust = $this->session->userdata('id_cust');
		$data['judul'] = 'Detil Pengiriman (No. Pengiriman: '.$id_pengiriman.')';
		$data['konten'] = 'guest/det_pengiriman';
		$data['aktif'] = 'active';
		$data['jenis'] = $this->mjenis->getAllJenis();
		$data['pengiriman'] = $this->mpengiriman->getPengirimanById($id_pengiriman);
		$data['detil_pengiriman'] = $this->mpengiriman->detil_pengiriman($id_cust, $id_pengiriman);
		$data['sum_berat'] = $this->mpengiriman->sum_berat($id_pengiriman);
		$data['no_resi'] = $this->mtracking->getNoResi($id_cust, $id_pengiriman);
		$data['id_barang'] = $this->mbarang->getLastBarang();
		$this->load->vars($data);
		$this->load->view('guest/page', $data, FALSE);
	}

	public function cetak_detil($id_pengiriman)
	{
		$id_cust = $this->session->userdata('id_cust');
		$data['judul'] = 'Detil Pengiriman (No. Pengiriman: '.$id_pengiriman.')';
		$data['konten'] = 'guest/det_pengiriman';
		$data['aktif'] = 'active';
		$data['jenis'] = $this->mjenis->getAllJenis();
		$data['pengiriman'] = $this->mpengiriman->getPengirimanById($id_pengiriman);
		$data['detil_pengiriman'] = $this->mpengiriman->detil_pengiriman($id_cust, $id_pengiriman);
		$data['sum_berat'] = $this->mpengiriman->sum_berat($id_pengiriman);
		$data['no_resi'] = $this->mtracking->getNoResi($id_cust, $id_pengiriman);
		$data['id_barang'] = $this->mbarang->getLastBarang();
		$this->load->vars($data);
		$this->load->view('guest/cetak_pengiriman', $data, FALSE);
	}

	public function add_barang()
	{
		$id_pengiriman = $this->input->post('txtIdPengiriman');
		$nama_barang = $this->input->post('txtNamaBarang');
		$jenis_barang = $this->input->post('cbJenisBarang');
		$berat_barang = $this->input->post('txtBeratBarang');
		$satuan_barang = $this->input->post('cbSatuanBarang');
		$id_barang = $this->input->post('txtIdBarang');
		$berat_pengiriman = $this->input->post('txtTotalBerat');
		$this->mbarang->insert($jenis_barang, $nama_barang, $berat_barang, $satuan_barang);
		//echo $id_barang." ".$id_pengiriman;
		$this->mpengiriman->insert_detil_pengiriman($id_barang, $id_pengiriman);
		$this->mpengiriman->update_berat_pengiriman($id_pengiriman, $berat_barang);
		redirect('pengiriman/view_detil_pengiriman/'.$id_pengiriman, 'refresh');
	}

	public function hapus_detil_barang($id_barang)
	{
		$id_pengiriman = $this->input->post('txtIdPengiriman');
		$this->mpengiriman->delete_detil_pengiriman($id_barang, $id_pengiriman);
		redirect('pengiriman/view_detil_pengiriman/'.$id_pengiriman, 'refresh');
	}

	public function random_no_resi()
	{
		$data = $this->mtracking->generate_no_resi();
		echo $data;
	}

	public function buat_surat_pengiriman($id_pengiriman)
	{
		$data['judul'] = 'Surat Pengiriman (No. Pengiriman: '.$id_pengiriman.')';
		$data['id_pengiriman'] = $id_pengiriman;
		$data['data_pengiriman'] = $this->mpengiriman->data_surat_pengiriman($id_pengiriman);
		$data['sum_berat'] = $this->mpengiriman->sum_berat($id_pengiriman);
		$data['data_barang'] = $this->mpengiriman->detil_barang_surat_pengiriman($id_pengiriman);
		$this->load->vars($data);
		$this->load->view('admin/surat_pengiriman', $data, FALSE);
	}

	public function pengambilan_barang()
	{
		$no_pengiriman = $this->input->post('txtNoPengiriman');
		$data['no_pengiriman'] = $this->input->post('txtNoPengiriman');
		$data['tgl_pengiriman'] = $this->input->post('txtTglPengiriman');
		$data['nama_penerima'] = $this->input->post('txtNamaPenerima');
		$data['tujuan_pengiriman'] = $this->input->post('txtTujuanPengiriman');
		$data['alamat_penerima'] = $this->input->post('txtAlamatPenerima');
		$data['kota_tujuan'] = $this->input->post('txtKotaTujuan');
		$data['nama_karyawan'] = $this->input->post('inputNamaKaryawan');
		$data['nik'] = $this->input->post('inputTanggalNik');
		$data['barang'] = $this->mbarang->get_list_barang_for_pengiriman($no_pengiriman);
		$this->load->vars($data);
		$this->load->view('admin/cetak_pengambilan_barang', $data, FALSE);
	}
}
?>