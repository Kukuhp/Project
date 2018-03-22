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
    else if($_SESSION['Nim'] != "admin"){
      
      header('location: loginadmin.php?logout=true');
    }
    // Jika belum login
   if(!$user->isLoggedIn()){
        header("location: welcome.php"); //Redirect ke halaman login
    }
    if(isset($_GET['no'])){
      $no = $_GET['no'];
        if($user->hapuscalon($no)) 
            {
                $user->redirect('tampil.php?no=1');
            }  
    }


    // Ambil data user saat ini
    $currentUser = $user->getUser();
?>
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
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $_SESSION['Nim']; ?><span class="caret"></span></a>
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
<?php
$query = $DB_con->prepare("select * from calonpresiden ORDER BY no");
$query->execute();
//$query = $DB_con->query("SELECT * FROM calonpresiden WHERE no = '1'");
//$data  = $query->fetch(PDO::FETCH_ASSOC);
//$sql	= 'select * from tb_daftar';
//$query	= mysql_query($sql) or die (mysql_error());
?>
<h2><strong><p align="right">Dashboard Pemira</p></strong></h2>
<br>
<br>
<table width="807" cellpadding="0" cellspacing="0" align="center" class="table table-hover">
  <!--DWLayoutTable-->
  <tr>
    <td width="112" height="29" align="center" valign="middle">Capres</td>
    <td width="112" align="center" valign="middle" >Nim</td>
    <td width="176" align="center" valign="middle" >TTL</td>
    <td width="252" align="center" valign="middle" >Status</td>
    <td width="134" align="center" valign="middle" >Progdi</td>
    <!--<td width="134" align="center" valign="middle" >Foto</td>-->
    <td width="133" align="center" valign="middle" ><a href="adminpanel.php"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></td></tr>
<?php
   while($siswa = $query->fetch()){ 
?>
  <tr>
    <td p align="center" bgcolor="#FFFFFF"><?php echo $siswa['nama']; ?></td>
    <td p align="center" bgcolor="#FFFFFF"><?php echo $siswa['nim']; ?></td>
    <td p align="center" bgcolor="#FFFFFF"><?php echo $siswa['ttl']; ?></td>
    <td p align="center" bgcolor="#FFFFFF"><?php echo $siswa['status']; ?></td>
    <td p align="center" bgcolor="#FFFFFF"><?php echo $siswa['progdi']; ?></td>
    <!--DWLayoutTable--<td p align="center" bgcolor="#FFFFFF"><img alt="Calon"  src="user_image/<?php echo $siswa['foto']; ?>"width="300" height="200" ></td>
    <td p align="center" bgcolor="#FFFFFF">-->
    <td align="center">
	 <a href="edit.php?no=<?php echo $siswa['no']; ?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
   <a href="tampil.php?no=<?php echo $siswa['no'];?>"><onclick="return confirm('Yakin mau di hapus?');"><span class="glyphicon glyphicon-trash" aria-hidden="true"></a>
  </td>
  </tr>
<?php
}
?>
</table>
</div>
</body>
</html>