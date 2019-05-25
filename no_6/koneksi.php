<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "arkademy";

$koneksi = mysqli_connect($server,$user,$pass,$db);
if (!$koneksi) {
	echo "gagal";
}

?>