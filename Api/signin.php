<?php
 $db = mysqli_connect('localhost','wstifai3_suket-kel','Polije1234','wstifai3_suket-kel');
 $id_akun = $_POST['id_akun'];
 $password = $_POST['password']; 

 $sql = "SELECT * FROM akun WHERE id_akun = '".$id_akun."' AND hak_akses = '4'";
 $result = mysqli_query($db,$sql);
 if($result->num_rows == 1){
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password']) ) {
        echo json_encode([ 
        'success' => true,    
        'user' => $row, 
        JSON_PRETTY_PRINT
    ]);    
    } else {
        echo json_encode([
            'success' => false,
            'message' => "Password Salah"]
        );
    }
 } 
 else{
 	echo json_encode([
        'success' => false,
        'message' => "Nik dan Password Salah"
    ]);
 }
?>