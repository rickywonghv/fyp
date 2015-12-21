<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
if(empty($_SESSION['uid'])){
   header("Location:../../index.php");
}


if($_GET['act']=="cpwd"){
  cpwd($_POST['npwd'],$_POST['conpwd']);
}elseif($_GET['act']=="viewpro") {
  viewprofile($_GET['uid']);
}elseif($_GET['act']=="shownsong"){
  shownsong($_POST['uid']);
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


function shownsong($userid){
  include 'db.php';
  session_start();
  $sql="select title,songPath from music where userid=?";
  //$stmt=mysqli_query($conn,"SET NAMES UTF8");
  $stmt=$conn->prepare($sql);
  $stmt->bind_param("i",$userid);
  $stmt->execute();
  $data = $stmt->get_result();
     $result = array();
     while($row = $data->fetch_assoc()) {
          $result[] = $row;
      }
      echo json_encode($result);
}

 ?>
