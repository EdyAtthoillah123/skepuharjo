<?php
$db = mysqli_connect('localhost','wstifai3_suket-kel','Polije1234','wstifai3_suket-kel');
    $id_akun = $_POST['id_akun'];
    $nama_anak = $_POST['nama_anak'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $kebangsaan = $_POST['kebangsaan'];
    $agama = $_POST['agama'];
    $status = $_POST['status'];
    $pekerjaan = $_POST['pekerjaan'];
    $nik = $_POST['nik'];
    $alamat = $_POST['alamat'];
    $nama_ayah = $_POST['nama_ayah'];
    $umur_ayah = $_POST['umur_ayah'];
    $kebangsaan_ayah = $_POST['kebangsaan_ayah'];
    $agama_ayah = $_POST['agama_ayah'];
    $pekerjaan_ayah = $_POST['pekerjaan_ayah'];
    $alamat_ayah = $_POST['alamat_ayah'];
    $nama_ibu = $_POST['nama_ibu'];
    $umur_ibu = $_POST['umur_ibu'];
    $kebangsaan_ibu = $_POST['kebangsaan_ibu'];
    $agama_ibu = $_POST['agama_ibu'];
    $pekerjaan_ibu = $_POST['pekerjaan_ibu'];
    $alamat_ibu = $_POST['alamat_ibu'];
    $tgl_pengajuan = $_POST['tgl_pengajuan'];
    $keperluan = $_POST['keperluan'];
    $status_surat = $_POST['status_surat'];
    $rt = $_POST['RT']; 
    $rw = $_POST['RW'];
    $image = $_FILES['image']['name'];

    $imagePath = "uploads/".$image;
    move_uploaded_file($_FILES['image']['tmp_name'],$imagePath);
    $db->query("INSERT INTO surat_akta_kelahiran(id_akun,nama_anak,tempat_lahir,tanggal_lahir,jenis_kelamin,kebangsaan,agama,status,pekerjaan,nik,alamat,nama_ayah,umur_ayah,kebangsaan_ayah,agama_ayah,pekerjaan_ayah,alamat_ayah,nama_ibu,umur_ibu,kebangsaan_ibu,agama_ibu,pekerjaan_ibu,alamat_ibu,tgl_pengajuan,keperluan,status_surat,RT,RW,image) VALUES ('{$id_akun}','{$nama_anak}','{$tempat_lahir}','{$tanggal_lahir}','{$jenis_kelamin}','{$kebangsaan}','{$agama}','{$status}','{$pekerjaan}','{$nik}','{$alamat}','{$nama_ayah}','{$umur_ayah}','{$kebangsaan_ayah}','{$agama_ayah}','{$pekerjaan_ayah}','{$alamat_ayah}','{$nama_ibu}','{$umur_ibu}','{$kebangsaan_ibu}','{$agama_ibu}','{$pekerjaan_ibu}','{$alamat_ibu}','{$tgl_pengajuan}','{$keperluan}','{$status_surat}','{$rt}','{$rw}','{$image}')");
?>