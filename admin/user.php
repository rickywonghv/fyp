<?php
	session_start();
	if(empty($_SESSION['username'])||empty($_SESSION['type'])){
		header("Location:login.php");
	}
	if($_SESSION['type']=='musicadmin'){
		header("Location:login.php?usermsg=permission");
	}
	require 'asset/userfunction.php';
	require 'asset/count.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="asset/js/jquery-1.11.3.min.js"></script>
		<script src="asset/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="asset/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="asset/css/bootstrap-theme.min.css">
		<link rel="stylesheet" type="text/css" href="asset/css/style.css">
		<link rel="stylesheet" type="text/css" href="asset/css/jquery-ui.min.css">
		<link rel="stylesheet" type="text/css" href="asset/css/jquery-ui.structure.min.css">
		<link rel="stylesheet" type="text/css" href="asset/css/jquery-ui.theme.min.css">
		<script type="text/javascript" src="asset/js/adminscript.js"></script>
		<script type="text/javascript" src="asset/js/jquery-ui.min.js"></script>
		<link rel="stylesheet" href="asset/css/nav.css">
		<script type="text/javascript" src="asset/js/shuser.js"></script>
		<title>Musix Cloud <?php echo $_SESSION['type'];?></title>
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
		      <a class="navbar-brand">Musix Cloud <?php echo $_SESSION['type'];?> Panel</a>
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

		<div class="container">
			 <div id='showuser'>
			 <div class="panel-group">
					  <div class="panel panel-default">
					    <div class="panel-heading" id="headhead">Musix Cloud User List <span class="badge"><?php countuser();?></span></div>
     					 <div class="panel-body">
				<div class="table-responsive">
				<table class="table table-hover" id="shusertable">
				    <thead>
				      <tr>
				        <th>User ID</th>
				        <th>Email</th>
				        <th>Fullname</th>
				      </tr>
				    </thead>
				    <tbody>
				      <tr><td><span class="uid"></span></td><td><span class="email"></span></td><td><span class="full"></span></td></tr>
				    </tbody>
				  </table>
				  </div>
				  		</div>
     					</div>
     				   </div>
			 </div>
		</div>
	</body>
</html>
