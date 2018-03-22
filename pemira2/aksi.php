<?php
class user{
	
  private $DB_con;
	function __construct($DB_conn)
    {
      $this->DB_con = $DB_conn;
      //session_start();
    }
    public function register($Nama,$Nim,$Jurusan,$Email,$Password){
    	try{
    		$stmt = $this->DB_con->prepare("INSERT INTO tb_daftar(Nama,Nim,Jurusan,Email,Password) VALUES(:Nama,:Nim,:Jurusan,:Email,:Password)");
    		
    		$stmt->bindparam(":Nama", $Nama);
           	$stmt->bindparam(":Nim", $Nim);
           	$stmt->bindparam(":Jurusan", $Jurusan);
           	$stmt->bindparam(":Email", $Email);
           	$stmt->bindparam(":Password", $Password);            
           	$stmt->execute(); 

           return $stmt; 
    	} catch(PDOException $e){
           echo $e->getMessage();
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
  public function login($nim, $password)
        {
            try
            {
                // Ambil data dari database
                $query = $this->DB_con->prepare("SELECT * FROM tb_daftar WHERE Nim = :Nim AND Password = :Password");
                $query->bindParam(":Nim", $nim);
                $query->bindParam(":Password", $password);
                $query->execute();
                $data = $query->fetch();

                // Jika jumlah baris > 0
                if($query->rowCount() > 0){
                    // jika password yang dimasukkan sesuai dengan yg ada di database
                    if(($password == $data['Password'])){
                        session_start();
                        $_SESSION['user_session'] = $data['id'];
                        $_SESSION['Nim']=$data['Nim'];
                        $_SESSION['is_logged'] = true;
                        
                        return true;
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        
         // Cek apakah user sudah login
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
    public function vote($nomer,$nim){
        $a = ("INSERT into poling (nim,vote,status) values ('$nim','$nomer','Sudah') ");
        $this->DB_con->query($a);
    }

} 
?>