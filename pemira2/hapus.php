<?php
include('koneksi.php');

$no= $_GET['no'];

try {
   

    // sql to delete a record
    $sql = "DELETE FROM calonpresiden WHERE no='$no'";
    $sql2 = "DELETE FROM calonwapres WHERE no='$no'";

    // use exec() because no results are returned
    $DB_con->exec($sql);
    $DB_con->exec($sql2);
   echo "<script type= 'text/javascript'>alert('berhasil menghapus');
    		window.location='tampil.php';
	</script> ";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$pdo = null;
?>