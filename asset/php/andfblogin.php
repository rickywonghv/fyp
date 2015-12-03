<?php
session_start();
    $fbuid=$_POST['id'];
    $email=null;
    $name=$_POST['name'];
    $fbgender=$_POST['gender'];
    $status;
    include '../config/db.php';
    $sql="select userid,fbuid,email from user where fbuid=?";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param('s',$fbuid);
    $stmt->execute();
    $stmt->bind_result($reuid,$rfbuid,$remail);
    $stmt->fetch();
    if($rfbuid==""){
      $uid=rand(1,999999);
      $dob=null;
      $intro=null;
      $type=1;
      $expdate=null;
      $regdate=date('Y-m-d');
      $regip=$_SERVER['REMOTE_ADDR'];
      $pass=rand();
      $pwd=md5($pass);
      $token=null;
        $query="INSERT INTO user (userid,fbuid,email,password,type,fullname,gender,dob,intro,expDate,regDate,regIp,uToken)VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
        if ($stmt=$conn->prepare($query)) {
          $stmt->bind_param("isssissssssss",$uid,$fbuid,$email,$pwd,$type,$name,$fbgender,$dob,$intro,$expdate,$regdate,$regip,$token);
          $stmt->execute();
          $status=true;
          printf($stmt->error);
        }else{
          $status=$stmt->error;
        }
    }else{
      $status=true;

    }
 ?>
