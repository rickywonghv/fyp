<?php
//$fb = new Facebook\Facebook([/* */]);
session_start();

$helper = $fb->getRedirectLoginHelper();
$logoutUrl = $helper->getLogoutUrl($_SESSION['access_token'], 'http://musixcloud.xyz');

?>
