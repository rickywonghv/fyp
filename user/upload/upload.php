<?php
header("Content-Type:text/html; charset=utf-8");
$name= $_FILES['file']['tmp_name'];
//$_FILES["file"]["name"]
$newname="files/".rand(1,9999999999999).".mp3";
move_uploaded_file($_FILES["file"]["tmp_name"],$newname);
$new = "files/".$_FILES["file"]["name"] ;
//echo realpath($newname);

$json= shell_exec('exiftool  -json '.$newname);

echo substr($json,1,-2);


?>
