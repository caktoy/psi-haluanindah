<?php
echo heading('Ubah Data Biaya Pengiriman', 3);
if (count($barang) > 0) {
	foreach ($barang as $data) {
		$id = $data['id_barang'];
		$id_jenis = $data['id_jenis_barang'];
		$jenis_barang = $this->mjenis->getJenisById($id_jenis);
		$nama = $data['nama_barang'];
		$berat = $data['berat_barang'];
		$satuan = $data['satuan_barang'];
	}
?>
<div class="well well-small">
	<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/barang/update">
		<input type="hidden" name="txtIdBarang" value="<?php echo $id; ?>">
		<div class="control-group">
			<label class="control-label" for="inputNamaBarang">Nama Barang</label>
			<div class="controls">
				<input type="text" id="inputNamaBarang" name="txtNamaBarang" placeholder="Nama Barang" 
					value="<?php echo $nama; ?>">
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
				<input type="number" id="inputBeratBarang" class="span1" name="txtBeratBarang" placeholder="Berat" 
					value="<?php echo $berat; ?>">
				<select class="input-small" name="cbSatuanBarang">
					<option value="kg">kg</option>
					<option value="liter">liter</option>
					<option value="kubik">kubik</option>
					<option value="kw">kw</option>
				</select>
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