<?php require 'actfunction.php'; ?>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="asset/js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
        <link href="asset/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="asset/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
        <link href="asset/css/style.css" rel="stylesheet" type="text/css">
    </head><body>
        <div class="cover">
            <div class="navbar">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"><span>MusixCloud</span></a>
                    </div>
                    <div class="collapse navbar-collapse" id="navbar-ex-collapse">
                        <ul class="nav navbar-nav navbar-right"></ul>
                    </div>
                </div>
            </div>
            <div class="cover-image" style="background-image: url(https://unsplash.imgix.net/photo-1418065460487-3e41a6c84dc5?q=25&amp;fm=jpg&amp;s=127f3a3ccf4356b7f79594e05f6c840e);"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="text-info">MusixCloud<br></h1><div class="page-header"><h2>Membership Activation&nbsp;</h2></div><h1 class="text-center"></h1>

                        <br>
                        <div class="h3">
                          <?php $email=$_GET["email"]; $code=$_GET["code"]; activate($email,$code); ?>
                        </div>


                        <br>
                        <a class="btn btn-lg btn-primary" href="http://fyp.damonw.com">Click me</a>
                    </div>
                </div>
            </div>
        </div>





</body></html>
