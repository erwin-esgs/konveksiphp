<?php session_start(); ?>
<?php
require('koneksi.php');
$username = $_POST["username"];
$password = md5($_POST["password"]);
if (!isset($_SESSION["statusid"]) ) {
	$con = mysqli_connect($host,$dbid,$dbpass,$dbname);
	$sql = "SELECT username, password, status FROM user 
	        WHERE  username = '".$username."' AND password = '".$password."' ";
	$result = $con->query($sql);
	$con->close();
	if ($result->num_rows > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$_SESSION["statusid"] = $row["status"];
		}
		$_SESSION["username"] = $username;
		echo "<script language='javascript'>alert('Selamat Datang ".$username." !');window.location.href = 'index.php';</script>";
    }else{
		echo "<script language='javascript'>alert('Login Gagal');window.location.href = 'login.html';</script>";
	}
}else{
	echo "<script language='javascript'>alert('Anda sudah login silahkan lanjutkan sesi anda');window.location.href = 'index.php';</script>";
}
?>
