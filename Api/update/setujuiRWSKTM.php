<?php
 $dbHost = "localhost";  
 $dbUser = "kepuharjo";  
 $dbPass = "";  
 $dbName = "root";  
  $conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);  
 
  try {  
   // set the PDO error mode untuk exception  
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
   //menentukan id record yang akan diupdate  
    echo $_GET['kode'];
   //membuat query mengupdate record pada tabel User

   $query="UPDATE surat_tidak_mampu SET status_surat='Disetujui RW' WHERE id_surat='$_GET[kode]'";   
   // Membuat prepare statement  
   $stmt = $conn->prepare($query);  
   // menjalankan query  
   $stmt->execute();  
   header("location:../../surat-diproses.php");
   }  
 catch(PDOException $e)  
   {  
   }  

 // menutup koneksi  
 $conn = null;  
 ?>  