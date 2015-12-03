<?php
session_start();
foreach ($_COOKIE as $k=>$v) {
    if(strpos($k, "FBRLH_")!==FALSE) {
        $_SESSION[$k]=$v;
    }
}
include 'facebook-php-sdk-v4-5.0.0/src/Facebook/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '173558396322250',
  'app_secret' => '700001a7c1f9a23f1216a6c237b98e7e',
  'default_graph_version' => 'v2.5',
  'default_access_token' => 'APP-ID|APP-SECRET'
  ]);

  $helper = $fb->getRedirectLoginHelper();

  try {
    $accessToken = $helper->getAccessToken();
    $response = $fb->get('/me?fields=id,name,email,gender,picture', $accessToken);
  } catch(Facebook\Exceptions\FacebookResponseException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
  } catch(Facebook\Exceptions\FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
  }


// login
if (isset($accessToken)) {
  $user = $response->getGraphUser();

  $fbuid=$user['id'];
  $email=$user['email'];
  $name=$user['name'];
  $fbgender=$user['gender'];
  $_SESSION['picture']=$user['picture'];
  //if($user['email']==null){header("Location:");}
  //check new user
      include '../config/db.php';
      $sql="select userid,fbuid,email from user where fbuid=?";
      $stmt=$conn->prepare($sql);
      $stmt->bind_param('s',$fbuid);
      $stmt->execute();
      $stmt->bind_result($reuid,$rfbuid,$remail);
      $stmt->fetch();
      if($rfbuid==""){
        $uid=rand(1,999999);
        $dob=null;
        $intro=null;
        $type=1;
        $expdate=null;
        $regdate=date('Y-m-d');
        $regip=$_SERVER['REMOTE_ADDR'];
        $pass=rand();
        $pwd=md5($pass);
        $token=null;
          $query="INSERT INTO user (userid,fbuid,email,password,type,fullname,gender,dob,intro,expDate,regDate,regIp,uToken)VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
          if ($stmt=$conn->prepare($query)) {
            $stmt->bind_param("isssissssssss",$uid,$fbuid,$email,$pwd,$type,$name,$fbgender,$dob,$intro,$expdate,$regdate,$regip,$token);
            $stmt->execute();
            $_SESSION['uid']=$uid;
            $_SESSION['name']=$user['name'];
            $_SESSION['access_token'] = (string) $accessToken;
            $_SESSION['fbuid']=$user['id'];
            $_SESSION['email']=$user['email'];
            printf($stmt->error);
          }else{
            printf("Error: %s.\n", $stmt->error);
          }
    }else{
      $_SESSION['name']=$user['name'];
      $_SESSION['access_token'] = (string) $accessToken;
      $_SESSION['fbuid']=$user['id'];
      $_SESSION['uid']=$reuid;
      $_SESSION['email']=$user['email'];
    }
  } elseif ($helper->getError()) {

  }

  header('Location:http://musixcloud.xyz/user/index.php?code=');
  session_write_close();
 ?>
