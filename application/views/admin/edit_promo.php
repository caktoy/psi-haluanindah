<?php
echo heading('Ubah Data Promo', 3);
foreach ($promo as $data) {
	$promo_id = $data['promo_id'];
	$promo_name = $data['promo_name'];
	$promo_date_start = substr($data['promo_date_start'], 0, 11);
	$promo_date_end = substr($data['promo_date_end'], 0, 11);
	$promo_desc = $data['promo_desc'];
}
?>
<div class="well">
	<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/promo/update">
		<input type="hidden" name="inputIdPromo" value="<?php echo $promo_id; ?>">
		<div class="control-group">
			<label class="control-label" for="inputNamaPromo">Nama Promo</label>
			<div class="controls">
				<input type="text" id="inputNamaPromo" name="inputNamaPromo" placeholder="Promo" 
					value="<?php echo $promo_name; ?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputTanggalMulai">Tanggal Mulai Promo</label>
			<div class="controls">
				<input type="text" id="inputTanggalMulai" class="datepicker" 
					name="inputTanggalMulai" placeholder="YYYY-MM-DD" value="<?php echo $promo_date_start; ?>">
			</div>
		</div>s
		<div class="control-group">
			<label class="control-label" for="inputTanggalSelesai">Tanggal Selesai Promo</label>
			<div class="controls">
				<input type="text" id="inputTanggalSelesai" class="datepicker" 
					name="inputTanggalSelesai" placeholder="YYYY-MM-DD" value="<?php echo $promo_date_end; ?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputDeskripsiPromo">Deskripsi</label>
			<div class="controls">
				<textarea id="inputDeskripsiPromo" name="inputDeskripsiPromo" class="ckeditor" 
					placeholder="Deskripsi" rows="5"><?php echo $promo_desc; ?></textarea>
			</div>
		</div>
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-primary">Simpan</button>
			<button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
		</div>
	</form>
</div>