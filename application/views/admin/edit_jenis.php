<?php
echo heading('Ubah Data Jenis Barang', 3);
if (count($jenis) > 0) {
	foreach ($jenis as $data) {
		$id = $data['id_jenis_barang'];
		$nama = $data['jenis_barang'];
	}
?>
<div class="well well-small">
	<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/jenis_barang/update">
		<input type="hidden" name="txtIdJenisBarang" value="<?php echo $id; ?>">
		<div class="control-group">
			<label class="control-label" for="inputJenisBarang">Jenis Barang</label>
			<div class="controls">
				<input type="text" id="inputJenisBarang" name="txtJenisBarang" placeholder="Jenis Barang" 
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