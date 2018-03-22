<!DOCTYPE html>
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
<body>
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
        <li><a href="homepages.php?no=1">Vote<span class="sr-only">(current)</span></a></li>
        <li><a href="infopemira.php?no=1">Info Pemira <span class="sr-only">(current)</span></a></li>
        <li><a href="polling.html">Polling <span class="sr-only">(current)</span></a></li>
        <li><a href="tampil.php">Edit calon<span class="sr-only">(current)</span></a></li> 
      </ul> 
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> ?> <span class="caret"></span></a>
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
<table class="table table-hover">
<tr>
    <td width="112" height="29" align="center" valign="middle">Nama</td>
    <td width="112" align="center" valign="middle" >Nim</td>
    <td width="176" align="center" valign="middle" >TTL</td>
    <td width="252" align="center" valign="middle" >Status</td>
    <td width="134" align="center" valign="middle" >Progdi</td>
    <td width="134" align="center" valign="middle" >Foto</td>
    <td width="133" align="center" valign="middle" ><a href="adminpanel.php">TAMBAH</a></td></tr>
    <tr>
    <td p align="center" bgcolor="#FFFFFF">menen</td>
    <td p align="center" bgcolor="#FFFFFF">lr</td>
    <td p align="center" bgcolor="#FFFFFF">1</td>
    <td p align="center" bgcolor="#FFFFFF">3</td>
    <td p align="center" bgcolor="#FFFFFF">12</td>
    <td p align="center" bgcolor="#FFFFFF"><img alt="Calon"  src="user_image/<?php echo $siswa['foto']; ?>"width="300" height="200" ></td>
  </td>
  </tr>
</table>
</div>
</body>
</html>