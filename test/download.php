<?php
$file = 'https://s3-ap-southeast-1.amazonaws.com/musixcloud/music/Earth%2Bsong.mp3';

/*
    header('Content-Description: File Transfer');
    //header('Content-Type: application/octet-stream');
    //header('Content-Type: audio/mpeg');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
    exit;
*/
    header('Content-Type: application/octet-stream');
    //header('x-amz-meta-user-type:permium');
    //header('Content-Transfer-Encoding: Binary'); //編碼方式
    header('Content-Disposition:attachment;filename='.$file); //檔名
    readfile($file);
 ?>
