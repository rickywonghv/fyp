<?php

include '../config/db_connect.php';

$sql = "SELECT email FROM user where email = '".$email."'";
$query = mysql_query($sql) or die("Error: " . mysql_error());
$result_member=mysql_fetch_array($query);

$sql = "SELECT email , code  FROM register where email = '".$email."'";
$query = mysql_query($sql) or die("Error: " . mysql_error());
$result_reg=mysql_fetch_array($query);




if ($result_reg[0] == "" && $result_member[0] == "" ){


$sql ="INSERT INTO register (email,code) VALUES ('$email','$code')";
mysql_query($sql) or die("Error: " . mysql_error());
echo $code;





 }

 else if ($result_reg[0] != "" ) {

 echo $result_reg[0] . " is registered , please comfirm.";
 echo $result_reg[1];

} else if ($result_member[0] != "" ) {

 echo $result_member[0] . " is registered , please login.";

}





?>
