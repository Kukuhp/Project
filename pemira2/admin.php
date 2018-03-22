<?php
	class admin{
	private $DB_con;
	function __construct($DB_conn)
    {
      $this->DB_con = $DB_conn;
      //session_start();
    }
    public function loginAD($Uname, $password)
        {
            try
            {
                // Ambil data dari database
                $query = $this->DB_con->prepare("SELECT * FROM adminku WHERE id = :Uname AND password = :Password");
                $query->bindParam(":Uname", $Uname);
                $query->bindParam(":Password", $password);
                $query->execute();
                $data = $query->fetch();

                // Jika jumlah baris > 0
                if($query->rowCount() > 0){
                    // jika password yang dimasukkan sesuai dengan yg ada di database
                    if(($password == $data['password'])){
                        session_start();
                        $_SESSION['user_session'] = $data['id'];
                        $_SESSION['Nim']=$data['id'];
                        $_SESSION['is_logged'] = true;
                        
                        return true;
                    }else{
                        echo "gagal";
                        return false;
                    }
                }else{
                    echo "Nim atau Password Salah bos";
                    return false;
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
         public function redirect($url)
   {
       header("Location: $url");
   }
 
   public function logout()
   {
        session_destroy();
        unset($_SESSION['user_session']);

        return true;
   }

 public function isLoggedIn(){
            // Apakah user_session sudah ada di session
            if(isset($_SESSION['user_session']))
            {
                return true;
            }
        }
        public function getUser(){
            // Cek apakah sudah login
            if(!$this->isLoggedIn()){
                return false;
            }

            try {
                // Ambil data user dari database
                $query = $this->DB_con->prepare("SELECT * FROM tb_daftar WHERE id = :id");
                $query->bindParam(":id", $_SESSION['user_session']);
                $query->execute();
                return $query->fetch();
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        public function tambahcalon($Nama,$Nim,$TTL,$Progdi,$Status,$visi,$misi,$No,$userpic,$Nama3,$Nim2,$TTL2,$Status2,$Progdi2){
        	try{
    		$stmt = $this->DB_con->prepare("INSERT INTO calonpresiden(Nama,Nim,TTL,Status,Progdi,visi,misi,No,foto) VALUES(:Nama,:Nim,:TTL,:Status,:Progdi,:visi,:misi,:No,:foto)");
      		$stmt2 = $this->DB_con->prepare("INSERT INTO calonwapres (Nama,Nim,TTL,Status,Progdi,No) values (:Nama3,:Nim2,:TTL2,:Status2,:Progdi2,:No)");
      		$stmt->bindparam(":Nama", $Nama);
      		$stmt->bindparam(":Nim", $Nim);
      		$stmt->bindparam(":TTL", $TTL);
      		$stmt->bindparam(":Status", $Status);
      		$stmt->bindparam(":Progdi", $Progdi);
      		$stmt->bindparam(":visi", $visi);
      		$stmt->bindparam(":misi", $misi);
      		$stmt->bindparam(":No", $No);
      		$stmt->bindParam(":foto",$userpic);
     // $stmt->bindparam(":fakultas", $fakultas);
    
      $stmt2->bindparam(":Nama3", $Nama3);
      $stmt2->bindparam(":Nim2", $Nim2);
      $stmt2->bindparam(":TTL2", $TTL2);
      $stmt2->bindparam(":Status2", $Status2);
      $stmt2->bindparam(":Progdi2", $Progdi2);
      $stmt2->bindparam(":No", $No);
      //$stmt2->bindparam(":fakultas2", $fakultas2);
      //$stmt->execute();
      //$stmt2->execute();
      if($stmt->execute()&&$stmt2->execute())
      {
        $successMSG = "new record succesfully inserted ...";
        header("refresh:5;homepages.php?no=1"); // redirects image view page after 5 seconds.
      }
      else
      {
        echo "eror";
      } 
    	} catch(PDOException $e){
           echo $e->getMessage();
       }
   }
   public function editcalon($Nama,$Nim,$TTL,$Progdi,$Status,$visi,$misi,$No,$userpict,$Nama3,$Nim2,$TTL2,$Status2,$Progdi2){ 
   		try{
    $sql = "UPDATE calonpresiden SET nama= '$Nama',nim = '$Nim',ttl = '$TTL',status  ='$Status',progdi = '$Progdi',visi = '$visi',misi = '$misi',no = '$No',foto = '$userpict' WHERE no = '$No'";
    $sql2 = "UPDATE calonwapres SET nama = '$Nama3',nim = '$Nim2',
                        ttl = '$TTL2' ,status  = '$Status2', progdi = '$Progdi2', no ='$No' WHERE no = '$No' ";
                                 $this->DB_con->query($sql);
                                 $this->DB_con->query($sql2);
 
    	} catch(PDOException $e){
           echo $e->getMessage();
       }
	}
	public function hapuscalon($no){
		try {
    // sql to delete a record
    $sql = "DELETE FROM calonpresiden WHERE no='$no'";
    $sql2 = "DELETE FROM calonwapres WHERE no='$no'";

    // use exec() because no results are returned
     $this->DB_con->exec($sql);
     $this->DB_con->exec($sql2);
   echo "<script type= 'text/javascript'>alert('berhasil menghapus');
    		window.location='tampil.php';
	</script> ";
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
       }

}
}
?>