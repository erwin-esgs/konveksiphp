<?php
switch ($row["status"]) {
	case 1: $status="Belum Dibayar"; break;
	case 2: $status="Menunggu Verifikasi"; break;
	case 3: $status="Diproses"; break;
	case 4: $status="Packing"; break;
	case 5: $status="Dikirim"; break;
	case 6: $status="Selesai"; break;
	default: $status="Ditolak";
}
?>