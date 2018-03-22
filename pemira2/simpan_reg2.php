<?php
require_once 'koneksi.php';

if(isset($_POST['daftar']))
{
    $Nama = trim($_POST['Nama']);
    $Nim = trim($_POST['Nim']);
    $Jurusan = trim($_POST['Jurusan']); 
    $Email = trim($_POST['Email']); 
    //$Password = trim($_POST['Password']);
    $Password = md5($_POST['Password']);

            if($user->register($Nama,$Nim,$Jurusan,$Email,$Password)) 
            {
                $user->redirect('welcome.php');
            }
  
}

?>
<!DOCTYPE html>
<html lang="en">
<html>
<head>
	<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Pemira Udinus</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="style.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #F5FFFA">
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
      <a class="navbar-brand" href="welcome.html">Voting Pemira</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <p class="navbar-text navbar-center"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> &nbsp Register</p>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="container" style="background-color: #FFFFFF;;height: 600px">
      <h3 style="border-left: 6px solid red;background-color:#F5F5F5;"> &nbsp Register Page</h3>
<br>
<br>
<br>
<br>
<div class="row" align="center">
<div class="col-md-2"></div>
<div class="col-md-10"></div>
<form  class="form-horizontal" method="post" >
<div class="form-group">
    <label for="inputNama" class="col-sm-4 control-label">Nama</label>
    <div class="col-xs-3">
      <input type="nama" name="Nama" class="form-control" required="" id="inputNama" placeholder="Nama">
    </div>
  </div>
  <div class="form-group">
    <label for="inputNim" class="col-sm-4 control-label">Nim</label>
    <div class="col-xs-3">
      <input type="Nim" name="Nim" class="form-control" required="" id="inputNim" placeholder="Nim">
    </div>
  </div>
  <div class="form-group">
    <label for="inputJurusan" class="col-sm-4 control-label">Jurusan</label>
    <div class="col-xs-3">
      <input type="Jurusan" name="Jurusan" class="form-control" id="inputJurusan" placeholder="Jurusan">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">Email</label>
    <div class="col-xs-3">
      <input type="email" name="Email" class="form-control" id="inputEmail3" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
    <div class="col-xs-3">
      <input type="password" name="Password" class="form-control" required="" id="inputPassword3" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword4" class="col-sm-4 control-label">Ulangi Password</label>
    <div class="col-xs-3">
      <input type="password" class="form-control" required="" id="inputPassword4" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-7">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Remember me
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-7">
      <button type="submit" class="btn btn-default" name="daftar">Submit</button>
    </div>
  </div>
</div>
</form>
</body>
</html>