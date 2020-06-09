<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

  
    </head>
<body onload="">

	<div class="container" style="padding:2%;" id="container">
	   <a href="index.php"><button  type="button" class="btn btn-primary">Back</button></a>
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
			echo'<a href = "detiltransaksi.php?idtransaksi='.$idtransaksi.'" ><li class="list-group-item d-flex justify-content-between align-items-center"> ';
			echo'<div class="input-group"><input type="text" class="input-group-text" value="'.$idtransaksi.'" readonly>
				 <input type="text" class="input-group-text" value="Rp'.$totalharga.'" readonly></div>';
			if($row["status"] == 1){
				echo'
				<form action="uploadbukti.php?idtransaksi='.$idtransaksi.'" method="post" enctype="multipart/form-data" >
					<div class="btn-group" role="group" aria-label="Third group">
					<div class="input-group-prepend"><div class="input-group-text" id="btnGroupAddon">Upload Bukti trf</div></div><input name="image" type="file"  />
					<button type="submit" id="submit" class="btn btn-primary">Submit</button>
					</div>
				</form> ';
			}
			if($row["status"] == 5){
				echo'
				<div class="btn-group mr-2" role="group" >
					<a href="verifikasibukti1.php?idtransaksi='.$idtransaksi.'&status=6"><button class="btn btn-primary" onclick="return confirm()"> Selesai </button>  </a>
				</div>';
			}
				echo'<span class="badge badge-primary badge-pill">'.$status.'</span>
				</li></a>';
			
		}
		
	}
?>
</div>

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