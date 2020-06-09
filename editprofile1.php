<?php
require('koneksi.php');
$username = $_POST["username"];
$nama = $_POST["nama"];
$passwordlama = md5($_POST["passwordlama"]);
$password = md5($_POST["password"]);
$telepon = $_POST["telepon"];
$alamat = $_POST["alamat"];

	$con = mysqli_connect($host,$dbid,$dbpass,$dbname);
	//save username
		$sql = "UPDATE user SET nama = '".$nama."', password = '".$password."', telepon = '".$telepon."', alamat = '".$alamat."' WHERE username = '".$username."' ";
		$result = $con->query($sql);
		$con->close();
		if($result){
			echo "<script language='javascript'>alert('Username: ".$username." Berhasil diubah');window.location.href = 'index.php';</script>";
		}else{
			echo "<script language='javascript'>alert('Perubahan Gagal');window.location.href = 'index.php';</script>";
		}
  
	
?>