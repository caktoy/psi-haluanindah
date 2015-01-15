<?php
/**
* @author Thony Hermawan
*/
class Promo extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function add(){
		$promo_name = $this->input->post('inputNamaPromo');
		$promo_date_start = $this->input->post('inputTanggalMulai')." 00:00:00";
		$promo_date_end = $this->input->post('inputTanggalSelesai')." 00:00:00";
		$promo_desc = $this->input->post('inputDeskripsiPromo');
		$data = $this->mpromo->insert($promo_name, $promo_date_start, $promo_date_end, $promo_desc);
		$this->session->set_flashdata('message', 'Promo baru sudah dibuat');
		redirect('pg_admin/promo', 'refresh');
	}

	public function remove($id){
		$data = $this->mpromo->delete($id);
		$this->session->set_flashdata('message', 'Promo sudah dihapus');
		redirect('pg_admin/promo', 'refresh');
	}

	public function edit($id)
	{
		$data['judul'] = 'Ubah Promo';
		$data['konten'] = 'admin/edit_promo';
		$data['promo'] = $this->mpromo->getPromoById($id);
		$this->load->vars($data);
		$this->load->view('admin/pg_admin', $data, FALSE);
	}

	public function update(){
		$promo_id = $this->input->post('inputIdPromo');
		$promo_name = $this->input->post('inputNamaPromo');
		$promo_date_start = $this->input->post('inputTanggalMulai')." 00:00:00";
		$promo_date_end = $this->input->post('inputTanggalSelesai')." 00:00:00";
		$promo_desc = $this->input->post('inputDeskripsiPromo');
		$data = $this->mpromo->edit($promo_id, $promo_name, $promo_date_start, $promo_date_end, $promo_desc);
		$this->session->set_flashdata('message', 'Promo baru sudah diubah');
		redirect('pg_admin/promo', 'refresh');
	}
}
?>