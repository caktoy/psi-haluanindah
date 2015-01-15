<?php
/**
* @author Thony Hermawan
*/
class Barang extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function add(){
		$nama_barang = $this->input->post('txtNamaBarang');
		$jenis_barang = $this->input->post('cbJenisBarang');
		$berat_barang = $this->input->post('txtBeratBarang');
		$satuan_barang = $this->input->post('cbSatuanBarang');
		$data = $this->mbarang->insert($jenis_barang, $nama_barang, $berat_barang, $satuan_barang);
		$this->session->set_flashdata('message', 'Barang sudah dibuat');
		redirect('pg_admin/barang', 'refresh');
		//echo $kota_asal." ".$kota_tujuan." ".$total_berat." ".$biaya;
	}

	public function add_by_cust(){
		$id_pengiriman = $this->input->post('txtIdPengiriman');
		$nama_barang = $this->input->post('txtNamaBarang');
		$jenis_barang = $this->input->post('cbJenisBarang');
		$berat_barang = $this->input->post('txtBeratBarang');
		$satuan_barang = $this->input->post('cbSatuanBarang');
		$this->mbarang->insert($jenis_barang, $nama_barang, $berat_barang, $satuan_barang);

		$last_barang = $this->mbarang->getLastBarang();
		foreach ($last_barang as $i) {
			$id_barang = $i['id_barang'];
		}

		$this->mpengiriman->insert_detil_pengiriman($id_barang, $id_pengiriman);
		$this->session->set_flashdata('message', 'Barang sudah ditambahkan');
		redirect('pengiriman/data_barang', 'refresh');
		//echo $kota_asal." ".$kota_tujuan." ".$total_berat." ".$biaya;
	}

	public function remove($id)
	{
		$data = $this->mbarang->delete($id);
		$this->session->set_flashdata('message', 'Barang sudah dihapus');
		redirect('pg_admin/barang', 'refresh');
	}

	public function remove_detil($id_barang, $id_pengiriman)
	{
		$this->load->model('mdetilpengiriman');
		$data = $this->mdetilpengiriman->delete($id_barang, $id_pengiriman);
		$this->session->set_flashdata('message', 'Detil barang sudah dihapus');
		redirect('pengiriman/view_detil_pengiriman/'.$id_pengiriman, 'refresh');
	}

	public function edit($id)
	{
		$data['judul'] = 'Ubah Data Barang';
		$data['konten'] = 'admin/edit_barang';
		$data['barang'] = $this->mbarang->getBarangById($id);
		$data['jenis'] = $this->mjenis->getAllJenis();
		$this->load->vars($data);
		$this->load->view('admin/pg_admin', $data, FALSE);
	}

	public function update()
	{
		$id = $this->input->post('txtIdBarang');
		$nama_barang = $this->input->post('txtNamaBarang');
		$jenis_barang = $this->input->post('cbJenisBarang');
		$berat_barang = $this->input->post('txtBeratBarang');
		$satuan_barang = $this->input->post('cbSatuanBarang');
		$data = $this->mbarang->update($id, $jenis_barang, $nama_barang, $berat_barang, $satuan_barang);
		$this->session->set_flashdata('message', 'Barang sudah diubah');
		redirect('pg_admin/barang', 'refresh');
		//echo $id." ".$kota_asal." ".$kota_tujuan." ".$total_berat." ".$biaya;
	}
}
?>