<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

  
    </head>
<body onload="">

	<div class="container" style="padding:5%;" id="container">
	   <a href="index.php"><button  type="button" class="btn btn-primary">Back</button></a>
	   <a href="export.php"><button  type="button" class="btn btn-primary">Export PDF</button></a>
	   <a href="exportexcel.php"><button  type="button" class="btn btn-primary">Export to Excell</button></a>
 <?php
require('koneksi.php');
echo'<table class="table">
  <thead>
    <tr>
      <th scope="col">ID Transaksi</th>
      <th scope="col">ID Produk</th>
      <th scope="col">Nama Produk</th>
	  <th scope="col">Qty (lusin)</th>
      <th scope="col">Harga Per Lusin</th>
    </tr>
  </thead>
  <tbody>';
  
	$username = $_SESSION["username"];
	$con = mysqli_connect($host,$dbid,$dbpass,$dbname);
	$sql = "SELECT transaksi.idtransaksi, transaksi.idproduk, transaksi.username, transaksi.jumlah, transaksi.keterangan, produk.namaproduk, produk.harga
	FROM transaksi
	INNER JOIN produk ON transaksi.idproduk=produk.idproduk ";
	$result = $con->query($sql);
		if (isset($result->num_rows) && $result->num_rows > 0) {
			$idtransaksibefore="";
			while($row = mysqli_fetch_assoc($result)) {
			$idtransaksi = $row["idtransaksi"];
			$idproduk = $row["idproduk"];
			$namaproduk = $row["namaproduk"];
			$keterangan = $row["keterangan"];
			$harga = $row["harga"];
			$jumlah = $row["jumlah"];
			if($idtransaksi != $idtransaksibefore){
				echo'
				<tr>
					<th scope="row">'.$idtransaksi.'</th>
					<td>'.$idproduk.'</td>
					<td>'.$namaproduk.'</td>
					<td>'.$jumlah.'</td>
					<td>'.$harga.'</td>
				</tr>';
				$idtransaksibefore=$idtransaksi;
			}else{	
				echo'
				<tr>
					<th scope="row"></th>
					<td>'.$idproduk.'</td>
					<td>'.$namaproduk.'</td>
					<td>'.$jumlah.'</td>
					<td>'.$harga.'</td>
				</tr>';
			}
			}	
		}
		$con->close();
echo'
  </tbody>
</table>';
?>
</form>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>