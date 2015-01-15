<?php
echo heading('Ubah Data Pengiriman', 3);
if (count($pengiriman) > 0) {
	foreach ($pengiriman as $data) {
		$id = $data['id_pengiriman'];
		$nama = $data['nama_penerima'];
		$tgl = $data['tgl_pengiriman'];
		$kota = $data['kota_tujuan'];
		$biaya = $data['biaya_pengiriman'];
		$tujuan = $data['tujuan_pengiriman'];
		$alamat = $data['alamat_penerima'];
		$berat = $data['berat_pengiriman'];
	}
?>

<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/pengiriman/update">
	<div class="control-group">
		<label class="control-label" for="inputNoPengiriman">No. Pengiriman</label>
		<div class="controls">
			<input type="text" id="inputNoPengiriman" name="txtNoPengiriman" value="<?php echo $id; ?>" disabled>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="inputTanggalPengiriman">Tanggal Pengiriman</label>
		<div class="controls">
			<input type="text" id="inputTanggalPengiriman" class="datepicker" name="txtTglPengiriman" value="<?php echo $tgl; ?>">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="inputNamaPenerima">Nama Penerima</label>
		<div class="controls">
			<input type="text" id="inputNamaPenerima" name="txtNamaPenerima" value="<?php echo $nama; ?>">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="inputTujuanPengiriman">Tujuan Pengiriman</label>
		<div class="controls">
			<input type="text" id="inputTujuanPengiriman" name="txtTujuanPengiriman" value="<?php echo $tujuan; ?>">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="inputAlamatPengiriman">Alamat Pengiriman</label>
		<div class="controls">
			<textarea id="inputAlamatPengiriman" name="txtAlamatPenerima"><?php echo $alamat; ?></textarea>
		</div>
	</div>
	<div class="form-actions" style="margin-bottom:-20px; margin-left:-20px; margin-right:-20px;">
		<a class="btn btn-primary" href="#"><i class="icon-th-list icon-white"></i>&nbsp;List Barang</a>
		<button type="submit" class="btn btn-primary">Simpan</button>
		<button type="button" class="btn" onclick="win_back()">Batal</button>
	</div>
</form>

<?php
} else {
	echo "<div class='well well-small'>Terjadi kesalahan saat mengambil data.</div>";
}
?>