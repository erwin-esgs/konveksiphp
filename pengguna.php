<?php 
	require('koneksi.php');
	
	echo '<div class="btn-group mr-2 ml-auto" role="group" > <a class="btn btn-secondary " href="keranjang.php">Keranjang</a> </div>';
	echo '<div class="btn-group mr-2 ml-auto" role="group" > <a class="btn btn-secondary " href="transaksi.php">Daftar Transaksi</a> </div> <br>';
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
	
	echo '<div class="row row-cols-1 row-cols-md-4" id="daftarproduk" style="width:100%;">';//daftarproduk
	
	if (isset($result->num_rows) && $result->num_rows > 0) {
	    // output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			
			$idproduk = $row["idproduk"];
			$namaproduk = $row["namaproduk"];
			$harga = $row["harga"];
			$status = $row["status"];
			$gambar = $row["gambar"];
		echo ' <div class="col mb-4" > '; 	
		echo ' 	<div class="card" > '; 
		echo ' 		<div class="card-body"><a href="produk.php?idproduk='.$idproduk.'"> '; 
		echo ' 			<div class="list-group-item"><center><h5> '.$namaproduk.' <h5></center></div>';
		echo ' 			<div class="list-group-item"><center><h5>Kode: '.$idproduk.' <h5></center></div>';
		echo ' 			<div class="list-group-item"> <img src="data:image/jpeg;base64,'.base64_encode( $gambar ).'" height="150px" width="100%" /> </div>';
		echo ' 			<div class="list-group-item">Harga : Rp'.number_format($harga).' </div> ' ;
		echo ' 		</a></div>' ;
		echo ' 		<button  class="btn btn-primary" onclick="popup('.$idproduk.')">  &nbsp  Beli &nbsp  </button> ';
		echo ' 	</div>' ;
		echo ' </div> ' ;
		
		}
    }
	
	echo '</div>';//daftarproduk
	echo ' <div class="btn-group" role="group" aria-label="Basic example">';
	$pages = ceil($total/$halaman); 
	for ($i=1; $i<=$pages ; $i++){ ?>
	<a href="?halaman=<?php echo $i; ?>"><button type="button" class="btn btn-primary" ><?php echo $i; ?> </button></a> &nbsp  &nbsp <?php
	
	} echo ' </div>';
	
	
include('tambahkeranjang.php');


?>
<script language="javascript">
function tambahkeranjang1(){
  var ourRequest = new XMLHttpRequest();
  ourRequest.open("GET", "tambahkeranjang.php");
  ourRequest.onload = function() {
    if (ourRequest.status >= 200 && ourRequest.status < 400) {
      var ourData = ourRequest.responseText;
       container.insertAdjacentHTML("beforeend", ourData);
    } else {
      console.log("We connected to the server, but it returned an error.");
    }
    
  };
  ourRequest.send();
}

</script>