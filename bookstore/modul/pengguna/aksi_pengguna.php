<?php
session_start();
include "../../config/koneksi.php";

$page=$_GET[page];
$act=$_GET[act];

// Aksi Untuk Hapus Data Tabel pengguna
if ($page=='pengguna' AND $act=='hapus'){
  mysqli_query($link,"DELETE FROM pengguna WHERE idpengguna='$_GET[id]'");
  header('location:../../utama.php?page='.$page);
}

// Aksi Untuk Input Data Tabel pengguna
elseif ($page=='pengguna' AND $act=='input'){
  $P=$_POST["T4"]; 
  $P1 = base64_encode($P);	//Enkripsi Password Pake Metode base64_encode
  $D=date("Y-m-d",strtotime($_POST["T6"]));
  mysqli_query($link,"INSERT INTO pengguna(idpengguna,nm_pengguna,username,password,email,level,blokir,tgldaftar)
  VALUES('$_POST[T1]','$_POST[T2]','$_POST[T3]','$P1','$_POST[T5]','$_POST[C1]','$_POST[C2]','$D')");
  header('location:../../utama.php?page='.$page);
}

// Aksi Untuk Update Data Tabel pengguna
elseif ($page=='pengguna' AND $act=='update'){
  $P=$_POST["T4"]; 
  $P1 = base64_encode($P);	//Enkripsi Password Pake Metode base64_encode
  $D=date("Y-m-d",strtotime($_POST["T6"]));
  mysqli_query($link,"UPDATE pengguna SET 
  nm_pengguna='$_POST[T2]',username='$_POST[T3]',
  password='$P1',email='$_POST[T5]',level='$_POST[C1]',blokir='$_POST[C2]',
  tgldaftar='$D' WHERE idpengguna='$_POST[T1]'");
  header('location:../../utama.php?page='.$page);
}
?>
