<?php
session_start();

$keyword=$_POST['keyword'];

include '../config/db.php';

echo '{"titleResult" :';

  $sql = "SELECT songid,title,songPath,singer,album,artPath FROM `music` WHERE `title` LIKE '%".$keyword."%'";
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



echo ',"albumResult" :';

  $sql = "SELECT  songid,title,songPath,singer,album,artPath  FROM `music` WHERE `album` LIKE '%".$keyword."%'";
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


echo ',"singerResult" :';

  $sql = "SELECT  songid,title,songPath,singer,album,artPath  FROM `music` WHERE `singer` LIKE '%".$keyword."%'";
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
echo "}";


 ?>
