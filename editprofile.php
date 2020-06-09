<!doctype html>
<?php session_start(); 
require('koneksi.php');
$username = $_GET["username"];
	$con = mysqli_connect($host,$dbid,$dbpass,$dbname);
	//cek username
	$sql = "SELECT * FROM user WHERE  username = '".$username."' ";
	$result = $con->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			
		
?>
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
var textinput1 = document.getElementsByClassName("form-control");
var count=0;
	for (i = 0; i < textinput1.length; i++) { 
	if(textinput1[i].value == ""){
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
function showpass() {
  var x = document.getElementById("exampleInputPassword1");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
  </script>
  <body>
	<div class="container" style="padding:5%;">
	<center><h1>Ubah Password</h1></center>
<form action="editprofile1.php" method="post" onsubmit="return validasi()">
  <div class="form-group">
    <label for="exampleInputText">Username/ID</label>
    <input type="text" name="username" class="form-control" id="exampleInputText" value="<?php echo $username; ?>" readonly>
  </div>
  <div class="form-group">
    <label for="exampleInputText">Nama</label>
    <input type="text" name="nama" class="form-control" id="exampleInputText" value="<?php echo $row["nama"];?>" >
  </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Password Lama</label>
    <input type="password" name="passwordlama" class="form-control" id="exampleInputPassword2">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password Baru</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
	<input type="checkbox" onclick="showpass()">Show Password
  </div>
  <div class="form-group">
    <label for="exampleInputText2">Nomor Telepon</label>
    <input type="number" name="telepon" class="form-control" id="exampleInputText2" aria-describedby="emailHelp" value="<?php echo $row["telepon"];?>">
  </div>
  <div class="form-group">
    <label for="exampleInputText3">Alamat</label>
	<textarea class="form-control" name="alamat" id="exampleInputText3" aria-describedby="emailHelp" style="resize: none;"><?php echo $row["alamat"];?></textarea>
  </div>
    <a href="index.php"><button  type="button" class="btn btn-primary">Back</button></a>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
<?php } ?>