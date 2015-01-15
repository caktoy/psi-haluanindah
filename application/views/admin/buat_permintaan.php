<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $judul; ?> - PT. Haluan Indah Transporindo</title>
	<!-- CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/mystyle.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/flick/jquery-ui-1.9.2.custom.css">
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
				<a class="brand" href="#"><?php echo $judul; ?></a>
				<div class="nav-collapse collapse">
				</div>
			</div>
		</div>
	</div>
	<!-- Navbar -->

	<form class="form-horizontal">
		<div class="control-group">
			<label class="control-label" for="inputTujuanPengiriman">Nama Penerima</label>
			<div class="controls">
				<input type="text" id="inputTujuanPengiriman" name="txtTujuanPengiriman" placeholder="Nama Penerima">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputAlamatPenerima">Alamat Penerima</label>
			<div class="controls">
				<textarea id="inputAlamatPenerima" name="txtAlamatPenerima" placeholder="Alamat Penerima"></textarea>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputTanggalPengiriman">Tanggal Pengiriman</label>
			<div class="controls">
				<input type="text" id="inputTanggalPengiriman" class="datepicker" name="txtTglPengiriman" placeholder="No. Pengiriman">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputKotaAsal">Kota Asal</label>
			<div class="controls">
				<select id="inputKotaAsal" name="cbKotaAsal" disabled>
					<?php
					foreach ($kota as $data) {
						echo "<option value='".$data['id_kota']."'>".$data['nama_kota']."</option>";
					}
					?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputKotaTujuan">Kota Tujuan</label>
			<div class="controls">
				<select id="inputKotaTujuan" name="cbKotaTujuan">
					<?php
					foreach ($kota as $data) {
						echo "<option value='".$data['id_kota']."'>".$data['nama_kota']."</option>";
					}
					?>
				</select>
			</div>
		</div>
		<div class="form-actions">
			<a href="<?php echo base_url(); ?>index.php/pengiriman/barang" class="btn btn-primary">Lanjut</a>
			<!--<button type="submit" class="btn btn-primary">Simpan dan Lanjut</button>-->
			<button type="button" class="btn" onclick="win_close()">Keluar</button>
		</div>
	</form>

	<!-- JavaScript -->
	<script src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.9.2.custom.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/myscript.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/mine.js"></script>
	<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
</body>
</html>