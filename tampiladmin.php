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

    <!-- Hero Slider Begin -->
    <section class="hero-slider">
    <div class="container" style="background-color:white; padding:2%; "  >    
<a href="index.php"><button  type="button" class="btn btn-secondary">Back</button></a><br>
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
	<a href="?halaman=<?php echo $i; ?>"><button type="button" class="btn btn-secondary" ><?php echo $i; ?> </button></a> &nbsp  &nbsp <?php
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
					<center>
					<a class="btn btn-secondary" href="ubahproduk.php?idproduk=<?=$idproduk;?>" >  Ubah  </a>
					<a class="btn btn-secondary" href="tambahproduk.php?idproduk=<?=$idproduk;?>" onclick="return confirm()" > Hapus </a>
					</center>
                </div>
	
			<?php		
		
		}
    }
	echo '</div>';//daftarproduk
	echo ' <div class="btn-group" role="group" aria-label="Basic example">';
	$pages = ceil($total/$halaman); 
	for ($i=1; $i<=$pages ; $i++){ ?>
	<a href="?halaman=<?php echo $i; ?>"><button type="button" class="btn btn-secondary" ><?php echo $i; ?> </button></a> &nbsp  &nbsp <?php
	} echo ' </div>';
	
?>         
    </div>
    </section>
    <!-- Hero Slider End -->

    <!-- Features Section Begin -->
    <section class="features-section spad">
        <div class="features-ads">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-features-ads first">
                            <img src="img/icons/f-delivery.png" alt="">
                            <h4>Free shipping</h4>
                            <p>Fusce urna quam, euismod sit amet mollis quis, vestibulum quis velit. Vesti bulum mal
                                esuada aliquet libero viverra cursus. </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-features-ads second">
                            <img src="img/icons/coin.png" alt="">
                            <h4>100% Money back </h4>
                            <p>Urna quam, euismod sit amet mollis quis, vestibulum quis velit. Vesti bulum mal esuada
                                aliquet libero viverra cursus. </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-features-ads">
                            <img src="img/icons/chat.png" alt="">
                            <h4>Online support 24/7</h4>
                            <p>Urna quam, euismod sit amet mollis quis, vestibulum quis velit. Vesti bulum mal esuada
                                aliquet libero viverra cursus. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Features Box -->
   
	</section>
    <!-- Features Section End -->



    <!-- Footer Section Begin -->
    <footer class="footer-section spad">
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

