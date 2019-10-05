<?php
$A=$_POST["H1"];
$B=$_POST["T2"];
$C=$_POST["T3"];
$D=$_POST["T4"];
$D1 = base64_encode($D);
$D2=$_POST["T5"];
$E=0;
$F="Y";
$G=date("Y-m-d");

include('config/koneksi.php');
$nama_tbl="pengguna";
$cari=mysqli_query($link,"select * from $nama_tbl where idpengguna='$A'");
$data=mysqli_fetch_array($cari);

if($A!="$data[idpengguna]"){
$masuk="INSERT INTO pengguna(idpengguna,nm_pengguna,username,password,email,level,blokir,tgldaftar)VALUES
('$A','$B','$C','$D1','$D2','$E','$F','$G')";
mysqli_query($link,$masuk);
echo "<script>alert('Data Anda Sudah Berhasil Disimpan ...Harap Hubungi Administrator Untuk Mengaktifkan ...'); document.location.href='index.php';</script>";
}else{
echo "<script>alert('Data Gagal Ditambah'); document.location.href='index.php';</script>";
}
?>