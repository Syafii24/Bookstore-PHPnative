<?php
session_start();
include "../../config/koneksi.php";

$page=$_GET[page];
$act=$_GET[act];

// Aksi Untuk Hapus Data Tabel kategori
if ($page=='penerbit' AND $act=='hapus'){
  mysqli_query($link,"DELETE FROM tbl_publishers WHERE publisher_id='$_GET[id]'");
  header('location:../../utama.php?page='.$page);
}

// Aksi Untuk Input Data Tabel kategori
elseif ($page=='penerbit' AND $act=='input'){
  mysqli_query($link,"INSERT INTO tbl_publishers(publisher_id,publisher_name)
  VALUES('$_POST[T1]','$_POST[T2]')");
  header('location:../../utama.php?page='.$page);
}

// Aksi Untuk Update Data Tabel kategori
elseif ($page=='penerbit' AND $act=='update'){
  mysqli_query($link,"UPDATE tbl_publishers SET 
  publisher_name='$_POST[T2]' WHERE publisher_id='$_POST[T1]'");
  header('location:../../utama.php?page='.$page);
}
?>
