<div id="popup" style="height:100%; width:100%; position:fixed; top:0; left:0; background-color:rgba(80, 80, 80, 0.5); z-index: 2; display:none;"> 
<div class="container" style="padding:5%; background-color:white; width:68%; height:100%;">
	<center><h3>Tambah ke keranjang</h3></center>
  <div class="form-group">
    <label for="idproduk">Kode Produk</label>
    <input type="text" name="idproduk" class="form-control" id="idproduk" readonly >
  </div>
  <div class="form-group">
    <label for="jumlah">Jumlah</label>
    <input type="number" name="jumlah" class="form-control" id="jumlah" >
  </div>
  <div class="form-group">
    <label for="exampleInputText2">Keterangan</label>
	<textarea class="form-control" name="keterangan" id="keterangan" style="resize: none;" ></textarea>
  </div>
	<button  type="button" class="btn btn-primary" onclick="popup(1)">Back</button>
	<button type="button" class="btn btn-primary" onclick="tambahkeranjang()">+ Ke Keranjang</button>
	</div>
</div>
<script language="javascript">
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