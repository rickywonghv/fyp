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
            <li><a onclick='vpro(<?php echo $_SESSION["uid"]?>);' data-toggle="modal" data-target="#uploadmodal">Upload</a></li>
            <li>
              <a href="" data-toggle="modal" data-target="#settingmodal"><span class="glyphicon glyphicon-list-alt"></span> Setting</a>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right" >
            <li id="logoutdiv">
               <span><img src=<?php echo $user['picture']['url'] ?> alt="" class="img img-circle img-xs" /> <a href="asset/php/logout.php">Logout</a>
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


    </div>
  </body>

</html>
