<h3>Customer</h3>
<p>Berikut adalah daftar <i>customer</i>:</p>
<form method="post" class="form-seacrh">
	<legend>Operasi</legend>
	<div class="input-append">
		<input type="text" placeholder="Cari data">
		<button type="submit" class="btn">
			<i class="icon-search"></i>&nbsp;Cari
		</button>
		<a href="#myModal" role="button" class="btn btn-primary" data-toggle="modal">
			<i class="icon-plus-sign icon-white"></i>&nbsp;Tambah Data
		</a>
	</div>
</form>
<div>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>No.</th>
				<th>Nama</th>
				<th>Email</th>
				<th>Telepon</th>
				<th>Alamat</th>
				<th>Pilihan</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			if (count($customer) > 0) {
				$idx = 1;
				foreach ($customer as $list) {
					echo "<tr>";
					echo "<td>".$idx."</td>";
					echo "<td>".$list['nama_cust']."</td>";
					echo "<td>".$list['email_cust']."</td>";
					echo "<td>".$list['no_telp_cust']."</td>";
					echo "<td>".$list['alamat_cust']." ".$list['kota_cust']."</td>";
					echo "<td>";
					echo anchor('customer/edit/'.$list['id_cust'], 'Detil', '');
					echo "</td>";
					echo "</tr>";
					$idx++;
				}
			} else {
				echo "<tr><td colspan='6'>Tidak ada data yang bisa ditampilkan.</td></tr>";
			}
			?>
		</tbody>
	</table>
</div>
<!-- Modal -->
<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/customer/add">
	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">Tambah Data Customer</h3>
		</div>
		<div class="modal-body">
			<p>Silahkan isi data <i>customer</i> yang ingin ditambahkan.</p>
			<fieldset>
				<legend>Email dan Password</legend>
				<div class="control-group">
					<label class="control-label" for="inputEmailCust">Email</label>
					<div class="controls">
						<input type="text" id="inputEmailCust" name="txtEmailCust" placeholder="Email">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="inputPasswordCust">Password</label>
					<div class="controls">
						<input type="password" id="inputPasswordCust" name="txtPasswordCust" placeholder="Password">
					</div>
				</div>
			</fieldset>
			<fieldset>
				<legend>Data Pribadi <i>Customer</i></legend>
				<div class="control-group">
					<label class="control-label" for="inputNamaCust">Nama Lengkap</label>
					<div class="controls">
						<input type="text" id="inputNamaCust" name="txtNamaCust" placeholder="Nama Lengkap">
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
						<input type="text" name="txtTglLahirCust" class="datepicker" placeholder="Tanggal Lahir">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtAlamatCust">Alamat</label>
					<div class="controls">
						<textarea name="txtAlamatCust" id="inputAlamat" rows="3" placeholder="Alamat"></textarea>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtKotaCust">Kota</label>
					<div class="controls">
						<input type="text" name="txtKotaCust" placeholder="Kota">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtNoTelpCust">No. Telepon</label>
					<div class="controls">
						<input type="number" name="txtNoTelpCust" id="txtNoTelpCust" 
							placeholder="No. Telepon">
					</div>
				</div>
			</fieldset>
			<fieldset>
				<legend>Informasi Perusahaan</legend>
				<div class="control-group">
					<label class="control-label" for="txtPerusahaanCust">Nama Perusahaan</label>
					<div class="controls">
						<input type="text" name="txtPerusahaanCust" id="txtPerusahaanCust" 
							placeholder="Nama Perusahaan">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="cbBidangKerja">Bidang Kerja</label>
					<div class="controls">
						<select name="cbBidangKerja" id="cbBidangKerja">
							<?php
							foreach ($bidang as $option) {
								echo "<option value='".$option['id_bidang_kerja']."'>".$option['nama_bidang_kerja']."</option>";
							}
							?>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtAlamatPerCust">Alamat Perusahaan</label>
					<div class="controls">
						<textarea id="txtAlamatPerCust" name="txtAlamatPerCust" rows="3" 
							placeholder="Alamat Perusahaan"></textarea>
					</div>
				</div>
			</fieldset>
		</div>
		<div class="modal-footer">
			<button class="btn btn-primary">Simpan</button>
			<button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
		</div>
	</div>
</form>