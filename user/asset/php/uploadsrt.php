<?php
header("Content-Type:text/html; charset=utf-8");

$name=$_FILES['pic']['name'];

$type = pathinfo($name,PATHINFO_EXTENSION);
if($type != "jpg" && $type != "png" && $type != "jpeg") {
  $arrayName = array('FileName'=>'notsupp' );
  printf(json_encode($arrayName));
}elseif($_FILES["pic"]["size"] > 500000){
$arrayName = array('FileName'=>'size' );
  printf(json_encode($arrayName));
}else{
  $newname="../../upload/albumart/".rand(1,9999999999999).".png";
  move_uploaded_file($_FILES["pic"]["tmp_name"],$newname);
  //$result = array('status' =>'success','path'=>$newname);
  $json= shell_exec('exiftool  -json '.$newname);
  echo substr($json,1,-2);
}

//printf(json_encode($result,JSON_UNESCAPED_UNICODE));
 ?>
