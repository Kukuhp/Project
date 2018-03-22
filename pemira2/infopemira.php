<?php  
    // Lampirkan db dan User
    require_once "koneksi.php";
    require_once "aksi.php";
    require_once "admin.php";
    session_start();
    // Buat object user
    
    $user = new user($DB_con);
    $user2 = new admin($DB_con);

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
    if(!$user2->isLoggedIn()){
        header("location: loginadmin.php"); //Redirect ke halaman login
    }

    // Ambil data user saat ini
    $currentUser = $user->getUser();

include_once 'koneksi.php';
if (isset($_GET['no'])) {
    $nomer = $_GET['no'];
    $query = $DB_con->query("SELECT * FROM calonpresiden WHERE no = '$nomer'");
    $data  = $query->fetch(PDO::FETCH_ASSOC);
    $query2 = $DB_con->query("SELECT * FROM calonwapres WHERE no = '$nomer'");
    $data2  = $query2->fetch(PDO::FETCH_ASSOC);
  }

        //$stmt = $DB_con->prepare('SELECT nama , nim , ttl , status , progdi  FROM calonpresiden Where no = 1 ORDER BY no DESC');
        //$user=$stmt->fetch(PDO::FETCH_ASSOC);
        //$stmt->execute();
    /*$Nama = $data['Nama'];
    $Nim = $data['Nim'];
    $Status = $data['Status'];
    $TTL = $data['TTL'];
    $Progdi  = $data['Progdi'];
    $Email = $data['Email'];*/


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
      <?php
        if($_SESSION['Nim']=="admin"){
          echo '<li><a href="polling.php">Polling <span class="sr-only">(current)</span></a></li>';
          echo '<li><a href="infopemira.php?no=1">Info Pemira <span class="sr-only">(current)</span></a></li>';
          echo '<li><a href="tampil.php">Edit calon<span class="sr-only">(current)</span></a></li>';
        }
        else{
          echo '<li><a href="homepages.php?no=1">Vote<span class="sr-only">(current)</span></a></li>';
          echo '<li><a href="infopemira.php?no=1">Info Pemira <span class="sr-only">(current)</span></a></li>';
          echo '<li><a href="polling.php">Polling <span class="sr-only">(current)</span></a></li>';
      }
      ?>
      </ul> 
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $_SESSION['Nim']; ?> <span class="caret"></span></a>
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
<div style="background-color: #FFFFFF;height: 600px " class="container">
<h3 style="border-left: 6px solid red;background-color:#F5F5F5;">&nbsp Calon Presiden dan Wakil Presiden BEM 2016</h3>
<br>
<br> 
<br>
    <div class="col-sm-4" align="center">
        <img alt="Calon"  src="user_image/<?php echo $data['foto']; ?>"width="300" height="200" ><br><br>
        <div align="left">
          <p>Visi</p>
        </div>
        <p> <?php echo $data['visi'] ?> </p>
        <div align="left">
          <p>Misi</p>
        </div>
        <p> <?php echo $data['misi'] ?> </p>
    </div>
    <form  class="form-horizontal" method="post">
    <div class="col-sm-4" align="left">
      <div align="center">
      <h4 style="border-bottom: 2px solid black;
    background-color: white;">Calon Presiden BEM</h4>
      </div>
      <br>
      <p> Nama          : <?php echo $data['nama'] ?></p>
      <p> Nim          : <?php echo $data['nim'] ?></p>
      <p> Tempat Tanggal Lahir  : <?php echo $data['ttl'] ?>  </p>
      <p> Status          : <?php echo $data['status'] ?> </p>
      <p> Program Studi       : <?php echo $data['progdi'] ?> </p>
  </div>
  <div class="col-sm-4" align="left">
    <div align="center">
      <h4 style="border-bottom: 2px solid black;
    background-color: white;" >Calon Wakil Presiden BEM</h4>
      </div>
      <br>
      <p> Nama          : <?php echo $data2['nama'] ?>  </p>
      <p> Nim          : <?php echo $data2['nim'] ?></p>
      <p> Tempat Tanggal Lahir  : <?php echo $data2['ttl'] ?></p>
      <p> Status          : <?php echo $data2['status'] ?></p>
      <p> Program Studi       : <?php echo $data2['progdi'] ?> </p>
      

      <br>
      <br>
      <br>
      <div>
      <nav aria-label="...">
      <ul class="pager">
      <?php
      $stmt = $DB_con->prepare('SELECT * FROM calonpresiden ORDER BY no');
      $stmt->execute();
 
    if($stmt->rowCount() > 0)
    {
    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
    {
      ?>
        <a href="infopemira.php?no=<?php echo $row['no'];?>"><li><span aria-hidden="true"><?php echo $row['no'];?></span> </li></a>
       <?php
       }
       }
       ?>
      </ul>
    </nav>
    </div>
  </div>
  </form>
</div>
</body>
</html>