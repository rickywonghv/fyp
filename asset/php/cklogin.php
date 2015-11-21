<?php
session_start();
require '../config/db.php';
      $loginemail=$_POST['loginemail'];
      $loginpwd=$_POST['loginpwd'];
        $sql="select userid,email,password,type from user where email=?";
        $stmt=$conn->prepare($sql);
        $stmt->bind_param('s',$loginemail);
        $stmt->execute();
        $stmt->bind_result($userid,$email,$password,$type);
        $stmt->fetch();
        try{

          if(($email==$loginemail)&&(md5($loginpwd)==$password)){
            echo "true";
            $_SESSION['email']=$email;
            $_SESSION['type']=$type;
            $_SESSION['uid']=$userid;
          }else{
            echo 'false';
          }
      }catch(Exception $e){
        printf($e->getMessage());
      }
?>
