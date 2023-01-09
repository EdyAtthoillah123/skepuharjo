<?php
require_once('fpdf185/fpdf.php');
$nomor = $_POST['nomor'];
$nama = $_POST['namaanak'];
$ttl = $_POST['ttl'];
$kebangsaan = $_POST['kebangsaan'];
$kelamin = $_POST['kelamin'];
$status = $_POST['status'];
$pekerjaan = $_POST['pekerjaan'];
$nik = $_POST['nik'];
$alamat = $_POST['alamat'];
$namaayah = $_POST['namaayah'];
$umurayah = $_POST['umurayah'];
$bangsaayah = $_POST['bangsaayah'];
$pekerjaanayah = $_POST['pekerjaanayah'];
$alamatayah = $_POST['alamatayah'];
$namaibu = $_POST['namaibu'];
$umuribu = $_POST['umuribu'];
$bangsaibu = $_POST['bangsaibu'];
$pekerjaanibu = $_POST['pekerjaanibu'];
$alamatibu = $_POST['alamatibu'];
$tanggalsurat = $_POST['tanggalsurat'];
$id = $_POST['surattt'];

//mengambil dokumen surat

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->Image('images/stempel.png',120,237,33,0,'PNG');
$pdf->Image('images/ttd.png',110,240,40,0,'PNG');
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
$pdf->MultiCell(0, 6, "SURAT KETERANGAN KENAL LAHIR             
",
0, 'C', false, 20);

$pdf->SetFont('Times','',12);
$pdf->SetXY(20,72);

// Add a multi-line cell with a left indentation of 20mm
$pdf->MultiCell(0, 6, "NOMOR :              
",
0, 'C', false, 20);


$pdf->SetFont('Times','',12);
$pdf->SetXY(20,84);
$pdf->MultiCell(0, 6, "             Yang bertanda tangan di bawah ini kami Lurah Kepuharjo Kecamatan Lumajang Kabupaten Lumajang menerangkan bahwa : ",
0, 'L', false, 20);

$pdf->SetXY(20,102);
$pdf->MultiCell(0, 6, "                                 Nama                            : $nama
                                Tempat,Tgl Lahir         : $ttl
                                Jenis Kelamin               : $kelamin
                                Kebangsaan / Agama    : $kebangsaan
                                Status 	                          : $status
                                Pekerjaan 	                    : $pekerjaan
                                NIK	                              : $nik
                                Alamat 	                        : $alamat

                                Kelurahan Kepuharjo Kecamatan Lumajang adalah benar benar anak dari :
            A Y A H
            Nama                 : $namaayah
            Umur                 : $umurayah
            Bangsa/Agama  : $bangsaayah
            Pekerjaan           : $pekerjaanayah
            Alamat               : $alamatayah

                    Surat keterangan ini dipergunakan untuk persyaratan administrasi membuat Akta 
Kelahiran.
	                Demikian surat keterangan ini kami buat dengan sebenarnya dan untuk dapat dipergunakan sebagaimana mestinya.                                                    



",
0, 'L', false, 20);

$pdf->SetXY(110,156);
$pdf->MultiCell(0, 6, "
            IBU
            Nama                 : $namaibu
            Umur                 : $umuribu
            Bangsa/Agama  : $bangsaibu
            Pekerjaan           : $pekerjaanibu
            Alamat               : $alamatibu
",
0, 'L', false, 20);

$pdf->SetXY(110,216);
$pdf->MultiCell(0, 6, "

Lumajang, $tanggalsurat
LURAH KEPUHARJO
                        



MUHAMMAD SAIFUL,S.AP
NIP. 19720202 199803 1 010
",
0, 'L', false, 20);

if(isset($_POST['kirim'])){
        $pdf->Output("F","Api/pdf/akta$id.pdf");
        header("location: surat-diproses.php");
}elseif(isset($_POST['download'])){
        $pdf->Output();
}
?>