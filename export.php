<?php
session_start(); 
	include"koneksi.php";
	//header("Content-type: application/vnd-ms-excel");
	//header("Content-Disposition: attachment; filename=DataPenjualan.xls");
	
	require('fpdf/fpdf.php'); 
// Setting halaman PDF
$pdf = new FPDF('l','mm','A5');
// Menambah halaman baru
$pdf->AddPage();
// Setting jenis font
$pdf->SetFont('Arial','B',16);
// Membuat string
$pdf->Cell(190,7,'Daftar Transaksi',0,1,'C');
$pdf->SetFont('Arial','B',9);
$pdf->Cell(190,7,'Konveksi',0,1,'C');
// Setting spasi kebawah supaya tidak rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',11);
$pdf->Cell(35,6,'ID Transaksi',1,0);
$pdf->Cell(35,6,'ID Produk',1,0);
$pdf->Cell(35,6,'Nama Produk',1,0);
$pdf->Cell(35,6,'Qty (lusin)',1,0);
$pdf->Cell(35,6,'Harga Per Lusin',1,1);
 
	$username = $_SESSION["username"];
	$con = mysqli_connect($host,$dbid,$dbpass,$dbname);
	$sql = "SELECT transaksi.idtransaksi, transaksi.idproduk, transaksi.username, transaksi.jumlah, transaksi.keterangan, produk.namaproduk, produk.harga
	FROM transaksi
	INNER JOIN produk ON transaksi.idproduk=produk.idproduk ";
	$result = $con->query($sql);
		if (isset($result->num_rows) && $result->num_rows > 0) {
			
			$idtransaksibefore="";
			while($row = mysqli_fetch_assoc($result)) {
			$pdf->SetFont('Arial','',10);
			$idtransaksi = $row["idtransaksi"];
			$idproduk = $row["idproduk"];
			$namaproduk = $row["namaproduk"];
			$keterangan = $row["keterangan"];
			$harga = $row["harga"];
			$jumlah = $row["jumlah"];
			if($idtransaksi != $idtransaksibefore){
				$pdf->Cell(35,6,$row['idtransaksi'],1,0);
				$pdf->Cell(35,6,$row['idproduk'],1,0);
				$pdf->Cell(35,6,$row['namaproduk'],1,0);
				$pdf->Cell(35,6,$row['harga'],1,0);
				$pdf->Cell(35,6,$row['jumlah'],1,1);
				$idtransaksibefore=$idtransaksi;
			}else{	
				$pdf->Cell(35,6,$row['idproduk'],1,0);
				$pdf->Cell(35,6,$row['namaproduk'],1,0);
				$pdf->Cell(35,6,$row['harga'],1,0);
				$pdf->Cell(35,6,$row['jumlah'],1,1);

			}
			}	
		}
		$con->close();
		$pdf->Output();

?>