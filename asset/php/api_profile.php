<?php
session_start();
$mobtoken=$_POST['token'];
$target_uid=$_POST['target_uid'];
include '../config/db.php';

echo '{"profileResult" :';


  $sql="SELECT fullname,gender,dob,intro FROM user where userid = '".$target_uid."'";
  if($stmt=$conn->prepare($sql)){
    $stmt->execute();
    $data = $stmt->get_result();
               $result = array();
               while($row = $data->fetch_assoc()) {
                    $result[] = $row;

                }
    echo json_encode($result,JSON_UNESCAPED_UNICODE);
  }




echo ',"albumResult" :';

$sql="SELECT music.songid,music.title,music.songPath,music.singer,music.album,music.artPath  FROM music INNER JOIN user ON music.userid=user.userid WHERE user.userid=".$target_uid." and music.album!=''";
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

          echo ',"singleResult" :';

          $sql="SELECT music.songid,music.title,music.songPath,music.singer,music.album,music.artPath  FROM music INNER JOIN user ON music.userid=user.userid WHERE user.userid=".$target_uid." and music.album='' ";
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
