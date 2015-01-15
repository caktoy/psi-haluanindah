<?php
echo heading($judul, 3);
if (count($status) > 0) {
	foreach ($status as $data) {
		$status = $data['status_pengiriman'];
		$keterangan = $data['keterangan'];
	}
?>
<div class="well well-small">
	<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/status/update">
		<div class="control-group">
			<label class="control-label" for="inputStatusPengiriman">Status Pengiriman</label>
			<div class="controls">
				<input type="text" id="inputStatusPengiriman" name="txtStatusPengiriman" placeholder="Status Pengiriman" value="<?php echo $status; ?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputKeterangan">Keterangan</label>
			<div class="controls">
				<textarea id="inputKeterangan" name="txtKeterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea>
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