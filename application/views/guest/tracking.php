<?php 
echo heading('Tracking Pengiriman Barang', 3); 
echo "<p>Masukkan nomer resi untuk melakukan <i>tracking</i> dalam kolom dibawah ini.</p>";
?>
<form class="form-horizontal" method="post" action="">
	<div class="control-group">
		<label class="control-label" for="appendedInputButton">Cari: </label>
		<div class="controls">
			<div class="input-append">
				<input class="span2" id="appendedInputButton" type="text" placeholder="No. Resi">
				<button class="btn btn-primary" type="submit">Cari</button>
			</div>
		</div>
	</div>
</form>
<fieldset>
	<legend>Riwayat Pengiriman</legend>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>No.</th>
				<th>No. Resi</th>
				<th>Posisi</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			if (count($tracking) > 0) {
				$idx = 1;
				foreach ($tracking as $list) {
					echo "<tr>";
					echo "<td>".$idx."</td>";
					echo "<td>".anchor('tracking/detil/'.$list['no_resi'], $list['no_resi'], '')."</td>";
					echo "<td>".$list['posisi']."</td>";
					echo "<td>".$list['status_pengiriman']."</td>";
					echo "</tr>";
					$idx++;
				}
			} else {
				echo "<tr><td colspan='4'>Tidak ada data yang bisa ditampilkan.</td></tr>";
			}
			?>
		</tbody>
	</table>
</fieldset>