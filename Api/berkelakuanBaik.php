<?php
$db = mysqli_connect('localhost','wstifai3_suket-kel','Polije1234','wstifai3_suket-kel');
    $id_akun = $_POST['id_akun'];
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $kebangsaan = $_POST['kebangsaan'];
    $agama = $_POST['agama'];
    $status_perkawinan = $_POST['status'];
    $pekerjaan = $_POST['pekerjaan'];
    $nik = $_POST['nik'];
    $alamat = $_POST['alamat'];
    $status_surat = $_POST['status_surat'];
    $tgl_pengajuan = $_POST['tgl_pengajuan'];
    $rt = $_POST['RT'];
    $rw = $_POST['RW'];
    $surat_digunakan_untuk = $_POST['surat_digunakan'];
    $image = $_FILES['image']['name'];

    $imagePath = "uploads/".$image; 
    move_uploaded_file($_FILES['image']['tmp_name'],$imagePath); 
    $db->query("INSERT INTO surat_berkelakuan_baik (id_akun,nama,tempat_lahir,tanggal_lahir,jenis_kelamin,kebangsaan,agama,status,pekerjaan,nik,alamat,status_surat,tgl_pengajuan,RT,RW,surat_digunakan,image) VALUES ('{$id_akun}','{$nama}','{$tempat_lahir}','{$tanggal_lahir}','{$jenis_kelamin}','{$kebangsaan}','{$agama}','{$status_perkawinan}','{$pekerjaan}','{$nik}','{$alamat}','{$status_surat}','{$tgl_pengajuan}','{$rt}','{$rw}','{$surat_digunakan_untuk}','{$image}')");
?>