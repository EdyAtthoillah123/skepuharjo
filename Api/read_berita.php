<?php

header("Acces-Control-Allow-Origin: *");
$db = mysqli_connect('localhost','wstifai3_suket-kel','Polije1234','wstifai3_suket-kel');
if(!$db)
{
	echo "Database connection failed";
}
    $sql = "SELECT * FROM berita ORDER BY id_berita DESC";
    $data = mysqli_query($db, $sql);
    $rows = array();

    while ($r = mysqli_fetch_assoc($data)) {
        $rows[] = $r;
    }
     print json_encode($rows);
?>
