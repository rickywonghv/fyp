<?php
header("Content-Type:text/html; charset=utf-8");

require_once('../plugin/id3/getid3/getid3.php');

$target_path = "files/"; //指定上傳資料夾
$target_file = $target_path.$_FILES['file']['name']; //上傳檔案名稱

if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)) {

  $getID3 = new getID3;
  set_time_limit(30);
  $ThisFileInfo = $getID3->analyze($target_file);
  getid3_lib::CopyTagsToComments($ThisFileInfo);

  echo "上傳成功!<br/>";
  echo "檔案資料如下<br/>";
  echo '檔案名稱: '.$ThisFileInfo['filenamepath'].'<br>';
  echo '藝人: '.(!empty($ThisFileInfo['comments_html']['artist']) ? implode('<BR>', $ThisFileInfo['comments_html']['artist']) : '&nbsp;').'<br>';
  echo '曲名: '.(!empty($ThisFileInfo['comments_html']['title']) ? implode('<BR>', $ThisFileInfo['comments_html']['title'])  : '&nbsp;').'<br>';
  echo '位元率: '.(!empty($ThisFileInfo['audio']['bitrate']) ? round($ThisFileInfo['audio']['bitrate'] / 1000).' kbps'   : '&nbsp;').'<br>';
  echo '播放時間: '.(!empty($ThisFileInfo['playtime_string']) ? $ThisFileInfo['playtime_string']                          : '&nbsp;').'<br>';




} else{
  echo "檔案上傳失敗，請再試一次!";

}
?>
