<?php 
/**
* @author Thony Hermawan
*/
class Pg_admin extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$masuk = $this->session->userdata('status');
		if ($masuk != "masuk") {
			$this->login();
		} else {
			$data['judul'] = 'Beranda';
			$data['aktif'] = 'active';
			$data['konten'] = 'admin/beranda';
			$this->load->view('admin/pg_admin', $data);
		}
	}

	public function login()
	{
		$data['judul'] = 'Login Halaman Admin';
		$this->load->view('admin/login', $data);
	}

	public function ceklogin()
	{
		$this->load->library('encrypt');
		$username = $this->input->post('inputUsername');
		$password = $this->input->post('inputPassword');
		$row = $this->mloginadmin->validasi($username, $password);
		if (count($row) > 0) {
			$item = array(
				'admin_id' => $row['admin_id'],
				'admin_name' => $row['admin_name'],
				'admin_password' => $row['admin_password'],
				'status' => 'masuk'
			);
			$this->session->set_userdata($item);
			redirect('pg_admin', 'refresh');
		} else {
			$this->session->set_flashdata('error', 'Maaf, silahkan coba lagi!');
			redirect('pg_admin/login', 'refresh');
		}
	}

	public function logout()
	{	
		$this->session->sess_destroy();
		$this->session->set_flashdata('result', 'Anda sudah keluar');
		header('location:'.base_url().'index.php/pg_admin/login');
		redirect('pg_admin/login', 'refresh');
	}

	public function kota_provinsi()
	{
		$data['judul'] = 'Kota & Provinsi';
		$data['konten'] = 'admin/kota_provinsi';
		$data['aktif'] = 'active';
		$data['kota'] = $this->mkota->getAllKota();
		$data['provinsi'] = $this->mkota->getAllProvinsi();//$this->mprovinsi->getAllProvinsi();
		$this->load->vars($data);
		$this->load->view('admin/pg_admin', $data, FALSE);
	}

	public function promo()
	{
		$data['judul'] = 'Promo';
		$data['konten'] = 'admin/promo';
		$data['aktif'] = 'active';
		$data['promo'] = $this->mpromo->getAllPromo();
		$this->load->vars($data);
		$this->load->view('admin/pg_admin', $data, FALSE);
	}

	public function lowongan()
	{
		$data['judul'] = 'Lowongan Kerja';
		$data['konten'] = 'admin/lowongan';
		$data['aktif'] = 'active';
		//$data['lowongan'] = $this->mlowongan->getAllLowongan();
		$this->load->vars($data);
		$this->load->view('admin/pg_admin', $data, FALSE);
	}

	public function rekanan()
	{
		$data['judul'] = 'Perusahaan Rekanan';
		$data['konten'] = 'admin/rekanan';
		$data['aktif'] = 'active';
		$this->load->vars($data);
		$this->load->view('admin/pg_admin', $data, FALSE);
	}

	public function bidang_kerja()
	{
		$data['judul'] = 'Bidang Kerja';
		$data['konten'] = 'admin/bidang_kerja';
		$data['aktif'] = 'active';
		$data['bidang'] = $this->mbidang->getAllBidang();
		$this->load->vars($data);
		$this->load->view('admin/pg_admin', $data, FALSE);
	}

	public function biaya()
	{
		$data['judul'] = 'Biaya Pengiriman';
		$data['konten'] = 'admin/biaya_pengiriman';
		$data['aktif'] = 'active';
		$data['biaya'] = $this->mbiaya->getAllBiaya();
		$data['kota'] = $this->mkota->getAllKota();
		$data['provinsi'] = $this->mkota->getAllProvinsi();
		$this->load->vars($data);
		$this->load->view('admin/pg_admin', $data, FALSE);
	}

	public function jenis_barang()
	{
		$data['judul'] = 'Jenis Barang';
		$data['konten'] = 'admin/jenis_barang';
		$data['aktif'] = 'active';
		$data['jenis'] = $this->mjenis->getAllJenis();
		$this->load->vars($data);
		$this->load->view('admin/pg_admin', $data, FALSE);
	}

	public function admin()
	{
		$data['judul'] = 'Kelolah Otorisasi';
		$data['konten'] = 'admin/admin';
		$data['aktif'] = 'active';
		$data['admin'] = $this->madmin->getAllAdmin();
		$data['admin_id'] = $this->session->userdata('admin_id');
		$data['admin_name'] = $this->session->userdata('admin_name');
		$data['admin_password'] = $this->session->userdata('admin_password');
		$this->load->vars($data);
		$this->load->view('admin/pg_admin', $data, FALSE);
	}

	public function barang()
	{
		$jml_barang = 0;
		$jbarang = $this->mbarang->jumlah_barang();
		foreach ($jbarang as $value) {
			$jml_barang = $value['jumlah'];
		}

		$this->load->library('pagination');
		
		$config['base_url'] = base_url().'index.php/pg_admin/barang';
		$config['total_rows'] = $jml_barang;
		$config['per_page'] = 10;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['full_tag_open'] = '<p>';
		$config['full_tag_close'] = '</p>';
		$config['first_link'] = 'Pertama';
		$config['first_tag_open'] = '<div>';
		$config['first_tag_close'] = '</div>';
		$config['last_link'] = 'Terakhir';
		$config['last_tag_open'] = '<div>';
		$config['last_tag_close'] = '</div>';
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<div>';
		$config['next_tag_close'] = '</div>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<div>';
		$config['prev_tag_close'] = '</div>';
		$config['cur_tag_open'] = '<b>';
		$config['cur_tag_close'] = '</b>';
		
		$this->pagination->initialize($config);
		
		$data['judul'] = 'Barang';
		$data['konten'] = 'admin/barang';
		$data['aktif'] = 'active';
		$data['barang'] = $this->mbarang->getAllBarang();
		$data['jenis'] = $this->mjenis->getAllJenis();
		$data['paging'] = $this->pagination->create_links();
		$this->load->vars($data);
		$this->load->view('admin/pg_admin', $data, FALSE);
	}

	public function customer()
	{
		$data['judul'] = 'Customer';
		$data['konten'] = 'admin/customer';
		$data['aktif'] = 'active';
		$data['customer'] = $this->mcustomer->getAllCustomer();
		$data['bidang'] = $this->mbidang->getAllBidang();
		$this->load->vars($data);
		$this->load->view('admin/pg_admin', $data, FALSE);
	}

	public function pengiriman()
	{
		$data['judul'] = 'Pengiriman';
		$data['konten'] = 'admin/pengiriman';
		$data['aktif'] = 'active';
		$data['pengiriman'] = $this->mpengiriman->getAllPengiriman();
		$this->load->vars($data);
		$this->load->view('admin/pg_admin', $data, FALSE);
	}

	public function status()
	{
		$data['judul'] = 'Status Pengiriman';
		$data['konten'] = 'admin/status';
		$data['aktif'] = 'active';
		$data['status'] = $this->mstatus->getAllStatus();
		$this->load->vars($data);
		$this->load->view('admin/pg_admin', $data, FALSE);
	}

	public function laporan()
	{
		$data['judul'] = 'Laporan';
		$data['konten'] = 'admin/laporan';
		$data['aktif'] = 'active';
		$data['tahun'] = $this->mlaporan->getTahunPengiriman();
		$data['bulan'] = $this->mlaporan->getBulanPengiriman();
		$this->load->vars($data);
		$this->load->view('admin/pg_admin', $data, FALSE);
	}

	public function tracking($id = NULL)
	{
		$jml = $this->db->get('view_list_tracking');

		$this->load->library('pagination');
		
		$config['base_url'] = base_url().'index.php/pg_admin/tracking';
		$config['total_rows'] = $jml->num_rows();
		$config['per_page'] = 10;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['full_tag_open'] = '<ul>';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'Awal';
		//$config['first_tag_open'] = '<li>';
		//$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Akhir';
		//$config['last_tag_open'] = '<li>';
		//$config['last_tag_close'] = '</li>';
		$config['next_link'] = '&raquo;';
		//$config['next_tag_open'] = '<li>';
		//$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo;';
		//$config['prev_tag_open'] = '<li>';
		//$config['prev_tag_close'] = '</li>';
		//$config['cur_tag_open'] = '<b>';
		//$config['cur_tag_close'] = '</b>';
		
		$this->pagination->initialize($config);
		
		$data['paging'] = $this->pagination->create_links();

		$data['judul'] = 'Tracking';
		$data['konten'] = 'admin/tracking';
		$data['aktif'] = 'active';
		$data['tracking'] = $this->mtracking->ambil_tracking($config['per_page'], $id);
		$this->load->vars($data);
		$this->load->view('admin/pg_admin', $data, FALSE);
	}
}
?>