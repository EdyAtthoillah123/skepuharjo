<?php
$servername = "localhost";
$database = "wstifai3_suket-kel";
$username = "wstifai3_suket-kel";
$password = "Polije1234";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully ";
?>