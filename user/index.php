<?php
session_start();
if(empty($_SESSION['access_token'])||empty($_SESSION['uid'])){
   header("Location:../index.php");
}else{
  $token=$_SESSION['access_token'];
  $uid=$_SESSION['uid'];
  setcookie('uid',$uid,time() + (86400), "/");
  setcookie('type',$_SESSION['type'],time() + (86400), "/");
}

include '../asset/php/facebook-php-sdk-v4-5.0.0/src/Facebook/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '173558396322250',
  'app_secret' => '700001a7c1f9a23f1216a6c237b98e7e',
  'default_graph_version' => 'v2.5',
  'default_access_token' => 'APP-ID|APP-SECRET'
  ]);
$response = $fb->get('/me?fields=id,name,email,gender,picture',$_SESSION['access_token']);
$user = $response->getGraphUser();
$token=$_SESSION['access_token'];

?>
<!DOCTYPE html>
<html>
  <head>

    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="../asset/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="../asset/js/bootstrap.min.js"></script>
    <link href="../asset/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../asset/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="asset/js/profile.js"></script>
    <link href="../asset/css/bootstrap.icon-large.min.css" rel="stylesheet">
    <script type="text/javascript" src="asset/js/index.js" charset="UTF-8"></script>
    <link rel="stylesheet" href="asset/css/style.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="asset/player/css/style.css" media="screen" title="no title" charset="utf-8">
    <script type="text/javascript" src="asset/jplayer/jquery.jplayer.js" charset="UTF-8"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jplayer/2.9.2/add-on/jplayer.playlist.js" charset="UTF-8"></script>
    <script src="asset/js/player.js" charset="utf-8"></script>
    <script type="text/javascript" src="asset/js/public.js"></script>
    <link rel="icon" href="../asset/img/favicon.ico">
    <script src="asset/ckeditor/ckeditor.js" charset="utf-8"></script>
    <title>MusixCloud User Panel</title>
  </head>
  <body oncontextmenu="false" oncopy="return false" oncut="return false">
    <input type="hidden" id="gentoken" value="<?php echo $_SESSION["access_token"]?>">
    <input type="hidden" id="genname" value="<?php echo $_SESSION["name"]?>">
    <input type="hidden" id="gentype" value="<?php echo $_SESSION["type"]?>">
    <input type="hidden" id="genuid" value="<?php echo $_SESSION["uid"]?>">
    <input type="hidden" id="genios">
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../index.php" style="padding-top:0px"><img height="50" alt="Brand" src="../asset/img/logo.png"></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-ex-collapse">
          <ul class="nav navbar-nav">

            <li>
              <a href="" data-toggle="modal" data-target="#viewpromodal" onclick='vpro(<?php echo $_SESSION["uid"]?>);' > <span class="glyphicon glyphicon-user"></span> Profile</a>
            </li>
            <li><a onclick='vpro(<?php echo $_SESSION["uid"]?>);' data-toggle="modal" data-target="#uploadmodal"><span class="glyphicon glyphicon-cloud-upload"></span> Upload</a></li>
            <?php if($_SESSION['type']==2){echo '<li><a href="editor">Audio Editor</a></li>';} ?>
            <li>
              <a href="" data-toggle="modal" data-target="#settingmodal"><span class="glyphicon glyphicon-list-alt"></span> Setting</a>
            </li>
            <li><a href="#adminmsg">Message to Admin</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right" >
            <li id="logoutdiv">
               <span><a data-toggle="modal" data-target="#viewpromodal" onclick='vpro(<?php echo $_SESSION["uid"]?>);' ><img src=<?php echo $user['picture']['url'] ?> alt="" class="img img-circle img-xs" /></a> <a href="asset/php/logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

      <div class="container" style="padding-bottom:25px; margin-bottom:25px;">
        <div class="row">
          <div class="col-md-12">
            <?php
              if($_GET['code']=='5989af7ca9ff467db6dfaaceb8a4c2dd630049fb'){
                echo '<div class="welcome alert alert-dismissable alert-warning"><strong></strong>'. $_SESSION["name"].' you do not have permission to download, please upgrade to Premium User and get more privilege. For more detail please click here to get more information or paid for <strong>Premium User</strong>. </div>';
              }else{
                echo '<div class="welcome alert alert-dismissable alert-success"><strong></strong>Welcome back '. $_SESSION["name"].'</div>';
              }
            ?>
          </div>
        </div>
        <div class="col-md-4" id="testplayer">
             <ul id="playlist" class="list-group">
               <li class="list-group-item list-group-item-info"><span class="glyphicon glyphicon-music"></span> Your uploaded Music <button type="button" class="close" id="hideuploaded">&times;</button></li>
               <script type="text/javascript" src="asset/js/shown.js"></script>
             </ul>

        </div>
        <div class="col-md-4">
          <ul class="list-group" id='permium'>
            <li class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-music"></span> Permium Music  </li>
            <span id="premusic"></span>
          </ul>
        </div>
        <div class="col-md-4" id="freeplay">
          <div class="pubmusic">
            <ul id="playlist" class="list-group">
              <li class="list-group-item list-group-item-warning">Free Music</li>
              <span id="pubmusic"></span>
            </ul>
          </div>
        </div>
      </div>
      <!--player-->
      <div class="nav  navbar-fixed-bottom">
        <div class="col-xl-12">
          <div class="player" >
            <div id="jquery_jplayer_1" class="jp-jplayer"></div>
            <div id="jp_container_1" class="jp-audio" role="application" aria-label="media player">
            <div class="jp-gui jp-interface">
              <span class="jp-play glyphicon glyphicon-play-circle" id="playbtn" role="button" tabindex="0"></span>
              <span class="jp-stop jcontrol glyphicon glyphicon-stop" role="button" tabindex="0"></span>
              <span class="jp-mute glyphicon jcontrol glyphicon-volume-off" role="button" tabindex="0"></span>
              <span class="jp-volume-max glyphicon jcontrol glyphicon-volume-up" role="button" tabindex="0"></span>
              <span class="jp-repeat glyphicon jcontrol glyphicon-repeat" role="button" tabindex="0"></span>

              <span class="jp-volume-bar">
                  <span class="jp-volume-bar-value"></span>
              </span>

              <span class="jp-title" aria-label="title">&nbsp;</span>
              <span class="jp-current-time" role="timer" aria-label="time">&nbsp;</span>
              <span class="jp-duration" role="timer" aria-label="duration">&nbsp;</span>
              <div class="jp-progress-bar">
                <div class="jp-seek-bar">
                  <div class="jp-play-bar"></div>
                </div>
              </div>
              <div class="jp-volume-bar">
                <div class="jp-volume-bar-value"></div>
              </div>
              <div class="jp-no-solution">
                <span>Error Update Require! </span>
                To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
      <!--End Player-->
      <!--setting modal-->
      <div class="setting">
        <div id="settingmodal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><span class="glyphicon glyphicon-list-alt"></span> UserSetting</h4>
              </div>
              <div class="modal-body">
                <div class="list-group hover">
                  <li class="list-group-item"><span class="glyphicon glyphicon-lock"></span> Create Password <div class="pull-right"><button type="button" class="btn btn-success btn-xs"  id="settingchpwd">click</button>
                  </div> </li>
                  <li class="list-group-item"><span class="glyphicon glyphicon-edit"></span> Edit Profile <div class="pull-right"><button type="button" class="btn btn-info btn-xs" id="seteditpro" data-toggle="modal" data-target="#editpromodal"><span class="glyphicon glyphicon-edit"></span>Edit</button></div></li>
                </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
      <!--End setting modal-->
