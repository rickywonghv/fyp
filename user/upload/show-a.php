<?php
header("Content-Type:text/html; charset=utf-8");
$filetype=$_FILES["file"]["type"];


  $name=$_FILES['file']['tmp_name'];
  $json= shell_exec('exiftool  -json '.$name);

  echo "music : ".substr($json,1,-2);




?>
