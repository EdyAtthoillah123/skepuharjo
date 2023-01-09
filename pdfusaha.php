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
$usaha = $_POST['namausaha'];
$thnusaha = $_POST['tahunusaha'];
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
$pdf->MultiCell(0, 6, "SURAT KETERANGAN USAHA             
",
0, 'C', false, 20);

$pdf->SetFont('Times','',12);
$pdf->SetXY(20,72);

// Add a multi-line cell with a left indentation of 20mm
$pdf->MultiCell(0, 6, "NOMOR : $nomor     
",
0, 'C', false, 20);


$pdf->SetFont('Times','',12);
$pdf->SetXY(20,84);
$pdf->MultiCell(0, 6, "             Yang bertanda tangan di bawah ini kami Lurah Kepuharjo Kecamatan Lumajang Kabupaten Lumajang menerangkan bahwa : ",
0, 'L', false, 20);

$pdf->SetXY(42,102);
$pdf->MultiCell(0, 6, "Nama                            : $nama
Tempat,Tgl Lahir         : $ttl
Jenis Kelamin               : $kelamin
Kebangsaan / Agama    : $kebangsaan
Status 	                          : $status
Pekerjaan 	                    : $pekerjaan
NIK	                              : $nik
Alamat 	                        : $alamat
",
0, 'L', false, 20);
$pdf->Image('images/stempel.png',120,206,33,0,'PNG');
$pdf->Image('images/ttd.png',110,220,40,0,'PNG');
        $pdf->SetXY(20,156);
        $pdf->MultiCell(0, 6, "             Menerangkan bahwa nama tersebut diatas benar mempunyai Usaha $usaha Berdiri sejak tahun $thnusaha sampai dengan sekarang, Surat keterangan ini hanya di pergunakan untuk Persyaratan $ketsurat
        Demikian surat keterangan ini kami buat untuk dapat dipergunakan sebagaimana mestinya.
                    
                                                                                        Lumajang, $tanggalsurat                                                                                                        
                                                                                        A/n.LURAH KEPUHARJO
                                                                                        Sekretaris
                                                                                        
                                                                                        
                                                                                        
                                                                                        
                                                                                        
                                                                                        MASYHURI,A,Md
                                                                                        NIP. 19810429 200901 1 003
        

        ",
        0, 'L', false, 20);

// $pdf->Output("F","Api/pdf/Domisili$nama.pdf");
// header("location: surat-diproses.php");
if(isset($_POST['kirim'])){
        $pdf->Output("F","Api/pdf/usaha$id.pdf");
        header("location: surat-diproses.php");
}elseif(isset($_POST['download'])){
        $pdf->Output();
}

?>