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
	<div class="container">

		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="index.php"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav ml-auto">
				<a class="nav-item nav-link" href="logout.php">LOGOUT</a>
			</div>
		</div>
		</nav>
		<a href="index.php"><button  type="button" class="btn btn-primary">Back</button></a><br>
<?php
require('koneksi.php');
	$page = isset($_GET['halaman'])? (int)$_GET["halaman"]:1;
	$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
	$con = mysqli_connect($host,$dbid,$dbpass,$dbname);
	$sql = "SELECT idproduk FROM produk";
	$result = $con->query($sql);
	$total = mysqli_num_rows($result);
	$sql = "SELECT * FROM produk ORDER BY idproduk DESC LIMIT $mulai, $halaman ";
	$result = $con->query($sql);
	$con->close();
	
	echo ' <div class="btn-group" role="group" aria-label="Basic example">';
	$pages = ceil($total/$halaman); 
	for ($i=1; $i<=$pages ; $i++){ ?>
	<a href="?halaman=<?php echo $i; ?>"><button type="button" class="btn btn-primary" ><?php echo $i; ?> </button></a> &nbsp  &nbsp <?php
	} echo ' </div>';
	echo '<div class="row" id="daftarproduk" style="width: 100%;">';//daftarproduk
	
	if (isset($result->num_rows) && $result->num_rows > 0) {
	    // output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			
			$idproduk = $row["idproduk"];
			$namaproduk = $row["namaproduk"];
			$harga = $row["harga"];
			$status = $row["status"];
			$gambar = $row["gambar"];
		echo ' <div class="col-sm-3" > '; 	
		echo ' 	<div class="card" > '; 
		echo ' 		<div class="card-body"><a href="produk.php?idproduk='.$idproduk.'"> '; 
		echo ' 			<div class="list-group-item"><center><h5> '.$namaproduk.' <h5></center></div>';
		echo ' 			<div class="list-group-item"> <img src="data:image/jpeg;base64,'.base64_encode( $gambar ).'" height="150px" width="150px" /> </div>';
		echo ' 			<div class="list-group-item">Harga: Rp'.$harga.' </div> ' ;
		echo ' 		</a></div>' ;
		echo ' 	  <div class="btn-group" role="group" aria-label="Basic example">';
		echo ' 		<a class="btn btn-primary" href="ubahproduk.php?idproduk='.$idproduk.'" >  Ubah  </a> ';
		echo ' 		<a class="btn btn-primary" href="tambahproduk.php?idproduk='.$idproduk.'" onclick="return confirm()" > Hapus </a>';
		echo ' 	  </div>' ;
		echo ' 	</div>' ;
		echo ' </div>' ;
		}
    }
	echo '</div>';//daftarproduk
	echo ' <div class="btn-group" role="group" aria-label="Basic example">';
	$pages = ceil($total/$halaman); 
	for ($i=1; $i<=$pages ; $i++){ ?>
	<a href="?halaman=<?php echo $i; ?>"><button type="button" class="btn btn-primary" ><?php echo $i; ?> </button></a> &nbsp  &nbsp <?php
	} echo ' </div>';
	
?>
	</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>