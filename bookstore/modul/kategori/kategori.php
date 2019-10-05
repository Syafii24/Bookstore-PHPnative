<?php
$aksi="modul/kategori/aksi_kategori.php";
switch($_GET[act]){
  default: 
?>
<!-- Awal Source Code Tampil Bagian -->
<div class="panel-heading"><i class='fa fa-user'></i> 
TABEL KATEGORI</div><!-- /.panel-heading --><br/>
<a href="?page=kategori&act=tambahkategori" class="btn btn-danger btn-rounded">
<i class="fa fa-plus fa-white"></i> &nbsp;TAMBAH DATA</a>
<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
	<tr>
		<th style="border:3px double aqua; background-color: yellow;"><div align="center">NO</div></th>
		<th style="border:3px double aqua; background-color: yellow;"><div align="center">ID KATEGORI</div></th>
        <th style="border:3px double aqua; background-color: yellow;"><div align="center">NAMA KATEGORI</div></th>
        <th style="border:3px double aqua; background-color: yellow;"><div align="center">AKSI</div></th>
	</tr>
</thead>
<tbody>
<?php
$qry=mysqli_query($link,"select * from tbl_categories");
$jumlah = mysqli_num_rows($qry);
$no=0;	
while($r=mysqli_fetch_array($qry)){
	$no=$no+1;
	echo"
		<tr>
			<td><div align='center'>$no</div></td>
			<td><div align='center'>$r[category_id]</div></td>
			<td><div align='center'>$r[category_name]</div></td>
			<td><div align='center'>
				<a href='?page=kategori&act=editkategori&id=$r[category_id]' title='Edit Data'>
				<img src='icon/editicon32.png' align='absmiddle' width='20' height='20'></a> | 
				<a href='$aksi?page=kategori&act=hapus&id=$r[category_id]' title='Hapus Data'>
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
		<td colspan="3"><div align="right"><b>Jumlah Record</b></div></td>
		<td><div align="center"><b><?php echo "$jumlah";?></b></div></td>
	</tr>
</tfoot>
</table>
</div><!-- /.table-responsive -->
</div><!-- /.panel-body -->
<!-- Akhir Source Code - Tampil Bagian --> 
<?php
    break; 
?>
<?php	
	case "tambahkategori":
?>
<!-- Awal Source Code - Form Tambah Bagian -->
<div class="panel-heading"><i class='fa fa-plus'></i>
&nbsp;FORM TAMBAH KATEGORI</div><!-- /.panel-heading -->
<div class="panel-body">
<div class="col-lg-12">
<div class="row">
<?php $id_kategori=autonumber("tbl_categories", "category_id", "1");?>
<form role="form" action="modul/kategori/aksi_kategori.php?page=kategori&act=input" method="post" autocomplete="on" />
<div class="form-group">
	<label>ID KATEGORI</label>
    <input class="form-control" name="T1" id="T1" value="<?php echo $id_kategori; ?>" readonly required />
    <p class="help-block">Contoh : 1, dll.</p>
</div>
<div class="form-group">
	<label>NAMA KATEGORI</label>
    <input class="form-control" name="T2" id="T2" placeholder="Ketikkan Nama Kategori Di Sini" required />
    <p class="help-block">Contoh : Komputer, Seni Budaya, dll.</p>
</div>
<div class="form-group">
	<button type="submit" class="btn btn-primary">SIMPAN DATA KATEGORI</button>
	<button type="reset" class="btn btn-success">R E S E T</button>
	<button type="button" class="btn btn-danger" onclick="self.history.back()">B A T A L</button>
</div>
</form>
</div><!-- /.row (nested) -->
</div><!-- /.col-lg-8 (nested) -->
</div><!-- /.panel-body -->
<!-- Akhir Source Code - Form Tambah Bagian -->
<?php
    break;
?>
<?php	
	case "editkategori":
    $edit = mysqli_query($link,"SELECT * FROM tbl_categories WHERE category_id='$_GET[id]'");
    $r    = mysqli_fetch_array($edit);	
?>
<!-- Awal Source Code - Form Edit Bagian -->
<div class="panel-heading"><i class='fa fa-wrench'></i>
&nbsp;FORM EDIT KATEGORI</div><!-- /.panel-heading -->
<div class="panel-body">
<div class="col-lg-12">
<div class="row">
<form role="form" action="modul/kategori/aksi_kategori.php?page=kategori&act=update" method="post" autocomplete="on" />
<div class="form-group">
	<label>ID KATEGORI</label>
    <input class="form-control" name="T1" id="T1" value="<?php echo "$r[category_id]"; ?>" readonly />
    <p class="help-block">Contoh : 1, dll.</p>
</div>
<div class="form-group">
	<label>NAMA KATEGORI</label>
    <input class="form-control" name="T2" id="T2" value="<?php echo"$r[category_name]"; ?>" />
    <p class="help-block">Contoh : Komputer, Seni Budaya, dll.</p>
</div>
<div class="form-group">
	<button type="submit" class="btn btn-primary">UPDATE DATA KATEGORI</button>
	<button type="button" class="btn btn-danger" onclick="self.history.back()">B A T A L</button>
</div>
</form>
</div><!-- /.row (nested) -->
</div><!-- /.col-lg-8 (nested) -->
</div><!-- /.panel-body -->
<!-- Akhir Source Code - Form Edit bagian -->
<?php
     break;
}
?>		