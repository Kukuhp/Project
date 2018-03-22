<?php  
    // Lampirkan db dan User
    require_once "koneksi.php";
    require_once "aksi.php";
    require_once "admin.php";

    // Buat object user
    session_start();
    $user = new user($DB_con);
    $admin = new admin($DB_con);

    // Logout! hapus session user
   
    
    // Redirect ke login
    if($_SESSION['Nim'] == "admin"){
    	$admin->logout();
    	header('location: loginadmin.php?logout=true');
	}
	else{
		$user->logout();
		header('location: welcome.php?logout=true');
	}
 ?>