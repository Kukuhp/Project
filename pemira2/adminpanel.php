<?php
    // Lampirkan db dan User
  error_reporting( ~E_NOTICE );
    require_once "koneksi.php";
    require_once "admin.php";
    session_start();
    // Buat object user
    
    $user = new admin($DB_con);
    if($_SESSION['is_logged']!=true)
    {
     if($_SESSION['Nim'] == "admin"){
      
      header('location: loginadmin.php?logout=true');
    exit;
    }
    else{
    header('location: loginadmin.php?logout=true');
    exit;
    }
     
    }
    else if($_SESSION['Nim'] != "admin"){
      
      header('location: loginadmin.php?logout=true');
    }
    // Jika belum login
   if(!$user->isLoggedIn()){
        header("location: welcome.php"); //Redirect ke halaman login
    }


    // Ambil data user saat ini
    $currentUser = $user->getUser();

if(isset($_POST['add']))
{
      $Nama = trim($_POST['Nama']);
      $Nim = trim($_POST['Nim']);
      $TTL = trim ($_POST['TTL']);
      $Status = trim($_POST['Status']);
      $Progdi = trim($_POST['Progdi']);
      $visi = trim($_POST['visi']);
      $misi = trim($_POST['misi']);
      $imgFile = $_FILES['user_image']['name'];
      $tmp_dir = $_FILES['user_image']['tmp_name'];
      $imgSize = $_FILES['user_image']['size'];
  
      //$fakultas = $_POST['fakultas'];
      $Nama3 = trim($_POST['Nama3']);
      $Nim2 = trim($_POST['Nim2']);
      $TTL2 = trim($_POST['TTL2']);
      $Status2 = trim($_POST['Status2']);
      $Progdi2 =trim($_POST['Progdi2']);
      $No = trim($_POST['No']);
      //$fakultas2 =$_POST['fakultas2'];
      
     
  
  if(empty($Nama&&$Nama3)){
   $errMSG = "Please Enter Username.";
  }
  else if(empty($Nim&&$Nim2)){
   $errMSG = "Please Enter Nim.";
  }
  else if(empty($imgFile)){
   $errMSG = "Please Select Image File.";
  }
  else
  {
   $upload_dir = 'user_image/'; // upload directory
 
   $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
  
   // valid image extensions
   $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
  
   // rename uploading image
   $userpic = rand(1000,1000000).".".$imgExt;
    
   // allow valid image file formats
   if(in_array($imgExt, $valid_extensions)){   
    // Check file size '5MB'
    if($imgSize < 5000000)    {
     move_uploaded_file($tmp_dir,$upload_dir.$userpic);
    }
    else{
     $errMSG = "Sorry, your file is too large.";
    }
   }
   else{
    $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";  
   }
  }

   if($user->tambahcalon($Nama,$Nim,$TTL,$Progdi,$Status,$visi,$misi,$No,$userpic,$Nama3,$Nim2,$TTL2,$Status2,$Progdi2)) 
            {
                $user->redirect('infopemira.php?no=1');
            }         /**/
     
    //if($user->inputcalon($Nama,$Nim,$TTL,$Status,$Progdi,$visi,$misi,$userpic,$Nama3,$Nim2,$TTL2,$Status2,$Progdi2,$No)) 
           // {
                
           // }
  }


?>
<!DOCTYPE html>
	<html lang="eu">
<html>
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pemira Udinus</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="style.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #F5FFFA">
	<div class="container">
			<div class="row"></div>
		</div>
		<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Voting Pemira</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="polling.php">Polling <span class="sr-only">(current)</span></a></li>
        <li><a href="infopemira.php?no=1">Info Pemira <span class="sr-only">(current)</span></a></li>' 
        <li><a href="tampil.php">Edit calon<span class="sr-only">(current)</span></a></li>
      </ul> 
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $_SESSION['Nim']; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li role="separator" class="divider"></li>
            <li><a href="loginadmin.php?logout=true"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbspSign Out</a></li>
            <li role="separator" class="divider"></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="container" style="background-color: white">
