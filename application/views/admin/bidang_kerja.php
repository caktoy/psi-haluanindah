<h3>Bidang Kerja</h3>
<p>Berikut adalah daftar bidang kerja:</p>
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
				<th>Bidang Kerja</th>
				<th>Pilihan</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			if (count($bidang) > 0) {
				$idx = 1;
				foreach ($bidang as $list) {
					echo "<tr>";
					echo "<td>".$idx."</td>";
					echo "<td>".$list['nama_bidang_kerja']."</td>";
					echo "<td>";
					echo anchor('bidang_kerja/edit/'.$list['id_bidang_kerja'], 'Ubah', '');
					echo nbs(2)."/".nbs(2);
					echo anchor('bidang_kerja/remove/'.$list['id_bidang_kerja'], 'Hapus', '');
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
<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/bidang_kerja/add">
	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">Tambah Data Bidang Kerja</h3>
		</div>
		<div class="modal-body">
			<p>Silahkan isi bidang kerja yang ingin ditambahkan.</p>
			<div class="control-group">
				<label class="control-label" for="inputBidangKerja">Bidang Kerja</label>
				<div class="controls">
					<input type="text" id="inputBidangKerja" name="txtBidangKerja" placeholder="Bidang Kerja">
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button class="btn btn-primary">Simpan</button>
			<button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
		</div>
	</div>
</form>