<!--Change password Modal-->
      <div class="changepwd">
        <div id="chpwdmodal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><span class="glyphicon glyphicon-lock"></span> Create Password</h4>
              </div>
              <div class="modal-body">
                <div class="list-group hover">
                  <form id="chpwdform" method="post" role="form">
                    <div class="input-group">
                      <span class="input-group-addon">New Password</span>
                      <input type="password" class="form-control" id="npwd" placeholder="Enter your new password">
                    </div>
                    <div class="input-group">
                      <span class="input-group-addon">Confirm New Password</span>
                      <input type="password" class="form-control" id="conpwd" placeholder="Enter your old password">
                    </div>
                </div>
                <div id="msg"></div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default backtoset">Back</button>
                <button type="submit" id="chpwdbtn" class="btn btn-success " ><span class="glyphicon glyphicon-save" ></span> Save</button>
              </div>
              </form>
            </div>
            </div>
          </div>
        </div>
      </div>
<!--End change password Modal-->

  <!--View Profile-->
  <div id="viewpromodal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><span class="glyphicon glyphicon-user"></span>View Profile</h4>
      </div>
      <div class="modal-body">
        <style media="screen">#fbproimg{text-align: center;margin: auto;padding-bottom: 5px;}</style>
          <ul class="list-group">
            <li class="list-group-item" id="fbproimg"><img id="fbproimg" src=<?php echo $user['picture']['url'] ?> alt="profilepic" class="img img-thumbnail" /></li>
            <li class="list-group-item"><b>User ID: </b><span id="vprouserid"></span></li>
            <li class="list-group-item"><b>Facebook ID: </b><span id="vprofbuid"></span></li>
            <li class="list-group-item"><b>Email: </b><span id="vproemail"></span></li>
            <li class="list-group-item"><b>Full Name: </b><span id="vproname"></span></li>
            <li class="list-group-item"><b>Account Type: </b><span id="protype"></span></li>
            <li class="list-group-item"><b>Gender: </b><span id="vprogender"></span></li>
            <li class="list-group-item"><b>Expire Date: </b><span id="vproexp"></span></li>
            <li class="list-group-item"><b>Register Date: </b><span id="vproreg"></span></li>
          </ul>
      </div>
    </div>
  </div>
  </div>
  <!--End View Profile-->

  <!--Upload-->
  <div id="uploadmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="closeupload" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><span class="glyphicon glyphicon-music"></span>Upload Music</h4>
      </div>
      <div class="modal-body">
        <style media="screen">#fbuploadimg{text-align: center;margin: auto;padding-bottom: 5px;}</style>
        <form class="" method="post" id="songuploadform" enctype="multipart/form-data" accept-charset="utf-8">
          <input type="hidden" id="uid" value="<?php echo $_SESSION["uid"]?>">
          <ul class="list-group">
            <li class="list-group-item">

              Select music to upload: <input type="file" class="form-control" name="file" id="uploadsong" accept="audio/mpeg" >
              <div class="uploaddiv">
                <button type="submit" class="btn btn-success" id="uploadBtn"><span class="glyphicon glyphicon-upload"></span>Upload</button>
              </div>
            <div id="uploadmsg"></div> </li>
          </ul>
        </form>
      </div>
    </div>
  </div>
  </div>
  <!--End Upload-->
  <!--music info-->

  <div class="modal fade" id="musicinfomodal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="">Music Information</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" id="uid" value="<?php echo $_SESSION["uid"]?>">
          <input type="hidden" id="album" value="">
          <input type="hidden" id="infofilename" value="">
          <div class="input-group">
            <span class="input-group-addon">Title</span>
            <input type="text" class="form-control" placeholder="Enter the song title" id="title">
          </div>
          <div class="input-group">
            <span class="input-group-addon">Singer</span>
            <input type="text" class="form-control" id="singer" placeholder="Enter Singer">
          </div>
          <div class="input-group">
            <span class="input-group-addon">Genre</span>
            <input type="text" class="form-control" placeholder="Enter genre">
          </div>
          <div class="musicinfomsg">

          </div>
        </div>
        <div class="modal-footer" id="infofooter">

          <button type="button" class="btn btn-primary" id="musicinfoBtn">Confirm</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="shmusicinfo" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="musicinfotitle"></h4>
        </div>
        <div class="modal-body">
          <div class="list-group">
					    <a  class="list-group-item"><b>Song ID:</b><span id="infosongid"></span></a>
					    <a  class="list-group-item"><b>Song Name:</b><span id="infosongname"></span></a>
							<a  class="list-group-item"><b>Upload User:</b><span id="infouploadUser"></span></a>
              <a  class="list-group-item"><b>Singer:</b><span id="infosinger"></span></a>
              <a  class="list-group-item"><b>Album:</b><span id="infoalbum"></span></a>
					    <a  class="list-group-item"><b>Lyricist:</b><span id="infolyricist"></span></a>
					    <a  class="list-group-item"><b>Composer:</b><span id="infocomposer"></span></a>
					    <a  class="list-group-item"><b>Track:</b><span id="infotrack"></span></a>
					    <a  class="list-group-item"><b>Year:</b><span id="infoyear"></span></a>
					    <a  class="list-group-item"><b>Copyright:</b><span id="infocopyright"></span></a>
					    <a  class="list-group-item"><b>Lyrics:</b><span id="infolyrics"></span></a>
					    <a  class="list-group-item"><b>Upload Time:</b><span id="infouploadtime"></span></a>
					    <a  class="list-group-item"><b>Total Play:</b><span id="infototalplay"></span></a>
					    <a  class="list-group-item"><b>Total Download:</b><span id="infototaldownload"></span></a>
					</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>



  </body>

</html>
