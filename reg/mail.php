<?php
header("Content-Type:text/html; charset=utf-8");

$email = $_POST['form-email'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Invalid email format";
  echo $emailErr;
} else {


$random = rand();
$code = md5($random);


include 'db_connect.php';
$sql = "SELECT email FROM user where email = '".$email."'";
$query = mysql_query($sql) or die("Error: " . mysql_error());
$result_member=mysql_fetch_array($query);

$sql = "SELECT email , code  FROM register where email = '".$email."'";
$query = mysql_query($sql) or die("Error: " . mysql_error());
$result_reg=mysql_fetch_array($query);

if ($result_reg[0] == "" && $result_member[0] == "" ){
$sql ="INSERT INTO register (email,code) VALUES ('$email','$code')";
mysql_query($sql) or die("Error: " . mysql_error());
//MAIL

### 使用 UTF-8 編碼
$charset = 'UTF-8';

### 收件電郵
$to = $email;

### 寄件電郵
$from = 'noreply@musixcloud.xyz';

### 主旨
$subject = '激活您的musixcloud帳號';

### 電郵內容
$message = "http://fyp.petersiow.space/reg/act.php?email=".$email."&code=".$code;


$headers = "From: $from\r\n" .
           "MIME-Version: 1.0\r\n" .
           "Content-type: text/html; charset=$charset\r\n";

### 傳送 email
mail($to, $subject, $message, $headers);







//MAIL
echo "確認電郵已發送 請登入至".$email."的收件夾查詢。";

 }

 else if ($result_reg[0] != "" ) {

 echo $result_reg[0] . " 已經登記但仍未激活，請到收件夾完成程序。";
 //echo $result_reg[1];



} else if ($result_member[0] != "" ) {

 echo $result_member[0] . " 已註冊，請登入";

}








}

 ?>
