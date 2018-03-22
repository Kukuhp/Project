<?php
    require_once "koneksi.php";
    require_once "aksi.php";
    session_start();
    // Buat object user
    
    $user = new user($DB_con);
    if($_SESSION['is_logged']!=true)
    {
      header("Location:welcome.php?logout=true");
      exit;
    }
    // Jika belum login
   if(!$user->isLoggedIn()){
        header("location: welcome.php"); //Redirect ke halaman login
    }

    // Ambil data user saat ini

    $currentUser = $user->getUser();
    $sql1 = $DB_con->query("SELECT count(*) from poling where vote = '1' ");
    $sql2 = $DB_con->query("SELECT count(*) from poling where vote = '2' ");
    $sql3 = $DB_con->query("SELECT count(*) from poling where vote = '3' ");
    $sql4 = $DB_con->query("SELECT count(*) from poling");
    $urut1 = $sql1->fetchColumn();
    $urut2 = $sql2->fetchColumn();
    $urut3 = $sql3->fetchColumn();
    $urut4 = $sql4->fetchColumn();

    $total1 = ($urut1/$urut4)*100;
    $total2 = ($urut2/$urut4)*100;
    $total3 = ($urut3/$urut4)*100;

    $format = number_format($total1,2);
    $format2 = number_format($total2,2);
    $format3 = number_format($total3,2);
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
        echo '<li><a href="homepages.php">Vote <span class="sr-only">(current)</span></a></li>';
        echo '<li><a href="infopemira.php?no=1">Info Pemira <span class="sr-only">(current)</span></a></li>';
        echo '<li><a href="polling.php">Polling <span class="sr-only">(current)</span></a></li>';
        }
        ?>
         
      </ul> 
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp <?php echo $_SESSION['Nim']; ?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li role="separator" class="divider"></li>
            <li><a href="welcome.html"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbspSign Out</a></li>
            <li role="separator" class="divider"></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="container" style="background-color: #FFFFFF">
      <h3 style="border-left: 6px solid red;background-color:#F5F5F5;"> &nbsp   Voting Pemira BEM 2016</h3>
<br>
<br> 
<br>
<?php 
$aaa = $DB_con->query("SELECT * from calonpresiden where no = '1'");
$cok = $aaa->fetch(PDO::FETCH_ASSOC);
$aaa2 = $DB_con->query("SELECT * from calonwapres where no = '1'");
$cok2 = $aaa2->fetch(PDO::FETCH_ASSOC);

$aaa2 = $DB_con->query("SELECT * from calonpresiden where no = '2'");
$cok3 = $aaa2->fetch(PDO::FETCH_ASSOC);
$aaa3 = $DB_con->query("SELECT * from calonwapres where no = '2'");
$cok4 = $aaa3->fetch(PDO::FETCH_ASSOC);

$stmt = $DB_con->prepare('SELECT * FROM calonpresiden ORDER BY no ');

  $stmt->execute();
  if(($stmt->rowCount() > 0) )
 {
  while($row=$stmt->fetch(PDO::FETCH_ASSOC))
  {
 
?>
  <div class="col-sm-5" align="center">
          <img src="user_image/<?php echo $row['foto']; ?>" alt="Calon" width="300" height="200" ><br><br>
  </div> 
   <p>Calon Nomor Urut <?php echo $row['no'] ?></p>
  <h3><?php echo $row['nama']; ?></h3><br><br>
  <div class="progress">
      <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php 
                            if($row['no'] == 1){
                              echo $format."%";
                            }else if($row['no'] == 2){
                              echo $format2."%";
                            }else{
                              echo $format3."%";;
                            } ?>">
      <?php if($row['no'] == 1){
                              echo $format."%";
                            }else if($row['no'] == 2){
                              echo $format2."%";
                            }else{
                              echo $format3."%";;
                            } ?>
      </div>
  </div>
  <br>
  <br>
  <br>
  <br>
  <?php
    }
  }
?>
<!--
  <h3><?php echo $cok3['nama']; ?> & <?php echo $cok4['nama']; ?></h3><br><br>  
  <div class="progress">
      <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $format2."%"; ?>">
      <?php echo $format2."%"; ?>
      </div>
  </div>
  <br>
  <br>
  <br>
  <br>
  <h3>Nama Calon Presiden dan Wakil Presiden BEM 2016</h3><br><br> 
  <div class="progress">
      <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
      30% Complete
      </div>
  </div>-->
</div>




</body>
</html>