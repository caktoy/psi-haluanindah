<?php
echo heading('Data Pengiriman Barang', 3);
if (count($pengiriman) > 0) {
	foreach ($pengiriman as $p) {
		$id = $p['id_pengiriman'];
		$nama = $p['nama_penerima'];
		$tgl = $p['tgl_pengiriman'];
		$kota = $p['kota_tujuan'];
		$biaya = $p['biaya_pengiriman'];
		$tujuan = $p['tujuan_pengiriman'];
		$alamat = $p['alamat_penerima'];
		$berat = $p['berat_pengiriman'];
	}
}
?>
<fieldset>
	<legend>Detil Pengiriman</legend>
	<table border="1px" cellpadding="5px" cellspacing="5px">
		<thead>
			<tr>
				<th>No. Pengiriman</th>
				<th>Tanggal</th>
				<th>Penerima</th>
				<th>Alamat Pengiriman</th>
				<th>Biaya Pengiriman (10Kg)</th>
			</tr>
		</thead>
		<tbody>
			<tr valign="top">
				<td><?php echo $id; ?></td>
				<td><?php echo date('d/m/Y', strtotime($tgl)); ?></td>
				<td><?php echo $nama." - ".$tujuan; ?></td>
				<td><?php echo $alamat." - ".$kota; ?></td>
				<td>Rp<?php echo number_format($biaya, 0, ",", "."); ?>,00</td>
			</tr>
		</tbody>
	</table>
</fieldset>

<fieldset>
	<legend>Data Barang</legend>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>No.</th>
				<th>Nama Barang</th>
				<th>Berat Barang</th>
				<th>Opsi</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if (count($detil_pengiriman) > 0) {
				$idx = 1;
				foreach ($detil_pengiriman as $d) {
					echo "<td>".$idx."</td>";
					echo "<td>".$d['nama_barang']."</td>";
					echo "<td>".$d['berat_barang']."</td>";
					echo "<td>".anchor('barang/remove_detil/'.$d['id_barang'].'/'.$id, 'Hapus', '')."</td>";
					$idx++;
				}
			} else {
				echo "<td colspan='4'>Tidak ada data yang ditampilkan.</td>";
			}
			?>
		</tbody>
	</table>
	<?php
	if (count($sum_berat) > 0) {
		foreach ($sum_berat as $s) {
			$id_pengiriman = $s['id_pengiriman'];
			$tot_berat = $s['tot_berat'];
			$berat += $tot_berat;
		}
	}
	?>
	<label for="txtTotalBerat" class="label-inline">Total Berat:&nbsp;
		<input type="text" id="txtTotalBerat" name="txtTotalBerat" class="input-small" value="<?php echo $berat; ?>" disabled>
		<a href="#modalTambahBarang" role="button" class="btn btn-success pull-right" data-toggle="modal">
			<i class="icon-white icon-plus"></i>&nbsp;Tambah Barang
		</a>
	</label>
	<a href="<?php echo base_url(); ?>" class="btn btn-primary pull-right">Selesai</a>
	<!-- Modal -->
	<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/barang/add_by_cust">
		<div id="modalTambahBarang" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel">Tambah Data Barang</h3>
			</div>
			<div class="modal-body">
				<p>Silahkan isi data barang yang ingin ditambahkan.</p>
				<input type="hidden" name="txtIdPengiriman" value="<?php echo $id; ?>">
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
						<input type="number" id="inputBeratBarang" class="span1" name="txtBeratBarang" placeholder="Berat">
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
</fieldset>