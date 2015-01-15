<?php
// masukkan librari fpdf
require('fpdf/fpdf.php');

// passing variabel
if (count($data_pengiriman) > 0) {
	foreach ($data_pengiriman as $value) {
		$nama_penerima = $value['nama_penerima'];
		$nama_pengirim = $value['nama_cust'];
		$tgl_pengiriman = $value['tgl_pengiriman'];
	}
	
	foreach ($sum_berat as $value) {
		$tot_berat = $value['tot_berat'];
	}

	// buat dokumen pdf
	$pdf = new FPDF();
	$pdf->AddPage("", "A4");

	$pdf->SetAuthor("PT. Haluan Indah Transporindo");
	$pdf->SetTitle("Surat Pengiriman");

	$pdf->SetFont("Times", "B", "18");
	$pdf->Cell(0, 20, "PT. Haluan Indah Transporindo", "B", 1, "C");

	$pdf->SetFont("Times", "BU", "14");
	$pdf->Cell(0, 10, "Surat Pengiriman Barang", 0, 1, "C");
	$pdf->SetFont("Times", "", "12");
	$pdf->Cell(0, 0, "No. Pengiriman: ".$id_pengiriman, 0, 1, "C");
	$pdf->Ln(5);

	$pdf->Cell(95, 10, "Dari: ".$nama_pengirim, 0, 0, "");
	$pdf->Cell(95, 10, "Penerima: ".$nama_penerima, 0, 1, "");
	$tanggal = date('d M Y', strtotime($tgl_pengiriman));
	$pdf->Cell(95, 10, "Tanggal: ".$tanggal, 0, 1, "");
	$pdf->Ln();

	$pdf->SetFont("Times", "B", "12");
	$pdf->Cell(10, 10, "No.", 1, 0, "C");
	$pdf->Cell(120, 10, "Nama Barang", 1, 0, "C");
	$pdf->Cell(60, 10, "Berat", 1, 1, "C");

	// isi data
	$pdf->SetFont("Times", "", "12");
	$idx = 1;
	$total_berat = 0;
	foreach ($data_barang as $value) {
		$nama_barang = $value['nama_barang'];
		$berat_barang = $value['berat_barang'];

		$pdf->Cell(10, 10, $idx, 1, 0, "C");
		$pdf->Cell(120, 10, $nama_barang, 1, 0, "");
		$pdf->Cell(60, 10, number_format($berat_barang)." Kg", 1, 1, "C");		
		
		$idx ++;
		$total_berat += $berat_barang;
	}
	$pdf->SetFont("Times", "B", "12");
	$pdf->Cell(130, 10, "Total", 1, 0, "C");
	$pdf->Cell(60, 10, $total_berat." Kg", 1, 1, "C");
	$pdf->Ln();

	$pdf->Cell(50, 10, "Penerima", 0, 1, "C");
	$pdf->Ln();
	$pdf->Ln();
	$pdf->SetFont("Times", "", "12");
	$pdf->Cell(50, 10, "_____________________", 0, 1, "C");

	$pdf->Output("Surat Pengiriman (No. Pengiriman ".$id_pengiriman.").pdf", "D");
} else {
	echo "Terjadi kesalahan!";
}
?>