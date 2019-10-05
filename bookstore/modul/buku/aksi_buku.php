<?php
session_start();
include "../../config/koneksi.php";

$page=$_GET[page];
$act=$_GET[act];

// Aksi Untuk Hapus Data Tabel Kepegawaian
if ($page=='buku' AND $act=='hapus'){
	$edit = mysqli_query($link,"SELECT * FROM tbl_mybooks WHERE book_id='$_GET[id]'");
    $r    = mysqli_fetch_array($edit);
	if($r[book_id]==$_GET[id]){
		mysqli_query($link,"DELETE FROM tbl_mybooks WHERE book_id='$_GET[id]'");	
		unlink('./photo/'.$r[img]);
		header('location:../../utama.php?page='.$page);
	}	
}


// Aksi Untuk Input Data Tabel Kepegawaian
elseif ($page=='buku' AND $act=='input'){
$B=date("Y-m-d",strtotime($_POST["T7"]));  
$A=$_FILES['T6']['name'];$B1=$_FILES['T6']['size'];
$C=$_FILES['T6']['type'];
if($B1>1000000){
	echo "<script>alert('File Yang Di izinkan Hanya berukuran kurang dari 1 MB!! ');
		document.location.href='../../utama.php?page=buku&act=tambahbuku';</script>";
	}elseif($C != "image/gif"  &&  $C != "image/jpg"  && $C != "image/jpeg" && $C != "image/png"){
		echo "<script>alert('File Yang Di izinkan Hanya jpg,jpeg,png,gif!! Silahkan ulangi');
			document.location.href='../../utama.php?page=buku&act=tambahbuku';</script>";
	}else{	
	$uploaddir='./photo/';$rnd=date(His);$nama_file_upload=$rnd.'-'.$A;
	$alamatfile=$uploaddir.$nama_file_upload;
		if(move_uploaded_file($_FILES['T6']['tmp_name'],$alamatfile)){
			mysqli_query($link,"INSERT INTO tbl_mybooks(book_id,ISBN,category_id,title,author,price,publisher_id,img,publish_date)
			VALUES('$_POST[T1]','$_POST[T2]','$_POST[C1]','$_POST[T3]','$_POST[T4]','$_POST[T5]','$_POST[C2]','$nama_file_upload','$B')");
			header('location:../../utama.php?page='.$page);
		}
	}  
}

// Aksi Untuk Update Data Tabel kepegawaian
elseif ($page=='buku' AND $act=='update'){
$B=date("Y-m-d",strtotime($_POST["T7"]));
$A=$_FILES['T6']['name'];$B1=$_FILES['T6']['size'];$C=$_FILES['T6']['type'];
if(empty($A)){
$uploaddir='./photo/';
$rnd=date(His);				
$nama_file_upload=$rnd.'-'.$A;
$alamatfile=$uploaddir.$nama_file_upload;  
$A_lama=$_POST['photo_lama'];
$upload_lama=$A_lama;
mysqli_query($link,"UPDATE tbl_mybooks SET ISBN='$_POST[T2]',category_id='$_POST[C1]',title='$_POST[T3]',author='$_POST[T4]',price='$_POST[T5]',
publisher_id='$_POST[C2]',img='$upload_lama',publish_date='$B' WHERE book_id='$_POST[T1]'");
header('location:../../utama.php?page='.$page);
}elseif($B1>1000000){
echo "<script>alert('File Yang Di izinkan Hanya berukuran kurang dari 1 MB!! ');
document.location.href='../../utama.php?page=buku&act=editbuku';</script>";
}elseif($C != "image/gif"  &&  $C != "image/jpg"  && $C != "image/jpeg" && $C != "image/png"){
echo "<script>alert('File Yang Di izinkan Hanya jpg,jpeg,png,gif!! Silahkan ulangi');
document.location.href='../../utama.php?page=buku&act=editbuku';</script>";
}else{	
$uploaddir='./photo/';
$rnd=date(His);				
$nama_file_upload=$rnd.'-'.$A;
$alamatfile=$uploaddir.$nama_file_upload;
$A_lama=$_POST['photo_lama'];
unlink("./photo/".$A_lama);
$upload=move_uploaded_file($_FILES['T6']['tmp_name'],$alamatfile);
mysqli_query($link,"UPDATE tbl_mybooks SET ISBN='$_POST[T2]',category_id='$_POST[C1]',title='$_POST[T3]',author='$_POST[T4]',price='$_POST[T5]',
publisher_id='$_POST[C2]',img='$nama_file_upload',publish_date='$B' WHERE book_id='$_POST[T1]'");
header('location:../../utama.php?page='.$page);
}
}
?>