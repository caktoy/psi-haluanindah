<h3>Pengiriman</h3>
<p>Berikut adalah data pengiriman:</p>
<form method="post" class="form-seacrh">
	<legend>Operasi</legend>
	<div class="input-append">
		<input type="text" placeholder="Cari data">
		<button type="submit" class="btn">
			<i class="icon-search"></i>&nbsp;Cari
		</button>
		<a href="javascript:;" role="button" class="btn btn-primary" 
			onclick="win_popup('<?php echo base_url(); ?>index.php/pengiriman/buat_permintaan_pengiriman', 800, 600)">
			<i class="icon-plus-sign icon-white"></i>&nbsp;Tambah Data
		</a>
	</div>
</form>
<div>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>No. Pengiriman</th>
				<th>Tanggal Pengiriman</th>
				<!--<th>Biaya Pengiriman</th>-->
				<th>Nama Penerima</th>
				<th>Tujuan Pengiriman</th>
				<!--<th>Kota Tujuan</th>-->
				<!--<th>Alamat</th>-->
				<!--<th>Berat Pengiriman</th>-->
				<th>Pilihan</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			if (count($pengiriman) > 0) {
				foreach ($pengiriman as $list) {
					$tanggal = date('d F Y', strtotime($list['tgl_pengiriman']));
					echo "<tr>";
					echo "<td>".$list['id_pengiriman']."</td>";
					echo "<td>".$tanggal."</td>";
					//echo "<td>Rp".number_format($list['biaya_pengiriman'], 0, ",", ".").",00</td>";
					echo "<td>".$list['nama_penerima']."</td>";
					echo "<td>".$list['tujuan_pengiriman']." -";
					echo " ".$list['kota_tujuan']."</td>";
					//echo "<td>".$list['alamat_penerima']."</td>";
					//echo "<td>".$list['berat_pengiriman']."</td>";
					echo "<td>";
					//echo anchor('pengiriman/detil/'.$list['id_pengiriman'], 'Detil', '');
					?>
					<a href="javascript:;" onclick="win_popup('<?php echo base_url(); ?>index.php/pengiriman/detil/<?php echo $list['id_pengiriman']; ?>', 800, 600)">Detil</a>
					<?php
					echo nbs(2)."/".nbs(2);
					echo anchor('pengiriman/edit/'.$list['id_pengiriman'], 'Ubah', '');
					?>
					<!--<a href="javascript:;" onclick="win_popup('<?php echo base_url(); ?>index.php/pengiriman/edit/<?php echo $list['id_pengiriman']; ?>', 500, 435)">Ubah</a>-->
					<?php
					echo nbs(2)."/".nbs(2);
					echo anchor('pengiriman/hapus/'.$list['id_pengiriman'], 'Hapus', '');
					echo "</td>";
					echo "</tr>";
				}
			} else {
				echo "<tr><td colspan='5'>Tidak ada data yang bisa ditampilkan.</td></tr>";
			}
			?>
		</tbody>
	</table>
</div>