<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

  </head>
  <script>
function validasi() { 
var textinput = document.getElementsByClassName("form-control");
var count=0;
	for (i = 0; i < textinput.length; i++) { 
	if(textinput[i].value == ""){
		count = count + 1;
	}
}
if(count > 0){
	alert("Fill all required field!"); 
	return false;
	}else{
	return true;
	}
}

  </script>
  <body>
<?php 
require('koneksi.php');
$idproduk = $_GET['idproduk'];
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
		}
    }
?>
	<div class="container" style="padding:2%;">
	<center><h1>Ubah Produk</h1></center>
<form action="tambahproduk.php?ubah=1" method="post" enctype="multipart/form-data">
  <div class="form-group">
<?php 
    echo'<label for="exampleInputText">ID Produk</label>';
    echo'<input type="text" name="idproduk" class="form-control" id="exampleInputText" value="'.$idproduk.'" readonly>';
?>
  </div>
  <div class="form-group">
<?php 
	echo'<img  src="data:image/jpeg;base64,'.base64_encode( $gambar ).'" class="card-img" alt="produk" style="height:200px;width:220px;" /> ';
	echo'Pilih gambar baru (max 1mb): <input type="file" name="image" class="" /><br>'; 
?>
  </div>
  <div class="form-group">
<?php 
    echo'<label for="exampleInputText1">Nama Produk</label>';
    echo'<input type="text" name="namaproduk" class="form-control" id="exampleInputText1" value="'.$namaproduk.'">';
?>
  </div>
  <div class="form-group">
<?php 
    echo'<label for="exampleInputText2">Deskripsi</label>';
	echo'<textarea class="form-control" name="deskripsi" id="exampleInputText2" style="resize: none;">'.$deskripsi.'</textarea>';
?>
  </div>
  <div class="form-group">
<?php 
    echo'<label for="exampleInputText3">Harga</label>';
    echo'<input type="number" name="harga" class="form-control" id="exampleInputText3" value="'.$harga.'">';
?>
  </div>
  <a href="index.php"><button  type="button" class="btn btn-primary">Back</button></a>
  <button type="submit" class="btn btn-primary"onclick="return confirm()">Submit</button>
</form>
	
<br>
	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>