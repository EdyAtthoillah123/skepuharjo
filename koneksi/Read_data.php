<?php
session_start();
include('koneksi.php');
$sql = "SELECT COUNT(id_akun) FROM akun";
$result = mysqli_query($conn, $sql);
// $array = array();
// if(mysqli_num_rows($result)>0){
//     while($row = mysqli_fetch_array($result)){
//         $data = array(
//             'id_user' => $row['id'],
//             'nama_user' => $row['username'],
//             'pass' => md5($row['password']),
//             'alamat_user' => $row['alamat'],
//         );
//     array_push($array, $data);
//     }
// }
// echo json_encode($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href=""><?php $result ?></a>
</body>
</html>