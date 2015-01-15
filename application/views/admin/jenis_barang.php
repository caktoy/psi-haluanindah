<h3>Jenis Barang</h3>
<p>Berikut adalah daftar jenis barang:</p>
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
				<th>Jenis Barang</th>
				<th>Pilihan</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			if (count($jenis) > 0) {
				$idx = 1;
				foreach ($jenis as $list) {
					echo "<tr>";
					echo "<td>".$idx."</td>";
					echo "<td>".$list['jenis_barang']."</td>";
					echo "<td>";
					echo anchor('jenis_barang/edit/'.$list['id_jenis_barang'], 'Ubah', '');
					echo nbs(2)."/".nbs(2);
					echo anchor('jenis_barang/remove/'.$list['id_jenis_barang'], 'Hapus', '');
					echo "</td>";
					echo "</tr>";
					$idx++;
				}
			} else {
				echo "<tr><td colspan='3'>Tidak ada data yang bisa ditampilkan.</td></tr>";
			}
			?>
		</tbody>
	</table>
</div>
<!-- Modal -->
<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/jenis_barang/add">
	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">Tambah Data Jenis Barang</h3>
		</div>
		<div class="modal-body">
			<p>Silahkan isi jenis barang yang ingin ditambahkan.</p>
			<div class="control-group">
				<label class="control-label" for="inputJenisBarang">Jenis Barang</label>
				<div class="controls">
					<input type="text" id="inputJenisBarang" name="txtJenisBarang" placeholder="Jenis Barang">
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button class="btn btn-primary">Simpan</button>
			<button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
		</div>
	</div>
</form>