<?php
error_reporting( ~E_NOTICE );
 require_once "koneksi.php";
    require_once "aksi.php";
    session_start();
    // Buat object user
    
    $user = new user($DB_con);
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
    if (isset($_GET['Norut'])) {
    $nomer = $_GET['Norut'];
    $nim = $_SESSION['Nim'];   
    $sql = $DB_con->query("SELECT * from poling where nim = '$nim' ");
    $ya  =  $sql->fetch(PDO::FETCH_ASSOC);
    $status = $ya['status'];
    if ($status == "Sudah") {

    header("location: forbiden.php");

  }else{ 
    if($user->vote($nomer,$nim)){
        $user->redirect('polling.php');
    }
    header('location:polling.php');
}
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
        <li><a href="homepages.php?no=1">Vote <span class="sr-only">(current)</span></a></li>
        <li><a href="infopemira.php?no=1">Info Pemira <span class="sr-only">(current)</span></a></li>
        <li><a href="polling.php">Polling <span class="sr-only">(current)</span></a></li> 
      </ul> 
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $_SESSION['Nim']; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li role="separator" class="divider"></li>
            <li><a href="welcome.php?logout=true"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbspSign Out</a></li>
            <li role="separator" class="divider"></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div style="background-color: #FFFFFF;height: 600px " class="container">
<h3 class="Roboto" style="border-left: 6px solid red;background-color:#F5F5F5;"> &nbsp Calon Presiden dan Wakil Presiden BEM 2016</h3>
<br>
<br> 
<br>
<div class="container" align="center">
<?php
  $stmt = $DB_con->prepare('SELECT * FROM calonpresiden ORDER BY no');
  $stmt->execute();
 
 if($stmt->rowCount() > 0)
 {
  while($row=$stmt->fetch(PDO::FETCH_ASSOC))
  {
   ?>
  
    <div class="col-sm-4">
        <div style="background-color:#FFFFFF;width: 300px;height: 400px; ">
        <br>
        <strong>
        <p>Calon Nomor Urut <?php echo $row['no'] ?></p>
        <img src="user_image/<?php echo $row['foto']; ?>" alt="Calon" width="200" height="200" ><br><br><br>
        <p> <?php echo $row['visi']?></p>
        <p>  <?php echo $row['misi'] ?></p>
        </strong> 
        <a href="homepages.php?Norut=<?php echo $row['no'] ?>" class="btn btn-primary btn-sm" role="button">Vote</a>
        </div>
    </div>
   
<?php
}
}
?>
 </div>
</div> 
  </body>
</html>