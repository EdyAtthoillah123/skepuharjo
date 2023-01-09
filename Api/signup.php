<?php
$db = mysqli_connect('localhost','wstifai3_suket-kel','Polije1234','wstifai3_suket-kel');
$id_akun = $_POST['id_akun'];
$nama_lengkap = $_POST['nama_lengkap'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$no_hp = $_POST['no_hp'];
$hak_akses = $_POST['hak_akses'];
$rt = $_POST['rt'];
$rw = $_POST['rw'];

$sql = $insert = "INSERT INTO akun  SET id_akun = '$id_akun', nama_lengkap = '$nama_lengkap', password = '$password', no_hp = '$no_hp', hak_akses = '$hak_akses', rt = '$rt', rw = '$rw'";
$result = $db->query($sql);
if ($result) {
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('success'=>false));
}
?>	