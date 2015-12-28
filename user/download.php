<?php
session_start();
if(!isset($_SESSION['type'])&&!isset($_SESSION['uid'])){
  echo " Not set type";
}elseif($_SESSION['type']!=2){
  header("Location:index.php?code=5989af7ca9ff467db6dfaaceb8a4c2dd630049fb");
}else{
  $file = 'upload/files/'.$_GET['url'];

  if (file_exists($file)) {
      header('Content-Description: File Transfer');
      header('Content-Type: application/octet-stream');
      header('Content-Disposition: attachment; filename='.basename($file));
      header('Content-Transfer-Encoding: binary');
      header('Expires: 0');
      header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
      header('Pragma: public');
      header('X-Pad: avoid browser bug');
      header('Content-Length: ' . filesize($file));
      ob_clean();
      flush();
      readfile($file);
      exit;
  }else{
    echo "Not Existing";
  }
}
 ?>
