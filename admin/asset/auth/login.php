<?php
session_start();
require_once 'GoogleAuthenticator.php';

$ga = new PHPGangsta_GoogleAuthenticator();

//$secret = $ga->createSecret();
//echo "Secret is: ".$secret."\n\n";

$checkResult = $ga->verifyCode($_SESSION['secret'], $_POST['code'], 2);    // 2 = 2*30sec clock tolerance
if ($checkResult) {
    //echo 'OK';
    include '../db.php';
    $sql="select adminid,username,password,type,auth from admin where auth=?";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param("s",$_SESSION['secret']);
    $stmt->execute();
    $stmt->bind_result($adminid,$reuser, $repwd,$type,$auth);
    $stmt->fetch();
    $_SESSION['username']=$reuser;
    $_SESSION['aid']=$adminid;
    $_SESSION['type']=$type;
    header('Location:../../index.php');
} else {
    echo 'fail';
}
?>
