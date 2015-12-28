<?php
session_start();
$fbuid=$_POST['id'];
$email=$_POST['email'];
$name=$_POST['name'];
$fbgender=$_POST['gender'];
$mobtoken=$_POST['token'];
if($_POST['action']==md5('profile')){
  viewprofile($mobtoken);
}
//if($fbuid==null){
//  $error="false";
//  printf(json_encode(array('error'=>$error)));
//}
elseif($_POST['action']==md5('login')){
  login($fbuid,$email,$name,$fbgender,$mobtoken);
}
elseif ($_POST['action']==md5('albumlist')) {
  albumlist($mobtoken);
}
function login($fbuid,$email,$name,$fbgender,$mobtoken){
  session_start();
      $status;
      include '../config/db.php';
      $sql="select userid,fbuid,email from user where fbuid=?";
      $stmt=$conn->prepare($sql);
      $stmt->bind_param('s',$fbuid);
      $stmt->execute();
      $stmt->bind_result($reuid,$rfbuid,$remail);
      $stmt->fetch();
      if($rfbuid==""){
        $uid=null;
        $dob=null;
        $intro=null;
        $type=1;
        $expdate=null;
        $regdate=date('Y-m-d');
        $regip=$_SERVER['REMOTE_ADDR'];
        $pass=rand();
        $pwd=md5($pass);
        $token=$mobtoken;
          $query="INSERT INTO user (userid,fbuid,email,password,type,fullname,gender,dob,intro,expDate,regDate,regIp,uToken)VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
          if ($stmt=$conn->prepare($query)) {
            $stmt->bind_param("isssissssssss",$uid,$fbuid,$email,$pwd,$type,$name,$fbgender,$dob,$intro,$expdate,$regdate,$regip,$token);
            $stmt->execute();
            $status='true';

            $profile = array('uid'=>$uid,'fbuid'=>$fbuid,'email'=>$email,'name'=>$name,'type'=>$type,'gender'=>$fbgender,'dob'=>$dob,'intro'=>$intro,'expdate'=>$expdate,'regdate'=>$regdate);
            $result = array('status' => $status,'error'=>$stmt->error,'profile'=>$profile);
            printf(json_encode($result));
          }else{
            $status="false";
            $result = array('status' => $status,'error'=>$stmt->error);
            printf(json_encode($result));
          }
      }else{
        include '../config/db.php';
        $query="select * from user where fbuid=?";
        $stmt=$conn->prepare($query);
        $stmt->bind_param("s",$fbuid);
        $stmt->execute();
        $stmt->bind_result($reuid,$refbuid,$refbemail,$repwd,$retype,$refullname,$regender,$redob,$reintro,$reexpdate,$reregdate,$reregip,$rtoken);
        $stmt->fetch();
        if($rtoken!=$mobtoken){
          include '../config/db.php';
          $sql="update user set uToken=? where fbuid=?";
          $stmt=$conn->prepare($sql);
          $stmt->bind_param("ss",$mobtoken,$fbuid);
          $stmt->execute();
          $status='true';
            $profile = array('uid'=>$reuid,'fbuid'=>$refbuid,'email'=>$refbemail,'name'=>$refullname,'type'=>$retype,'gender'=>$regender,'dob'=>$redob,'intro'=>$reintro,'expdate'=>$reexpdate,'regdate'=>$reregdate);
            $result = array('status' => $status, 'profile'=>$profile);
          printf(json_encode($result));
          printf($stmt->error);
        }elseif($rtoken==$mobtoken){
          $status='true';
          //$result = array('status'=> $status,'uid'=>$reuid,'fbuid'=>$refbuid,'email'=>$refbemail,'name'=>$refullname,'type'=>$retype,'gender'=>$regender,'dob'=>$redob,'intro'=>$reintro,'expdate'=>$reexpdate,'regdate'=>$reregdate);
          $profile = array('uid'=>$reuid,'fbuid'=>$refbuid,'email'=>$refbemail,'name'=>$refullname,'type'=>$retype,'gender'=>$regender,'dob'=>$redob,'intro'=>$reintro,'expdate'=>$reexpdate,'regdate'=>$reregdate);
          $result = array('status' => $status, 'profile'=>$profile);
          printf(json_encode($result));
          printf($stmt->error);
        }
      }
}

function viewprofile($mobtoken){
  include '../config/db.php';
  session_start();
  $sql="select * from user where uToken=?";
  if($stmt=$conn->prepare($sql)){
    $stmt->bind_param('s',$mobtoken);
    $stmt->execute();
    $data = $stmt->get_result();
  	     $result = array();
  	     while($row = $data->fetch_assoc()) {
  	          $result = $row;
              $res = array('status' => 'true', 'profile'=>$result);
              echo json_encode($res);
  	      }
  }
}

function albumlist($mobtoken){
  include '../config/db.php';
  $sql="select type from user where uToken=?";
  if($stmt=$conn->prepare($sql)){
    $stmt->bind_param('s',$mobtoken);
    $stmt->execute();
    $stmt->bind_result($retype);
    $stmt->fetch();
    if($retype==1){
      $sql="SELECT music.title, music.songPath,music.album  FROM music INNER JOIN user ON music.userid=user.userid WHERE user.type=1 and music.album!=''";
      $stmt=$conn->prepare($sql);
      $stmt->execute();

    }
  }
}
 ?>
