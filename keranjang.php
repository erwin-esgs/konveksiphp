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


<form action="keranjangbayar.php" method="post" enctype="multipart/form-data" onsubmit="return validasi()" >
	<div class="container" style="padding:5%;" id="container">
	   <a href="index.php"><button  type="button" class="btn btn-secondary">Back</button></a>
	   <a href="keranjang.php"><button  type="button" class="btn btn-secondary" onclick="delCookie()">Hapus Semua Barang</button></a>
	<center><h5>Daftar Barang</h5></center>
	
 <?php
require('koneksi.php');
$cookie_name = 'isikeranjang';
if(isset($_COOKIE[$cookie_name]) && $_COOKIE[$cookie_name][0] != null ) {
	$subtotalharga=0; $totalharga=0; 
    $json_data = json_decode($_COOKIE[$cookie_name]);
	$jlhdata = count($json_data);
	echo'<div class="form-group" id="totalbarang">';
	echo'<label>Total produk</label>';
	echo'<input type="text" name="jlhdata" class="form-control" value="'.$jlhdata.'" readonly >';
	echo'</div>';
	if($jlhdata != 0){
		$con = mysqli_connect($host,$dbid,$dbpass,$dbname);
		for($i=0; $i<$jlhdata; $i++){
			$sql = "SELECT namaproduk,harga,gambar FROM produk WHERE idproduk='".$json_data[$i][0]."' ";
			$result = $con->query($sql);	
		
			if (isset($result->num_rows) && $result->num_rows > 0) {
				while($row = mysqli_fetch_assoc($result)) {
				$namaproduk = $row["namaproduk"];
				$harga = $row["harga"];
				$gambar = $row["gambar"];
				}
			}
	
		 echo' <div class="card" >
				<div class="form-row card-body">
					<div class="list-group-item"> <img src="data:image/jpeg;base64,'.base64_encode( $gambar ).'" height="100px" width="120px" /> </div>
					<div class="col-4">
						Nama: <input type="text" class="form-control" 			name="namaproduk[]" value="'.$namaproduk.'" readonly>
						Keterangan <input type="text" class="form-control"  	name="keterangan[]"	value="'.$json_data[$i][2].'" >
					</div>
					<div class="col">
						Kode: <input type="text" class="form-control" 			name="idproduk[]" value="'.$json_data[$i][0].'" readonly >
						Pilih gambar jika ada contoh model: (max 1mb) <input 	name="image[]" type="file" class="form-control image" />
					</div>
					<a href="keranjang.php"><button  type="button" class="btn btn-danger" onclick="delItem('.$json_data[$i][0].')"> X </button></a>
				</div>
				<div class="form-row card-body">
					<div class="col">
						Jumlah: <input type="text" class="form-control" 		name="jumlah[]" value="'.$json_data[$i][1].'">
					</div>
					<div class="col">
						Harga <input type="text" class="form-control"	name="harga[]"  value="'.number_format($harga).'" readonly>
					</div>
				</div>
				<div class="form-row card-body">
					
				</div>
			  </div>';
			$totalharga = $totalharga + ($json_data[$i][1] * $harga);
		}
		$con->close();
		echo ' Total Harga :<input type="text" class="form-control" id="totalharga"	name="totalharga" readonly value="'.$totalharga.'" >';
		echo'<button type="submit" id="submit" class="btn btn-secondary">Submit</button>';
	}else{
		echo "Keranjang Masih kosong";
	}

} else {
    echo "Keranjang Masih kosong, Silahkan Belanja dulu";
}
?>

</div>
</form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 <script>
	var now = new Date();
 	var time = now.getTime();
 	time += 3600 * 1000;
 	now.setTime(time);
	//theDiv.insertAdjacentHTML('afterend','<div class="form-group"> <label>Username/ID</label><input type="text" name="username" class="form-control" id="exampleInputText" >  </div>')

function getCookie(name) {
	var value = "; " + document.cookie;
	var parts = value.split("; " + name + "=");
	if (parts.length == 2) return parts.pop().split(";").shift();
	
}

function delItem(idproduk){
var result = confirm("Yakin Menghapus??");
if (result) {
    //Logic to delete the item
	var json_str = getCookie('isikeranjang');
	if(json_str != ''){
		var json_data = JSON.parse(json_str);	
		for (var i = 0; i < json_data.length; i++) {
			if(json_data[i][0].toString() == idproduk.toString()){
				json_data.splice(i,1);
			}
		}
		json_str = JSON.stringify(json_data);
	}
	alert("Barang berhasil dihapus");
	document.cookie = 
	'isikeranjang=' + json_str + 
	'; expires=' + now.toUTCString() + 
	'; path=/';
}
}

function delCookie() {
	document.cookie = "isikeranjang=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;"; //del cookie
}

function validasi() {
    if (confirm('Yakin lanjut membayar?')) {
		return true;
    } else {
        return false;
    }
}
</script>
</body>
</html>