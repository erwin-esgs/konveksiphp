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
    <div class="header-info">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="header-item">
                    </div>
                </div>
                <div class="col-md-4 text-left text-lg-center">
                    <div class="header-item">
                    </div>
                </div>
                <div class="col-md-4 text-left text-xl-right">
                    <div class="header-item">
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Info End -->
    <!-- Header End -->

    <!-- Page Add Section Begin -->
    <section class="page-add cart-page-add">
        <div class="container">
		<a href="index.php"><button  type="button" class="btn btn-secondary">Back</button></a><br>
            <div class="row">
                <div class="col-lg-4">
                    <div class="page-breadcrumb">
                        <h4><?php 	$idtransaksi = $_GET['idtransaksi']; echo $idtransaksi; ?><span>.</span></h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Add Section End -->

    <!-- Cart Page Section Begin -->
    <div class="cart-page">
        <div class="container">
		
            <div class="cart-table">
                <table>
                    <thead>
                        <tr>
                            <th class="product-h">Product</th>
                            <th>Price</th>
                            <th><center>Quantity</center></th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>				
                    <tbody>
<?php 
	require('koneksi.php');

	$statusid = $_SESSION["statusid"];
	$con = mysqli_connect($host,$dbid,$dbpass,$dbname);
	$sql = "SELECT transaksi.idproduk, transaksi.username, transaksi.jumlah, transaksi.keterangan, transaksi.contoh, produk.namaproduk, produk.harga, produk.gambar
	FROM transaksi
	INNER JOIN produk ON transaksi.idproduk=produk.idproduk WHERE transaksi.idtransaksi='".$idtransaksi."' ";
	$result = $con->query($sql);
	$con->close();
	if ($result->num_rows > 0) {
	    // output data of each row
		$username1 = "";
		while($row = mysqli_fetch_assoc($result)) {
			$idproduk = $row["idproduk"];
			$username = $row["username"];
			$namaproduk = $row["namaproduk"];
			$keterangan = $row["keterangan"];
			$harga = $row["harga"];
			$jumlah = $row["jumlah"];
			$gambar = $row["gambar"];
			$contoh = $row["contoh"];
?>
                        <tr>
								<h5><?php if($username != $username1){echo " &nbsp Nama Pelanggan : ".$username; $username1=$username;} ?></h5>
                            <td class="product-col">

                                <img src="data:image/jpeg;base64,<?=base64_encode( $gambar );?>" height="100px" width="120px" />
                                <div class="p-title">
                                    <h5><?=$namaproduk;?></h5>
                                </div>
                            </td>
                            <td class="price-col"><?=$harga;?></td>
                            <td class="quantity-col"><center><?=$jumlah;?></center></td>
                            <td class="total"><?=$harga*$jumlah;?></td>
                            <td class="product-close">
                        
<?php		
		//echo'<a href="#" class="list-group-item list-group-item-action"><img src="data:image/jpeg;base64,'.base64_encode( $gambar ).'" height="100px" width="120px" />';
		if($contoh != ""){
		echo' Request model : <img src="data:image/jpeg;base64,'.base64_encode( $contoh	 ).'" height="100px" width="120px" /> ';
		}	
		//echo'<div class="d-flex w-100 justify-content-between"><h5 class="mb-1">Nama Produk: '.$namaproduk.'</h5><small class="text-muted">Kode produk: '.$idproduk.'</small></div><p class="mb-1">'.$keterangan.'</p><small class="text-muted">'.$jumlah.' Lusin X Rp.'.$harga.'</small></a>';
		
		}
    }
?>
							</td>
						</tr>
                    </tbody>
                </table>
            </div>

        </div>
		
        <div class="shopping-method">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="total-info">
                            <div class="total-table">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
	</div>
    <!-- Cart Page Section End -->

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
					<a href="" class="instagram"><i class="fa fa-instagram"></i><span>instagram</span></a>
					<a href="" class="pinterest"><i class="fa fa-pinterest"></i><span>pinterest</span></a>
					<a href="" class="facebook"><i class="fa fa-facebook"></i><span>facebook</span></a>
					<a href="" class="twitter"><i class="fa fa-twitter"></i><span>twitter</span></a>
					<a href="" class="youtube"><i class="fa fa-youtube"></i><span>youtube</span></a>
					<a href="" class="tumblr"><i class="fa fa-tumblr-square"></i><span>tumblr</span></a>
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