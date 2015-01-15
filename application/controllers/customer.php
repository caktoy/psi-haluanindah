<?php
/**
* @author Thony Hermawan
*/
class Customer extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function add(){
		$bidang_kerja 		= $this->input->post('cbBidangKerja');
		$email_cust 		= $this->input->post('txtEmailCust');
		$password_cust 		= $this->input->post('txtPasswordCust');
		$nama_cust 			= $this->input->post('txtNamaCust');
		$jenis_kel_cust		= $this->input->post('rbJenisKelCust');
		$tgl_lahir_cust		= $this->input->post('txtTglLahirCust');
		$alamat_cust 		= $this->input->post('txtAlamatCust');
		$kota_cust 			= $this->input->post('txtKotaCust');
		$no_telp_cust 		= $this->input->post('txtNoTelpCust');
		$perusahaan_cust 	= $this->input->post('txtPerusahaanCust');
		$alamat_per_cust 	= $this->input->post('txtAlamatPerCust');
		$data 				= $this->mcustomer->insert($bidang_kerja, $email_cust, $password_cust, $nama_cust, $jenis_kel_cust,
			$tgl_lahir_cust, $alamat_cust, $kota_cust, $no_telp_cust, $perusahaan_cust, $alamat_per_cust);
		$this->session->set_flashdata('message', 'Customer sudah dibuat');
		redirect('pg_admin/customer', 'refresh');
	}

	public function add_cust(){
		$bidang_kerja 		= $this->input->post('inputPekerjaan');
		$email_cust 		= $this->input->post('inputEmail');
		$password_cust 		= $this->input->post('inputPassword');
		$nama_cust 			= $this->input->post('inputNamaLengkap');
		$jenis_kel_cust		= $this->input->post('inputJenisKelamin');
		$tgl_lahir_cust		= $this->input->post('inputTanggalLahir');
		$alamat_cust 		= $this->input->post('inputAlamat');
		$kota_cust 			= $this->input->post('inputKota');
		$no_telp_cust 		= $this->input->post('inputNoTelepon');
		$perusahaan_cust 	= $this->input->post('inputNamaPerusahaan');
		$alamat_per_cust 	= $this->input->post('inputAlamatPerusahaan');
		$data 				= $this->mcustomer->insert($bidang_kerja, $email_cust, $password_cust, $nama_cust, $jenis_kel_cust,
			$tgl_lahir_cust, $alamat_cust, $kota_cust, $no_telp_cust, $perusahaan_cust, $alamat_per_cust);
		$this->session->set_flashdata('message', 'Customer sudah terdaftar, silahkan masuk melalui form Log In.');
		redirect('page', 'refresh');
	}

	public function remove($id)
	{
		$data = $this->mcustomer->delete($id);
		$this->session->set_flashdata('message', 'Customer sudah dihapus');
		redirect('pg_admin/customer', 'refresh');
	}
	public function edit($id)
	{
		$data['judul'] = 'Detil Data Customer';
		$data['konten'] = 'admin/edit_customer';
		$data['customer'] = $this->mcustomer->getCustomerById($id);
		$this->load->vars($data);
		$this->load->view('admin/pg_admin', $data, FALSE);
	}

	public function update()
	{
		$id_cust			= $this->input->post('txtIdCust');
		$bidang_kerja 		= $this->input->post('cbBidangKerja');
		$email_cust 		= $this->input->post('txtEmailCust');
		$password_cust 		= $this->input->post('txtPasswordCust');
		$nama_cust 			= $this->input->post('txtNamaCust');
		$jenis_kel_cust		= $this->input->post('rbJenisKelCust');
		$tgl_lahir_cust		= $this->input->post('txtTglLahirCust');
		$alamat_cust 		= $this->input->post('txtAlamatCust');
		$kota_cust 			= $this->input->post('txtKotaCust');
		$no_telp_cust 		= $this->input->post('txtNoTelpCust');
		$perusahaan_cust 	= $this->input->post('txtPerusahaanCust');
		$alamat_per_cust 	= $this->input->post('txtAlamatPerCust');
		$data 				= $this->mcustomer->update($id_cust, $bidang_kerja, $email_cust, $password_cust, $nama_cust, 
			$jenis_kel_cust, $tgl_lahir_cust, $alamat_cust, $kota_cust, $no_telp_cust, $perusahaan_cust, $alamat_per_cust);
		$this->session->set_flashdata('message', 'Customer sudah diubah');
		redirect('pg_admin/customer', 'refresh');
	}

	public function edit_cust($id)
	{
		//$id = $this->session->userdata('id_cust');
		$data['judul'] = 'Detil Data Customer';
		$data['konten'] = 'guest/edit_customer';
		$data['customer'] = $this->mcustomer->getCustomerById($id);
		$data['bid'] = $this->mbidang->getAllBidang();
		$this->load->vars($data);
		$this->load->view('guest/page', $data, FALSE);
	}

	public function update_cust()
	{
		$id_cust			= $this->input->post('txtIdCust');
		$bidang_kerja 		= 1;//$this->input->post('cbBidangKerja');
		$email_cust 		= $this->input->post('txtEmailCust');
		$password_cust 		= $this->input->post('txtPasswordCust');
		$nama_cust 			= $this->input->post('txtNamaCust');
		$jenis_kel_cust		= $this->input->post('rbJenisKelCust');
		$tgl_lahir_cust		= $this->input->post('txtTglLahirCust');
		$alamat_cust 		= $this->input->post('txtAlamatCust');
		$kota_cust 			= $this->input->post('txtKotaCust');
		$no_telp_cust 		= $this->input->post('txtNoTelpCust');
		$perusahaan_cust 	= $this->input->post('txtPerusahaanCust');
		$alamat_per_cust 	= $this->input->post('txtAlamatPerCust');
		$data 				= $this->mcustomer->update($id_cust, $bidang_kerja, $email_cust, $password_cust, $nama_cust, 
			$jenis_kel_cust, $tgl_lahir_cust, $alamat_cust, $kota_cust, $no_telp_cust, $perusahaan_cust, $alamat_per_cust);
		$this->session->set_flashdata('message', 'Data Anda sudah diubah');
		redirect('page', 'refresh');
	}

	public function ceklogin()
	{
		$this->load->library('encrypt');
		$username = $this->input->post('txtEmail');
		$password = $this->input->post('txtPassword');
		$row = $this->mcustomer->validasi($username, $password);
		if (count($row) > 0) {
			$item = array(
				'id_cust' => $row['id_cust'],
				'email_cust' => $row['email_cust'],
				'password_cust' => $row['password_cust'],
				'nama_cust' => $row['nama_cust'],
				'status' => 'masuk'
			);
			$this->session->set_userdata($item);
			redirect('page', 'refresh');
		} else {
			$this->session->set_flashdata('error', 'Maaf, silahkan coba lagi!');
			redirect('page', 'refresh');
		}
	}

	public function logout()
	{	
		$this->session->sess_destroy();
		$this->session->set_flashdata('result', 'Anda sudah keluar');
		header('location:'.base_url().'index.php');
		redirect('page', 'refresh');
	}
}
?>