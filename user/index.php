<?php
  session_start();
  //$username=$_SESSION['username'];
  //$type=$_SESSION['type'];
  //$uid=$_SESSION['uid'];
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="../asset/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="../asset/js/bootstrap.min.js"></script>
    <link href="../asset/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../asset/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
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
          <a class="navbar-brand"><img height="20" alt="Brand" src="../asset/img/logo.png"></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-ex-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active">
              <a href="#">Home</a>
            </li>
            <li>
              <a href="#">Profile</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="alert alert-dismissable alert-success">
              <strong>Welcome</strong>Welcome back <?php echo $_SESSION['username'];?></div>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar navbar-default navbar-fixed-bottom navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand"></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-ex-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active">
              <a href="#">Home</a>
            </li>
            <li>
              <a href="#">Contacts</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </body>

</html>
