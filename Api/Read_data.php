<?php
session_start();
include('koneksi.php');
$sql = "SELECT id_akun, nama_lengkap, password, no_hp FROM akun";
$result = mysqli_query($conn, $sql);
$array = array();
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_array($result)){
        $data = array(
            'id_akun' => $row['id_akun'],
            'nama_lengkap' => $row['nama_lengkap'],
            'password' => $row['password'],
            'no_hp' => $row['no_hp'],
        );
    array_push($array, $data);
    }
}
echo json_encode($array);
?>