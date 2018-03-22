<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pemira Udinus</title>

   <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

      <script src="Sweet/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="Sweet/sweetalert.css">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<style type="text/css">
	
	body {
		background: #fff;
	}

	#o {

		background: #fff;
		position: relative;
		bottom: 20px;

	}

	.panel-body img {
		height: 195px;
	}

</style>
<body>

<?php 
 require_once "koneksi.php";
    require_once "aksi.php";
session_start();

if (empty($_SESSION['Nim'])) {
header("location: welcome.php?logout=true");
}

 ?>

  <div class="col-md-12" style="margin-bottom: 10px;"></div>
  	<div class="container">
<div class="panel panel-primary">
	<div class="panel-heading">  
	<?php 
	$sql = $DB_con->query("SELECT * from tb_daftar where Nim = '$_SESSION[Nim]'");
	$data =  $sql->fetch(PDO::FETCH_ASSOC);

	echo "Maaf ".$data['Nim']." akses ditolak";

	 ?> 

	 </div>
	<div class="panel-body">

		<div class="col-md-12 text-center">

		<h2>Maaf Vote Hanya Bisa Di Lakukan 1x</h2>

		<h4>Jadilah Orang Yang Jujur</h4>

		<a href="welcome.php?logout=true" class="btn btn-primary"> <span class="glyphicon glyphicon-log-out"></span> </a>

		</div>

	</div>

</div>

	
</body>

    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
</html>