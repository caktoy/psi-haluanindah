<?php
echo heading($judul, 3);
if (count($tahun) > 0) {
?>
<div class="row-fluid">
	<div class="well span6">
		<form method="post" action="<?php echo base_url(); ?>index.php/laporan/bulanan">
			<fieldset>
				<legend>Laporan Bulanan</legend>
				<label class="label-inline">Pilih Tahun dan Bulan:</label>
				<select name="cbTahun" class="input-small">
					<?php
						foreach ($tahun as $value) {
							$thn = $value['tahun'];
							echo "<option value='".$thn."'>".$thn."</option>";
						}
					?>
				</select>
				<select name="cbBulan" class="input-small">
					<?php
						foreach ($bulan as $value) {
							$bln = $value['tahun'];
							echo "<option value='".$bln."'>".$bln."</option>";
						}
					?>
				</select>
			</fieldset>
			<button type="submit" class="btn btn-primary">Lihat Laporan</button>
		</form>
	</div>
	<div class="well span6">
		<form method="post" action="<?php echo base_url(); ?>index.php/laporan/tahunan">
			<fieldset>
				<legend>Laporan Tahunan</legend>
				<label class="label-inline">Pilih Tahun:</label>
				<select name="cbTahun1" class="input-small">
					<?php
						foreach ($tahun as $value) {
							$thn = $value['tahun'];
							echo "<option value='".$thn."'>".$thn."</option>";
						}
					?>
				</select>
			</fieldset>
			<button type="submit" class="btn btn-primary">Lihat Laporan</button>
		</form>
	</div>
</div>
<?php
} else {
	echo "<p>Gagal mengambil data.</p>";
}
?>