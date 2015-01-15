<?php
echo heading($judul, 3);
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
	if (count($sum_berat) > 0) {
		foreach ($sum_berat as $s) {
			$id_pengiriman = $s['id_pengiriman'];
			$tot_berat = $s['tot_berat'];
		}
	} else {
		$tot_berat = 0;
	}
	if (count($no_resi) > 0) {
		foreach ($no_resi as $n) {
			$num_resi = $n['no_resi'];
		}
	}
	if (count($id_barang) > 0) {
		foreach ($id_barang as $v) {
			$id_b = $v['id_barang'];
		}
	}
}

?>
<fieldset>
	<legend>Detil Pengiriman</legend>
	<table border="1px" cellpadding="5px" cellspacing="5px" style="font-size:11px;">
		<thead>
			<tr style="background: #eee;">
				<th>No. Pengiriman</th>
				<th>Nomer Resi</th>
				<th>Tanggal</th>
				<th>Penerima</th>
				<th>Alamat Pengiriman</th>
				<th>Biaya Pengiriman<br>(per kilogram)</th>
				<th>Total Biaya</th>
			</tr>
		</thead>
		<tbody>
			<tr valign="top">
				<td><?php echo $id; ?></td>
				<td><?php echo $num_resi; ?></td>
				<td><?php echo date('d/m/Y', strtotime($tgl)); ?></td>
				<td><?php echo $nama." - ".$tujuan; ?></td>
				<td><?php echo $alamat." - ".$kota; ?></td>
				<td>Rp<?php echo number_format($biaya, 0, ",", "."); ?>,00</td>
				<td><?php echo "Rp".number_format($biaya*$tot_berat, 0, ",", ".").",00"; ?></td>
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
					echo "<tr>";
					echo "<td>".$idx."</td>";
					echo "<td>".$d['nama_barang']."</td>";
					echo "<td>".$d['berat_barang']." Kg</td>";
					echo "<td>".anchor('barang/remove_detil/'.$d['id_barang'].'/'.$id, 'Hapus', '')."</td>";
					echo "</tr>";
					$idx++;
				}
			} else {
				echo "<td colspan='4'>Tidak ada data yang ditampilkan.</td>";
			}
			?>
		</tbody>
	</table>
	<label for="txtTotalBerat" class="label-inline">Total Berat:&nbsp;
		<input type="text" id="txtTotalBerat" name="txtTotalBerat" class="input-small" value="<?php echo $tot_berat; ?>" disabled>
		<a href="#modalTambahBarang" role="button" class="btn btn-success pull-right" data-toggle="modal">
			<i class="icon-white icon-plus"></i>&nbsp;Tambah Barang
		</a>
	</label>
	<a href="javascript:;" onclick="win_popup('<?php echo base_url(); ?>index.php/pengiriman/cetak_detil/<?php echo $id; ?>', 800, 600);" 
		class="btn btn-primary">
		<i class="icon-print icon-white"></i>&nbsp;Cetak</a>
	<a href="javascript:window.back();" class="btn btn-primary pull-right"><i class="icon-ok-circle icon-white"></i>&nbsp;Selesai</a>
	<!-- Modal -->
	<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/pengiriman/add_barang">
		<div id="modalTambahBarang" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel">Tambah Data Barang</h3>
			</div>
			<div class="modal-body">
				<p>Silahkan isi data barang yang ingin ditambahkan.</p>
				<input type="hidden" name="txtIdPengiriman" value="<?php echo $id; ?>">
				<input type="hidden" name="txtIdBarang" value="<?php echo $id_b+1; ?>">
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
							<!--<option value="liter">liter</option>
							<option value="kubik">kubik</option>
							<option value="kw">kw</option>-->
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