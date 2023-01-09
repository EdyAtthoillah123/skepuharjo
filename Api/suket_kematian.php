<?php
header('Content-Type: application/json');
$db = mysqli_connect('localhost','wstifai3_suket-kel','Polije1234','wstifai3_suket-kel');
    $id_akun = $_POST['id_akun'];
    $nama_almarhum = $_POST['nama_almarhum'];
    $saksi_kematian = $_POST['saksi_kematian'];
    $hubungan = $_POST['hubungan'];
    $hari = $_POST['hari'];
    $tanggal = $_POST['tanggal'];
    $alamat = $_POST['alamat'];
    $nik_almarhum = $_POST['nik_almarhum'];
    $penyebab_kematian = $_POST['penyebab_kematian'];
    $surat_digunakan = $_POST['surat_digunakan'];
    $status_surat = $_POST['status_surat'];
    $tgl_pengajuan = $_POST['tgl_pengajuan'];
    $rt = $_POST['RT']; 
    $rw = $_POST['RW'];
    $image = $_FILES['image']['name'];

    $imagePath = "uploads/".$image;
    move_uploaded_file($_FILES['image']['tmp_name'],$imagePath);
    $db->query("INSERT INTO surat_kematian (id_akun,nama_almarhum,saksi_kematian,hubungan,hari,tanggal,alamat,nik_almarhum,penyebab_kematian,surat_digunakan,status_surat,tgl_pengajuan,RT,RW,image) VALUES ('{$id_akun}','{$nama_almarhum}','{$saksi_kematian}','{$hubungan}','{$hari}','{$tanggal}','{$alamat}','{$nik_almarhum}','{$penyebab_kematian}','{$surat_digunakan}','{$status_surat}','{$tgl_pengajuan}','{$rt}','{$rw}','{$image}')");
?>