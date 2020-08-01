<?php session_start(); ?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Yoga Studio Template">
    <meta name="keywords" content="Yoga, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Violet | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    
    <!-- Search model -->
	<div class="search-model">
		<div class="h-100 d-flex align-items-center justify-content-center">
			<div class="search-close-switch">+</div>
			<form class="search-model-form">
				<input type="text" id="search-input" placeholder="Search here.....">
			</form>
		</div>
	</div>
	<!-- Search model end -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="inner-header">
                <div class="logo">
                    <a href="./index.php"><img src="img/logos/logo-3.png" alt=""></a>
                </div>
                				
                <div class="user-access">
                    <a href="logout.php">Logout</a>
                </div>
				<div class="user-access">
                    <a href="editprofile.php"><?=$_SESSION["username"];?></a>
                </div>
				
                <nav class="main-menu mobile-menu">
                    <ul>

                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <!-- Header Info Begin -->
    
    <!-- Header Info End -->
    <!-- Header End -->


    <!-- Product Page Section Beign -->
    <section class="product-page">
        <div class="container">
		
		<div style=" padding-bottom:2%; "  ><a href="index.php"><button  type="button" class="btn btn-secondary">Back</button></a> </div>
		
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
			
		//echo ' <img  src="data:image/jpeg;base64,'.base64_encode( $gambar ).'" class="card-img" alt="produk" style="height:390px;width:450px;" /> ';
		}
    }
?>
		
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-slider owl-carousel">
                        <div class="product-img">
                            <figure>
                                <img src="data:image/jpeg;base64,<?=base64_encode( $gambar );?>" height="500px" width="400px" >
                            </figure>
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-6">
                    <div class="product-content">
                        <h2><?=$namaproduk;?></h2>
                        <div class="pc-meta">
                            <h5>Rp <?=$harga;?></h5>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <p><?=$deskripsi;?></p>
                        <ul class="tags">
                            <li><span>ID Produk :</span> <?=$idproduk;?></li>
                        </ul>
						
<?php 		
			if ($statusid == 0) {
				echo '<a href="ubahproduk.php?idproduk='.$idproduk.'" ><button style="width:100%;" class="primary-btn pc-btn" onclick="">  &nbsp  Ubah &nbsp  </button></a>';
			}else{
				echo '<button class="primary-btn pc-btn" onclick="popup('.$idproduk.')">  &nbsp  Tambah ke keranjang &nbsp  </button>';
			}
	include('tambahkeranjang.php');
?>                        
                        <ul class="p-info">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section><br>
    <!-- Product Page Section End -->


    <!-- Footer Section Begin -->
    <footer class="footer-section spad">
        <div class="container">
            <div class="footer-widget">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-footer-widget">
                            <h4>About us</h4>
                            <ul>
                                <li>About Us</li>
                                <li>Community</li>
                                <li>Jobs</li>
                                <li>Shipping</li>
                                <li>Contact Us</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-footer-widget">
                            <h4>Customer Care</h4>
                            <ul>
                                <li>Search</li>
                                <li>Privacy Policy</li>
                                <li>2019 Lookbook</li>
                                <li>Shipping & Delivery</li>
                                <li>Gallery</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-footer-widget">
                            <h4>Our Services</h4>
                            <ul>
                                <li>Free Shipping</li>
                                <li>Free Returnes</li>
                                <li>Our Franchising</li>
                                <li>Terms and conditions</li>
                                <li>Privacy Policy</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-footer-widget">
                            <h4>Information</h4>
                            <ul>
                                <li>Payment methods</li>
                                <li>Times and shipping costs</li>
                                <li>Product Returns</li>
                                <li>Shipping methods</li>
                                <li>Conformity of the products</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="social-links-warp">
			<div class="container">
				<div class="social-links">
					<a href="#" class="instagram"><i class="fa fa-instagram"></i><span>instagram</span></a>
					<a href="#" class="pinterest"><i class="fa fa-pinterest"></i><span>pinterest</span></a>
					<a href="#" class="facebook"><i class="fa fa-facebook"></i><span>facebook</span></a>
					<a href="#" class="twitter"><i class="fa fa-twitter"></i><span>twitter</span></a>
					<a href="#" class="youtube"><i class="fa fa-youtube"></i><span>youtube</span></a>
					<a href="#" class="tumblr"><i class="fa fa-tumblr-square"></i><span>tumblr</span></a>
				</div>
			</div>

<div class="container text-center pt-5">
                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>

		</div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>

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