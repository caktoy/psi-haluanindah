<h3>Status Pengiriman</h3>
<p>Berikut adalah daftar status pengiriman:</p>
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
				<th>Status Pengiriman</th>
				<th>Keterangan</th>
				<th>Pilihan</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			if (count($status) > 0) {
				$idx = 1;
				foreach ($status as $list) {
					echo "<tr>";
					echo "<td>".$idx."</td>";
					echo "<td>".$list['status_pengiriman']."</td>";
					echo "<td>".$list['keterangan']."</td>";
					echo "<td>";
					//echo anchor('status/edit/'.$list['status_pengiriman'], 'Ubah', '');
					//echo nbs(2)."/".nbs(2);
					echo anchor('status/remove/'.$list['status_pengiriman'], 'Hapus', '');
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
<!-- Modal -->
<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/status/add">
	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">Tambah Data Status Pengiriman</h3>
		</div>
		<div class="modal-body">
			<p>Silahkan isi status pengiriman yang ingin ditambahkan.</p>
			<div class="control-group">
				<label class="control-label" for="inputStatusPengiriman">Status Pengiriman</label>
				<div class="controls">
					<input type="text" id="inputStatusPengiriman" name="txtStatusPengiriman" placeholder="Status Pengiriman">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputKeterangan">Keterangan</label>
				<div class="controls">
					<textarea id="inputKeterangan" name="txtKeterangan" placeholder="Keterangan"></textarea>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button class="btn btn-primary">Simpan</button>
			<button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
		</div>
	</div>
</form>