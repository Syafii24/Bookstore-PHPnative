<?php
$aksi="modul/pengguna/aksi_pengguna.php";
switch($_GET[act]){
  default: 
?>
<!-- Awal Source Code Tampil Pengguna -->
<div class="panel-heading"><i class='fa fa-user'></i> 
TABEL PENGGUNA</div><!-- /.panel-heading --><br/>
<a href="?page=pengguna&act=tambahpengguna" class="btn btn-danger btn-rounded">
<i class="fa fa-plus fa-white"></i> &nbsp;TAMBAH DATA</a>
<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
	<tr>
		<th><div align="center">NO</div></th>
        <th><div align="center">NAMA LENGKAP</div></th>
		<th><div align="center">USERNAME</div></th>
		<th><div align="center">PASSWORD</div></th>
		<th><div align="center">E-MAIL</div></th>
        <th><div align="center">LEVEL</div></th>
        <th><div align="center">STATUS</div></th>
		<th><div align="center">TANGGAL</div></th>
        <th><div align="center">AKSI</div></th>
	</tr>
</thead>
<tbody>
<?php
$qry=mysqli_query($link,"select * from pengguna");
$jumlah = mysqli_num_rows($qry);
$no=0;	
while($r=mysqli_fetch_array($qry)){
	$no=$no+1;
	
	$level=$r[level];
	if ($level==0){
		$level="Guest";
	}elseif($level==1){
		$level="Administrator";
	}elseif($level==2){
		$level="Staff";
	}else{
		$level="Manager";
	}
	
	$status=$r[blokir];
		if ($status=="T"){
			$status="<span class='label label-success'>Active</span>";
		}else{
			$status="<span class='label label-danger'>Banned</span>";
		}	
	$Tgl=date("d/m/Y",strtotime($r[tgldaftar]));
	echo"
		<tr>
			<td><div align='center'>$no</div></td>
			<td><div align='center'>$r[nm_pengguna]</div></td>
			<td><div align='center'>$r[username]</div></td>
			<td><div align='center'>$r[password]</div></td>
			<td><div align='center'>$r[email]</div></td>
			<td><div align='center'>$level</div></td>
			<td><div align='center'>$status</div></td>
			<td><div align='center'>$Tgl</div></td>
			<td><div align='center'>
				<a href='?page=pengguna&act=editpengguna&id=$r[idpengguna]' title='Edit Data'>
				<img src='icon/editicon32.png' align='absmiddle' width='20' height='20'></a> | 
				<a href='$aksi?page=pengguna&act=hapus&id=$r[idpengguna]' title='Hapus Data'>
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
		<td colspan="8"><div align="right"><b>Jumlah Record</b></div></td>
		<td><div align="center"><b><?php echo "$jumlah";?></b></div></td>
	</tr>
</tfoot>
</table>
</div><!-- /.table-responsive -->
</div><!-- /.panel-body -->
<!-- Akhir Source Code - Tampil Pengguna --> 
<?php
    break; 
?>
<?php	
	case "tambahpengguna":
?>
<!-- Awal Source Code - Form Tambah Pengguna -->
<div class="panel-heading"><i class='fa fa-plus'></i>
&nbsp;FORM TAMBAH PENGGUNA</div><!-- /.panel-heading -->
<div class="panel-body">
<div class="col-lg-12">
<div class="row">
<?php $id_pengguna=autonumber("pengguna", "idpengguna", "6", "U-");?>
<form role="form" action="modul/pengguna/aksi_pengguna.php?page=pengguna&act=input" method="post" autocomplete="on" />
<div class="form-group">
	<label>ID PENGGUNA</label>
    <input class="form-control" name="T1" id="T1" value="<?php echo $id_pengguna; ?>" readonly required />
    <p class="help-block">Contoh : U-000001, dll.</p>
</div>
<div class="form-group">
	<label>NAMA LENGKAP</label>
    <input class="form-control" name="T2" id="T2" placeholder="Ketikkan Nama Lengkap Anda Di Sini" required />
    <p class="help-block">Contoh : Pengguna 1, dll.</p>
</div>
<div class="form-group">
	<label>NAMA PENGGUNA / LOGIN SISTEM</label>
    <input class="form-control" name="T3" id="T3" placeholder="Ketikkan Pengguna atau User Name Di Sini" required />
    <p class="help-block">Contoh : Pengguna 1, dll.</p>
</div>
<div class="form-group">
	<label>KATA SANDI / PASSWORD</label>
    <input class="form-control" name="T4" id="T4" type="password" placeholder="Ketikkan Kata Sandi Di Sini" required />
    <p class="help-block">Contoh : admin, dll.</p>
</div>
<div class="form-group">
	<label>ALAMAT E-MAIL</label>
    <input class="form-control" name="T5" id="T5" placeholder="Ketikkan Alamat E-Mail Di Sini" required />
    <p class="help-block">Contoh : emailaddress@tmail.com.</p>
</div>
<div class="form-group">
    <label>LEVEL PENGGUNA</label>
	<select class="form-control" name="C1" id="C1" required />
		<option value="0">Guest</option>
		<option value="1">Administrator</option>
		<option value="2">Staff</option>
		<option value="3">Manager</option>
	</select>
	<p class="help-block">Contoh : Pilih Salah Satu.</p>
</div>
<div class="form-group">
    <label>STATUS PENGGUNA</label>
	<select class="form-control" name="C2" id="C2" required />
		<option value="Y">Tidak Aktif / Blokir</option>
		<option value="T">Aktif</option>
	</select>
	<p class="help-block">Contoh : Pilih Salah Satu.</p>
</div>
<div class="form-group">
	<label>TANGGAL DAFTAR</label><br/>
    <input type="text" name="T4" id="T4" size="40" placeholder="Ketikkan Tanggal Daftar" required>
    <img type="image" src="images/calPick.gif" name="CALTGL1" width="20" height="20" align="absmiddle" id="CALTGL1" style="cursor:pointer;cursor:hand;" /> 
		<script type="text/javascript">
			var cal = Calendar.setup({
				onSelect: function(cal) { cal.hide() }
      		});
			cal.manageFields("CALTGL1", "T6", "%Y-%m-%d");
    	</script>
	<p class="help-block">Contoh : dd/mm/yyyy.</p>
</div>
<div class="form-group">
	<button type="submit" class="btn btn-primary">SIMPAN DATA PENGGUNA</button>
	<button type="reset" class="btn btn-success">R E S E T</button>
	<button type="button" class="btn btn-danger" onclick="self.history.back()">B A T A L</button>
</div>
</form>
</div><!-- /.row (nested) -->
</div><!-- /.col-lg-8 (nested) -->
</div><!-- /.panel-body -->
<!-- Akhir Source Code - Form Tambah Pengguna -->
<?php
    break;
?>
<?php	
	case "editpengguna":
    $edit = mysqli_query($link,"SELECT * FROM pengguna WHERE idpengguna='$_GET[id]'");
    $r    = mysqli_fetch_array($edit);	
?>
<!-- Awal Source Code - Form Edit Pengguna -->
<div class="panel-heading"><i class='fa fa-wrench'></i>
&nbsp;FORM EDIT PENGGUNA</div><!-- /.panel-heading -->
<div class="panel-body">
<div class="col-lg-12">
<div class="row">
<form role="form" action="modul/pengguna/aksi_pengguna.php?page=pengguna&act=update" method="post" autocomplete="on" />
<div class="form-group">
	<label>ID PENGGUNA</label>
    <input class="form-control" name="T1" id="T1" value="<?php echo "$r[idpengguna]"; ?>" readonly />
    <p class="help-block">Contoh : U-000001, dll.</p>
</div>
<div class="form-group">
	<label>NAMA LENGKAP</label>
    <input class="form-control" name="T2" id="T2" value="<?php echo"$r[nm_pengguna]"; ?>" required />
    <p class="help-block">Contoh : Pengguna 1, dll.</p>
</div>
<div class="form-group">
	<label>NAMA PENGGUNA / LOGIN SISTEM</label>
    <input class="form-control" name="T3" id="T3" value="<?php echo"$r[username]"; ?>" required />
    <p class="help-block">Contoh : Pengguna 1, dll.</p>
</div>
<div class="form-group">
	<label>KATA SANDI / PASSWORD</label>
    <input class="form-control" name="T4" id="T4" type="password" value="<?php $t= base64_decode($r[password]); echo $t;?>" required />
    <p class="help-block">Contoh : admin, dll.</p>
</div>
<div class="form-group">
	<label>ALAMAT E-MAIL</label>
    <input class="form-control" name="T5" id="T5" value="<?php echo"$r[email]"; ?>" required />
    <p class="help-block">Contoh : emailaddress@tmail.com.</p>
</div>
<div class="form-group">
    <label>LEVEL PENGGUNA</label>
	<select class="form-control" name="C1" id="C1" required />
		<option value="<?php print $r[level] ?>">
		<?php 
			$status=$r[level];
			if ($status==0){
				$ket='Guest';
			}elseif ($status==1){
				$ket='Administrator';
			}elseif ($status==2){
				$ket='Staff';
			}else{
				$ket='Manager';
			}
		print $ket?></option>
		<option value="0">Guest</option>
		<option value="1">Administrator</option>
		<option value="2">Staff</option>
		<option value="3">Manager</option>
	</select>
	<p class="help-block">Contoh : Pilih Salah Satu.</p>
</div>
<div class="form-group">
    <label>STATUS PENGGUNA</label>
	<select class="form-control" name="C2" id="C2" required />
		<option value="<?php print $r[blokir] ?>">
		<?php 
			$status=$r[blokir];
			if ($status=='Y'){
				$ket='Tidak Aktif / Blokir';
			}else{
				$ket='Aktif';
			}
		print $ket?></option>
		<option value="Y">Tidak Aktif / Blokir</option>
		<option value="T">Aktif</option>
	</select>
	<p class="help-block">Contoh : Pilih Salah Satu.</p>
</div>
<div class="form-group">
	<label>TANGGAL DAFTAR</label><br/>
    <input type="text" name="T4" id="T4" size="40" value="<?php echo"$r[tgldaftar]"; ?>" required>
    <img type="image" src="images/calPick.gif" name="CALTGL1" width="20" height="20" align="absmiddle" id="CALTGL1" style="cursor:pointer;cursor:hand;" /> 
		<script type="text/javascript">
			var cal = Calendar.setup({
				onSelect: function(cal) { cal.hide() }
      		});
			cal.manageFields("CALTGL1", "T6", "%Y-%m-%d");
    	</script>
	<p class="help-block">Contoh : dd/mm/yyyy.</p>
</div>
<div class="form-group">
	<button type="submit" class="btn btn-primary">UPDATE DATA PENGGUNA</button>
	<button type="button" class="btn btn-danger" onclick="self.history.back()">B A T A L</button>
</div>
</form>
</div><!-- /.row (nested) -->
</div><!-- /.col-lg-8 (nested) -->
</div><!-- /.panel-body -->
<!-- Akhir Source Code - Form Edit Pengguna -->
<?php
     break;
}
?>		