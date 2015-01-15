<?php
// masukkan librari fpdf
require('fpdf/fpdf.php');

// buat dokumen pdf
$pdf = new FPDF();
$pdf->AddPage("", "A4");

$pdf->SetAuthor("PT. Haluan Indah Transporindo");
$pdf->SetTitle("Surat Pengambilan Barang");

$pdf->SetFont("Times", "B", "18");
$pdf->Cell(0, 20, "PT. Haluan Indah Transporindo", "B", 1, "C");

$pdf->SetFont("Times", "BU", "14");
$pdf->Cell(0, 10, "Surat Pengambilan Barang", 0, 1, "C");
$pdf->SetFont("Times", "", "12");
$pdf->Cell(0, 0, "No. Pengiriman: ".$no_pengiriman, 0, 1, "C");
$pdf->Ln(5);

$kata1 = "Berdasarkan permintaan pengiriman barang yang Anda minta kepada PT. Haluan Indah Transporindo pada ".$tgl_pengiriman.
", maka dengan ini".
" kami menugaskan Sdr/i ".$nama_karyawan." (NIK. ".$nik.") untuk mengambil barang dengan rincian sebagai berikut:";
$pdf->Write(10, $kata1);
$pdf->Ln();
//$pdf->Cell(0, 0, $kata1, 0, 1, "L");
$pdf->Cell(10, 10, "No.", 1, 0, "C");
$pdf->Cell(50, 10, "Nama Barang", 1, 0, "C");
$pdf->Cell(40, 10, "Berat Barang (Kg)", 1, 1, "C");
$idx = 0;
foreach ($barang as $value) {
	$idx++;
	$id_barang = $value['id_barang'];
	$nama_barang = $value['nama_barang'];
	$berat_barang = $value['berat_barang'];

	$pdf->Cell(10, 10, $idx.".", 1, 0, "R");
	$pdf->Cell(50, 10, $nama_barang, 1, 0, "");
	$pdf->Cell(40, 10, $berat_barang, 1, 1, "R");
}
$kata2 = "Yang akan Anda kirimkan kepada:";
$pdf->Write(10, $kata2);
$pdf->Ln();
$pdf->Write(10, "          Nama: ".$nama_penerima);
$pdf->Ln();
$pdf->Write(10, "          Perusahaan: ".$tujuan_pengiriman);
$pdf->Ln();
$pdf->Write(10, "          Alamat: ".$alamat_penerima.", ".$kota_tujuan);
$pdf->Ln();
$pdf->Write(10, "Untuk itu kami meminta kepada Anda untuk mempersilahkan karyawan kami mengambil barang Anda. Terima kasih.");
$pdf->Ln(20);
$pdf->SetFont("Times", "B", "14");
$pdf->Cell(0, 10, "PT. Haluan Indah Transporindo", 0, 1, "R");

$pdf->Output("Surat Pengambilan Barang (No. Pengiriman ".$no_pengiriman.").pdf", "I");
?>