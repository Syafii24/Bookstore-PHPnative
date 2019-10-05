<?php
//Ketikkan Source Code 1 Disini
$server = "localhost";
$username = "root";
$password = "";
$database = "dbbookstore";

// Koneksi dan memilih database di server
$link = mysqli_connect($server, $username, $password, $database);
if(mysqli_connect_error()){
	echo 'database gagal dikoneksikan!'.mysqli_connect_error("Koneksi gagal");
}
//Batas Akhir Pengetikkan Source Code 1
?>
