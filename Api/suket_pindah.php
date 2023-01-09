<?php
$db = mysqli_connect('localhost','wstifai3_suket-kel','Polije1234','wstifai3_suket-kel');
    $id_akun = $_POST['id_akun'];
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $status = $_POST['status'];
    $agama = $_POST['agama'];
    $alamat_asal = $_POST['alamat_asal'];
    $alamat_tujuan = $_POST['alamat_tujuan'];
    $kelurahan = $_POST['kelurahan'];
    $kecamatan = $_POST['kecamatan'];
    $kabupaten = $_POST['kabupaten'];
    $provinsi = $_POST['provinsi'];
    $alasan_pindah = $_POST['alasan_pindah'];
    $pengikut = $_POST['pengikut'];
    $tgl_pengajuan = $_POST['tgl_pengajuan'];
    $status_surat = $_POST['status_surat'];
    $rt = $_POST['RT']; 
    $rw = $_POST['RW'];
    $image = $_FILES['image']['name'];

    $imagePath = "uploads/".$image;
    move_uploaded_file($_FILES['image']['tmp_name'],$imagePath);
    $db->query("INSERT INTO surat_pindah (id_akun,nama,tempat_lahir,tanggal_lahir,jenis_kelamin,status,agama,alamat_asal,alamat_tujuan,kelurahan,kecamatan,kabupaten,provinsi,alasan_pindah,pengikut,tgl_pengajuan,status_surat,RT,RW,image) VALUES ('{$id_akun}','{$nama}','{$tempat_lahir}','{$tanggal_lahir}','{$jenis_kelamin}','{$status}','{$agama}','{$alamat_asal}','{$alamat_tujuan}','{$kelurahan}','{$kecamatan}','{$kabupaten}','{$provinsi}','{$alasan_pindah}','{$pengikut}','{$tgl_pengajuan}','{$status_surat}','{$rt}','{$rw}','{$image}')");
?>