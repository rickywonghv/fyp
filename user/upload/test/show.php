<?php
header("Content-Type:text/html; charset=utf-8");
$name="Ov.mp3";
echo shell_exec('exiftool  -json '.$name);
?>
