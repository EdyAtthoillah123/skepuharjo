<?php

header("Acces-Control-Allow-Origin: *");
$db = mysqli_connect('localhost','wstifai3_suket-kel','Polije1234','wstifai3_suket-kel');
if(!$db)
{
	echo "Database connection failed";
}
    $id_akun = $_POST['id_akun'];
    $status_surat = $_POST['status_surat'];
    $sql = "SELECT * FROM surat_tidak_mampu WHERE id_akun = '".$id_akun."' AND status_surat = '".$status_surat."' ORDER BY id_surat DESC";
    $data = mysqli_query($db, $sql);
    $rows = array();

    while ($r = mysqli_fetch_assoc($data)) {
        $rows[] = $r;
    }
     echo json_encode($rows);
?>
