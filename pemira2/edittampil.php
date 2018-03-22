<?php
  require_once('koneksi.php');
  require_once('admin.php');

    $user = new admin($DB_con);
  try {
    $Nama = $_POST['Nama'];
    $Nim = $_POST['Nim'];
    $TTL = $_POST['TTL'];
    $Status = $_POST['Status'];
    $Progdi = $_POST['Progdi'];
    $visi = $_POST['visi'];
    $misi = $_POST['misi'];
    $No = $_POST['No'];

    $Nama3 = $_POST['Nama3'];
    $Nim2 = $_POST['Nim2'];
    $TTL2 = $_POST['TTL2'];
    $Status2 = $_POST['Status2'];
    $Progdi2 = $_POST['Progdi2'];

    $imgFile = $_FILES['user_image']['name'];
    $tmp_dir = $_FILES['user_image']['tmp_name'];
    $imgSize = $_FILES['user_image']['size'];
  
    
   
      $upload_dir = 'user_image/'; // upload directory
  
      $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
    
      // valid image extensions
      $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
    
      // rename uploading image
      $userpict = rand(1000,1000000).".".$imgExt;
        
      // allow valid image file formats
      if(in_array($imgExt, $valid_extensions)){     
        // Check file size '5MB'
        if($imgSize < 5000000)        {
          move_uploaded_file($tmp_dir,$upload_dir.$userpict);
        }
        else{
          $errMSG = "Sorry, your file is too large.";
        }
      }
      else{
        $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";    
      }
    
  
    
   if($user->editcalon($Nama,$Nim,$TTL,$Progdi,$Status,$visi,$misi,$No,$userpict,$Nama3,$Nim2,$TTL2,$Status2,$Progdi2)) 
            {
                $user->redirect('infopemira.php?no=1');
            }         /**/
  }catch(PDOException $e){
    echo $e->getMessage();
}
