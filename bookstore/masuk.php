<?php
include "config/koneksi.php";
$T1=$_POST["username"];
$T2=$_POST["password"];
$T2ACAK=base64_encode($T2);

$cari=mysqli_query($link,"SELECT * FROM pengguna WHERE username='$T1' AND password='$T2ACAK' AND blokir='T'");
$data=mysqli_num_rows($cari);
$read=mysqli_fetch_array($cari);

// Apabila username dan password ditemukan
if ($data > 0){
  session_start();
  ("idpengguna");
  ("nm_pengguna");
  ("username");
  ("password");
  ("level");
  ("blokir");
  ("tgldaftar");

  $_SESSION[idpengguna] = $read[idpengguna];
  $_SESSION[nm_pengguna]= $read[nm_pengguna];
  $_SESSION[username]	= $read[username];
  $_SESSION[password]	= $read[password];
  $_SESSION[level]		= $read[level];
  $_SESSION[blokir]		= $read[blokir];
  $_SESSION[tgldaftar]	= $read[tgldaftar];
  
  header('location:utama.php?page=home');
}else{
		echo "<title>..::PT. XYZ - Nama Aplikasi::..</title>";
		echo "<link rel='shortcut icon' href='images/officebuildingicon128.png' />";	
  		echo "<link href='css/style2.css' rel='stylesheet' type='text/css'><center>LOGIN GAGAL! <br>
				Username atau Password Anda tidak benar.<br>
				Atau account Anda sedang diblokir.<br>";
  		echo "<a href=login.php><b>ULANGI LAGI</b></a></center>";
}
?>