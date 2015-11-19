<?
$con = mysql_connect("fypsg.cpnxlvkuunux.ap-southeast-1.rds.amazonaws.com:3306","fyp","basa3aTR");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("db", $con);
?>
