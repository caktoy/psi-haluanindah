<div>
	<h3>Daftar Promo</h3>
	<p>Berikut adalah daftar promo yang telah dibuat. Untuk operasi lebih lanjut silahkan perhatikan di kolom yang sudah 
	disediakan</p>
	<div class="well well-small">
		<h4>Operasi Data</h4>
		<form class="form-inline">
			<input type="text" name="inputKataKunci" placeholder="Kata Kunci">
			<button type="submit" class="btn"><i class="icon-search"></i>&nbsp;Cari</button>&nbsp;
			<a href="#modalBuatPromo" role="button" class="btn btn-primary" data-toggle="modal">
				<i class="icon-pencil icon-white"></i>&nbsp;Buat Promo Baru</a>
		</form>
	</div>
	<?php 
	if (count($promo) > 0) {
		foreach ($promo as $list) {
			$date_start = date('d F Y', strtotime($list['promo_date_start']));
			$date_end = date('d F Y', strtotime($list['promo_date_end']));
			echo "<div class='well'>";
			echo "<strong>Nama Promo</strong> : (".$list['promo_id'].") ".$list['promo_name']."<br>";
			echo "<strong>Periode Promo</strong> : ".$date_start." s/d. ".$date_end."<br>";
			echo "<strong>Deskripsi</strong> : ".$list['promo_desc']."<br>";
			echo "<hr>";
			echo "<div style='text-align:right;'>";
			echo anchor('promo/edit/'.$list['promo_id'], '<i class=icon-edit icon-white></i>&nbsp;Ubah', 'class=btn btn-success');
			echo nbs(2);
			echo anchor('promo/remove/'.$list['promo_id'], '<i class=icon-trash icon-white></i>&nbsp;Hapus', 'class=btn btn-danger');
			echo "</div>";
			echo "</div>";
		}
	} else {
		echo "<div class='well'>Tidak ada data yang bisa ditampilkan.</div>";
	}
	?>
</div>
<!-- Modal Tambah Provinsi -->
<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/promo/add">
<div id="modalBuatPromo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Buat Promo Baru</h3>
	</div>
	<div class="modal-body">
		<div class="control-group">
			<label class="control-label" for="inputNamaPromo">Nama Promo</label>
			<div class="controls">
				<input type="text" id="inputNamaPromo" name="inputNamaPromo" placeholder="Promo">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputTanggalMulai">Tanggal Mulai Promo</label>
			<div class="controls">
				<input type="text" id="inputTanggalMulai" class="datepicker" 
					name="inputTanggalMulai" placeholder="YYYY-MM-DD">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputTanggalSelesai">Tanggal Selesai Promo</label>
			<div class="controls">
				<input type="text" id="inputTanggalSelesai" class="datepicker" 
					name="inputTanggalSelesai" placeholder="YYYY-MM-DD">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputDeskripsiPromo">Deskripsi</label>
			<div class="controls">
				<textarea id="inputDeskripsiPromo" name="inputDeskripsiPromo" placeholder="Deskripsi" rows="5" class="ckeditor">
				</textarea>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="submit" class="btn btn-primary">Simpan</button>
		<button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
	</div>
</div>
</form>