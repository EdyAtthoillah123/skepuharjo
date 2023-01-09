<?php
require('../fpdf.php');
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Write('20','Hello World');
$pdf->Ln();
$pdf->Write('0','cobaaa buat kelurahan');
$pdf->Output();
?>