<!DOCTYPE html>
<?php
require('koneksi.php');
$idtransaksi = $_GET["idtransaksi"];
date_default_timezone_set("Asia/Bangkok");
$idproduk = strval(date('ymdHis ', time()));

//$imgsize = getimagesize($_FILES['image']['tmp_name']);
$maxsize= 1025152;
    if( ($_FILES['image']['tmp_name'] != null) && ($_FILES['image']['size'] <= $maxsize) && ($_FILES['image']['size'] > 0) ) {
	$imgdata = addslashes (file_get_contents($_FILES['image']['tmp_name']));

		$con =  mysqli_connect($host,$dbid,$dbpass,$dbname);
		$sql = "UPDATE buktibayar SET buktibayar = '".$imgdata."', status = 2 WHERE idtransaksi = '".$idtransaksi."' ";
		$result = $con->query($sql);
		$con->close();
		if($result){
			echo "<script language='javascript'>alert('Berhasil Disimpan');window.location.href = 'index.php';</script>";
		}else{
			echo "<script language='javascript'>alert('Gagal Disimpan');window.location.href = 'daftartransaksi.php';</script>";
		}
	}else{
		echo "<script language='javascript'>alert('Gagal Disimpan, Gambar lebih dari 1mb');window.location.href = 'daftartransaksi.php';</;</script>";
	}
?>
