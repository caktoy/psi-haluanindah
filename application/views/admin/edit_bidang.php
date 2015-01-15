<?php
echo heading('Ubah Data Bidang Kerja', 3);
if (count($bidang) > 0) {
	foreach ($bidang as $data) {
		$id = $data['id_bidang_kerja'];
		$nama = $data['nama_bidang_kerja'];
	}
?>
<div class="well well-small">
	<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/bidang_kerja/update">
		<input type="hidden" name="txtIdBidangKerja" value="<?php echo $id; ?>">
		<div class="control-group">
			<label class="control-label" for="inputNamaBidangKerja">Nama Bidang Kerja</label>
			<div class="controls">
				<input type="text" id="inputBidangKerja" name="txtNamaBidangKerja" placeholder="Bidang Kerja" 
					value="<?php echo $nama; ?>">
			</div>
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-primary">Simpan</button>
			<button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
		</div>
	</form>
</div>
<?php
} else {
	echo "<div class='well well-small'>Terjadi kesalahan saat mengambil data.</div>";
}
?>