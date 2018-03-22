<?php
    // Lampirkan db dan User
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
    header('location: welcome.php?logout=true');
    exit;
    }
     
    }
    // Jika belum login
   if(!$user->isLoggedIn()){
        header("location: welcome.php"); //Redirect ke halaman login
    }
  if(isset($_GET['UP'])){
    $Nama = $_POST['Nama'];
    $Nim = $_POST['Nim'];
    $TTL = $_POST['TTL'];
    $Status = $_POST['Status'];
    $Progdi = $_POST['Progdi'];
    $visi = $_POST['visi'];
    $misi = $_POST['misi'];
    $No = $_POST['No'];

    $Nama3 = $_POST['Nama3'];
    $Nim2 = $_POST['Nim2'];
    $TTL2 = $_POST['TTL2'];
    $Status2 = $_POST['Status2'];
    $Progdi2 = $_POST['Progdi2'];

    $imgFile = $_FILES['user_image']['name'];
    $tmp_dir = $_FILES['user_image']['tmp_name'];
    $imgSize = $_FILES['user_image']['size'];
  
    
   
      $upload_dir = 'user_image/'; // upload directory
  
      $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
    
      // valid image extensions
      $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
    
      // rename uploading image
      $userpict = rand(1000,1000000).".".$imgExt;
        
      // allow valid image file formats
      if(in_array($imgExt, $valid_extensions)){     
        // Check file size '5MB'
        if($imgSize < 5000000)        {
          move_uploaded_file($tmp_dir,$upload_dir.$userpict);
        }
        else{
          $errMSG = "Sorry, your file is too large.";
        }
      }
      else{
        $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";    
      }
   if($user->editcalon($Nama,$Nim,$TTL,$Progdi,$Status,$visi,$misi,$No,$userpict,$Nama3,$Nim2,$TTL2,$Status2,$Progdi2)) 
            {
                $user->redirect('infopemira.php?no=1');
            }         /**/
  }
else if(isset($_GET['no'])){
    $ni   = $_GET['no'];
    $query = $DB_con->query("SELECT * FROM calonpresiden WHERE no = '$ni'");
    $query->execute(array($ni));
    $data  = $query->fetch(PDO::FETCH_ASSOC);
    $query2 = $DB_con->query("SELECT * FROM calonwapres WHERE no = '$ni'");
    $query2->execute(array($ni));
    $data2  = $query2->fetch(PDO::FETCH_ASSOC);
   } 
    // Ambil data user saat ini
    $currentUser = $user->getUser();
  
  
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
        <li><a href="infopemira.php?no=1">Info Pemira <span class="sr-only">(current)</span></a></li> 
        <li><a href="tampil.php">Edit calon<span class="sr-only">(current)</span></a></li>
      </ul> 
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['Nim'];?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li role="separator" class="divider"></li>
            <li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbspSign Out</a></li>
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
<form class="form-horizontal" enctype="multipart/form-data" method="POST" action="ceklogin.php">
    <div class="col-sm-4" align="center">
        <img src="user_image/<?php echo $data['foto']; ?>" alt="Calon" width="300" height="200"><br><br>
          <div class="form-group">
            <label for="exampleInputFile" class="control-label">Upload Foto</label>
            <input type="file" id="exampleInputFile" name="user_image" accept="image/*"/>
          </div>
          <div align="left">
            <label>Visi</label>
          </div>
        <textarea name="visi"  class="visi" rows="4" cols="30"><?php echo $data['visi']?></textarea> 
        <div align="left">
          <label>Misinya</label>
        </div>
       <textarea name="misi" class="misi" rows="4" cols="30"><?php echo $data['misi']?></textarea> 
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
      <input name="Nama" type="nama" class="form-control" value="<?php echo $data['nama']?>" required="" id="inputNama" placeholder="Nama">
    </div>
  </div>
    <div class="form-group">
    <label for="inputNim" class="col-sm-2 control-label">Nim</label>
    <div class="col-xs-8">
      <input name="Nim" type="nim" class="form-control" required="" value="<?php echo $data['nim']?>" id="inputNim" placeholder="Nim">
    </div>
  </div>
      <div class="form-group">
    <label for="inputTTL" class="col-sm-2 control-label">TTL</label>
    <div class="col-xs-8">
      <input name="TTL" type="TTL" class="form-control" required="" id="inputTTL" value="<?php echo $data['ttl']?>" placeholder="Tempat/tgl lahir">
    </div>
  </div>
     <div class="form-group">
    <label for="inputstatus" class="col-sm-2 control-label">Satus</label>
    <div class="col-xs-8">
      <input name="Status" type="Status" class="form-control" required="" id="inputstatus" value="<?php echo $data['status']?>" placeholder="Status">
    </div>
  </div>
      <div class="form-group">
    <label for="inputprogdi" class="col-sm-2 control-label">Progdi</label>
    <div class="col-xs-8">
      <input name="Progdi" type="Progdi" class="form-control" required="" id="inputprogdi" value="<?php echo $data['progdi']?>" placeholder="progdi">
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
      <input name="Nama3" type="nama" class="form-control" required="" id="inputNama" value="<?php echo $data2['nama']?>" placeholder="Nama">
    </div>
  </div>
  <div class="form-group">
    <label for="inputNama" class="col-sm-2 control-label">Nim</label>
    <div class="col-xs-8">
      <input name="Nim2" type="nim" class="form-control" required="" id="inputNim" value="<?php echo $data2['nim']?>" placeholder="Nim">
    </div>
  </div>
      <div class="form-group">
    <label for="inputTTL" class="col-sm-2 control-label">TTL</label>
    <div class="col-xs-8">
      <input name="TTL2" type="TTL" class="form-control" required="" id="inputTTL" placeholder="Tempat/tgl lahir" value="<?php echo $data2['ttl']?>">
    </div>
  </div>
     <div class="form-group">
    <label for="inputstatus" class="col-sm-2 control-label">Satus</label>
    <div class="col-xs-8">
      <input name="Status2" type="Status" class="form-control" required="" id="inputstatus" placeholder="Status" value="<?php echo $data2['status']?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputprogdi" class="col-sm-2 control-label">Progdi</label>
    <div class="col-xs-8">
      <input type="progdi2" name="Progdi2" class="form-control" required="" id="inputprogdi" placeholder="progdi" value="<?php echo $data2['progdi']?>">
    </div>
  </div>
  <div class="form-group">
      <div class="col-xs-5"  style="float:right; text-align:center;">
        <input type="no" name="No" class="form-control" required=""value="<?php echo $data['no']?>" id="inputno" placeholder="No">
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
        <button name="UP" class="btn btn-default" type="submit">Update</button>
         <a href="infopemira.php?no=1">link</a>
      </ul>
    </nav>
    </div>
  </div>
</div>
</body>
</html>