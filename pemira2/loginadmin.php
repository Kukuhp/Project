<?php
require_once "koneksi.php";
require_once "admin.php";

$user = new admin($DB_con);

 //Jika sudah login
    if($user->isLoggedIn()){
        header("location: adminpanel.php?no=1"); //redirect ke index
    }

    //jika ada data yg dikirim
    if(isset($_POST['kirim'])){
        $Uname = $_POST['Uname'];
        $password = md5($_POST['Password']);

        // Proses login user
        if($user->loginAD($Uname, $password)){
            header("location: adminpanel.php?no=1");
        }else{
            // Jika login gagal, ambil pesan error
            echo "eror";
        }
    }
    else if(isset($_GET['logout']))
    {
      if($_GET['logout']==true)
      {
      session_start();
      session_destroy();
    }
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
	
<div class="row" align="center">
<div class="container" style="background-color: #FFFFFF;;height: 670px">

  <br>
 <div class="jumbotron">
  <div class="container">
  <h1>Selamat Datang Admin</h1>
  <p>Website Pemira UDINUS 2020</p>
  
  <br>
  <br>
  <br>
  <br>
  <br>
  <div class="row" align="center">
<div class="col-md-4"></div>
<div class="col-sm-4"><h3 style="border: none;
    border-bottom: 2px solid black;" align="left">&nbspLogin to Continue</h3></div>  
<div class="col-md-4"></div>
  </div>
  <br>

  <form class="form-horizontal" method="POST">
          <div class="form-group">
            <label for="inputnim" class="col-sm-4 control-label">Username</label>
              <div class="col-sm-4">
                  <input type="text" name="Uname" class="form-control" id="Username">
              </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
            <div class="col-sm-4">
                <input type="password" name="Password" class="form-control" id="pass">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-5 col-sm-5">
                <input type="submit" name="kirim" value="login">
            </div>
          </div>
      </form>
</div>
</div>
</div>
</body>
</html>
