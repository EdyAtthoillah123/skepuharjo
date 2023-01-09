<?php
 $dbHost = "localhost";  
 $dbUser = "kepuharjo";  
 $dbPass = "";  
 $dbName = "root";  
  $conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);  
 
  try {  
   // set the PDO error mode untuk exception  
   $_SESSION['hak_akses'];
                        if($_SESSION['hak_akses']=='2'){
                           echo $row = "Ditolak RT";
                        
                        }elseif($_SESSION['hak_akses']=='3'){
                            echo $row = "Ditolak RW";
                        }elseif($_SESSION['hak_akses']=='1'){
                            echo $row = "Ditolak Kelurahan";
                        }else{
                            
                        }
                     $rt= $_SESSION['rt'];
                    $rw = $_SESSION['rw'];
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
   //menentukan id record yang akan diupdate  
    echo $_GET['kode'];
   //membuat query mengupdate record pada tabel User    
   $query="UPDATE surat_tidak_mampu SET status_surat='Diproses RT' WHERE id_akun='$_GET[kode]'";   
   // Membuat prepare statement  
   $stmt = $conn->prepare($query);  
   // menjalankan query  
   $stmt->execute();  
   header("location:../../surat-masuk-SKTM.php");
   }  
 catch(PDOException $e)  
   {  
   }  

 // menutup koneksi  
 $conn = null;  
 ?>  