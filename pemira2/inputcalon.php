<?php
include('koneksi.php');
error_reporting( ~E_NOTICE ); // avoid notice
	

	if(isset($_POST['add'])){
	$Nama = $_POST['Nama'];
	$Nim = $_POST['Nim'];
	$TTL = $_POST['TTL'];
	$Status = $_POST['Status'];
	$Progdi = $_POST['Progdi'];
	$visi = $_POST['visi'];
	$misi = $_POST['misi'];
	$Nama3 = $_POST['Nama3'];
	$Nim2 = $_POST['Nim2'];
	$TTL2 = $_POST['TTL2'];
	$Status2 = $_POST['Status2'];
	$Progdi2 = $_POST['Progdi2'];

	$sql = "INSERT INTO calonpresiden (Nama,Nim,TTL,Status,Progdi,visi,misi) values ('$Nama','$Nim','$TTL','$Status','$Progdi','$visi','$misi')";
	$sql2 = "INSERT INTO calonwapres (Nama,Nim,TTL,Status,Progdi) values ('$Nama3','$Nim2','$TTL2','$Status2','$Progdi2')";
	$query = mysql_query($sql) or die (mysql_error());
	$query2 = mysql_query($sql2) or die (mysql_error());
	if ($query && $query2) {
		header('location: tampil.php');
	}
	else{
		echo 'gagal';
	}
}
?>