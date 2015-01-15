<div>
	<h3>Daftar Kota Dan Provinsi</h3>
	<p>Berikut adalah daftar Kota dan Provinsi yang ada.</p>
	<div class="well well-small">
		<h4>Operasi Data</h4>
		<form class="form-inline">
			<input type="text" name="inputKataKunci" placeholder="Kata Kunci">
			<select name="inputFilterBy">
				<option>Provinsi</option>
				<option>Kota</option>
			</select>
			<button type="submit" class="btn">Cari</button> | 
			<a href="#modalTambahProvinsi" role="button" class="btn btn-primary" data-toggle="modal">Tambah Provinsi</a>
			<a href="#modalTambahKota" role="button" class="btn btn-primary" data-toggle="modal">Tambah Kota</a>
		</form>
		Opsi : 
		<a href="#modalLihatProvinsi" role="button" data-toggle="modal">Lihat Semua Data Provinsi</a>
	</div>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>No.</th>
				<th>Provinsi</th>
				<th>Kota</th>
				<th>Pilihan</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			if (count($kota) > 0) {
				$idx = 1;
				foreach ($kota as $list) {
					echo "<tr>";
					echo "<td>".$idx."</td>";
					echo "<td>".$list['nama_provinsi']."</td>";
					echo "<td>".$list['nama_kota']."</td>";
					echo "<td>";
					//echo "<a href=#>Ubah Provinsi</a>";
					//echo nbs(2)."/".nbs(2);
					echo "<a href=#>Ubah Kota</a>";
					echo nbs(2)."/".nbs(2);
					echo "<a href=#>Hapus Kota</a>";
					echo "</td>";
					echo "</tr>";
					$idx++;
				}
			} else {
				echo "<tr><td colspan='4'>Tidak ada data yang bisa ditampilkan.</td></tr>";
			}
			?>
		</tbody>
	</table>
</div>

<!-- Modal Tambah Provinsi -->
<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/provinsi/add">
<div id="modalTambahProvinsi" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Tambah Data Provinsi</h3>
	</div>
	<div class="modal-body">
			<div class="control-group">
				<label class="control-label" for="inputNamaProvinsi">Nama Provinsi</label>
				<div class="controls">
					<input type="text" id="inputNamaProvinsi" name="inputNamaProvinsi" placeholder="Provinsi">
				</div>
			</div>
	</div>
	<div class="modal-footer">
		<button type="submit" class="btn btn-primary">Simpan</button>
		<button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
	</div>
</div>
</form>

<!-- Modal Tambah Kota -->
<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/kota/add">
<div id="modalTambahKota" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Tambah Data Kota</h3>
	</div>
	<div class="modal-body">
			<div class="control-group">
				<label class="control-label" for="inputPilihProvinsi">Nama Provinsi</label>
				<div class="controls">
					<select name="inputPilihProvinsi">
						<?php 
						foreach ($provinsi as $list) {
							echo "<option value=".$list['id_provinsi'].">";
							echo $list['nama_provinsi'];
							echo "</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputNamaKota">Nama Kota</label>
				<div class="controls">
					<input type="text" id="inputNamaKota" name="inputNamaKota" placeholder="Nama">
				</div>
			</div>
	</div>
	<div class="modal-footer">
		<button type="submit" class="btn btn-primary">Simpan</button>
		<button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
	</div>
</div>
</form>

<!-- Modal Lihat Provinsi -->
<div id="modalLihatProvinsi" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Data Provinsi</h3>
	</div>
	<div class="modal-body">
		<table class="table table-hover">
			<thead>
				<tr>
					<th width="40px">No.</th>
					<th>Nama Provinsi</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$idx = 1; 
				foreach ($provinsi as $list) {
					echo "<tr>";
					echo "<td>".$idx."</td>";
					echo "<td>".$list['nama_provinsi']."</td>";
					echo "<td><a href=#>Ubah</a></td>";
					echo "</tr>";
					$idx++;
				}
				?>
			</tbody>
		</table>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Kembali</button>
	</div>
</div>