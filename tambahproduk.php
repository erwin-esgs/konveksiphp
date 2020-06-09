<!DOCTYPE html>
<?php
require('koneksi.php');
$namaproduk = $_POST["namaproduk"];
$harga = intval($_POST["harga"]);
$deskripsi = $_POST["deskripsi"];
$status = 1;
$con =  mysqli_connect($host,$dbid,$dbpass,$dbname); $sql="";

if(isset($_GET["idproduk"])){ //hapus
	$idproduk = $_GET["idproduk"];
	$sql = "DELETE FROM produk WHERE idproduk = '".$idproduk."' ";
}else{
	if(isset($_GET["ubah"])){ //ubah
	$idproduk = substr($_POST["idproduk"],0,12);
	
	$maxsize= 1025152;
	if( ($_FILES['image']['size'] != 0) && ($_FILES['image']['size'] <= $maxsize) ) {
	$imgdata = addslashes (file_get_contents($_FILES['image']['tmp_name']));
	$sql = "UPDATE produk SET namaproduk = '".$namaproduk."' , deskripsi = '".$deskripsi."' , harga = '".$harga."' , gambar = '".$imgdata."'
	WHERE idproduk = '".$idproduk."' ";
	}else{
	$sql = "UPDATE produk SET namaproduk = '".$namaproduk."' , deskripsi = '".$deskripsi."' , harga = '".$harga."' WHERE idproduk = '".$idproduk."' ";
	}
}else{
	if(!isset($_GET["ubah"]) && !isset($_GET["hapus"])){ //new
	date_default_timezone_set("Asia/Bangkok");
	$idproduk = strval(date('ymdHis ', time()));
	$imgsize = getimagesize($_FILES['image']['tmp_name']); $maxsize= 1025152;
	if( ($imgsize !== false) && ($_FILES['image']['size'] <= $maxsize) ) {
	$imgdata = addslashes (file_get_contents($_FILES['image']['tmp_name']));
		$sql = "INSERT INTO produk (idproduk, namaproduk, harga, deskripsi, status, gambar) 
			VALUES ( '".$idproduk."' , '".$namaproduk."' , '".$harga."' , '".$deskripsi."' , '".$status."' , '".$imgdata."'  )";
	}
}
}
}


	



$result = $con->query($sql);
$con->close();
if($result){
	echo "<script language='javascript'>alert('Berhasil Disimpan');window.location.href = 'index.php';</script>";
}else{
	//echo "<script language='javascript'>alert('Gagal Disimpan');window.location.href = 'index.php';</script>";
}
?>
