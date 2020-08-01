<?php 
	require('koneksi.php');
	
	echo '';
	echo '';
	$page = isset($_GET['halaman'])? (int)$_GET["halaman"]:1;
	$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
	$con = mysqli_connect($host,$dbid,$dbpass,$dbname);
	$sql = "SELECT idproduk FROM produk";
	$result = $con->query($sql);
	$total = mysqli_num_rows($result);
	$sql = "SELECT * FROM produk ORDER BY idproduk DESC LIMIT $mulai, $halaman ";
	$result = $con->query($sql);
	$con->close();
	
	
	?>
	<div class="header-info">
        <div class="container-fluid" >
			<div class="btn-group mr-2 ml-auto" role="group" > <a class="btn btn-secondary " href="keranjang.php"> <img src="img/icons/bag.png" alt=""> Keranjang</a> </div>
			<div class="btn-group mr-2 ml-auto" role="group" > <a class="btn btn-secondary " href="transaksi.php">Daftar Transaksi</a> </div> <br>
        </div>
    </div>
	
	<div style=" padding-top:3%; padding-bottom:3%; " >
	
			<div class="container" style="background-color:white; padding:2%; "  >
	<?php		
	echo '<div class="product-filter">
                <div class="row">
                    <div class="col-lg-12 text-center">
						<ul class="product-controls">';
	$pages = ceil($total/$halaman); 
	for ($i=1; $i<=$pages ; $i++){ ?>
	<a href="?halaman=<?php echo $i; ?>"><li><?php echo $i; ?> </li></a> &nbsp &nbsp <?php
	} echo '        	</ul>
					</div>
                </div>
            </div> ';
	?>
				
                    <div class="col-lg-12"  >
						<div class="row" id="product-list">
							<div class="row row-cols-1 row-cols-md-4" id="daftarproduk" style="width:100%;">
	
	<?php
	
	echo '';//daftarproduk
	
	if (isset($result->num_rows) && $result->num_rows > 0) {
	    // output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			
			$idproduk = $row["idproduk"];
			$namaproduk = $row["namaproduk"];
			$harga = $row["harga"];
			$status = $row["status"];
			$gambar = $row["gambar"];
		
	?>		
	
				<div class="col-lg-3 col-sm-6 mix all dresses bags">
                    <a href="produk.php?idproduk=<?=$idproduk;?>">
					<div class="single-product-item">
                        <figure>
                            <img src="data:image/jpeg;base64,<?=base64_encode( $gambar );?>" alt="" height="300px" width="20%" >
                        </figure>
                        <div class="product-text">
                            <h6><?=$namaproduk;?></h6>
                            <p><?=number_format($harga);?></p>
                        </div>
                    </div>
					</a>
					<center><button  class="primary-btn pc-btn" onclick="popup(<?=$idproduk;?>)">  &nbsp  Beli &nbsp  </button></center>
                </div>
	
	<?php		
		
		}
    }
	
	echo '</div>';//daftarproduk

	
	
include('tambahkeranjang.php');


?>
						</div>
                    </div>
                
				
	<?php		
	echo '<div class="product-filter">
                <div class="row">
                    <div class="col-lg-12 text-center">
						<ul class="product-controls">';
	$pages = ceil($total/$halaman); 
	for ($i=1; $i<=$pages ; $i++){ ?>
	<a href="?halaman=<?php echo $i; ?>"><li><?php echo $i; ?> </li></a> &nbsp &nbsp <?php
	} echo '        	</ul>
					</div>
                </div>
            </div> ';
	?>
				
            </div>
	</div>
				
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