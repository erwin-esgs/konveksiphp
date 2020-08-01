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
		<a href="index.php"><button type="button" class="btn btn-primary" style="width: 100%;">Back</button></a>
		<div class="card" >
		<center><h3>Detail Produk</h3></center>
			<div class="card-body list-group-item">
				<div class="row no-gutters ">
					<div class="col-md-5"> 
<?php 
	require('koneksi.php');
	$idproduk = $_GET['idproduk'];
	$statusid = $_SESSION["statusid"];
	$con = mysqli_connect($host,$dbid,$dbpass,$dbname);
	$sql = "SELECT * FROM produk WHERE idproduk = '".$idproduk."' ";
	$result = $con->query($sql);
	$con->close();
	if ($result->num_rows == 1) {
	    // output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			
			$idproduk = $row["idproduk"];
			$namaproduk = $row["namaproduk"];
			$harga = $row["harga"];
			$deskripsi = $row["deskripsi"];
			$gambar = $row["gambar"];
			
		echo ' <img  src="data:image/jpeg;base64,'.base64_encode( $gambar ).'" class="card-img" alt="produk" style="height:390px;width:450px;" /> ';
		}
    }
?>
					</div>
					<div class="col-md-5">
						<div class="card-body">
						<h5 class="card-title"><?php echo $namaproduk; ?></h5>
						<p class="card-text">Harga: <?php echo $harga; ?></p>
						<p class="card-text"><?php echo $deskripsi; ?></p>
						</div>
					</div>
				</div>
			</div>
<?php 		
			if ($statusid == 0) {
				echo '<a href="ubahproduk.php?idproduk='.$idproduk.'" ><button style="width:100%;" class="btn btn-primary" onclick="">  &nbsp  Ubah &nbsp  </button></a>';
			}else{
				echo '<button  class="btn btn-primary" onclick="popup('.$idproduk.')">  &nbsp  Beli &nbsp  </button>';
			}
	include('tambahkeranjang.php');
?>
			</div>
		</div>
		
	</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>