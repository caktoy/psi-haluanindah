<?php
require('fpdf/fpdf.php');

if (count($pengiriman) > 0) {
	foreach ($pengiriman as $p) {
		$id = $p['id_pengiriman'];
		$nama = $p['nama_penerima'];
		$tgl = $p['tgl_pengiriman'];
		$kota = $p['kota_tujuan'];
		$biaya = $p['biaya_pengiriman'];
		$tujuan = $p['tujuan_pengiriman'];
		$alamat = $p['alamat_penerima'];
		$berat = $p['berat_pengiriman'];
	}
	if (count($sum_berat) > 0) {
		foreach ($sum_berat as $s) {
			$id_pengiriman = $s['id_pengiriman'];
			$tot_berat = $s['tot_berat'];
		}
	} else {
		$tot_berat = 0;
	}
	if (count($no_resi) > 0) {
		foreach ($no_resi as $n) {
			$num_resi = $n['no_resi'];
		}
	}
	if (count($id_barang) > 0) {
		foreach ($id_barang as $v) {
			$id_b = $v['id_barang'];
		}
	}
	$pdf = new FPDF();
	$pdf->AddPage("", "A4");

	$pdf->SetAuthor("PT. Haluan Indah Transporindo");
	$pdf->SetTitle("Laporan Pengiriman Bulanan");

	$pdf->SetFont("Times", "B", "18");
	$pdf->Cell(0, 20, "PT. Haluan Indah Transporindo", "B", 1, "C");
	$pdf->Ln(10);

	$pdf->SetFont("Times", "B", "14");
	$pdf->Cell(0, 10, "Informasi Pengiriman", "B", 1, "L");
	$pdf->Ln(5);
	$pdf->SetFont("Times", "B", "12");
	$pdf->Cell(30, 10, "No. Pengiriman", 1, 0, "C");
	$pdf->Cell(30, 10, "No. Resi", 1, 0, "C");
	$pdf->Cell(30, 10, "Tanggal", 1, 0, "C");
	$pdf->Cell(50, 10, "Penerima", 1, 0, "C");
	$pdf->Cell(50, 10, "Biaya Pengiriman", 1, 1, "C");
	$pdf->SetFont("Times", "", "12");
	$pdf->Cell(30, 10, $id, 1, 0, "C");
	$pdf->Cell(30, 10, $num_resi, 1, 0, "C");
	$pdf->Cell(30, 10, date('d/m/Y', strtotime($tgl)), 1, 0, "C");
	$pdf->Cell(50, 10, $nama, 1, 0, "C");
	$pdf->Cell(50, 10, "Rp".number_format($biaya*$tot_berat, 0, ",", ".").",00", 1, 1, "C");
	$pdf->Ln(5);

	$pdf->SetFont("Times", "B", "14");
	$pdf->Cell(0, 10, "Informasi Barang", "B", 1, "L");
	$pdf->Ln(5);
	$pdf->SetFont("Times", "B", "12");
	$pdf->Cell(10, 10, "No.", 1, 0, "C");
	$pdf->Cell(140, 10, "Nama Barang", 1, 0, "C");
	$pdf->Cell(40, 10, "Berat Barang", 1, 1, "C");
	$pdf->SetFont("Times", "", "12");
	$idx = 1;
	$tberat = 0;
	foreach ($detil_pengiriman as $d) {
		$pdf->Cell(10, 10, $idx, 1, 0, "R");
		$pdf->Cell(140, 10, $d['nama_barang'], 1, 0, "L");
		$pdf->Cell(40, 10, $d['berat_barang']." Kg", 1, 1, "R");
		$idx++;
		$tberat += $d['berat_barang'];
	}
	$pdf->Cell(150, 10, "Total Berat", 1, 0, "R");
	$pdf->Cell(40, 10, $tberat." Kg", 1, 1, "R");

	$pdf->Output("Detil Pengiriman (No. Pengiriman ".$id.").pdf", "I");
} else {
	$pdf->SetFont("Times", "B", "18");
	$pdf->Cell(0, 20, "Maaf! Terjadi kesalahan. Silahkan tunggu beberapa saat atau 
		silahkan hubungi Customer Service kami.", "", 1, "C");
	$pdf->Output("Detil Pengiriman (No. Pengiriman ".$id.").pdf", "I");
}
?>