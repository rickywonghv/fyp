<?php
date_default_timezone_set('Asia/Hong_Kong');
session_start();
if(isset($_GET['url'])){
  /*

  */

  $ua = strtolower($_SERVER['HTTP_USER_AGENT']);
if(stripos($ua,'android') !== false) {
  $file = '../../user/upload/files/'.$_GET['url'];

  if (file_exists($file)) {
      //header('Content-Description: File Transfer');
      header('Content-Type: audio/mpeg');
      header('Content-Disposition: attechment; filename='.basename($file));
      header('Content-Transfer-Encoding: binary');
      //header('Expires: 0');
      header('Date:'.gmdate('D, d M Y H:i:s \G\M\T\+\8', time()));
      header('Expires:'.gmdate('D, d M Y H:i:s \G\M\T\+\8', time()+(1)));
      header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
      header('Pragma: public');
      header('Content-Length: ' . filesize($file));
      ob_clean();
      flush();
      readfile($file);
      exit;
  }else {
    echo "File Not Existing";
  }

}else{
  header('X-Pad: avoid browser bug');
  header('Location:upload/files/'.$_GET['url']);
}




}
 ?>
