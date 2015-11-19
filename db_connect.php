<?
$con = mysql_connect("localhost","db315","Petersys214");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("db", $con);
?>
