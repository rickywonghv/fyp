<?
$con = mysql_connect("fypmusic.cheremwl8tli.ap-northeast-1.rds.amazonaws.com","fyp","basa3aTR");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("musixcloud", $con);
?>
