<?php 
/**
* 
*/
class Mpelanggan extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		session_start();
		$this->load->database();
		$this->load->model('madmin');
	}

	public function add_perusahaan()
	{
		# ambil id provinsi
		$id_provinsi = $this->input-post('inputProvinsi');
		#ambil nama kota
		$kota = $this->input->post('inputKota');
		#ambil id kota
		$id_kota = $this->madmin->get_id_kota($id_provinsi, $kota);
		$data = array(
			'id_kota' => $id_kota,
			'nama_perusahaan' => $this->input->post('inputNamaPerusahaan');
			'alamat_perusahaan' => $this->input->post('inputAlamatPerusahaan');
			'telp_perusahaan' => $this->input->post('inputTelpPerusahaan');
		);
		$this->db->insert('perusahaan', $data);
	}

	public function add_pelanggan()
	{
		# buat tanggal lahir
		$tgl = $this->input->post('inputTanggalLahir');
		$bln = $this->input->post('inputBulanLahir');
		$thn = $this->input->post('inputTahunLahir');
		$tgl_lahir = $thn."-".$bln."-".$tgl." 00:00:00"
		# ambil id jabatan
		$jabatan = $this->input->post('inputPekerjaan');
		$data = array(
					'id_jabatan' => $this->madmin->get_id_jabatan($jabatan);
					'email_cust' => $this->input->post('inputEmail'),
					'password_cust' => $this->input->post('inputPassword'),
					'nama_cust' => $this->input->post('inputNamaLengkap'),
					'jenis_kel_cust' => $this->input->post('inputJenisKelamin'),
					'tgl_lahir_cust' => $tgl_lahir,
					'alamat_cust' => 'inputAlamat',
					'no_telp_cust' => 'inputNoTelepon'
		);
		$this->db->insert('customer', $data);
	}
}
?>