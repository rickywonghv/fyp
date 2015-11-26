<?php

function regmail($tomail,$url){   //tomail and the activate url
  //date_default_timezone_set('Asia/Hong_Kong');
  require 'phpmailer/PHPMailerAutoload.php';
  //require('phpmailer/class.phpmailer.php');
  $mail = new PHPMailer();
  $mail->isSMTP();
  //$mail->SMTPDebug = 3; //use to debug
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = "ssl";
  $mail->Host = "smtp.gmail.com";
  $mail->Port = 465;
  $mail->isHTML(true);
  $mail->Username = "musixcloudreg@gmail.com";
  $mail->Password = "basa3aTR";
  $mail->SetFrom("musixcloudreg@gmail.com",'MusixCloud');
  $mail->AddAddress($tomail);
  //$mail->Host = gethostbyname('smtp.gmail.com');
  //$mail->addReplyTo('replyto@example.com', 'First Last');
  $mail->Subject = "MusixCloud membership comfirm email";
  $mail->Body = "Please click this link to activate your account: <a href=".$url.">".$url."</a>";
  if(!$mail->Send()){
        echo "Mailer Error: " . $mail->ErrorInfo;
        echo 'error';
  }else{
        echo "success";
  }
}

function actmail($tomail,$pass){
  include 'phpmailer/PHPMailerAutoload.php';
  //require('phpmailer/class.phpmailer.php');
  $mail = new PHPMailer();
  $mail->isSMTP();
  //$mail->SMTPDebug = 3; //use to debug
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = "ssl";
  $mail->Host = "smtp.gmail.com";
  $mail->Port = 465;
  $mail->isHTML(true);
  $mail->Username = "musixcloudreg@gmail.com";
  $mail->Password = "basa3aTR";
  $mail->SetFrom("musixcloudreg@gmail.com",'MusixCloud');
  $mail->AddAddress($tomail);
  //$mail->addReplyTo('replyto@example.com', 'First Last');
  $mail->Subject = "MusixCloud membership has activate. ";
  $mail->Body = "Your Account has been activate, please use this password to login and change the password after you login. <a href='http://fyp.damonw.com'>Click to MusixCloud</a>"."\n"."Email:".$tomail." Password: ".$pass;
  if(!$mail->Send()){
        echo "Mailer Error: " . $mail->ErrorInfo;
        echo 'error';
  }else{
        echo "Your account has already been activate, please click this link to login: <a href='http://fyp.damonw.com'>Click</a>";
  }
}

function oauthreg($tomail,$pass){
  include 'phpmailer/PHPMailerAutoload.php';
  //require('phpmailer/class.phpmailer.php');
  $mail = new PHPMailer();
  $mail->isSMTP();
  //$mail->SMTPDebug = 3; //use to debug
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = "ssl";
  $mail->Host = "smtp.gmail.com";
  $mail->Port = 465;
  $mail->isHTML(true);
  $mail->Username = "musixcloudreg@gmail.com";
  $mail->Password = "basa3aTR";
  $mail->SetFrom("musixcloudreg@gmail.com",'MusixCloud');
  $mail->AddAddress($tomail);
  //$mail->addReplyTo('replyto@example.com', 'First Last');
  $mail->Subject = "MusixCloud membership has activate. ";
  $mail->Body = "Your Account has been activate, please use this password to login and change the password after you login. <a href='http://fyp.damonw.com'>Click to MusixCloud</a>"."\n"."Email:".$tomail." Password: ".$pass;
  if(!$mail->Send()){
        echo "Mailer Error: " . $mail->ErrorInfo;
        echo 'error';
  }else{
        echo "success";
  }
}
?>
