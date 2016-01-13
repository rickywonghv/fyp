<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
if(empty($_SESSION['uid'])){
   header("Location:../../index.php");
}

//"uid="+uid+"&subject="+sub+"&content="+cont,

if($_GET['act']=="cpwd"){
  cpwd($_POST['npwd'],$_POST['conpwd']);
}elseif($_GET['act']=="viewpro") {
  viewprofile($_GET['uid']);
}elseif($_GET['act']=="shownsong"){
  shownsong($_POST['uid']);
}elseif($_GET['act']=="freesong"){
  freesong();
}elseif ($_GET['act']=="permium") {
  presong();
}elseif($_POST['act']=="musicdet"){
  musicinfo($_POST['songid']);
}elseif($_POST['act']=="sdmsg"){
  sdmsg($_SESSION['uid'],$_POST['subject'],$_POST['content']);
}elseif($_POST['act']=="albumlist"){
  albumlist();
}elseif($_POST['act']=="shalbsong"&&isset($_POST['songname'])){
  shsongbyname($_POST['songname']);
}elseif($_POST['act']=="hotsong"){
  hotsong();
}

function shsongbyname($songname){
  include 'db.php';
  $sql="SELECT music.songid,music.title, music.songPath, music.singer FROM music INNER JOIN user ON music.userid=user.userid WHERE music.album=?";
  //$stmt=mysqli_query($conn,"SET NAMES UTF8");
  $stmt=$conn->prepare($sql);
  $stmt->bind_param("s",$songname);
  $stmt->execute();
  $data = $stmt->get_result();
     $result = array();
     while($row = $data->fetch_assoc()) {
          $result[] = $row;
      }
      echo json_encode($result,JSON_UNESCAPED_UNICODE);
}

function albumlist(){
  include 'db.php';
  if($_SESSION['type']===1){
    $sql="SELECT DISTINCT music.album FROM music INNER JOIN user ON music.userid=user.userid where music.album!='' or music.album!=null and user.type=1";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->get_result();
       $result = array();
       while($row = $data->fetch_assoc()) {
            $result[] = $row;
        }
        echo json_encode($result,JSON_UNESCAPED_UNICODE);
  }elseif($_SESSION['type']===2){
    $sql="SELECT DISTINCT music.album FROM music INNER JOIN user ON music.userid=user.userid where music.album!='' or music.album!=null and user.type=2";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->get_result();
       $result = array();
       while($row = $data->fetch_assoc()) {
            $result[] = $row;
        }
        echo json_encode($result,JSON_UNESCAPED_UNICODE);
  }
}

function cpwd($npwd,$conpwd){
  include 'db.php';
  if(empty($npwd)||empty($conpwd)){
    echo 'null';
  }else{
        include 'db.php';
        $mpwd=md5($npwd);
        $del="UPDATE user SET password=? where userid=?";
        $stmt=$conn->prepare($del);
          $stmt->bind_param("ss",$mpwd,$_SESSION['uid']);
          $stmt->execute();
          echo 'success';
      }
  }


function viewprofile($uid){
  include 'db.php';
  session_start();
  $sql="select userid,fbuid,email,fullname,type,gender,intro,expDate,regDate from user where userid=?";
  if($stmt=$conn->prepare($sql)){
    $stmt->bind_param('i',$uid);
    $stmt->execute();
    $data = $stmt->get_result();
  	     $result = array();
  	     while($row = $data->fetch_assoc()) {

  	          $result[] = $row;
              echo json_encode($result);
  	      }
  }
}


function shownsong($userid){
  include 'db.php';
  session_start();
  $sql="select title,songPath,songid from music where userid=?";
  //$stmt=mysqli_query($conn,"SET NAMES UTF8");
  $stmt=$conn->prepare($sql);
  $stmt->bind_param("i",$userid);
  $stmt->execute();
  $data = $stmt->get_result();
     $result = array();
     while($row = $data->fetch_assoc()) {
          $result[] = $row;
      }
      echo json_encode($result);
}

function freesong(){
  include 'db.php';
  session_start();
  $sql="SELECT music.songid,music.title, music.songPath, music.singer FROM music INNER JOIN user ON music.userid=user.userid WHERE user.type=1";
  //$stmt=mysqli_query($conn,"SET NAMES UTF8");
  $stmt=$conn->prepare($sql);
  $stmt->execute();
  $data = $stmt->get_result();
     $result = array();
     while($row = $data->fetch_assoc()) {
          $result[] = $row;
      }
      echo json_encode($result);
}

function presong(){
  include 'db.php';
  session_start();
  if($_SESSION['type']==2){
    $sql="SELECT music.songid,music.title, music.songPath, music.singer FROM music INNER JOIN user ON music.userid=user.userid";
    //$stmt=mysqli_query($conn,"SET NAMES UTF8");
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->get_result();
       $result = array();
       while($row = $data->fetch_assoc()) {
            $result[] = $row;
        }
        echo json_encode($result);
  }

}

function hotsong(){
  include 'db.php';
  session_start();
  if($_SESSION['type']==2){
    $sql="SELECT music.songid,music.title, music.songPath, music.singer FROM music INNER JOIN user ON music.userid=user.userid where music.totalPlay>20";
    //$stmt=mysqli_query($conn,"SET NAMES UTF8");
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->get_result();
       $result = array();
       while($row = $data->fetch_assoc()) {
            $result[] = $row;
        }
        echo json_encode($result);
  }
  if($_SESSION['type']==1){
    $sql="SELECT music.songid,music.title, music.songPath, music.singer FROM music INNER JOIN user ON music.userid=user.userid where music.totalPlay>20 and user.userid=1";
    //$stmt=mysqli_query($conn,"SET NAMES UTF8");
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->get_result();
       $result = array();
       while($row = $data->fetch_assoc()) {
            $result[] = $row;
        }
        echo json_encode($result);
  }
}

function musicinfo($id){
	require 'db.php';
	$sql="select music.title,music.songid, music.title, user.fullname, music.lyricist, music.singer, music.composer, music.album, music.track, music.year, music.genre, music.copyright, music.artPath, music.lyrics, music.uploadDateTime, music.totalPlay, music.totalDownload, music.totalShare, music.totalLike from music INNER join user on music.userid=user.userid where music.songid=?";
	$stmt=$conn->prepare($sql);
	$stmt->bind_param('i',$id);
	$stmt->execute();
	$data = $stmt->get_result();
     $result = array();
     while($row = $data->fetch_assoc()) {
          $result[] = $row;
      }
      echo json_encode($result);

}

function sdmsg($uid,$sub,$con){
  if(empty($uid)||empty($sub)||empty($con)){
    printf('wrong');
  }else{
  require 'db.php';
  $msgid=null;
  $ipaddr=$_SERVER['REMOTE_ADDR'];
  $date=date('Y-m-d');
  $time=date('H:i:s');
  $sql="insert into usermsg (usermsgid, userid, title, msg, ipadd, date, time) values(?,?,?,?,?,?,?)";
  $stmt=mysqli_query($conn,"SET NAMES UTF8");
  $stmt=$conn->prepare($sql);
  $stmt->bind_param("iisssss",$msgid,$uid,$sub,$con,$ipaddr,$date,$time);
  $stmt->execute();
  printf('success');
  printf($stmt->error);
  }
}
 ?>