<h3 style="border-left: 6px solid red;background-color:#F5F5F5;">
&nbspCalon Presiden dan Wakil Presiden BEM 2016</h3>
<br>
<br> 
<br>
<form class="form-horizontal" enctype="multipart/form-data" method="post">
    <div class="col-sm-4" align="center">
          <div class="form-group">
            <label for="exampleInputFile" class="control-label">Upload Foto</label>
            <input type="file" id="exampleInputFile" name="user_image" accept="image/*"/>
          </div>
          <div align="left">
            <label>Visi</label>
          </div>
        <textarea name="visi" class="visi" rows="4" cols="30"></textarea> 
        <div align="left">
          <label>Misinya</label>
        </div>
       <textarea name="misi" class="misi" rows="4" cols="30"></textarea> 
    </div>
    <div class="col-sm-4" align="left">
      <div align="center">
      <h4 style="border-bottom: 2px solid black;
    background-color: white;">Calon Presiden BEM</h4>
      </div>
      <br>
      <div class="form-group">
    <label for="inputNama" class="col-sm-2 control-label">Nama</label>
    <div class="col-xs-8">
      <input name="Nama" type="nama" class="form-control" required="" id="inputNama" placeholder="Nama">
    </div>
  </div>
    <div class="form-group">
    <label for="inputNim" class="col-sm-2 control-label">Nim</label>
    <div class="col-xs-8">
      <input name="Nim" type="nim" class="form-control" required="" id="inputNim" placeholder="Nim">
    </div>
  </div>
      <div class="form-group">
    <label for="inputTTL" class="col-sm-2 control-label">TTL</label>
    <div class="col-xs-8">
      <input name="TTL" type="TTL" class="form-control" required="" id="inputTTL" placeholder="Tempat/tgl lahir">
    </div>
  </div>
     <div class="form-group">
    <label for="inputstatus" class="col-sm-2 control-label">Satus</label>
    <div class="col-xs-8">
      <input name="Status" type="Status" class="form-control" required="" id="inputstatus" placeholder="Status">
    </div>
  </div>
      <div class="form-group">
    <label for="inputprogdi" class="col-sm-2 control-label">Progdi</label>
    <div class="col-xs-8">
      <input name="Progdi" type="progdi" class="form-control" required="" id="inputprogdi" placeholder="progdi">
    </div>
  </div>
      
  </div>
  <div class="col-sm-4" align="left">
    <div align="center">
      <h4 style="border-bottom: 2px solid black;
    background-color: white;">Calon Wakil Presiden BEM</h4>
      </div>
      <br>
      <div class="form-group">
    <label for="inputNama" class="col-sm-2 control-label">Nama</label>
    <div class="col-xs-8">
      <input name="Nama3" type="nama" class="form-control" required="" id="inputNama" placeholder="Nama">
    </div>
  </div>
  <div class="form-group">
    <label for="inputNama" class="col-sm-2 control-label">Nim</label>
    <div class="col-xs-8">
      <input name="Nim2" type="nim" class="form-control" required="" id="inputNim" placeholder="Nim">
    </div>
  </div>
      <div class="form-group">
    <label for="inputTTL" class="col-sm-2 control-label">TTL</label>
    <div class="col-xs-8">
      <input name="TTL2" type="TTL" class="form-control" required="" id="inputTTL" placeholder="Tempat/tgl lahir">
    </div>
  </div>
     <div class="form-group">
    <label for="inputstatus" class="col-sm-2 control-label">Satus</label>
    <div class="col-xs-8">
      <input name="Status2" type="Status" class="form-control" required="" id="inputstatus" placeholder="Status">
    </div>
  </div>
  <div class="form-group">
    <label for="inputprogdi" class="col-sm-2 control-label">Progdi</label>
    <div class="col-xs-8">
      <input type="progdi2" name="Progdi2" class="form-control" required="" id="inputprogdi" placeholder="progdi">
    </div>
  </div>
   
  <div class="form-group">
      <div class="col-xs-5"  style="float:right; text-align:center;">
        <input type="no" name="No" class="form-control" required="" id="inputno" placeholder="No">
      </div>
      <label for="inputprogdi"  style="float:right; text-align:center;" class="col-sm-2 control-label">No</label>
  </div>
    </div>
  </div>

      <br>
      <br>
      <br>
      <div>
      <nav aria-label="...">
      <ul class="pager">
        <button name="add" class="btn btn-default" type="submit">Add</button>
        <button class="btn btn-default" type="submit">Dischard</button>
         <a href="infopemira.php?no=1">link</a>
      </ul>
    </nav>
    </div>
  </div>
</div>
</body>
</html>