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

<!-- /.navbar-top-links -->

<div class="navbar-default navbar-static-side" role="navigation">
<div class="sidebar-collapse">
<ul class="nav" id="side-menu">
	<li class="sidebar-search">
		<center><img src="images/abdullah.jpg" width="125" height="125"></center>
    </li>
	<li>
		<a href="index.php"><i class="fa fa-home fa-fw"></i> H O M E</a>
	</li>
    <li>
		<a href="login.php"><i class="fa fa-user fa-fw"></i> LOGIN</a>
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
			<?php 
			echo "<div class='panel-heading'>
			<i class='fa fa-home'></i> H O M E</div>
			<div class='panel-body'>
			<center><h4>Selamat Datang di Aplikasi Pedataan Buku - 
			<b>TOKO BUKU RAKYAT</b></h4>
			<img src='images/tokobuku.jpg' width='600' height='300'></center>
			<center><h3><b>NAMA : Abdullah Syafii, Amd.KOM.</h3>
			"."Copyright &copy; ".date("Y")." - STMIK IKMI CIREBON"."</b>
			</center></div><!-- /.panel-body -->";	
			?>
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
