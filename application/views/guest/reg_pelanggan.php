<h3>Daftar Pelanggan Baru</h3>
<p>
	Silahkan mengisi form dibawah ini untuk mendaftar sebagai pelanggan baru. Nikmati berbagai kemudahan
	dalam pelayanan kami yang kami tawarkan kepada Anda. Setelah Anda mendaftar dan memiliki akun,
	Anda dapat mengakses website ini dengan leluasa untuk mengurus pengiriman barang Anda.
</p>
<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/customer/add_cust">
	<fieldset>
		<legend>Email</legend>
		<p><small>Masukkan <em>email</em> dan <em>password</em> yang akan Anda gunakan untuk Login.</small></p>
		<div class="control-group">
			<label class="control-label" for="inputEmail">Email</label>
			<div class="controls">
				<input type="email" class="span4" name="inputEmail" id="inputEmail" placeholder="Email">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Password</label>
			<div class="controls">
				<input type="password" class="span4" name="inputPassword" id="inputPassword" placeholder="Password">
			</div>
		</div>
	</fieldset>
	<fieldset>
		<legend>Identitas Pribadi</legend>
		<div class="control-group">
			<label class="control-label" for="inputNamaLengkap">Nama Lengkap</label>
			<div class="controls">
				<input type="text" class="span4" name="inputNamaLengkap" id="inputNamaLengkap" placeholder="Nama Lengkap">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputJenisKelamin">Jenis Kelamin</label>
			<div class="controls">
				<label class="radio inline">
					<input type="radio" name="inputJenisKelamin" id="orLakiLaki" value="L">
					Laki-laki
				</label>
				<label class="radio inline">
					<input type="radio" name="inputJenisKelamin" id="orPerempuan" value="P">
					Perempuan
				</label>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputTanggalLahir">Tanggal Lahir</label>
			<div class="controls">
				<input type="text" name="inputTanggalLahir" class="datepicker" placeholder="Tanggal Lahir">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputAlamat">Alamat</label>
			<div class="controls">
				<textarea class="span4" name="inputAlamat" id="inputAlamat" rows="3" placeholder="Alamat"></textarea>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputKota">Kota</label>
			<div class="controls">
				<input type="text" class="span4" name="inputKota" id="inputKota" 
					placeholder="Kota">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputNoTelepon">No. Telepon</label>
			<div class="controls">
				<input type="number" class="span4" name="inputNoTelepon" id="inputNoTelepon" 
					placeholder="No. Telepon">
			</div>
		</div>
	</fieldset>
	<fieldset>
		<legend>Informasi Perusahaan</legend>
		<div class="control-group">
			<label class="control-label" for="inputNamaPerusahaan">Nama Perusahaan</label>
			<div class="controls">
				<input type="text" class="span4" name="inputNamaPerusahaan" id="inputNamaPerusahaan" 
					placeholder="Nama Perusahaan">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPekerjaan">Bidang Kerja</label>
			<div class="controls">
				<select name="inputPekerjaan" id="inputPekerjaan" class="span4">
					<?php
					foreach ($bidang as $option) {
						echo "<option value='".$option['id_bidang_kerja']."'>".$option['nama_bidang_kerja']."</option>";
					}
					?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputAlamatPerusahaan">Alamat Perusahaan</label>
			<div class="controls">
				<textarea id="inputAlamatPerusahaan" class="span4" name="inputAlamatPerusahaan" rows="3" 
					placeholder="Alamat Perusahaan"></textarea>
			</div>
		</div>
	</fieldset>
	<fieldset>
		<legend>Persetujuan</legend>
		<div class="control-group">
			<div class="controls">
				<label class="checkbox">
					<input type="checkbox"> Saya telah membaca dan menyetujui mengenai <a href="#">Perjanjian & Peraturan Layanan</a>.
				</label>
			</div>
		</div>
	</fieldset>
	<div class="form-actions">
		<button type="submit" class="btn btn-primary">Daftar</button>
		<a href="<?php echo base_url(); ?>" class="btn">Batal</a>
	</div>
</form>