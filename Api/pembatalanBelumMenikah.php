<?php
$db = mysqli_connect('localhost','wstifai3_suket-kel','Polije1234','wstifai3_suket-kel');
$id_surat = $_POST['id_surat'];
$statusSurat = $_POST['status_surat'];
$result = $db->query("UPDATE surat_ket_belum_menikah SET status_surat = '$statusSurat' WHERE id_surat = '$id_surat'");
if ($result) {
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('success'=>false));
}
?>