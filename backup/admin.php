<html>
<?php 
require('koneksi.php');
	if($statusid !=0){
		echo "<script language='javascript'>alert('Kembali ke home'); window.location.href = 'index.php';</script>";
	}
	echo '<div class="btn-group mr-2" role="group" > <a class="btn btn-secondary" href="tambahproduk.html">Tambah Produk</a> </div>'; 
	echo '<div class="btn-group mr-2" role="group" > <a class="btn btn-secondary" href="tampiladmin.php">Daftar Produk</a> </div>';
	echo '<div class="btn-group mr-2" role="group" > <a class="btn btn-secondary" href="tabeltransaksi.php">Report transaksi</a> </div>';
	echo '<div class="btn-group mr-2" role="group" >';
	echo '<form method="GET" action="index.php">  ';
	echo '<input class="textinput1" name="keyword" placeholder="SEARCH BY ID" type="number"> <input class="button1" type="submit" value="Search"><br>';
	echo '</form></div>';
	echo'<br><center><h6>Daftar Transaksi</h6></center><br>';


	$username = $_SESSION["username"];
	$con = mysqli_connect($host,$dbid,$dbpass,$dbname);
	if (isset($_GET['keyword']) && $_GET['keyword']!='') { // serch 
		$keyword = $_GET['keyword'];
		$sql = "SELECT idtransaksi, status, totalharga
	FROM buktibayar WHERE idtransaksi LIKE '%$keyword%' ORDER BY idtransaksi DESC";
	}else{
		$sql = "SELECT idtransaksi, status, totalharga
	FROM buktibayar ORDER BY idtransaksi DESC";
	}
	
	
	$result = $con->query($sql);
	if (isset($result->num_rows) && $result->num_rows > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$idtransaksi = $row["idtransaksi"];
			$totalharga = $row["totalharga"];
			include('switchstatus.php');
				echo'<a href = "detiltransaksi.php?idtransaksi='.$idtransaksi.'" ><li class="list-group-item d-flex justify-content-between align-items-center">';
					
				echo' <div class="input-group"><input type="text" class="input-group-text justify-content-end" value="'.$idtransaksi.'" readonly>
						<input type="text" class="input-group-text" value="Rp'.$totalharga.'" readonly></div>';
				if($row["status"] == 2){
					echo'
							<div class="btn-group mr-2" role="group" style=" z-index: 1;">
							<a class="btn btn-primary" href="verifikasibukti.php?idtransaksi='.$idtransaksi.'&totalharga='.$totalharga.'" >VerifikasiBukti</a>
							</div>
					';
				}
				if($row["status"] == 3){
					echo'
							<div class="btn-group mr-2" role="group" >
							<a href="verifikasibukti1.php?idtransaksi='.$idtransaksi.'&status=4"> <button class="btn btn-primary" onclick="return confirm()"> Packing </button>  </a>
							</div>
					';
				}
				if($row["status"] == 4){
					echo'
							<div class="btn-group mr-2" role="group" >
							<a href="verifikasibukti1.php?idtransaksi='.$idtransaksi.'&status=5"> <button class="btn btn-primary" onclick="return confirm()"> Kirim </button>  </a>
							</div>
					';
				}
				echo'<span class="badge badge-primary badge-pill">'.$status.'</span>
					</li></a>';
				$idtransaksiprev = $idtransaksi;
		}
		
	}
?>
</html>