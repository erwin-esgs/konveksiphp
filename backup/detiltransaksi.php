<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title></title>
  </head>
 <body>
	<div class="container" style="padding:3%;">
	
		<div class="card mb-3" >
		<a href="index.php"><button type="button" class="btn btn-secondary" style="width: 100%;">Back</button></a>
		<div class="card" >
		<center><h3>Detail Transaksi</h3></center>
		<div class="card">
			<div class="d-flex w-100 justify-content-between">
				<center><h5 class="mb-1">ID Transaksi : <?php 	$idtransaksi = $_GET['idtransaksi']; echo $idtransaksi; ?></h5></center>
			</div>

	
			<div class="form-row card-body"> 
<?php 
	require('koneksi.php');

	$statusid = $_SESSION["statusid"];
	$con = mysqli_connect($host,$dbid,$dbpass,$dbname);
	$sql = "SELECT transaksi.idproduk, transaksi.username, transaksi.jumlah, transaksi.keterangan, transaksi.contoh, produk.namaproduk, produk.harga, produk.gambar
	FROM transaksi
	INNER JOIN produk ON transaksi.idproduk=produk.idproduk WHERE transaksi.idtransaksi='".$idtransaksi."' ";
	$result = $con->query($sql);
	$con->close();
	if ($result->num_rows > 0) {
	    // output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			$idproduk = $row["idproduk"];
			$namaproduk = $row["namaproduk"];
			$keterangan = $row["keterangan"];
			$harga = $row["harga"];
			$jumlah = $row["jumlah"];
			$gambar = $row["gambar"];
			$contoh = $row["contoh"];
		
		echo'
		<a href="#" class="list-group-item list-group-item-action">
			<img src="data:image/jpeg;base64,'.base64_encode( $gambar ).'" height="100px" width="120px" />';
		if($contoh != ""){
		echo' Request model seperti : <img src="data:image/jpeg;base64,'.base64_encode( $contoh	 ).'" height="100px" width="120px" /> ';
		}	
		echo'<div class="d-flex w-100 justify-content-between">
				<h5 class="mb-1">Nama Produk: '.$namaproduk.'</h5>
				<small class="text-muted">Kode produk: '.$idproduk.'</small>
			</div>
			<p class="mb-1">'.$keterangan.'</p>
			<small class="text-muted">'.$jumlah.' Lusin X Rp.'.$harga.'</small>
		</a>
		';
		
		}
    }
?>
			</div>
		</div>
		</div>
		</div>
	</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>