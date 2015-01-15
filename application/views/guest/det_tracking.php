<?php
echo heading($judul, 3);
if (count($tracking) > 0) {
	foreach ($tracking as $t) {
		$no_resi = $t['no_resi'];
		$id_pengiriman = $t['id_pengiriman'];
		$id_cust = $t['id_cust'];
		$status_pengiriman = $t['status_pengiriman'];
		$tanggal = $t['tanggal'];
		$posisi = $t['posisi'];
		$keterangan = $t['keterangan'];
	}
?>
<label class="label-inline" for="txtNoResi">Nomer Resi: &nbsp;
	<input type="text" id="txtNoResi" value="<?php echo $no_resi; ?>" disabled>
</label>
<fieldset>
	<legend>Detil Pengiriman</legend>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Tanggal</th>
				<th>Lokasi</th>
				<th>Status Pengiriman</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if (count($tracking) > 0) {
				foreach ($tracking as $t) {
					$status_pengiriman = $t['status_pengiriman'];
					$tanggal = date('d M Y', strtotime($t['tanggal']));
					$posisi = $t['posisi'];

					echo "<tr>";
					echo "<td>".$tanggal."</td>";
					echo "<td>".$posisi."</td>";
					echo "<td>".$status_pengiriman."</td>";
					echo "</tr>";
				}
			} else {
				echo "<tr><td colspan='3'>Tidak ada data yang ditampilkan.</td></tr>";
			}
			?>
		</tbody>
	</table>
</fieldset>
<fieldset>
	<legend>Detil Barang</legend>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>No.</th>
				<th>Nama Barang</th>
				<!--<th>Jenis</th>-->
				<th>Berat</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if (count($detil_barang) > 0) {
				$idx = 1;
				foreach ($detil_barang as $d) {
					echo "<tr>";
					echo "<td>".$idx."</td>";
					echo "<td>".$d['nama_barang']."</td>";
					echo "<td>".$d['berat_barang']." Kg</td>";
					echo "</tr>";
					$idx++;
				}
			} else {
				echo "<td colspan='3'>Tidak ada data yang ditampilkan.</td>";
			}
			?>
		</tbody>
	</table>
</fieldset>
<fieldset>
	<?php
	if (!empty($detil_pengiriman)) {
		foreach ($detil_pengiriman as $value) {
			$nama = $value['nama_penerima'];
			$tujuan = $value['tujuan_pengiriman'];
			$kota = $value['kota_tujuan'];
			$biaya = $value['biaya_pengiriman'];
			$alamat = $value['alamat_penerima'];
			$berat = $value['berat_pengiriman'];
		}
	} else {
		$nama = ''; $tujuan = ''; $kota = ''; $biaya = ''; $alamat = ''; $berat = '';
	}
	?>
	<legend>Informasi Lainnya</legend>
	<table cellpadding="5px" cellspacing="5px">
		<tr>
			<td>Nama Penerima</td>
			<td>:</td>
			<td><?php echo $nama; ?></td>
		</tr>
		<tr>
			<td>Tujuan Pengiriman</td>
			<td>:</td>
			<td><?php echo $tujuan." - ".$alamat.", ".$kota; ?></td>
		</tr>
		<tr>
			<td>Total Berat Pengiriman</td>
			<td>:</td>
			<td><?php echo $berat." Kg"; ?></td>
		</tr>
		<tr>
			<td>Biaya Pengiriman</td>
			<td>:</td>
			<td>Rp<?php echo number_format($berat*$biaya, 0, ",", "."); ?>,00</td>
		</tr>
		<tr>
			<td>Status Pembayaran</td>
			<td>:</td>
			<td>LUNAS</td>
		</tr>
	</table>
</fieldset>
<?php
} else {
	echo "<div>Terjadi kegagalan saat mengambil data.</div>";
}
?>
<div class="form-actions">
	<button class="btn btn-primary pull-right" onclick="javascript:window.back();">
		<i class="icon-chevron-left icon-white"></i>&nbsp;Kembali
	</button>
</div>