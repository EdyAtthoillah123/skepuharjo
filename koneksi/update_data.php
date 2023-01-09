
<?php
    require "koneksi.php";
        if(count($_POST)>0) {
                $hasil = mysqli_query($conn,"UPDATE user set  username='" . $_POST['username'] . "', 
                 password='" . md5($_POST['password']) . "' ,alamat='" . $_POST['alamat'] . "' 
                 WHERE id='" . $_POST['id'] . "'");
        if (!$hasil) {
                echo "Gagal Update data";
                
        }else{
                echo "Data Berhasil di Update";
        }
    }

?>