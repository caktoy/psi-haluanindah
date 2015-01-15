<!DOCTYPE html>
<html>
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
			<label class="control-label">Daftar Barang</label>
			<div class="controls">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>No.</th>
							<th>Nama Barang</th>
							<th>Berat</th>
						</tr>
					</thead>
				</table>
				<a href="#myModal" role="button" class="btn btn-primary" data-toggle="modal">
					<i class="icon-plus-sign icon-white"></i>&nbsp;Tambah Barang
				</a>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputTotalBerat">Total Berat</label>
			<div class="controls">
				<input type="text" id="inputTotalBerat" class="input-small" name="txtTotalBerat" placeholder="00" disabled>
			</div>
		</div>
		<div class="form-actions">
			<a href="javascript:window.back();" class="btn btn-warning">Kembali</a>
			<button type="submit" class="btn btn-success">Simpan</button>
			<button type="button" class="btn btn-danger" onclick="win_close()">Keluar</button>
		</div>
	</form>

	<!-- Modal -->
	<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/barang/add">
		<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 id="myModalLabel">Tambah Data Barang</h3>
			</div>
			<div class="modal-body">
				<p>Silahkan isi data barang yang ingin ditambahkan.</p>
				<div class="control-group">
					<label class="control-label" for="inputNamaBarang">Nama Barang</label>
					<div class="controls">
						<input type="text" id="inputNamaBarang" name="txtNamaBarang" placeholder="Nama Barang">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="inputJenisBarang">Jenis Barang</label>
					<div class="controls">
						<select id="inputJenisBarang" name="cbJenisBarang">
							<?php
							foreach ($jenis as $data) {
								echo "<option value='".$data['id_jenis_barang']."'>".$data['jenis_barang']."</option>";
							}
							?>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="inputBeratBarang">Berat Barang</label>
					<div class="controls">
						<input type="number" id="inputBeratBarang" class="input-small" name="txtBeratBarang" placeholder="Berat">
						<select class="input-small" name="cbSatuanBarang">
							<option value="kg">kg</option>
							<option value="liter">liter</option>
							<option value="kubik">kubik</option>
							<option value="kw">kw</option>
						</select>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary">Simpan</button>
				<button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
			</div>
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