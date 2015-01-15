<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $judul; ?> - PT. Haluan Indah Transporindo</title>
	<!-- Meta -->
	<?php 
		echo meta('description', 'Website tracking PT. Haluan Indah Transporindo');
		echo meta('keywoards', 'kirim barang, tracking, pelayaran, pengiriman');
		echo meta('Content-type', 'text/html; charset=utf-8', 'equiv'); 
		echo meta('viewport', 'width=device-width, initial-scale=1.0');
	?>
	<!-- CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/mystyle.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/flick/jquery-ui-1.9.2.custom.css">
	<style type="text/css">
		.content{
			padding-top: 40px;
			padding-bottom: 20px;
		}
		.spacer-large{
			height: 100px;
		}
		.icon-chevron-right{
			opacity: .25;
		}
    </style>
</head>
<body>
	<!-- Navbar -->
	<div class="navbar navbar-fixed-top navbar-inverse">
		<div class="navbar-inner">
			<div class="container">
				<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="nav-collapse collapse">
					<ul class="nav">
						<li class="<?php if ($this->uri->segment(2)=='') echo $aktif; ?>">
							<a href="<?php echo base_url(); ?>">Beranda</a>
						</li>
						<li class="<?php if ($this->uri->segment(2)=='layanan') echo $aktif; ?>">
							<a href="<?php echo base_url(); ?>index.php/page/layanan">Layanan</a>
						</li>
						<li class="<?php if ($this->uri->segment(2)=='profil') echo $aktif; ?>">
							<a href="<?php echo base_url(); ?>index.php/page/profil">Profil Perusahaan</a>
						</li>
					</ul>
					<ul class="nav pull-right">
						<?php
						$masuk = $this->session->userdata('status');
						if ($masuk != "masuk") {
							echo "<li><a href='#loginModal' role='button' data-toggle='modal'>Masuk</a></li>";
						} else {
							$nama = $this->session->userdata('nama_cust');
							$id_cust = $this->session->userdata('id_cust');
						?>
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">
									<?php echo $nama; ?>&nbsp;<b class="caret"></b>
								</a>
								<ul class="dropdown-menu">
									<li><a href="<?php echo base_url(); ?>index.php/customer/edit_cust/<?php echo $id_cust; ?>">Pengaturan Akun</a></li>
									<li class="divider"></li>
									<?php echo "<li><a href='".base_url()."index.php/customer/logout' role='button'>Keluar</a></li>"; ?>
								</ul>
							</li>
						<?php
						}
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- Navbar -->

	<!-- Header -->	
	<div class="header">
		<a href="#">
			<img src="<?php echo base_url(); ?>assets/img/head2.jpg" alt="PT. Haluan Indah Transporindo">
		</a>
		<!--
		<div class="overview">
			<div class="text-block">PT. HALUAN INDAH TRANSPORINDO</div>
			<div class="text-block">Melayani Anda Hingga Menembus Batas Dunia.</div>
		</div>-->
	</div>

	<!-- Content -->
	<div class="container content">
		<div class="row">
			<div class="span3">
				<!--Sidebar content-->
				<ul class="nav nav-tabs nav-stacked">
					<li class="<?php if ($this->uri->segment(2)=='') echo $aktif; ?>">
						<a href="<?php echo base_url(); ?>">Beranda
						<i class="icon-chevron-right pull-right"></i></a>
					</li>
					<li class="<?php if ($this->uri->segment(2)=='pengiriman_barang') echo $aktif; ?>">
						<?php
						$masuk = $this->session->userdata('status');
						if ($masuk != "masuk") {
							echo "<a href='#loginModal' role='button' data-toggle='modal'>Pengiriman Barang";
						} else {
							$nama = $this->session->userdata('nama_cust');
							echo "<a href='".base_url()."index.php/page/pengiriman_barang'>Pengiriman Barang";
						}
						?>
						<i class="icon-chevron-right pull-right"></i></a>
					</li>
					<li class="<?php if ($this->uri->segment(2)=='tracking') echo $aktif; ?>">
						<?php
						$masuk = $this->session->userdata('status');
						if ($masuk != "masuk") {
							echo "<a href='#loginModal' role='button' data-toggle='modal'>Tracking Area";
						} else {
							$nama = $this->session->userdata('nama_cust');
							echo "<a href='".base_url()."index.php/page/tracking'>Tracking Area";
						}
						?>
						<i class="icon-chevron-right pull-right"></i></a>
					</li>
					<li class="<?php if ($this->uri->segment(2)=='biaya_pengiriman') echo $aktif; ?>">
						<a href="<?php echo base_url(); ?>index.php/page/biaya_pengiriman">Informasi Biaya
						<i class="icon-chevron-right pull-right"></i></a>
					</li>
				</ul>
			</div>
			<div class="span9">
				<!--Body content-->
				<?php $this->load->view($konten); ?>
			</div>
		</div>
	</div>

	<!-- Footer -->
	<div class="footer">
		<div class="container">
			<div class="row">
				<div class="span3">
					<ul>
						<li class="head-list">Layanan</li>
						<li>
							<?php
							$masuk = $this->session->userdata('status');
							if ($masuk != "masuk") {
								echo "<a href='#loginModal' role='button' data-toggle='modal'>Pengiriman Barang";
							} else {
								$nama = $this->session->userdata('nama_cust');
								echo "<a href='".base_url()."index.php/page/pengiriman_barang'>Pengiriman Barang";
							}
							?>
						</li>
						<li>
							<?php
							$masuk = $this->session->userdata('status');
							if ($masuk != "masuk") {
								echo "<a href='#loginModal' role='button' data-toggle='modal'>Tracking Area";
							} else {
								$nama = $this->session->userdata('nama_cust');
								echo "<a href='".base_url()."index.php/page/tracking'>Tracking Area";
							}
							?>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>index.php/page/biaya_pengiriman">Informasi Biaya</a>
						</li>
					</ul>
				</div>
				<div class="span3">
					<ul>
						<li class="head-list">Kemitraan</li>
						<li><a href="<?php echo base_url(); ?>index.php/page/lowongan">Lowongan Kerja</a></li>
						<li><a href="<?php echo base_url(); ?>index.php/page/promo">Daftar Promo</a></li>
					</ul>
				</div>
				<div class="span3">
					<ul>
						<li class="head-list">Informasi Umum</li>
						<li><a href="<?php echo base_url(); ?>index.php/page/profil">Profil Perusahaan</a></li>
						<li><a href="<?php echo base_url(); ?>index.php/page/rekanan">Perusahaan Rekanan</a></li>
					</ul>
				</div>
				<div class="span3">
					<ul>
						<li class="head-list"><strong>PT. Haluan Indah Transporindo</strong></li>
						<li>
							Jawa Timur, Indonesia<br>
							<abbr title="Phone">CS:</abbr> (123) 456-7890<br>
							&nbsp;<br>
							2014&copy;&nbsp;
							<a href="http://www.stikom.edu">SI - STIKOM Surabaya</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<!-- Login Modal -->
	<div id="loginModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			<h3 id="myModalLabel">Masuk</h3>
		</div>
		<div class="modal-body">
			<table style="width: 100%;">
				<tr style="vertical-align: top;">
					<td style="width: 50%; border-right:1px solid #eeeeee; padding-right: 10px;">
						<form method="post" action="<?php echo base_url(); ?>index.php/customer/ceklogin">
							<fieldset>
								<legend>Sudah Terdaftar</legend>
								<table style="width: 100%;">
									<tr>
										<td><label for="txtEmail">Email</label></td>
										<td>&nbsp;</td>
										<td><input id="txtEmail" name="txtEmail" type="text" placeholder="ketik email disini"></td>
									</tr>
									<tr>
										<td><label for="txtPassword">Password</label></td>
										<td>&nbsp;</td>
										<td><input id="txtPassword" name="txtPassword" type="password" placeholder="ketik password disini"></td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td><button type="submit" class="btn btn-primary pull-right">Masuk</button></td>
									</tr>
								</table>
							</fieldset>
						</form>
					</td>
					<td style="width: 50%; padding-left: 10px;">
						<fieldset>
							<legend>Belum Terdaftar</legend>
							<label>
								Bagi Anda yang belum memiliki akun, silahkan 
								<a href="<?php echo base_url(); ?>index.php/page/daftar_pelanggan">klik disini</a>.
							</label>
						</fieldset>
					</td>
				</tr>
			</table>
		</div>
	</div>

	<!-- JavaScript -->
	<script src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.9.2.custom.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/myscript.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/mine.js"></script>
	<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
</body>
</html>