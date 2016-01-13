<?php
session_start();
$mobtoken=$_POST['token'];
include '../config/db.php';

$sql = "SELECT songid,title,songPath,singer,album,artPath FROM `music` ORDER BY `uploadDateTime` dESC limit 10";
if($stmt=$conn->prepare($sql)){
  $stmt->execute();
  $stmt->bind_result($songid, $title,$songPath,$singer,$album,$artPath);
      $array= array();
      while ($stmt->fetch()) {
        if ($artPath == ""){
        $array[]= array('id' =>$songid ,'singer'=>$singer ,'title'=>$title,'path'=>'http://musixcloud.xyz/asset/php/play.php?url='.$songPath,'album'=>$album,'artPath'=>$artPath);
          }
        else {
          $array[]= array('id' =>$songid ,'singer'=>$singer ,'title'=>$title,'path'=>'http://musixcloud.xyz/asset/php/play.php?url='.$songPath,'album'=>$album,'artPath'=>'http://musixcloud.xyz/user/upload/albumart/'.$artPath);
        }

          $songjson=json_encode($array,JSON_UNESCAPED_UNICODE);
      }
      print_r($songjson);


  }


 else {

 };


?>
