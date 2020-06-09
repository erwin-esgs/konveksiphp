<?php
session_start(); 
	include"koneksi.php";
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=DataPenjualan.xls");
 
 echo'<table class="table">
  <thead>
    <tr>
      <th scope="col">ID Transaksi</th>
      <th scope="col">ID Produk</th>
      <th scope="col">Nama Produk</th>
	  <th scope="col">Qty (lusin)</th>
      <th scope="col">Harga Per Lusin</th>
    </tr>
  </thead>
  <tbody>';
 
	$username = $_SESSION["username"];
	$con = mysqli_connect($host,$dbid,$dbpass,$dbname);
	$sql = "SELECT transaksi.idtransaksi, transaksi.idproduk, transaksi.username, transaksi.jumlah, transaksi.keterangan, produk.namaproduk, produk.harga
	FROM transaksi
	INNER JOIN produk ON transaksi.idproduk=produk.idproduk ";
	$result = $con->query($sql);
		if (isset($result->num_rows) && $result->num_rows > 0) {
			$idtransaksibefore="";
			while($row = mysqli_fetch_assoc($result)) {
			$idtransaksi = $row["idtransaksi"];
			$idproduk = $row["idproduk"];
			$namaproduk = $row["namaproduk"];
			$keterangan = $row["keterangan"];
			$harga = $row["harga"];
			$jumlah = $row["jumlah"];
			if($idtransaksi != $idtransaksibefore){
				echo'
				<tr>
					<th scope="row">'.$idtransaksi.'</th>
					<td>'.$idproduk.'</td>
					<td>'.$namaproduk.'</td>
					<td>'.$jumlah.'</td>
					<td>'.$harga.'</td>
				</tr>';
				$idtransaksibefore=$idtransaksi;
			}else{	
				echo'
				<tr>
					<th scope="row"></th>
					<td>'.$idproduk.'</td>
					<td>'.$namaproduk.'</td>
					<td>'.$jumlah.'</td>
					<td>'.$harga.'</td>
				</tr>';
			}
			}	
		}
		$con->close();
echo'
  </tbody>
</table>';
?>