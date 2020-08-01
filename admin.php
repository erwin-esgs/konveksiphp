<html>

	<div class="header-info">
	<div class="row">
	
		<div class="col-lg-3">
			<div class="single-features-ads first">
			<a href="tambahproduk.html"><h4>Tambah Produk</h4></a>
			</div>
		</div>
	
		<div class="col-lg-3">
			<div class="single-features-ads first">
			<a href="tampiladmin.php"><h4>Daftar Produk</h4></a>
			</div>
		</div>
		
		<div class="col-lg-3">
			<div class="single-features-ads first">
			<a href="tabeltransaksi.php"><h4>Report transaksi</h4></a>
			</div>
		</div>
		
		<div class="col-lg-2">
			<div class="single-features-ads first">
				
					<form method="GET" action="index.php"> 
						<input class="textinput1" name="keyword" placeholder="SEARCH BY ID" type="number"><input class="button1" type="submit" value="Search">
					</form>
				
			</div>
		</div>
	</div>
	</div>
	
<div class="container" style="background-color:white; padding:2%; "  >
<?php 
require('koneksi.php');
	if($statusid !=0){
		echo "<script language='javascript'>alert('Kembali ke home'); window.location.href = 'index.php';</script>";
	}
	?>

	<br><center><h6>Daftar Transaksi</h6></center><br>

	<?php
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
			?>
			<a href = "detiltransaksi.php?idtransaksi=<?=$idtransaksi;?>" >
			<li class="list-group-item d-flex justify-content-between align-items-center">
				<div class="input-group">
						<input type="text" class="form-control-plaintext"  value="Rp<?=$totalharga;?>" readonly>
			<?php
				if($row["status"] == 2){
					/*
					echo'
				<form action="uploadbukti.php?idtransaksi='.$idtransaksi.'" method="post" enctype="multipart/form-data" >
					<div class="btn-group" role="group" aria-label="Third group">
					Upload bukti transfer &nbsp
						<input name="image" type="file"  />
						<button type="submit" id="submit" class="btn btn-secondary">Submit</button>
					</div>
				</form> ';
					*/
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
				
				?>
				
				</div>
				&nbsp
				<span class="badge badge-pill badge-info"><?=$status;?></span>
			</li>
			</a>
				<?php
				$idtransaksiprev = $idtransaksi;
		}
		
	}
?>
</div>
</html>