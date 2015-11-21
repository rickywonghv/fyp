<?php
session_start();
header("Content-Type:text/html; charset=utf-8");

if(isset($_GET['email'])&&isset($_GET['code'])){
  act($_GET['email'],$_GET['code']);
}else{
  echo "fail";
}


function act($email,$code){
  require "asset/config/db.php";
  $query="select * from register where email=?";
  if ($stmt = $mysqli->prepare($query)) {
      $stmt->execute();
      $stmt->bind_result($regid, $resemail, $rescode);
      $stmt->fetch();
      if(!empty($regid)||!empty($resemail)||!empty($rescode)){
        $pass=md5(rand());
        $uid=rand(1,99999);
        $query="insert into user ";
      }
    $stmt->close();
}

$mysqli->close();
}

?>
