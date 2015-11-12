<?php
	session_start();
	if(empty($_SESSION['username'])||empty($_SESSION['type'])){
		header("Location:login.php");
	}
	if($_SESSION['type']!='superadmin'){
		header("Location:index.php?msg=noper");
	}
	require 'asset/count.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="asset/js/jquery-1.11.3.min.js"></script>
		<script src="asset/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="asset/css/nav.css">
		<link rel="stylesheet" href="asset/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="asset/css/bootstrap-theme.min.css">
		<link rel="stylesheet" type="text/css" href="asset/css/style.css">
		<link rel="stylesheet" type="text/css" href="asset/css/jquery-ui.min.css">
		<link rel="stylesheet" type="text/css" href="asset/css/jquery-ui.structure.min.css">
		<link rel="stylesheet" type="text/css" href="asset/css/jquery-ui.theme.min.css">
		<script type="text/javascript" src="asset/js/adminscript.js"></script>
		<script type="text/javascript" src="asset/js/jquery-ui.min.js"></script>
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
		<div class="showmsg">
			<?php
				if(isset($_GET['msg'])){
					if($_GET['msg']=='passNm'){
						echo "<div class='alert alert-warning'><strong>Warning!</strong>Password are not match!</div>";
					}
				}
			?>
		</div>
			<!-- Add Model-->
			<div id="addModel">
				<button type="button" class="btn btn-info btn" data-toggle="modal" data-target="#add"><span class="glyphicon glyphicon-plus"></span>Add Admin</button>
					<!--Admin Add Modal-->
					<div id="add" class="modal fade" role="dialog">
					  <div class="modal-dialog">
					    <!-- Modal content-->
					    <div class="modal-content">
					      <div class="modal-header">
					        <h4 class="modal-title">Administrator Add</h4>
					      </div>
					      <div class="modal-body">
					        <form role="form" method="post">
								<div class="form-group">
								    <label for="username">Username:</label>
								    <input type="text" class="form-control" name="user" id="user">
								  </div>
								  <div class="form-group">
								    <label for="pwd">Password:</label>
								    <input type="password" class="form-control" name="pwd" id="pwd">
								  </div>
								  <div class="form-group">
								    <label for="pwdb">Confirm Password:</label>
								    <input type="password" class="form-control" name="pwdb" id="pwdb">
								  </div>
								  <div class="form-group">
										<label class="checkbox-inline">
									      <input type="radio" name="type" id="typesu" value="superadmin" checked> Super Admin
									   </label>
									   <label class="checkbox-inline">
									      <input type="radio" name="type" id="typeadmin" value="admin"> Admin
									   </label>
									   <label class="checkbox-inline">
									      <input type="radio" name="type" id="typemusic" value="musicadmin"> Music Admin
									   </label>
									</div>
								  <button type="submit" id="addAdminBtn" class="btn btn-primary btn-lg">Add</button>
								  
					        </form>
					        <div id="response"></div>
					      </div>
					    </div>

					  </div>
					</div>
					<!--End Admin Add Modal-->
			</div>
			<!--End Add Model-->
	<div id="success"></div>
			<div class="panel-group">
					  <div class="panel panel-default">
					    <div class="panel-heading" id="headhead">Musix Cloud Admin List <span class="badge"><?php countadmin();?></span></div>
     					 <div class="panel-body">
     					 	<div id="admindisplay"><table></table></div>
     					 </div>
     					</div>
     				   </div>
     	</div>
				<div id='msgshow'><?php
						if(isset($_GET['msg'])){
								if($_GET['msg']=='error'){
									echo "<div class='alert alert-danger'><strong>Error!</strong>This account can not remove</div>";
									return false;
								}
					}?>
				</div>
		</div>
		<script src="asset/js/editform.js"></script>
	</body>
</html>