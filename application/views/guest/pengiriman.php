<?php 
echo heading('Permintaan Pengiriman Barang', 3);
$id_cust = $this->session->userdata('id_cust');
?>
<div class="well well-small">
	Opsi: <a href="<?php echo base_url(); ?>index.php/pengiriman/list_pengiriman/<?php echo $id_cust; ?>">Lihat Riwayat Permintaan Pengiriman Barang</a>
</div>
<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/pengiriman/buat_pengiriman_cust">
	<input type="hidden" name="txtIdPengiriman" value="<?php echo $id; ?>">
	<div class="control-group">
		<label class="control-label" for="txtTglPengiriman">Tanggal Pengiriman</label>
		<div class="controls">
			<input type="text" id="txtTglPengiriman" class="datepicker" name="txtTglPengiriman" placeholder="YYYY-MM-DD">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="cbKotaAsal">Kota Asal</label>
		<div class="controls">
			<select id="cbKotaAsal" class="span4" name="cbKotaAsal">
				<option value="1">Surabaya</option>
				<?php
				//foreach ($kota as $k) {
				//	echo "<option value='".$k['id_kota']."'>".$k['nama_kota']."</option>";
				//}
				?>
			</select>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="cbKotaTujuan">Kota Tujuan</label>
		<div class="controls">
			<select id="cbKotaTujuan" class="span4" name="cbKotaTujuan">
				<?php
				foreach ($kota1 as $k1) {
					echo "<option value='".$k1['id_kota']."'>".$k1['nama_kota']."</option>";
				}
				?>
			</select>
		</div>
	</div>
	<!--<div class="control-group">
		<label class="control-label" for="txtBiayaPengiriman">Biaya Pengiriman (Rp)</label>
		<div class="controls">
			<input type="number" id="txtBiayaPengiriman" name="txtBiayaPengiriman" placeholder="Biaya Pengiriman" disabled>
		</div>
	</div>-->
	<div class="control-group">
		<label class="control-label" for="txtNamaPenerima">Nama Penerima</label>
		<div class="controls">
			<input type="text" id="txtNamaPenerima" class="span4" name="txtNamaPenerima" placeholder="Nama Penerima">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="txtTujuanPengiriman">Organisasi Penerima</label>
		<div class="controls">
			<input type="text" id="txtTujuanPengiriman" class="span4" name="txtTujuanPengiriman" placeholder="Organisasi Penerima">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="txtAlamatPenerima">Alamat Pengiriman</label>
		<div class="controls">
			<textarea id="txtAlamatPenerima" class="span4" name="txtAlamatPenerima" rows="3" placeholder="Alamat Pengiriman"></textarea>
		</div>
	</div>
	<div class="form-actions">
    	<button type="submit" class="btn btn-primary">Lanjut</button>
    	<a href="<?php echo base_url(); ?>" class="btn">Batal</a>
    </div>
</form>