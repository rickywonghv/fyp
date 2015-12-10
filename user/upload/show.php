<?php

//header("Content-Type:text/html; charset=utf-8");
  $name= $_FILES['file']['tmp_name'];
  $newname=rand(1,9999999999999);
  move_uploaded_file($_FILES["file"]["tmp_name"],"files/".$newname.'.mp3');
  $new = "files/".$_FILES["file"]["name"] ;
  $result = array('status' =>'true','refilename'=>$newname.'.mp3');
  printf(json_encode($result));
?>
