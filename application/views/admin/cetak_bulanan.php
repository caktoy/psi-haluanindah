<?php
// masukkan librari fpdf
require('fpdf/fpdf.php');

// passing variabel
if (count($laporan) > 0) {
	foreach ($laporan as $value) {
		$id_pengiriman = $value['id_pengiriman'];
		$nama_cust = $value['nama_cust'];
		$kota_tujuan = $value['nama_kota'];
		$berat_pengiriman = $value['berat_pengiriman'];
		$tgl = $value['tanggal'];
		$bln = $value['bulan'];
		$thn = $value['tahun'];
		$tanggal = $thn.'-'.$bln.'-'.$tgl;
		$date = date('d M Y', strtotime($tanggal));
		$periode = date('M Y', strtotime($tanggal));
		$status_pengiriman = $value['status_pengiriman'];
	}

	// buat dokumen pdf
	$pdf = new FPDF();
	$pdf->AddPage("", "A4");

	$pdf->SetAuthor("PT. Haluan Indah Transporindo");
	$pdf->SetTitle("Laporan Pengiriman Bulanan");

	$pdf->SetFont("Times", "B", "18");
	$pdf->Cell(0, 20, "PT. Haluan Indah Transporindo", "B", 1, "C");

	$pdf->SetFont("Times", "BU", "14");
	$pdf->Cell(0, 10, "Laporan Pengiriman Bulanan", 0, 1, "C");
	$pdf->SetFont("Times", "", "12");
	$pdf->Cell(0, 0, "Periode: ".$periode, 0, 1, "C");
	$pdf->Ln(5);

	$pdf->SetFont("Times", "B", "12");
	$pdf->Cell(10, 10, "No.", 1, 0, "C");
	$pdf->Cell(30, 10, "No. Pengiriman", 1, 0, "C");
	$pdf->Cell(50, 10, "Nama Pengirim", 1, 0, "C");
	$pdf->Cell(40, 10, "Kota Tujuan", 1, 0, "C");
	$pdf->Cell(20, 10, "Berat", 1, 0, "C");
	$pdf->Cell(40, 10, "Tanggal Pengiriman", 1, 1, "C");
	//$pdf->Cell(120, 10, "Status Terakhir", 1, 1, "C");

	// isi data
	$pdf->SetFont("Times", "", "12");
	$idx = 1;
	foreach ($laporan as $value) {
		$id_pengiriman = $value['id_pengiriman'];
		$nama_cust = $value['nama_cust'];
		$kota_tujuan = $value['nama_kota'];
		$berat_pengiriman = number_format($value['berat_pengiriman']);
		$tgl = $value['tanggal'];
		$bln = $value['bulan'];
		$thn = $value['tahun'];
		$tanggal = $thn.'-'.$bln.'-'.$tgl;
		$date = date('d M Y', strtotime($tanggal));
		$periode = date('M Y', strtotime($tanggal));
		$status_pengiriman = $value['status_pengiriman'];

		$pdf->Cell(10, 10, $idx, 1, 0, "C");
		$pdf->Cell(30, 10, $id_pengiriman, 1, 0, "");
		$pdf->Cell(50, 10, $nama_cust, 1, 0, "");
		$pdf->Cell(40, 10, $kota_tujuan, 1, 0, "");
		$pdf->Cell(20, 10, $berat_pengiriman." Kg", 1, 0, "");
		$pdf->Cell(40, 10, $date, 1, 1, "");
		//$pdf->Cell(120, 10, $status_pengiriman, 1, 1, "");
		
		$idx ++;
	}
	$pdf->Ln();

	$pdf->Output("Laporan Bulanan (Periode ".$periode.").pdf", "D");
} else {
	echo "Terjadi kesalahan!";
}
?>