<h3>Barang</h3>
<p>Berikut adalah daftar barang:</p>
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
				<th>Nama Barang</th>
				<th>Berat Barang</th>
				<th>Jenis Barang</th>
				<th>Pilihan</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			if (count($barang) > 0) {
				$idx = 1;
				foreach ($barang as $list) {
					echo "<tr>";
					echo "<td>".$idx."</td>";
					echo "<td>".$list['nama_barang']."</td>";
					echo "<td>".$list['berat_barang']." ".$list['satuan_barang']."</td>";
					echo "<td>".$list['jenis_barang']."</td>";
					echo "<td>";
					echo anchor('barang/edit/'.$list['id_barang'], 'Ubah', '');
					echo nbs(2)."/".nbs(2);
					echo anchor('barang/remove/'.$list['id_barang'], 'Hapus', '');
					echo "</td>";
					echo "</tr>";
					$idx++;
				}
			} else {
				echo "<tr><td colspan='5'>Tidak ada data yang bisa ditampilkan.</td></tr>";
			}
			?>
		</tbody>
	</table>
</div>
<?php echo $paging; ?>
<!-- Modal -->
<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/barang/add">
	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">Tambah Data Barang</h3>
		</div>
		<div class="modal-body">
			<p>Silahkan isi data barang yang ingin ditambahkan.</p>
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