<?php
	session_start();
	if(empty($_SESSION['username'])||empty($_SESSION['type'])){
		header("Location:login.php");
	}
	if($_SESSION['type']!='superadmin'){
		header("Location:login.php?usermsg=permission");
	}
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
		<div id="msg">
			<div class="alert alert-info">Time Zone: Hong Kong</div>
		</div>
		<div id="dellog">
		Delete records (4 days ago):
		<button class="btn btn-danger xlg" id="delbtn" onclick=dellog()>Delete</button></div>
		<div class="panel-group">
					  <div class="panel panel-default">
					    <div class="panel-heading" id="headhead">Musix Cloud Admin Logging</div>
     					 <div class="panel-body">
     					 	<div id="logtable">
     		<div class="table-responsive">
			<table class="table table-hover table-striped">
			    <thead>
			      <tr>
			        <th>Log ID</th>
			        <th>Admin ID</th>
			        <th>Admin Username</th>
			        <th>Date</th>
			        <th>Time</th>
			        <th>IP Address</th>
			      </tr>
			    </thead>
			    <tbody>
					<?php require 'asset/shlog.php';?>
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