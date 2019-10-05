<?php
$aksi="modul/buku/aksi_buku.php";
switch($_GET[act]){
  default: 
?>
<!-- Awal Source Code Tampil Kepegawaian -->
<div class="panel-heading"><i class='fa fa-user'></i> 
TABEL BUKU</div><!-- /.panel-heading --><br/>
<a href="?page=buku&act=tambahbuku" class="btn btn-danger btn-rounded">
<i class="fa fa-plus fa-white"></i> &nbsp;TAMBAH DATA</a>
<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
	<tr>
		<th style="border:3px double aqua; background-color: yellow;"><div align="center">NO</div></th>
        <th style="border:3px double aqua; background-color: yellow;"><div align="center">ID BUKU</div></th>
		<th style="border:3px double aqua; background-color: yellow;"><div align="center">ISBN</div></th>
		<th style="border:3px double aqua; background-color: yellow;"><div align="center">KATEGORI</div></th>
        <th style="border:3px double aqua; background-color: yellow;"><div align="center">JUDUL BUKU</div></th>
        <th style="border:3px double aqua; background-color: yellow;"><div align="center">PENULIS</div></th>
		<th style="border:3px double aqua; background-color: yellow;"><div align="center">HARGA BUKU</div></th>
		<th style="border:3px double aqua; background-color: yellow;"><div align="center">PENERBIT</div></th>
		<th style="border:3px double aqua; background-color: yellow;"><div align="center">FOTO</div></th>
		<th style="border:3px double aqua; background-color: yellow;"><div align="center">TGL PENERBITAN</div></th>
        <th style="border:3px double aqua; background-color: yellow;"><div align="center">TOMBOL AKSI</div></th>
	</tr>
</thead>
<tbody>
<?php
//Ketikkan Source Code 1 Disini
$qry=mysqli_query($link,"select * from tbl_mybooks left join
tbl_categories on tbl_mybooks.category_id=tbl_categories.category_id left join
tbl_publishers on tbl_mybooks.publisher_id=tbl_publishers.publisher_id order by
tbl_mybooks.book_id asc");
//Batas Akhir Pengetikaan Source Code 1 Disini
$jumlah = mysqli_num_rows($qry);
$no=0;	
while($r=mysqli_fetch_array($qry)){
	$no=$no+1;
	$Tgl=date("d/m/Y",strtotime($r[publish_date]));
	$harga=number_format($r[price],0,",",".");
	echo"
		<tr>
			<td><div align='center'>$no</div></td>
			<td><div align='center'>$r[book_id]</div></td>
			<td><div align='center'>$r[ISBN]</div></td>
			<td><div align='center'>$r[category_name]</div></td>
			<td><div align='center'>$r[title]</div></td>
			<td><div align='center'>$r[author]</div></td>
			<td><div align='center'>Rp.$harga</div></td>
			<td><div align='center'>$r[publisher_name]</div></td>
			<td><div align='center'>
				<a href='modul/buku/photo/$r[img]' target='_blank'>
				<img src='modul/buku/photo/$r[img]' width='40' height='40' title='$r[img]'></a></div>
			</td>
			<td><div align='center'>$Tgl</div></td>
			<td><div align='center'>
				<a href='?page=buku&act=editbuku&id=$r[book_id]' title='Edit Data'>
				<img src='icon/editicon32.png' align='absmiddle' width='20' height='20'></a> | 
				<a href='$aksi?page=buku&act=hapus&id=$r[book_id]' title='Hapus Data'>
				<img src='icon/ButtonDeleteicon32.png' align='absmiddle' width='20' height='20'></i></a>
				</div>
			</td>
		</tr>
		";
	}
?>
</tbody>
<tfoot>
	<tr>
		<td colspan="10"><div align="right"><b>Jumlah Record</b></div></td>
		<td><div align="center"><b><?php echo "$jumlah";?></b></div></td>
	</tr>
</tfoot>
</table>
</div><!-- /.table-responsive -->
</div><!-- /.panel-body -->
<!-- Akhir Source Code - Tampil Kepegawaian --> 
<?php
    break; 
?>
<?php	
	case "tambahbuku":
?>
<!-- Awal Source Code - Form Tambah Kepegawaian -->
<div class="panel-heading"><i class='fa fa-plus'></i>
&nbsp;FORM TAMBAH BUKU</div><!-- /.panel-heading -->
<div class="panel-body">
<div class="col-lg-12">
<div class="row">
<?php $id_buku=autonumber("tbl_mybooks", "book_id", "1");?>
<form role="form" action="modul/buku/aksi_buku.php?page=buku&act=input" method="post" autocomplete="on" enctype="multipart/form-data" />
<div class="form-group">
	<label>ID BUKU</label>
    <input class="form-control" name="T1" id="T1" value="<?php echo $id_buku; ?>" readonly required />
    <p class="help-block">Contoh : 1, 2 dll.</p>
</div>
<div class="form-group">
	<label>ISBN</label>
    <input class="form-control" name="T2" id="T2" placeholder="Ketikkan ISBN Di Sini" required />
    <p class="help-block">Contoh :  978-602-6232-24-3.</p>
</div>
<div class="form-group">
    <label>ID KATEGORI</label>
	<select class="form-control" name="C1" id="C1" required />
	<option value="0">[PILIHAN ANDA]</option>
	<?php
		//Ketikkan Source Code 2 Disini
	$sql="select * from tbl_categories order by category_id asc";
	$tabel=mysqli_query($link,$sql);
	while ($row=mysqli_fetch_object($tabel)){
		$category_id=$row->category_id;
		$category_name=$row->category_name;
		echo("<option value=\"$category_id\">$category_id |
		$category_name</option>");
	}
		//Batas Akhir Pengetikaan Source Code 2 Disini	
	?>
	</select>
	<p class="help-block">Contoh : Pilih Salah Satu.</p>
</div>
<div class="form-group">
	<label>JUDUL BUKU</label>
    <input class="form-control" name="T3" id="T3" placeholder="Ketikkan Judul Buku Di sini" required />
    <p class="help-block">Contoh : belajar ngoding, dll.</p>
</div>
<div class="form-group">
	<label>NAMA PENULIS</label>
    <input class="form-control" name="T4" id="T4" placeholder="Ketikkan Nama Penulis Di sini" required />
    <p class="help-block">Contoh : Abdullah Syafii, dll.</p>
</div>
<div class="form-group">
	<label>HARGA BUKU</label>
    <input class="form-control" name="T5" id="T5" placeholder="Ketikkan Harga Buku Di sini" required />
    <p class="help-block">Contoh : Rp 200.000, dll.</p>
</div>
<div class="form-group">
    <label>ID PENERBIT</label>
	<select class="form-control" name="C2" id="C2" required />
	<option value="0">[PILIHAN ANDA]</option>
	<?php
		//Ketikkan Source Code 3 Disini	
	$sql="select * from tbl_publishers order by publisher_id asc";
	$tabel=mysqli_query($link,$sql);
	while ($row=mysqli_fetch_object($tabel)){
		$publisher_id=$row->publisher_id;
		$publisher_name=$row->publisher_name;
		echo("<option value=\"$publisher_id\">$publisher_id |
		$publisher_name</option>");
	}
		//Batas Akhir Pengetikaan Source Code 3 Disini
	?>
	</select>
	<p class="help-block">Contoh : Pilih Salah Satu.</p>
</div>
<div class="form-group">
	<label>FOTO</label>
    <input type="file" name="T6" id="T6" required />
    <p class="help-block">Contoh : *.jpg, *.png, dll</p>
</div>
<div class="form-group">
	<label>TGL PENERBITAN</label><br/>
    <input type="text" name="T7" id="T7" size="40" placeholder="Ketikkan Tanggal Penerbitan" required> 
    <img type="image" src="images/calPick.gif" name="CALTGL1" width="20" height="20" align="absmiddle" id="CALTGL1" style="cursor:pointer;cursor:hand;" /> 
		<script type="text/javascript">
			var cal = Calendar.setup({
				onSelect: function(cal) { cal.hide() }
      		});
			cal.manageFields("CALTGL1", "T7", "%Y-%m-%d");
    	</script>
	<p class="help-block">Contoh : dd/mm/yyyy.</p>
</div>
<div class="form-group">
	<button type="submit" class="btn btn-primary">SIMPAN DATA BUKU</button>
	<button type="reset" class="btn btn-success">R E S E T</button>
	<button type="button" class="btn btn-danger" onclick="self.history.back()">B A T A L</button>
</div>
</form>
</div><!-- /.row (nested) -->
</div><!-- /.col-lg-8 (nested) -->
</div><!-- /.panel-body -->
<!-- Akhir Source Code - Form Tambah kepegawaian -->
<?php
    break;
?>
<?php	
	case "editbuku":
    $edit = mysqli_query($link,"SELECT * FROM tbl_mybooks WHERE book_id='$_GET[id]'");
    $r    = mysqli_fetch_array($edit);	
?>
<!-- Awal Source Code - Form Edit Kepegawaian -->
<div class="panel-heading"><i class='fa fa-wrench'></i>
&nbsp;FORM EDIT DATA BUKU</div><!-- /.panel-heading -->
<div class="panel-body">
<div class="col-lg-12">
<div class="row">
<form role="form" action="modul/buku/aksi_buku.php?page=buku&act=update" method="post" enctype="multipart/form-data" />
<input type="hidden" name="photo_lama" value="<?php echo $r[img];?>" />
<div class="form-group">
	<label>ID BUKU</label>
    <input class="form-control" name="T1" id="T1" value="<?php echo "$r[book_id]"; ?>" readonly />
    <p class="help-block">Contoh : 1, dll.</p>
</div>
<div class="form-group">
	<label>ISBN</label>
    <input class="form-control" name="T2" id="T2" value="<?php echo"$r[ISBN]"; ?>" />
    <p class="help-block">Contoh : 978-602-6232-24-3.</p>
</div>
<div class="form-group">
    <label>ID KATEGORI</label>
	<select class="form-control" name="C1" id="C1" />
		<!--Ketikkan Source Code 5 Disini -->
		<option value="<?php echo"$r[category_id]"; ?>">
		<?php echo"$r[category_id]"; ?></option>
		<?php
		$sql="select * from tbl_categories order by category_id asc";
		$tabel=mysqli_query($link,$sql);
		while ($row=mysqli_fetch_object($tabel)){
			$category_id=$row->category_id;
			$category_name=$row->category_name;
		echo("<option value=\"$category_id\">$category_id |
		$category_name</option>");
	}
	?>			
		<!--Batas Akhir Pengetikaan Source Code 5 Disini -->
	</select>
	<p class="help-block">Contoh : Pilih Salah Satu.</p>
</div>
<div class="form-group">
	<label>JUDUL BUKU</label>
    <input class="form-control" name="T3" id="T3" value="<?php echo"$r[title]"; ?>" />
    <p class="help-block">Contoh : Belajar ngoding, dll.</p>
</div>
<div class="form-group">
	<label>NAMA PENULIS</label>
    <input class="form-control" name="T4" id="T4" value="<?php echo"$r[author]"; ?>" />
    <p class="help-block">Contoh : Abdullah Syafii, dll.</p>
</div>
<div class="form-group">
	<label>HARGA BUKU</label>
    <input class="form-control" name="T5" id="T5" value="<?php echo"$r[price]"; ?>" />
    <p class="help-block">Contoh : Rp.200.000, dll.</p>
</div>
<div class="form-group">
    <label>ID PENERBIT</label>
	<select class="form-control" name="C2" id="C2" required />
		<!--Ketikkan Source Code 6 Disini -->
		<option value="<?php echo"$r[publisher_id]"; ?>">
		<?php echo"$r[publisher_id]"; ?></option>
		<?php
		$sql="select * from tbl_publishers order by publisher_id asc";
		$tabel=mysqli_query($link,$sql);
		while ($row=mysqli_fetch_object($tabel)){
			$publisher_id=$row->publisher_id;
			$publisher_name=$row->publisher_name;
		echo("<option value=\"$publisher_id\">$publisher_id |
		$publisher_name</option>");
	}
	?>	
		<!--Batas Akhir Pengetikaan Source Code 6 Disini -->
	</select>
	<p class="help-block">Contoh : Pilih Salah Satu.</p>
</div>
<div class="form-group">
	<label>FOTO</label>
    <input type="file" name="T6" id="T6" />
	<img src="modul/buku/photo/<?php echo $r[img];?>" width="60" height="40">
    <p class="help-block">*Kosongkan photo jika tidak diubah</p>
</div>
<div class="form-group">
	<label>TGL PENERBITAN</label><br/>
    <input type="text" name="T7" id="T7" size="40" value="<?php echo"$r[publish_date]"; ?>" /> 
    <img type="image" src="images/calPick.gif" name="CALTGL1" width="20" height="20" align="absmiddle" id="CALTGL1" style="cursor:pointer;cursor:hand;" /> 
		<script type="text/javascript">
			var cal = Calendar.setup({
				onSelect: function(cal) { cal.hide() }
      		});
			cal.manageFields("CALTGL1", "T7", "%Y-%m-%d");
    	</script>
	<p class="help-block">Contoh : dd/mm/yyyy.</p>
</div>
<div class="form-group">
	<button type="submit" class="btn btn-primary">UPDATE DATA BUKU</button>
	<button type="button" class="btn btn-danger" onclick="self.history.back()">B A T A L</button>
</div>
</form>
</div><!-- /.row (nested) -->
</div><!-- /.col-lg-8 (nested) -->
</div><!-- /.panel-body -->
<!-- Akhir Source Code - Form Edit kepegawaian -->
<?php
     break;
}
?>		