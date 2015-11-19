<?php
header("Content-Type:text/html; charset=utf-8");
$name=$_FILES['file']['tmp_name'];
$json= shell_exec('exiftool  -json '.$name);

echo "music : ".substr($json,1,-2);


?>
