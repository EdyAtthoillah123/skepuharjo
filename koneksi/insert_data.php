<?php
session_start();
include('../koneksi/koneksi.php');
$uname = $_POST['id_akun'];
$nama = $_POST['nama_lengkap'];
$pw =  password_hash($_POST['password'],PASSWORD_DEFAULT);
$alm = $_POST['no_hp'];

$sql = "INSERT INTO akun (id_akun, nama_lengkap, password, no_hp) values('$uname','$nama', '$pw', '$alm')";
if(mysqli_query($conn, $sql)){
    echo "Data Berhasil Ditambahkan";
    }else{
    echo "Error: " .$sql. " ";
    }
?>