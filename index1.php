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
	<div class="container">
<?php 
	if(!isset($_SESSION["username"]) || $_SESSION["username"] == ""){
		//header("location:login.html");
		echo "<script language='javascript'>alert('Silahkan login terlebih dulu'); window.location.href = 'login.html';</script>";
	}else{
	$username = $_SESSION["username"];
	$statusid = $_SESSION["statusid"];

?>

		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="index.php">TOKO KELONTONG ONLINE</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav ml-auto">
				<a class="nav-item nav-link" href="editprofile.php?username=<?php echo $username; ?>"><?php echo $username; ?></a>
				<a class="nav-item nav-link" href="logout.php">LOGOUT</a>
			</div>
		</div>
		</nav>

<?php 
		if($statusid == 0){
			include 'admin.php';
		}else{
			include 'pengguna.php';
		}
		
}		
?>
	</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>