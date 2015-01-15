<?php
echo heading('Ubah Data Customer', 3);
if (count($customer) > 0) {
	foreach ($customer as $data) {
		$id 		= $data['id_cust'];
		$bidang 	= $data['nama_bidang_kerja'];
		$email 		= $data['email_cust'];
		$password 	= $data['password_cust'];
		$nama 		= $data['nama_cust'];
		$jk 		= $data['jenis_kel_cust'];
		$tgl 		= $data['tgl_lahir_cust'];
		$alamat 	= $data['alamat_cust'];
		$kota 		= $data['kota_cust'];
		$telp 		= $data['no_telp_cust'];
		$perusahaan = $data['perusahaan_cust'];
		$alamat_p	= $data['alamat_per_cust'];
		if ($jk == 'L') $jenkel = 'Laki-laki';
		else $jenkel = 'Perempuan';
	}
?>
<p>Silahkan isi data <i>customer</i> yang ingin ditambahkan.</p>
<div class="well well-small">
<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/customer/update_cust">
	<div>
		<fieldset>
			<legend>Email dan Password</legend>
			<input type="hidden" value="<?php echo $id; ?>">
			<div class="control-group">
				<label class="control-label" for="inputEmailCust">Email</label>
				<div class="controls">
					<input class="span4" type="text" id="inputEmailCust" name="txtEmailCust" placeholder="Email"
						value="<?php echo $email; ?>">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputPasswordCust">Password</label>
				<div class="controls">
					<input type="password" class="span4" id="inputPasswordCust" name="txtPasswordCust" 
						placeholder="Password" value="<?php echo $password; ?>">
				</div>
			</div>
		</fieldset>
		<fieldset>
			<legend>Data Pribadi <i>Customer</i></legend>
			<div class="control-group">
				<label class="control-label" for="inputNamaCust">Nama Lengkap</label>
				<div class="controls">
					<input type="text" class="span4" id="inputNamaCust" name="txtNamaCust" placeholder="Nama Lengkap" 
						value="<?php echo $nama; ?>">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="rbJenisKelCust">Jenis Kelamin</label>
				<div class="controls">
					<label class="radio inline">
					<input type="radio" name="rbJenisKelCust" id="orLakiLaki" value="L">
						Laki-laki
					</label>
					<label class="radio inline">
						<input type="radio" name="rbJenisKelCust" id="orPerempuan" value="P">
						Perempuan
					</label>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="txtTglLahirCust">Tanggal Lahir</label>
				<div class="controls">
					<input type="text" class="span4" name="txtTglLahirCust" class="datepicker" 
						value="<?php echo $tgl; ?>" 
						placeholder="Tanggal Lahir">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="txtAlamatCust">Alamat</label>
				<div class="controls">
					<textarea class="span4" class="span4" name="txtAlamatCust" id="inputAlamat" rows="3" 
						placeholder="Alamat"><?php echo $alamat; ?></textarea>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="txtKotaCust">Kota</label>
				<div class="controls">
					<input type="text" class="span4" name="txtKotaCust" value="<?php echo $kota; ?>" 
						placeholder="Kota">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="txtNoTelpCust">No. Telepon</label>
				<div class="controls">
					<input type="text" class="span4" name="txtNoTelpCust" id="txtNoTelpCust" 
						value="<?php echo $telp; ?>" 
						placeholder="No. Telepon">
				</div>
			</div>
		</fieldset>
		<fieldset>
			<legend>Informasi Perusahaan</legend>
			<div class="control-group">
				<label class="control-label" for="txtPerusahaanCust">Nama Perusahaan</label>
				<div class="controls">
					<input type="text" class="span4" name="txtPerusahaanCust" id="txtPerusahaanCust" 
						value="<?php echo $perusahaan; ?>" 
						placeholder="Nama Perusahaan">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="cbBidangKerja">Bidang Kerja</label>
				<div class="controls">
					<select name="cbBidangKerja" id="inputPekerjaan" class="span4">
						<?php
						foreach ($bid as $option) {
							echo "<option value='".$option['id_bidang_kerja']."'>".$option['nama_bidang_kerja']."</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="txtAlamatPerCust">Alamat Perusahaan</label>
				<div class="controls">
					<textarea class="span4" id="txtAlamatPerCust" name="txtAlamatPerCust" rows="3" 
						placeholder="Alamat Perusahaan"><?php echo $alamat_p; ?></textarea>
				</div>
			</div>
		</fieldset>
	</div>
	<div class="modal-footer">
		<button type="submit" class="btn btn-primary">Simpan</button>
		<a href="<?php echo base_url(); ?>index.php/pg_admin/customer" class="btn">Kembali</a>
	</div>
</form>
</div>
<?php
} else {
	echo "<div class='well well-small'>Terjadi kesalahan saat mengambil data.</div>";
}
?>