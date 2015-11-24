<?php
require '../config/db.php';
header("Content-Type:text/html; charset=utf-8");

  $email = $_POST['formemail'];

if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Invalid email format";
  echo "inv";
}else {
    $sql="select email from user where email=?";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param('s',$email);
    $stmt->execute();
    $stmt->bind_result($restemail);
    $stmt->fetch();
      if(!empty($restemail)){
        echo "already";
      }else{
        $sql = "select email from register where email=?";
        $stmt=$conn->prepare($sql);
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $stmt->bind_result($resemail);
        $stmt->fetch();
        if(empty($resemail)){
          $email = $_POST['formemail'];
          $random = rand();
          $code = md5($random);
          $to = $email;
          $message = "http://fyp.damonw.com/act.php?email=".$email."&code=".$code;

          $regid=null;
          $sql="insert into register values(?,?,?)";
          $stmt=$conn->prepare($sql);
          $stmt->bind_param('sss',$regid,$email,$code);
          $stmt->execute();

          include '../mail/mail.php';
          regmail($to,$message);
        }else{
          echo "notact";
        }
      }
}
?>
