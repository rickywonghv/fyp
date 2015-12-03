<?php
session_start();
if(empty($_SESSION['email'])){
   header("Location:../../index.php");
}

if($_GET['act']=="cpwd"){
  cpwd($_POST['npwd'],$_POST['conpwd']);
}elseif($_GET['act']=="viewpro") {
  viewprofile($_GET['uid']);
}

function cpwd($npwd,$conpwd){
  include 'db.php';
  if(empty($npwd)||empty($conpwd)){
    echo 'null';
  }else{
        include 'db.php';
        $mpwd=md5($npwd);
        $del="UPDATE user SET password=? where userid=?";
        $stmt=$conn->prepare($del);
          $stmt->bind_param("ss",$mpwd,$_SESSION['uid']);
          $stmt->execute();
          echo 'success';
      }
  }


function viewprofile($uid){
  include 'db.php';
  session_start();
  $sql="select userid,fbuid,email,fullname,type,gender,intro,expDate,regDate from user where userid=?";
  if($stmt=$conn->prepare($sql)){
    $stmt->bind_param('i',$uid);
    $stmt->execute();
    $data = $stmt->get_result();
  	     $result = array();
  	     while($row = $data->fetch_assoc()) {
           
  	          $result[] = $row;
              echo json_encode($result);
  	      }

  }

}
 ?>
