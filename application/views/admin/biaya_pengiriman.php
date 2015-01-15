<h3>Biaya Pengiriman</h3>
<p>Berikut adalah daftar biaya pengiriman:</p>
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
				<th>Kota Asal</th>
				<th>Kota Tujuan</th>
				<th>Total Berat (Kg)</th>
				<th>Biaya (Rp)</th>
				<th>Pilihan</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			if (count($biaya) > 0) {
				$idx = 1;
				foreach ($biaya as $list) {
					echo "<tr>";
					echo "<td>".$idx."</td>";
					echo "<td>".$list['id_kota_asal']."</td>";
					echo "<td>".$list['id_kota_tujuan']."</td>";
					echo "<td>".$list['total_berat']."</td>";
					echo "<td>Rp".number_format($list['biaya'], 0, ",", ".").",00</td>";
					echo "<td>";
					echo anchor('biaya/edit/'.$list['id_biaya'], 'Ubah', '');
					echo nbs(2)."/".nbs(2);
					echo anchor('biaya/remove/'.$list['id_biaya'], 'Hapus', '');
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
<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/biaya/add">
	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">Tambah Data Biaya Pengiriman</h3>
		</div>
		<div class="modal-body">
			<p>Silahkan isi biaya pengiriman yang ingin ditambahkan.</p>
			<div class="control-group">
				<label class="control-label" for="inputKotaAsal">Kota Asal</label>
				<div class="controls">
					<select id="inputKotaAsal" name="cbKotaAsal">
						<?php
						foreach ($kota as $data) {
							echo "<option value='".$data['id_kota']."'>".$data['nama_kota']."</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputKotaTujuan">Kota Tujuan</label>
				<div class="controls">
					<select id="inputKotaTujuan" name="cbKotaTujuan">
						<?php
						foreach ($kota as $data) {
							echo "<option value='".$data['id_kota']."'>".$data['nama_kota']."</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputTotalBerat">Total Berat</label>
				<div class="controls">
					<input type="number" id="inputTotalBerat" name="txtTotalBerat" placeholder="Berat" class="input-small"> Kg
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputBiaya">Biaya Pengiriman</label>
				<div class="controls">
					Rp<input type="text" id="inputBiaya" name="txtBiaya" placeholder="Biaya" class="input-medium">,-
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-primary">Simpan</button>
			<button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
		</div>
	</div>
</form>