<?php
include "config/koneksi.php";
include "config/function.php";

// Bagian Home
if ($_GET[page]=='home'){
	echo "<div class='panel-heading'>
			<i class='fa fa-home'></i> D A S H B O A R D</div>
			<div class='panel-body'>
			<center><h4>Selamat datang $_SESSION[nm_pengguna] !!! 
			di Aplikasi Pendataan Buku - <b>TOKO BUKU RAKYAT </b></h4>
			<img src='images/tokobuku.jpg' width='600' height='300'></center>
			<center><h3><b>NAMA MAHASISWA : ABDULLAH SYAFII, Amd.KOM.</h3>
			"."Copyright &copy; ".date("Y")." - STMIK IKMI CIREBON"."</b></center></div><!-- /.panel-body -->";	
}

// Bagian Bagian
elseif ($_GET[page]=='kategori'){
  include "modul/kategori/kategori.php";
}

// Bagian Divisi
elseif ($_GET[page]=='penerbit'){
  include "modul/penerbit/penerbit.php";
}

// Bagian Karyawan
elseif ($_GET[page]=='buku'){
  include "modul/buku/buku.php";
}


// Bagian Laporan
elseif ($_GET[page]=='lapkaryawan'){
  include "modul/laporan/lapkaryawan.php";
}

// Bagian Pengaturan Pengguna
elseif ($_GET[page]=='pengguna'){
  include "modul/pengguna/pengguna.php";
}

// Keluar Sistem
elseif ($_GET[page]=='logout'){
  include "logout.php";
}

// Apabila modul tidak ditemukan
else{
if ($_SESSION['level']=='1' OR $_SESSION['level']=='2' OR $_SESSION['level']=='3' OR $_SESSION['level']=='4'){
echo"<script>window.location = '404.html'</script> ";
}
}?>
