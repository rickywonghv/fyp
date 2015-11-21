<?php
require 'asset/config/db.php';
header("Content-Type:text/html; charset=utf-8");

$email = $_POST['formemail'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Invalid email format";
  echo "inv";
} else {
$random = rand();
$code = md5($random);


$sql = "SELECT email FROM user where email = '".$email."'";
$query = mysqli_query($sql) or die("Error: ");
$result_member=mysqli_fetch_array($query);

$sql = "SELECT email , code  FROM register where email = '".$email."'";
$query = mysqli_query($sql) or die("Error: ");
$result_reg=mysqli_fetch_array($query);

if ($result_reg[0] == "" && $result_member[0] == "" ){
$sql ="INSERT INTO register (email,code) VALUES ('$email','$code')";
mysqli_query($sql) or die("Error: ");
//MAIL

### 使用 UTF-8 編碼
//$charset = 'UTF-8';

### 收件電郵
$to = $email;

### 寄件電郵
//$from = 'noreply@musixcloud.xyz';

### 主旨
//$subject = '激活您的musixcloud帳號';

### 電郵內容
$message = "http://fyp.petersiow.space/act.php?email=".$email."&code=".$code;


//$headers = "From: $from\r\n" .
           "MIME-Version: 1.0\r\n" .
           "Content-type: text/html; charset=$charset\r\n";

### 傳送 email
//mail($to, $subject, $message, $headers);
require '../mail/mail.php';
regemail($to,$message);

//MAIL
echo "success";//"確認電郵已發送 請登入至".$email."的收件夾查詢。";

 }

 elseif($result_reg[0] != "" ) {

 echo "notact";//$result_reg[0] . " 已經登記但仍未激活，請到收件夾完成程序。";
 //echo $result_reg[1];



} elseif($result_member[0] != "" ) {

 echo "already";//$result_member[0] . " 已註冊，請登入";

}








}

 ?>
