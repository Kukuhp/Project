<?php
    require_once "koneksi.php";
    require_once "aksi.php";
    session_start();
    // Buat object user
    if (empty($_SESSION['Nim'])) {
    header("location: Index.php");
    }
    if (isset($_GET['Norut'])) {
    $nomer = $_GET['Norut'];
    $nim = $_SESSION['Nim'];   
    $sql = $DB_con->query("SELECT * from poling where nim = '$nim' ");
    $ya  =  $sql->fetch(PDO::FETCH_ASSOC);
    $status = $ya['status'];
    if ($status == "Sudah") {
        
    header("location: forbiden.php");

  } else {

    $a = $DB_con->prepare("INSERT into poling (nim,vote,status) values ('$nim','$nomer','Sudah') ");
    $a->execute();
    header("location: welcome.php");
  }

}
?>