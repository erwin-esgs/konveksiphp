<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title></title>
  </head>
<?php 
require('koneksi.php');
$status = $_GET["status"];
$idtransaksi = $_GET['idtransaksi'];

$con =  mysqli_connect($host,$dbid,$dbpass,$dbname);
if($status==1){
	$imgdata='';
	$sql = "UPDATE buktibayar SET buktibayar = '".$imgdata."', status = $status WHERE idtransaksi = '".$idtransaksi."' ";
}else{
	$sql = "UPDATE buktibayar SET status = $status WHERE idtransaksi = '".$idtransaksi."' ";
}
	$result = $con->query($sql);
	$con->close();
	if($result){	
	echo'
<div class="container" style="padding:15%;">
	<div class="card" style="width: 70%;">
		<div class="card-body">
			<h5 class="card-title">ID transaksi: '.$idtransaksi.'</h5>
			<p>Status transaksi telah berubah , silahkan cek daftar transaksi</p>
			<a href="index.php"><button class="btn btn-primary" >Daftar Transaksi</button></a>
		</div>
	</div>
<div>
	';
	}
?>
</html>