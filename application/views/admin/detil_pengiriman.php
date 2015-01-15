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

	<?php
	if (count($pengiriman) > 0) {
		foreach ($pengiriman as $data) {
			$id = $data['id_pengiriman'];
			$nama = $data['nama_penerima'];
			$tgl = date('d F Y', strtotime($data['tgl_pengiriman']));
			$kota = $data['kota_tujuan'];
			$biaya = $data['biaya_pengiriman'];
			$tujuan = $data['tujuan_pengiriman'];
			$alamat = $data['alamat_penerima'];
			$berat = $data['berat_pengiriman'];
		}
	?>

	<form class="form-horizontal">
		<div class="control-group">
			<label class="control-label" for="inputNoPengiriman">No. Pengiriman</label>
			<div class="controls">
				<input type="text" id="inputNoPengiriman" value="<?php echo $id; ?>" disabled>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputTanggalPengiriman">Tanggal Pengiriman</label>
			<div class="controls">
				<input type="text" id="inputTanggalPengiriman" value="<?php echo $tgl; ?>" disabled>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputNamaPenerima">Nama Penerima</label>
			<div class="controls">
				<input type="text" id="inputNamaPenerima" value="<?php echo $nama; ?>" disabled>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputTujuanPengiriman">Tujuan Pengiriman</label>
			<div class="controls">
				<input type="text" id="inputTujuanPengiriman" value="<?php echo $tujuan; ?>" disabled>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputAlamatPengiriman">Alamat Pengiriman</label>
			<div class="controls">
				<textarea id="inputAlamatPengiriman" disabled><?php echo $alamat; ?></textarea>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputKotaTujuan">Kota Tujuan</label>
			<div class="controls">
				<input type="text" id="inputKotaTujuan" value="<?php echo $kota; ?>" disabled>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Operasi</label>
			<div class="controls">
				<a href="#modal" role="button" data-toggle="modal">
					Buat Surat Pengambilan Barang
				</a><br>
				<a href="<?php echo base_url(); ?>index.php/pengiriman/buat_surat_pengiriman/<?php echo $id; ?>">
					Buat Surat Pengiriman
				</a>
			</div>
		</div>
		<div class="form-actions">
			<button type="button" class="btn pull-right" onclick="win_close()">Keluar</button>
		</div>
	</form>

	<?php
	} else {
		echo "<div class='well well-small'>Terjadi kesalahan saat mengambil data.</div>";
	}
	?>

	<!-- Modal Tambah Provinsi -->
	<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/pengiriman/pengambilan_barang">
	<div id="modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			<h3 id="myModalLabel">Buat Surat Pengambilan Barang</h3>
		</div>
		<div class="modal-body">
			<input type="hidden" name="txtNoPengiriman" value="<?php echo $id; ?>">
			<input type="hidden" name="txtTglPengiriman" value="<?php echo $tgl; ?>">
			<input type="hidden" name="txtNamaPenerima" value="<?php echo $nama; ?>">
			<input type="hidden" name="txtTujuanPengiriman" value="<?php echo $tujuan; ?>">
			<input type="hidden" name="txtAlamatPenerima" value="<?php echo $alamat; ?>">
			<input type="hidden" name="txtKotaTujuan" value="<?php echo $kota; ?>">
			<div class="control-group">
				<label class="control-label" for="inputNamaKaryawan">Nama Karyawan</label>
				<div class="controls">
					<input type="text" id="inputNamaKaryawan" name="inputNamaKaryawan" placeholder="Nama Karyawan">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputTanggalNik">NIK</label>
				<div class="controls">
					<input type="text" id="inputTanggalNik" name="inputTanggalNik" placeholder="NIK">
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-primary">Simpan</button>
			<button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
		</div>
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