<?php
if(isset($_POST['email'])&&$_GET['act']=='login'){
  login($_POST['email'],$_POST['name']);
}
function login($email,$name){
  session_start();
  include '../config/db.php';
  $sql="select fullname,email from user where email=?";
  $stmt=$conn->prepare($sql);
  $stmt->bind_param('s',$email);
  $stmt->execute();
  $stmt->bind_result($rename,$reemail);
  $stmt->fetch();
  if($rename==""&&$reemail==""){
    include "../config/db.php";
      $email=$email;
      $uid=rand();
      $fullname=$name;
      $gender=null;
      $dob=null;
      $intro=null;
      $type=1;
      $expdate=null;
      $regdate=date('Y-m-d');
      $regip=$_SERVER['REMOTE_ADDR'];
      $lastlogtime=null;
      $lastlogip=null;
      $username=null;
      $pwd=rand(1,9999999);
      $pass=md5($pwd);
      $sql="insert into user values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
      $stmt=$conn->prepare($sql);
      $stmt->bind_param("isssssisssssss",$uid,$fullname,$gender,$email,$dob,$intro,$type,$expdate,$regdate,$regip,$lastlogtime,$lastlogip,$username,$pass);
      $stmt->execute();
      $_SESSION['email']=$email;
      include '../mail/mail.php';
      oauthreg($email,$pwd);
  }else{
    $_SESSION['email']=$email;
    echo "success";
  }


}

 ?>
