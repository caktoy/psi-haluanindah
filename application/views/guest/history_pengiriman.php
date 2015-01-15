<?php
echo heading($judul, 3);
echo "<p>";
echo "Daftar riwayat pengiriman yang pernah Anda lakukan.";
echo "</p>";
if (count($pengiriman)>0) {
?>
<table class="table table-hover">
	<thead>
		<tr>
			<th>No. Pengiriman</th>
			<th>No. Resi</th>
			<th>Tanggal Pengiriman</th>
			<th>Nama Penerima</th>
			<th>Tujuan Penerima</th>
			<th>Opsi</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			foreach ($pengiriman as $p) {
				$id_cust = $p['id_cust'];
				$id_pengiriman = $p['id_pengiriman'];
				$no_resi = $p['no_resi'];
				$tgl_pengiriman = $p['tgl_pengiriman'];
				$nama_penerima = $p['nama_penerima'];
				$tujuan_pengiriman = $p['tujuan_pengiriman'];

				echo "<tr>";
				echo "<td>".$id_pengiriman."</td>";
				echo "<td>".$no_resi."</td>";
				echo "<td>".date('d-m-Y', strtotime($tgl_pengiriman))."</td>";
				echo "<td>".$nama_penerima."</td>";
				echo "<td>".$tujuan_pengiriman."</td>";
				echo "<td>";
				echo anchor('pengiriman/view_detil_pengiriman/'.$id_pengiriman, '<i class="icon-th-list icon-white"></i>'.nbs(2).'Detil', array('class' => 'btn btn-primary'));
				echo "</td>";
				echo "</tr>";
			}
		?>
	</tbody>
</table>
<?php
} else {
	echo "<tr><td colspan='6'>Tidak ada data yang ditampilkan.</td></tr>";
}
?>