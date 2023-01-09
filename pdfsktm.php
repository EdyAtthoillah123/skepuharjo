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
$no = $_POST['nopengantarsurat'];
$tgl = $_POST['tglpengajuan'];
$keperluan = $_POST['keperluan'];
$tanggalsurat = $_POST['tanggalsurat'];
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
$pdf->MultiCell(0, 6, "SURAT KETERANGAN TIDAK MAMPU              
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
$pdf->Image('images/stempel.png',120,216,33,0,'PNG');
$pdf->Image('images/ttd.png',110,220,40,0,'PNG');
        $pdf->SetXY(20,156);
        $pdf->MultiCell(0, 6, "             Kelurahan Kepuharjo Kecamatan Lumajang 

            Adalah benar sampai dengan saat ini warga kami dan berdasarkan Surat pengantar Nomer.
$no   Tanggal, $tanggalsurat dan pengakuannya. Bahwa nama yang tersebut diatas benar keluarga tidak mampu. Surat keterangan ini hanya dipergunakan untuk 
            
            Demikian surat keterangan ini kami buat untuk dapat dipergunakan sebagaimana mestinnya.


                                                                                    Lumajang, $tanggalsurat
                                                                                    LURAH KEPUHARJO
                                                                                                            

                                                                                    

                                                                                    MUHAMMAD SAIFUL,S.AP
                                                                                    NIP. 19720202 199803 1 010

        ",
        0, 'L', false, 20);

        // $pdf->Output("F","Api/pdf/sktm$nama.pdf");
        // header("location: surat-diproses.php");
// $pdf->Output("F","Document.pdf");
// header("location: surat-diproses.php");
if(isset($_POST['kirim'])){
        $pdf->Output("F","Api/pdf/sktm$id.pdf");
        header("location: surat-diproses.php");
}elseif(isset($_POST['download'])){
        $pdf->Output();
}

?>