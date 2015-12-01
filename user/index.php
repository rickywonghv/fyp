<?php
session_start();
if(empty($_SESSION['access_token'])||empty($_SESSION['uid'])){
   header("Location:../index.php");
}
include '../asset/php/facebook-php-sdk-v4-5.0.0/src/Facebook/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '173558396322250',
  'app_secret' => '700001a7c1f9a23f1216a6c237b98e7e',
  'default_graph_version' => 'v2.5',
  'default_access_token' => 'APP-ID|APP-SECRET'
  ]);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="../asset/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="../asset/js/bootstrap.min.js"></script>
    <link href="../asset/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../asset/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">

    <link href="../asset/css/bootstrap.icon-large.min.css" rel="stylesheet">


    <title>MusixCloud User Panel</title>
  </head>
  <body>

    <div class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand"><img height="40" alt="Brand" src="../asset/img/logo.png"></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-ex-collapse">
          <ul class="nav navbar-nav">
            <li class="">
              <a href="../index.php">Home</a>
            </li>
            <li>
              <a href="" data-toggle="modal" data-target="#viewpromodal" onclick='vpro(<?php echo $_SESSION["uid"]?>);' > <span class="glyphicon glyphicon-user"></span> Profile</a>
            </li>
            <li><a href="#upload">Upload</a></li>
            <li>
              <a href="" data-toggle="modal" data-target="#settingmodal"><span class="glyphicon glyphicon-list-alt"></span> Setting</a>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right" >
            <li id="logoutdiv">
              <!--<a href="asset/php/logout.php" onclick="signOut();"><button type="button" id="logoutbtn" class="btn btn-danger btn-xs">Sign out</button></a>-->
              <?php include 'asset/php/logout.php'; echo '<a href='.$logoutUrl.'>Logout</a>';?>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="section" >
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="alert alert-dismissable alert-success">
              <strong>Welcome</strong>Welcome back <?php echo $_SESSION['name'];?></div>
          </div>
        </div>
        <div class="col-md-4">
          <div class = "panel panel-info">
             <div class = "panel-heading">
                <h2 class = "panel-title">Top 10</h2>
             </div>
             <div class = "panel-body">
               <div id="top10">
                <ul class="list-group">
                  <div class="topsong">
                    <li class="list-group-item">Song1</li>
                    <li class="list-group-item">Song2</li>
                    <li class="list-group-item">Third item</li>
                  </div>
                </ul>
               </div>
             </div>
          </div>
        </div>
      </div>

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
          <ul class="list-group">
            <li class="list-group-item">User ID:<span id="vprouserid"></span></li>
            <li class="list-group-item">Email:<span id="vproemail"></span></li>
            <li class="list-group-item">Full Name:<span id="vproname"></span></li>
            <li class="list-group-item">Account Type:<span id="type"></span></li>
            <li class="list-group-item">Gender:<span id="gender"></span></li>
            <li class="list-group-item">Expire Date:<span id="expdate"></span></li>
            <li class="list-group-item">Register Date:<span id="regdate"></span></li>
            <li class="list-group-item">Register IP:<span id="regip"></span></li>
          </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" id="editpro">Edit Profile</button>
      </div>
    </div>
  </div>
  </div>
  <!--End View Profile-->
    </div>
  </body>

</html>
