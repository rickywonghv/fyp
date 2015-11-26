<?php
session_start();
if(empty($_SESSION['email'])){
   header("Location:../../index.php");
}

if($_GET['act']=="chpwd"){
  chpwd($_POST['opwd'],$_POST['npwd'],$_POST['conpwd']);
}elseif ($_GET['act']=="viewpro") {
  viewprofile();
}

function chpwd($opwd,$npwd,$conpwd){
  include 'db.php';
  if(empty($opwd)||empty($npwd)||empty($conpwd)){
    echo 'null';
  }else{
      include 'db.php';
      $sql="select password from user where email=?";
      $stmt=$conn->prepare($sql);
      $stmt->bind_param("s",$_SESSION['email']);
      $stmt->execute();
      $stmt->bind_result($pass);
      $stmt->fetch();
      if($pass!=md5($opwd)){
        echo "wrongpwd";
      }else{
        include 'db.php';
        $mpwd=md5($npwd);
        $del="UPDATE user SET password=? where email=?";
        $stmt=$conn->prepare($del);
          $stmt->bind_param("ss",$mpwd,$_SESSION['email']);
          $stmt->execute();
          echo 'success';
      }
  }
}

function viewprofile(){
  include 'db.php';
  
}
 ?>
