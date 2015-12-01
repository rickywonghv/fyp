<?php
if(!session_id()) {
    session_start();
}
include 'asset/php/facebook-php-sdk-v4-5.0.0/src/Facebook/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '173558396322250',
  'app_secret' => '700001a7c1f9a23f1216a6c237b98e7e',
  'default_graph_version' => 'v2.5',
  'default_access_token' => 'APP-ID|APP-SECRET'
]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email'];
$loginUrl = $helper->getLoginUrl('http://musixcloud.xyz/asset/php/fb-callback.php', $permissions);
foreach ($_SESSION as $k=>$v) {
    if(strpos($k, "FBRLH_")!==FALSE) {
        if(!setcookie($k, $v)) {
            //what??
        } else {
            $_COOKIE[$k]=$v;
        }
    }
}
 ?>
