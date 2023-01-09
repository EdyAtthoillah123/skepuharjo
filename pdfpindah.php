<?php
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

//mengambil dokumen surat
$document = file_get_contents("suratpindah.rtf");


//mereplace semua kata yang ada di file dengan variabel
$document = str_replace("#NOMOR", $nomor, $document);
$document = str_replace("#NAMA", $nama, $document);
$document = str_replace("#TTL", $ttl, $document);
$document = str_replace("#KELAMIN", $kelamin, $document);
$document = str_replace("#KEBANGSAAN", $kebangsaan, $document);
$document = str_replace("#STATUS", $status, $document);
$document = str_replace("#PEKERJAAN", $pekerjaan, $document);
$document = str_replace("#NIK", $nik, $document);
$document = str_replace("#ALAMAT", $alamat, $document);
$document = str_replace("#USAHA", $usaha, $document);
$document = str_replace("#TAHUN", $thnusaha, $document);
$document = str_replace("#KET", $ketsurat, $document);
$document = str_replace("#TANGGAL", date('d-m-Y', strtotime($tanggalsurat)), $document);


// header untuk membuka file yang dihasilkan dengna aplikasi Ms. Word
// nama file yang dihasilkan adalah surat izin.docx
header("Content-type: application/msword");
header("Content-disposition: inline; filename=$nama.doc");
header("Content-length: " . strlen($document));
echo $document;
?>