<?php
include '../config/db.php';

$sql="SELECT music.songid,music.title, music.songPath, music.singer FROM music INNER JOIN user ON music.userid=user.userid WHERE user.type=1";
$stmt=mysqli_query($conn,"SET NAMES UTF8");
$stmt=$conn->prepare($sql);
$stmt->execute();
$stmt->bind_result($songid, $title,$songPath,$singer);
$array= array();
while ($stmt->fetch()) {
    $array[]= array('id' =>$songid ,'singer'=>$singer ,'title'=>$title,'path'=>'http://musixcloud.xyz/asset/php/play.php?url='.$songPath);
      //'path'=>'http://musixcloud.xyz/asset/php/play.php?url='.$songPath
    $songjson=json_encode($array,JSON_UNESCAPED_UNICODE);
}
print_r($songjson);
?>
