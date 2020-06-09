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
		<center><h3>Bukti bayar</h3></center>
			<div class="card-body list-group-item">
				<div class="row no-gutters ">
					<div class="col-md-5"> 
<?php 
	require('koneksi.php');
	$idtransaksi = $_GET['idtransaksi'];
	$totalharga = $_GET['totalharga'];
	$con = mysqli_connect($host,$dbid,$dbpass,$dbname);
	$sql = "SELECT buktibayar FROM buktibayar WHERE idtransaksi = '".$idtransaksi."' ";
	$result = $con->query($sql);
	$con->close();
	if ($result->num_rows == 1) {
	    // output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			$gambar = $row["buktibayar"];
			
		echo ' <img  src="data:image/jpeg;base64,'.base64_encode( $gambar ).'" class="card-img" alt="produk" style="height:390px;width:450px;" /> ';
		}
    }
?>
					</div>
					<div class="col-md-5">
						<div class="card-body">
						<p class="card-text">Harga: <?php echo $totalharga; ?></p>
						</div>
					</div>
				</div>
			</div>
<?php 		
			echo '	<div class="input-group d-flex justify-content-between"> 
					<a href="verifikasibukti1.php?idtransaksi='.$idtransaksi.'&status=1"><button class="btn btn-primary" onclick="return confirm()"> &nbsp &nbsp &nbsp Tolak &nbsp &nbsp &nbsp </button> </a>';
			echo '	<a href="verifikasibukti1.php?idtransaksi='.$idtransaksi.'&status=3"><button class="btn btn-primary" onclick="return confirm()"> &nbsp &nbsp &nbsp Terima &nbsp &nbsp &nbsp </button>  </a>
					<div>';
?>
			</div>
		</div>
		
	</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script> 
	function myFunction() {
	    if (confirm('Yakin lanjut membayar?')) {
		return true;
    } else {
        return false;
    }
	}
	</script >
  </body>
</html>