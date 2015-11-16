<?php
    session_start();

    if(isset($_SESSION['username'])&&isset($_SESSION['type'])){
            header('Location:index.php');
    }
    
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="asset/js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
        <!--<link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">-->
        <script src="https://www.google.com/jsapi"></script>
        <link href="asset/css/login.css" rel="stylesheet" type="text/css">
        <script src="asset/js/login.js"></script>
        <title>Musix Cloud Admin Login</title>
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
                    <a class="navbar-brand"><span class="glyphicon glyphicon-headphones"></span>Musix Cloud</a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-ex-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active">
                            <a href="#">Home</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="text-muted">Musix Cloud</h1>
                        <h3 class="text-muted">Admin Panel Login</h3>
                        <form role="form">
                            <div class="form-group has-feedback">
                                
                                <input class="form-control input-lg" id="username"  placeholder="Username" type="text">
                            </div>
                            <div class="form-group">
                                
                                <input class="form-control input-lg" id="pwd" placeholder="Password" type="password">
                            </div>
                            <button type="submit" class="btn btn-block btn-info btn-lg" id="loginbtn">Login</button>
                            <div id="message"></div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <img src="http://pingendo.github.io/pingendo-bootstrap/assets/placeholder.png" class="hidden-xs img-responsive">
                    </div>
                </div>
            </div>
        </div>
        <footer class="section section-info">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>Musix Cloud</h1>
                        <p>Provide service like Youtube, but it provide Music that you upload.</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="text-info text-right">
                            <br>
                            <br>
                        </p>
                        <div class="row">
                            <div class="col-md-12 hidden-lg hidden-md hidden-sm text-left">
                                <a href="#"><i class="fa fa-3x fa-fw fa-instagram text-inverse"></i></a>
                                <a href="#"><i class="fa fa-3x fa-fw fa-twitter text-inverse"></i></a>
                                <a href="#"><i class="fa fa-3x fa-fw fa-facebook text-inverse"></i></a>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 hidden-xs text-right">
                                <a href="#"><i class="fa fa-3x fa-fw fa-instagram text-inverse"></i></a>
                                <a href="#"><i class="fa fa-3x fa-fw fa-twitter text-inverse"></i></a>
                                <a href="#"><i class="fa fa-3x fa-fw fa-facebook text-inverse"></i></a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    

</body></html>