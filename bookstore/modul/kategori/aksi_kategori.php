<?php
session_start();
include "../../config/koneksi.php";

$page=$_GET[page];
$act=$_GET[act];

// Aksi Untuk Hapus Data Tabel kategori
if ($page=='kategori' AND $act=='hapus'){
  mysqli_query($link,"DELETE FROM tbl_categories WHERE category_id='$_GET[id]'");
  header('location:../../utama.php?page='.$page);
}

// Aksi Untuk Input Data Tabel kategori
elseif ($page=='kategori' AND $act=='input'){
  mysqli_query($link,"INSERT INTO tbl_categories(category_id,category_name)
  VALUES('$_POST[T1]','$_POST[T2]')");
  header('location:../../utama.php?page='.$page);
}

// Aksi Untuk Update Data Tabel kategori
elseif ($page=='kategori' AND $act=='update'){
  mysqli_query($link,"UPDATE tbl_categories SET 
  category_name='$_POST[T2]' WHERE category_id='$_POST[T1]'");
  header('location:../../utama.php?page='.$page);
}
?>
