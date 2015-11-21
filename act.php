<?php
session_start();
header("Content-Type:text/html; charset=utf-8");


$email=$_GET['email'];
$code=$_GET['code'];


  require "asset/config/db.php";
  $query="select * from register where email=?";
  if ($stmt = $conn->prepare($query)) {
      $stmt->bind_param("s",$email);
      $stmt->execute();
      $stmt->bind_result($regid, $resemail, $rescode);
      $stmt->fetch();
      if(($email==$resemail)&&($code=$rescode)){
        try{
          require "asset/config/db.php";

            $email=$_GET['email'];
            $uid=rand();
            $fullname=null;
            $gender=null;
            $dob=null;
            $intro=null;
            $type=0;
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
            include 'asset/mail/mail.php';
            actmail($email,$pwd);

            try{
              $email=$_GET['email'];
              require "asset/config/db.php";
              $sql="delete from register where email=?";
              $stmt=$conn->prepare($sql);
              $stmt->bind_param("s",$email);
              $stmt->execute();

            }catch(Exception $e){
      				printf($e->getMessage());
      			}
        }
  			catch(Exception $e){
  				printf($e->getMessage());
  			}

  }else{
    echo "Invalid code";
  }
}


?>
