<?php
	session_start();
	if(empty($_SESSION['username'])||empty($_SESSION['type'])){
		header("Location:login.php");
	}
  if($_SESSION['type']!='superadmin'){
    header("Location:index.php?err=noper");
  }
	require 'asset/count.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="asset/js/jquery-1.11.3.min.js"></script>
		<script src="asset/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="asset/css/bootstrap.min.css">
		<link rel="stylesheet" href="asset/css/nav.css">
		<link rel="stylesheet" type="text/css" href="asset/css/bootstrap-theme.min.css">
		<link rel="stylesheet" type="text/css" href="asset/css/style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<script src="asset/js/mail.js" charset="utf-8"></script>
		<script src="asset/ckeditor/ckeditor.js" charset="utf-8"></script>
		<link rel="icon" href="favicon.ico">
		<title>MusixCloud <?php echo $_SESSION['type'];?></title>
	</head>
	<body>
		<nav class="navbar navbar-custom">
		  <div class="container-fluid">
		    <div class="navbar-header">
		    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navmenu">
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
     		</button>
		      <a class="navbar-brand"><i class="fa fa-tachometer"></i> MusixCloud <span class="hidden-xs"><?php echo $_SESSION['type'];?></span> dashboard</a>
		    </div>
		    <div class="collapse navbar-collapse" id="navmenu">
		      <ul class="nav navbar-nav">
		        <?php require 'asset/navbar.php';?>
		      </ul>
				<ul class="nav navbar-nav navbar-right">
			    	<li><a href="logout.php"> <span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
				</ul>
		    </div>
		  </div>
		</nav>
		<div class="wapper">
			<div class="mheader" style="padding-left:15px;">
				<h3><span class="glyphicon glyphicon-envelope"></span> Mail</h3>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-3" >
				<ul class="list-group">
					<li class='list-group-item'><a href="#compose" id="composebtn"><span class="glyphicon glyphicon-edit"></span> Compose</a></li>
					<li class='list-group-item'><a href="#inbox" id="inboxbtn"><span class="glyphicon glyphicon-envelope"></span> Inbox</a></li>
					<li class='list-group-item'><a href="#">fvsd</a></li>
				</ul>
			</div>
			<div class="container">
				<div class="col-xs-12 col-sm-9">

			<div class="">
				<section id="inbox">
					<h4>Inbox</h4>
					<table class='table table-hover table-condensed'>
					  <thead>
					    <tr>
					      <th>From</th>
								<th>Subject</th>
								<th>Date</th>
								<th>Time</th>
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					      <td>vkskdm</td>
								<td>dsvsd</td>
								<td>gng</td>
								<td>gng</td>
					    </tr>
					  </tbody>
					</table>
				</section>
				<section id="compose" hidden>
					<div class="">
						<div class="header">
							<h4><small></small><span class="glyphicon glyphicon-send"></span> Compose</h4>
						</div>
						<div class="body">
							<form class="form-group" method="post" enctype="multipart/form-data">
								<div class="">
									<button type='button' id="sendmailbtn" class='btn btn-success '><span class="glyphicon glyphicon-send"></span> Send</button>

								</div>

										<div class="input-group inp">
										  <span class="input-group-addon" id="tomaillabel">To: </span>
										  <input type="email" id="tomailinput" class="form-control" placeholder="Please enter a email address">
										</div>
										<div class="input-group inp">
										  <span class="input-group-addon" id="mailsublabel">Subject: </span>
										  <input type="text" id="mailsubinput" class="form-control" placeholder="Please enter the subject">
										</div>
										<div class="contentinput inp">
											<textarea name="editor1" id="maileditor" rows="20"></textarea>
					            <script>
					                CKEDITOR.replace( 'maileditor');

					            </script>
										</div>
										<div class="mailmsg inp"></div>
							</form>
						</div>
					</div>
				</section>
			</div>
		</div>
			</div>
		</div>

	</body>
</html>
