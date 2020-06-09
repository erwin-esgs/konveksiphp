<?php session_start(); ?>
<!DOCTYPE html>
<link rel="stylesheet" href="css/bootstrap.min.css">
<?php
require('koneksi.php');
date_default_timezone_set("Asia/Bangkok");
$idtransaksi = strval(date('ymdHis ', time()));
$username = $_SESSION["username"];
$jlhdata = $_POST["jlhdata"];
$totalharga = intval($_POST["totalharga"]);

$con =  mysqli_connect($host,$dbid,$dbpass,$dbname);
for($i=0; $i<$jlhdata; $i++){
	$imgdata='';
	if( $_FILES['image']['size'][$i] != 0 ){
		$imgdata = addslashes (file_get_contents($_FILES['image']['tmp_name'][$i]));
	}
	$sql = "INSERT INTO transaksi (idtransaksi, idproduk, username, jumlah, keterangan, contoh) 
			VALUES ( '".$idtransaksi."' , '".$_POST["idproduk"][$i]."' , '".$username."' , '".$_POST["jumlah"][$i]."' , '".$_POST["keterangan"][$i]."' , '".$imgdata."'  )";
	$result = $con->query($sql);
}
	$sql = "INSERT INTO buktibayar (idtransaksi , username , totalharga , status) 
			VALUES ( '".$idtransaksi."' , '".$username."' , ".$totalharga." , 1  )";
	$result = $con->query($sql);
	$con->close();
	echo'
<div class="container" style="padding:10%;">
	<div class="card" style="width: 70%;">
		<div class="card-body">
			<h5 class="card-title">ID transaksi: '.$idtransaksi.'</h5>
			<p>Silahkan melakukan transfer ke: <br> Bank : BCA <br> Atas nama : SAYA. <br> Nomor Rekening : 1234567890</p>
			<p>Sejumlah: Rp'.$totalharga.' </p>
			Silahkan klik daftar transaksi untuk mengunggah bukti transfer
			<a href="transaksi.php"><button class="btn btn-primary" onclick="delCookie()">Daftar Transaksi</button></a>
		</div>
	</div>
<div>
	';
?>
<script>
function delCookie() {
	document.cookie = "isikeranjang=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;"; //del cookie
}
</script>