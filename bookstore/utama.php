<?php
error_reporting(0);
session_start();
 if (empty($_SESSION[username]) AND empty($_SESSION[password])){
 header('location:./index.php');
 }else{
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>::TOKO BUKU RAKYAT::</title>

<link rel="shortcut icon" href="images/icon.png">

<!-- Core CSS - Include with every page -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="font-awesome/css/font-awesome.css" rel="stylesheet">

<!-- Page-Level Plugin CSS - Dashboard -->
<link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
<link href="css/plugins/timeline/timeline.css" rel="stylesheet">
	
<!-- Page-Level Plugin CSS - Tables -->
<link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">

<!-- SB Admin CSS - Include with every page -->
<link href="css/sb-admin.css" rel="stylesheet">

<!-- Fungsi Penanggalan -->
<link href="calendar/css/jscal2.css" rel="stylesheet" type="text/css" />
<link href="calendar/css/border-radius.css" rel="stylesheet" type="text/css" />
<link href="calendar/css/steel/steel.css" rel="stylesheet" type="text/css" />
<script src="calendar/js/jscal2.js"></script>
<script src="calendar/js/lang/en.js"></script>
<script type="text/javascript">//<![CDATA[
      var cal = Calendar.setup({
          onSelect: function(cal) { cal.hide() }
      });
      cal.manageFields("f_btn1", "f_date1", "%Y-%m-%d");
      cal.manageFields("f_btn2", "f_date2", "%b %e, %Y");
      cal.manageFields("f_btn3", "f_date3", "%e %B %Y");
      cal.manageFields("f_btn4", "f_date4", "%A, %e %B, %Y");
//]]></script>

</head>
<body>
<style type="text/css">
.navbar-default{
	background-color: #00ffff;
}
</style>
<div id="wrapper">
<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
	<div class="navbar-header">
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>
	<a class="navbar-brand" href="index.php">PHP 7 - CONTOH KASUS : TOKO BUKU RAKYAT</a>
	</div>
<!-- /.navbar-header -->

<ul class="nav navbar-top-links navbar-right">
    <!-- /.dropdown -->
    <li class="dropdown">
		<a class="dropdown-toggle" data-toggle="dropdown" href="#">
			<i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
			<li><a href="?page=home"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
            <!-- Menu Pengguna / Data Pengguna -->
			<?php if($_SESSION['level']==1){ ?>
			<li><a href="?page=pengguna"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
            <!-- Akhir Menu Pengguna -->
			<?php } ?>
			<li class="divider"></li>
            <li><a href="?page=logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
		</ul>
        <!-- /.dropdown-user -->
	</li>
    <!-- /.dropdown -->
</ul>
<!-- /.navbar-top-links -->

<div class="navbar-default navbar-static-side" role="navigation">
<div class="sidebar-collapse">
<ul class="nav" id="side-menu">
	<li class="sidebar-search">
		<center><img src="images/abdullah.jpg" width="125" height="125"></center>
    </li>
	<li>
		<a href="?page=home"><i class="fa fa-home fa-fw"></i> H O M E</a>
	</li>
	<!-- Menu Master / Data Master -->
	<?php if($_SESSION['level']==1 or $_SESSION['level']==2){ ?>
	<li>
		<a href="#">
		<i class="fa fa-bar-chart-o fa-fw"></i> DATA MASTER<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
			<li><a href="?page=kategori"><i class="fa fa-envelope fa-fw"></i>DATA KATEGORI</a></li>
			<li><a href="?page=penerbit"><i class="fa fa-shopping-cart fa-fw"></i>DATA PENERBIT</a></li>
			<li><a href="?page=buku"><i class="fa fa-tasks fa-fw"></i>DATA BUKU</a></li>
		</ul>
        <!-- /.nav-second-level -->
	</li>
	<!-- Akhir Menu Master / Data Master -->
	<?php } ?>
	<!-- Menu Pengguna / Data Pengguna -->
	<?php if($_SESSION['level']==1){ ?>
	<li>
		<a href="#">
		<i class="fa fa-wrench fa-fw"></i> PENGATURAN<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
			<li><a href="?page=pengguna"><i class="fa fa-user"></i>
			PENGGUNA</a></li>			
		</ul>
        <!-- /.nav-second-level -->
	</li>
	<!-- Akhir Menu Pengguna -->
	<?php } ?>
    <li>
		<a href="?page=logout"><i class="fa fa-sign-out fa-fw"></i> LOGOUT</a>
	</li>
</ul>
<!-- /#side-menu -->
</div>
<!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>

<div id="page-wrapper">
<div class="row">
	<div class="col-lg-12">
		<!--<h1 class="page-header">Dashboard</h1>-->
		<br/>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<?php include "halaman.php"; ?>
		</div><!-- /.panel -->		
	</div><!-- /.col-lg-12 -->
</div><!-- /.row -->
</div><!-- /#page-wrapper / -->
</div><!-- /#wrapper -->
<!-- Setting ukuran halaman ada di file sb-admin.css line 35-->
<div id="footer"><p align="center">
	<font color="#000000">LATIHAN WEB 2 (PHP 7 DAN MARIADB) - KASUS : TOKO BUKU RAKYAT || 
	<?php echo date("d F Y"); ?></font></p>
</div><!-- end #footer -->
<!-- Core Scripts - Include with every page -->
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

<!-- Page-Level Plugin Scripts - Dashboard -->
<script src="js/plugins/morris/raphael-2.1.0.min.js"></script>
<script src="js/plugins/morris/morris.js"></script>
	
<!-- Page-Level Plugin Scripts - Tables -->
<script src="js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>

<!-- SB Admin Scripts - Include with every page -->
<script src="js/sb-admin.js"></script>
	
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
	$(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
</script>
</body>
</html>
<?php
}
?>
