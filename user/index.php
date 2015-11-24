<?php
session_start();
if(empty($_SESSION['email'])){
   header("Location:../index.php");
}
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
    <script type="text/javascript" src="asset/js/index.js"></script>
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
            <li class="active">
              <a href="#">Home</a>
            </li>
            <li>
              <a href="#">Profile</a>
            </li>
            <li><a href="#upload">Upload</a></li>
            <li>
              <a href="" data-toggle="modal" data-target="#settingmodal"><span class="glyphicon glyphicon-list-alt"></span> Setting</a>
            </li>

          </ul>

          <ul class="nav navbar-nav navbar-right">

            <li>
              <a href="asset/php/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
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
              <strong>Welcome</strong>Welcome back <?php echo $_SESSION['email'];?></div>
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
                  <li class="list-group-item"><span class="glyphicon glyphicon-lock"></span> Change Password <div class="pull-right"><button type="button" class="btn btn-success btn-sm"  id="settingchpwd">click</button>
                  </div> </li>
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

      <div class="changepwd">
        <div id="chpwdmodal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><span class="glyphicon glyphicon-lock"></span> Change Password</h4>
              </div>
              <div class="modal-body">
                <div class="list-group hover">
                  <form id="chpwdform" method="post" role="form">
                    fjnv
                  </form>
                </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default backtoset">Back</button>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </body>

</html>
