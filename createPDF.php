

 <?php

require("../Web_Kelurahan_Kepuharjo/koneksi.php");
$connection = mysqli_connect("localhost","root","","mahasiswa");
$query = "SELECT * FROM user where id = 14";
$result = $connection->query("SELECT * FROM user where id = 14");


$header = "";


require('../Web_Kelurahan_Kepuharjo/fpdf185/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);		

// foreach($result as $row) {
// 	$pdf->SetFont('Arial','',12);	
// 	$pdf->Ln();
// 	foreach($row as $column)
// 		$pdf->Cell(90,12,$column,1);
// }
while($data = mysqli_fetch_array($result)){
	$pdf->Cell(4.5,1.5,''.$data['username'].'',1,0);
}
$pdf.Output("document.pdf", "C")

?>