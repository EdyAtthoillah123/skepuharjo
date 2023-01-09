<?php
require_once('fpdf185/fpdf.php');
$nomor = $_POST['nomor'];
$nama = $_POST['nama'];
$ttl = $_POST['ttl'];
$kebangsaan = $_POST['kebangsaan'];
$kelamin = $_POST['kelamin'];
$status = $_POST['status'];
$pekerjaan = $_POST['pekerjaan'];
$nik = $_POST['nik'];
$alamat = $_POST['alamat'];
$tanggalsurat = $_POST['tanggalsurat'];
$ketsurat = $_POST['ketsurat'];
$id = $_POST['surattt'];


$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();

$pdf->Image('images/logohp.png',18,27,43,0,'PNG');
// $pdf->SetFont('Arial','B',12);
$pdf->SetFont('Times','',12);
$pdf->SetXY(30,24);

// Add a multi-line cell with a left indentation of 20mm
$pdf->MultiCell(0, 6, "
P E M E R I N T A H   K A B U P A T E N  L U M A J A N G
KECAMATAN LUMAJANG
KELURAHAN KEPUHARJO
Jl. Langsep No. 18 Telp. (0334) 888243
L U M A J A N G 

",
0, 'C', false, 20);

$pdf->SetFont('Times','B',14);
$pdf->SetXY(20,66);

// Add a multi-line cell with a left indentation of 20mm
$pdf->MultiCell(0, 6, "SURAT KETERANGAN KEMATIAN            
",
0, 'C', false, 20);

$pdf->SetFont('Times','',12);
$pdf->SetXY(20,72);

// Add a multi-line cell with a left indentation of 20mm
$pdf->MultiCell(0, 6, "NOMOR : $nomor       
",
0, 'C', false, 20);

$pdf->Image('images/stempel.png',120,216,33,0,'PNG');
$pdf->Image('images/ttd.png',110,220,40,0,'PNG');
$pdf->SetFont('Times','',12);
$pdf->SetXY(20,84);
$pdf->MultiCell(0, 6, "             Yang bertanda tangan di bawah ini kami Lurah Kepuharjo Kecamatan Lumajang Kabupaten Lumajang menerangkan bahwa  : 

                            N a m a                             	:	$nama
                            Tempat / Tgl Lahir          	 :	$ttl
                            Jenis Kelamin 	                  :	$kelamin
                            Kebangsaan / Agama         :	$kebangsaan
                            Status 		                              :	$status
                            Pekerjaan                           :	$pekerjaan
                            N I K 		                               :	$nik
                            A l a m a t	                         :	$alamat
			    Kelurahan Kepuharjo Kecamatan Lumajang 

                Adalah benar sampai dengan saat ini warga kami menerangkan bahwa nama tersebut diatas berkelakuan baik dan tidak tersangkut urusan kriminal. Surat keterangan ini hanya dipergunakan untuk $ketsurat
Demikian surat keterangan ini kami buat untuk dapat dipergunakan sebagaimana mestinya.



                                                                                    Lumajang, $tanggalsurat
                                                                                    LURAH KEPUHARJO
                                                                                                            



                                                                                    MUHAMMAD SAIFUL,S.AP
                                                                                    NIP. 19720202 199803 1 010



",
0, 'L', false, 20);

// $pdf->Output("F","Api/pdf/kelBaik$nama.pdf");
// header("location: surat-diproses.php");
if(isset($_POST['kirim'])){
    $pdf->Output("F","Api/pdf/baik$id.pdf");
    header("location: surat-diproses.php");
}elseif(isset($_POST['download'])){
    $pdf->Output();
}
?>