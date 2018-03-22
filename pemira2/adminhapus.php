<?php
$query = $DB_con->prepare("select * from calonpresiden");
$query->execute();
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
        <li><a href="homepages.html">Vote <span class="sr-only">(current)</span></a></li>
        <li><a href="infopemira.html">Info Pemira <span class="sr-only">(current)</span></a></li>
        <li><a href="polling.html">Polling <span class="sr-only">(current)</span></a></li> 
        
      </ul> 
      <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Panel <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="admin1.html"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbspTambah Calon</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="admin2.html"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbspHapus Calon</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>
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
<div style="background-color: #FFFFFF;height: 600px " class="container">
<h3 style="border-left: 6px solid red;background-color:#F5F5F5;"> &nbsp Calon Presiden dan Wakil Presiden BEM 2016</h3>
<br>
<br> 
<br>
  <div class="container" align="center">
    <div class="col-sm-4">
    <button type="button" class="btn btn-default" aria-label="Left Align">
  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
</button>
        <div style="background-color:#FFFFFF;width: 300px;height: 400px; ">
        <br>
        <img src="" alt="Calon" width="200" height="200" ><br><br><br>
        <p> Ini Visinya Sumpah isinya bakalan lumayan banyak banget </p>
        <p> Ini Misinya Sumpah isinya bakalan ga banyak banyak banget </p>
        </div>
    </div>
    <div  class="col-sm-4">
    <button type="button" class="btn btn-default" aria-label="Left Align">
  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
</button>
        <div style="background-color:#FFFFFF;width: 300px;height: 400px; ">
        <br>
        <img alt="Calon" src="" width="200" height="200"><br><br><br>
        <p> Ini Visinya Sumpah isinya bakalan lumayan banyak banget </p>
        <p> Ini Misinya Sumpah isinya bakalan ga banyak banyak banget </p>
        </div>
    </div>
    <div class="col-sm-4">
    <button type="button" class="btn btn-default" aria-label="Left Align">
  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
</button>
<button type="butn" class="btn btn-default" name="btn3" aria-label="Left Align"><>edit
  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
</button>
        <div style="background-color:#FFFFFF;width: 300px;height: 400px; ">
        <br>
        <img alt="Calon" src="" width="200" height="200"><br><br><br>
        <p> Ini Visinya Sumpah isinya bakalan lumayan banyak banget </p>
        <p> Ini Misinya Sumpah isinya bakalan ga banyak banyak banget </p>
        </div>
    </div>
  </div>
</div>  
  </body>
</html>