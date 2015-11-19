<?php
header("Content-Type:text/html; charset=utf-8");
$name= $_FILES['file']['tmp_name'];
move_uploaded_file($_FILES["file"]["tmp_name"],"files/".$_FILES["file"]["name"]);
$new = "files/".$_FILES["file"]["name"] ;
echo realpath($new);

$json= shell_exec('exiftool  -json '.$new);

echo substr($json,1,-2);


?>
