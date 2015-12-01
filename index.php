<?php
if(!session_id()) {
    session_start();
}
include 'asset/php/facebook-php-sdk-v4-5.0.0/src/Facebook/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '173558396322250',
  'app_secret' => '700001a7c1f9a23f1216a6c237b98e7e',
  'default_graph_version' => 'v2.5',
  'default_access_token' => 'APP-ID|APP-SECRET'
]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email'];
$loginUrl = $helper->getLoginUrl('http://musixcloud.xyz/asset/php/fb-callback.php', $permissions);
foreach ($_SESSION as $k=>$v) {
    if(strpos($k, "FBRLH_")!==FALSE) {
        if(!setcookie($k, $v)) {
            //what??
        } else {
            $_COOKIE[$k]=$v;
        }
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="asset/js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
        <!--<link href="asset/css/font.css" rel="stylesheet" type="text/css">-->
        <link href="asset/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="asset/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
        <link href="asset/css/style.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="asset/js/login.js"></script>
        <script type="text/javascript" src="asset/js/reg.js"></script>
        <!--<script type="text/javascript" src="https://google.com/jsapi"></script>-->
        <title>MusixCloud</title>

    </head>
    <body>
        <div class="cover">
          <!--Nav bar-->
            <div class="navbar navbar-fixed-top">
              <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand"><span>MusixCloud</span></a>
                    </div>
                    <div class="collapse navbar-collapse" id="navbar-ex-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="#aboutus">About Us</a>
                            </li>
                        <li>
                          <a href="#contact">Contact Us</a>
                        </li>

                        <?php

                        if(empty($_SESSION['facebook_access_token'])){
                          echo '<li><a href='.htmlspecialchars($loginUrl).'><i class="fa fa-3x fa-fw fa-facebook text-inverse"></i>Login</a></li>';
                        }else{
                          echo "<li> <a href='user/index.php'>User Panel</a></li>";
                        }
                        ?>
                        </ul>
                    </div>
                  </div>
            </div>
            <!--Nav bar end-->
            <div class="cover-image" style="background-image: url(asset/img/bg.jpg);"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="text-inverse">MusixCloud</h1>
                        <p class="text-inverse">Lorem ipsum dolor sit amet, consectetur adipisici eli.</p>
                        <br>
                        <br>
                        <?php echo '<a href='.htmlspecialchars($loginUrl).'>Login with Facebook</a>';?>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="aboutus">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="http://pingendo.github.io/pingendo-bootstrap/assets/placeholder.png" class="img-responsive">
                    </div>
                    <div class="col-md-6">
                        <h1 class="text-primary">About Us</h1>
                        <h3>About us</h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo
                            ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis
                            dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies
                            nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
                            Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In
                            enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum
                            felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus
                            elementum semper nisi.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="section" id="contact"> <div class="container"> <div class="row"> <div class="col-md-12"> <h1 class="text-center">Contact Us</h1> </div></div><div class="row"> <div class="col-md-offset-3 col-md-6"> <form role="form"> <div class="form-group"> <div class="input-group"> <input type="text" class="form-control" placeholder="Enter your email"> <span class="input-group-btn"> <a class="btn btn-success" type="submit">Go</a> </span> </div></div></form> </div></div></div></div><footer class="section section-primary"> <div class="container"> <div class="row"> <div class="col-sm-6"> <h1>MusixCloud</h1> <p>Lorem ipsum dolor sit amet, consectetur adipisici elit, <br>sed eiusmod tempor incidunt ut labore et dolore magna aliqua. <br>Ut enim ad minim veniam, quis nostrud</p></div><div class="col-sm-6"> <p class="text-info text-right"> <br><br></p><div class="row"> <div class="col-md-12 hidden-lg hidden-md hidden-sm text-left"> <a href="#"><i class="fa fa-3x fa-fw fa-instagram text-inverse"></i></a> <a href="#"><i class="fa fa-3x fa-fw fa-twitter text-inverse"></i></a> <a href="#"><i class="fa fa-3x fa-fw fa-facebook text-inverse"></i></a> <a href="#"><i class="fa fa-3x fa-fw fa-github text-inverse"></i></a> </div></div><div class="row"> <div class="col-md-12 hidden-xs text-right">  <a href="#"><i class="fa fa-3x fa-fw fa-twitter text-inverse"></i></a> <a href="#"><i class="fa fa-3x fa-fw fa-facebook text-inverse"></i></a>  </div></div></div></div></div></footer>

  </body>

</html>
<?php session_write_close() ?>
