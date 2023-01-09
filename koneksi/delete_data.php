<?php
session_start();
include('koneksi.php');
$id = 2;
$sql = "DELETE FROM user WHERE id = $id";
if(mysqli_query($conn, $sql)){
    echo "Data Berhasil Dihapus";
    }else{
    echo "Error: " .$sql. " ";
    }
?>