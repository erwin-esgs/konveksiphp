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
    <div class="container" style="padding:2%;" id="container">
	   <a href="index.php"><button  type="button" class="btn btn-secondary">Back</button></a>
	<center><h5>Daftar Transaksi Anda</h5></center>    
            
<?php
require('koneksi.php');
	$username = $_SESSION["username"];
	$con = mysqli_connect($host,$dbid,$dbpass,$dbname);
	$sql = "SELECT idtransaksi, status, totalharga
	FROM buktibayar WHERE username = '".$username."' ORDER BY idtransaksi DESC";
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
					<input type="text" class="form-control-plaintext" value="<?=$idtransaksi;?>" readonly>
			<?php
			if($row["status"] == 1){
				echo'
				<form action="uploadbukti.php?idtransaksi='.$idtransaksi.'" method="post" enctype="multipart/form-data" >
					<div class="btn-group" role="group" aria-label="Third group">
					Upload bukti transfer &nbsp
						<input name="image" type="file"  />
						<button type="submit" id="submit" class="btn btn-secondary">Submit</button>
					</div>
				</form> ';
			}
			if($row["status"] == 5){
				echo'
				<div class="btn-group mr-2" role="group" >
					<a href="verifikasibukti1.php?idtransaksi='.$idtransaksi.'&status=6"><button class="btn btn-secondary" onclick="return confirm()"> Selesai </button>  </a>
				</div>  ';
			}
			?>
				</div>
				&nbsp
				<span class="badge badge-pill badge-info"><?=$status;?></span>
			</li>
			</a>
			<?php
		}
		
	}
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


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 <script>
var container = document.getElementById("popup");
var idproduk = '';
container.style.display = "none";
function popup(kodeproduk){
	document.getElementById("idproduk").value = kodeproduk;
	idproduk = kodeproduk.toString();
	if(container.style.display == "none"){
		container.style.display = "block";
	}else{
		container.style.display = "none";
	}
}

	var sum = 0;
	var kodebarangjs = '0';
	
	var now = new Date();
 	var time = now.getTime();
 	time += 3600 * 1000;
 	now.setTime(time);
	
function getCookie(name) {
	var value = "; " + document.cookie;
	var parts = value.split("; " + name + "=");
	if (parts.length == 2) return parts.pop().split(";").shift();
}
	
	
function tambahkeranjang(){
	var sama = 0;
	var jumlah = parseInt(document.getElementById("jumlah").value);
	var keterangan = document.getElementById("keterangan").value;
	
if(jumlah > 0){
	
	var json_data = [];
	var json_str = getCookie('isikeranjang');
	
	if(typeof json_str == 'undefined' ){
	var json_str = JSON.stringify(json_data);
	}
	
	if(json_str != ''){
		var json_data = JSON.parse(json_str);
		for (var i = 0; i < json_data.length; i++) {
			if(json_data[i][0].toString() == idproduk.toString()){
				json_data[i][1] = json_data[i][1] + jumlah;
				json_data[i][2] = keterangan;
				sama=1;
			}
		}
		if(sama == 0){
			json_data.push([idproduk,jumlah,keterangan]);
		}
		json_str = JSON.stringify(json_data);
		alert("Sukses Menambah Produk");
		container.style.display = "none";
	}
		document.cookie = 
		'isikeranjang=' + json_str + 
		'; expires=' + now.toUTCString() + 
		'; path=/';
		document.getElementById("jumlah").value="";
		document.getElementById("keterangan").value="";
}else{
	alert("Harap isi jumlah yang valid");
}
}
</script>
</body>
</html>