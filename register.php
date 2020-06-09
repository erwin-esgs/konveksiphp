<?php
require('koneksi.php');
$username = $_POST["username"];
$nama = $_POST["nama"];
$password = md5($_POST["password"]);
$telepon = $_POST["telepon"];
$alamat = $_POST["alamat"];

	$con = mysqli_connect($host,$dbid,$dbpass,$dbname);
	//cek username
	$sql = "SELECT username FROM user WHERE  username = '".$username."' ";
	$result = $con->query($sql);
	
	if ($result->num_rows == 0) {
	//save username
		$sql = "INSERT INTO user (username,nama, password, telepon, alamat, status) 
	        VALUES ( '".$username."', '".$nama."', '".$password."' , '".$telepon."' , '".$alamat."' , '1')";
		$result = $con->query($sql);
		$con->close();
		if($result){
			echo "<script language='javascript'>alert('Username: ".$username." Berhasil didaftarkan');window.location.href = 'login.html';</script>";
		}else{
			echo "<script language='javascript'>alert('Register Gagal');window.location.href = 'register.html';</script>";
		}
    }else{
		echo "<script language='javascript'>alert('Register Gagal, Username sudah ada!');window.location.href = 'register.html';</script>";
	}
	
?>