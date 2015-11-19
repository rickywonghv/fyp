<?php
session_start();
header("Content-Type:text/html; charset=utf-8");
require "db_connect.php";
$email = $_GET['email'];
$code = $_GET['code'];

$sql = "SELECT email FROM user where email = '".$email."'";
$query = mysql_query($sql) or die("Error: " . mysql_error());
$result_member=mysql_fetch_array($query);

$sql = "SELECT email , code  FROM register where email = '".$email."'";
$query = mysql_query($sql) or die("Error: " . mysql_error());
$result_reg=mysql_fetch_array($query);

if ($result_member[0] == "" && $result_reg[0]= $email){

if ($result_reg[0] == $email && $result_reg[1] == $code)


$pw = rand();
$password = md5($pw);


$sql ="INSERT INTO user (email,password) VALUES ('$email','$password')";
mysql_query($sql) or die("Error: " . mysql_error());


### 使用 UTF-8 編碼
$charset = 'UTF-8';
### 收件電郵
$to = $email;
### 寄件電郵
$from = 'noreply@musixcloud.xyz';
### 主旨
$subject = '登入您的musixcloud帳號';
### 電郵內容
$message = "您的帳號為 ".$email."<br/>您的密碼為".$pw;

$headers = "From: $from\r\n" .
           "MIME-Version: 1.0\r\n" .
           "Content-type: text/html; charset=$charset\r\n";
### 傳送 email
mail($to, $subject, $message, $headers);











echo"您已成功激活，您的暫存密碼已發送至郵箱，請登入完善你的個人資料。";



 } else { echo "錯誤，您已激活"; };





 ?>
