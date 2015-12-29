<?php
	session_start();
	if(empty($_SESSION['username'])||empty($_SESSION['type'])){
		header("Location:login.php");
	}
	require 'asset/count.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="asset/js/jquery-1.11.3.min.js"></script>
		<script src="asset/js/bootstrap.min.js"></script>
		<script src="asset/js/info.js" charset="utf-8"></script>
		<link rel="stylesheet" href="asset/css/bootstrap.min.css">
		<link rel="stylesheet" href="asset/css/nav.css">
		<link rel="stylesheet" type="text/css" href="asset/css/bootstrap-theme.min.css">
		<link rel="stylesheet" type="text/css" href="asset/css/style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
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
		<div class="container">
					<!--Change Password Modal-->
						<div id="chpwd" class="modal fade" role="dialog">
						  <div class="modal-dialog">
						    <div class="modal-content" id="chpwdcont">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" id="chclose">&times;</button>
						        <h4 class="modal-title"><?php echo $_SESSION['username'];?> Change Password</h4>
						      </div>
						      <!--Change Password Form-->
						      <form method="POST" role="form">
						      <input type="hidden" id="hiddenaid" value=<?php echo $_SESSION['aid'];?> >
						      <div class="modal-body">
						        <div class="form-group">
						        	<label for="opwd">Old Password</label>
						        	<input type="password" id="opwd" class="form-control" placeholder="Enter Your Old Password">
						        </div>
						        <div class="form-group">
						        	<label for="npwd">New Password</label>
						        	<input type="password" id="npwd" class="form-control" placeholder="Enter Your New Password">
						        </div>
						        <div class="form-group">
						        	<label for="rnpwd">Confirm New Password</label>
						        	<input type="password" id="rnpwd" class="form-control" placeholder="Retype Your New Password">
						        </div>
						      </div>
						      <div id="shchmsg"></div>
						      <div class="modal-footer">
						        <button type="submit" class="btn btn-success" id="chpwdbtn">Save</button>
						        <button type="reset" class="btn btn-danger">Reset</button>
						      </div>
						      </form>
						      <!--Change Password Form End-->
						    </div>

						  </div>
						</div>
     				 <!--End Change Password Modal-->
		<div>
		<div class="alert alert-info"><strong>Welcome </strong><?php echo $_SESSION['username'];?></div>
		</div>
			<div class="col-sm-4">
			 	<div class="panel-group">
					  <div class="panel panel-default">
					    <div class="panel-heading counthead">Your Profile</div>
     					 <div class="panel-body">
							<ul class="list-group">
							  <li class="list-group-item"><b>Your IP Address: </b><?php echo $_SERVER['REMOTE_ADDR'];?></li>
							  <li class="list-group-item"><b>Username: </b><?php echo $_SESSION['username'];?></li>
							  <li class="list-group-item"><b>Admin Type: </b><?php echo $_SESSION['type'];?></li>
							  <li class="list-group-item"><button class="btn btn-primary" data-toggle="modal" data-target="#chpwd"><span class="user glyphicon glyphicon-lock"></span> Change Password</button></li>
							</ul>
     					 </div>
     					</div>
     				   </div>

			 </div>
			 <div class="col-sm-4">
			 		<div class="panel-group">
					  <div class="panel panel-primary" id="shdisk">
					    <div class="panel-heading counthead"><i class="fa fa-hdd-o"></i> Disk Information</div>
     					 <div class="panel-body">
								 <label for=""><i class="" id="diskicon"></i> Used Storage: </label>
								 <div class="progress">
								   <div class="progress-bar" id="diskinfo" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style=";">
								     <span id="diskinfotext" class="sr-only"></span>
								   </div>
								 </div>
								 <ul class="list-group">
								 	<li class="list-group-item"><b>Total Storage:</b> <span id="shdisktotal"></span></li>
									<li class="list-group-item"><b>Used Storage:</b> <span id="shdiskused"></span></li>
									<li class="list-group-item"><b>Free Storage:</b> <span id="shdiskfree"></span></li>
								 </ul>
     					 </div>
     					</div>
     				   </div>
			 </div>
			 <div class="col-sm-4">
			 	<div class="panel-group">
					  <div class="panel panel-success">
					    <div class="panel-heading counthead">Unread Message</div>
     					 <div class="panel-body" class="counter">
								 <table width="100%">
								 	<tr>
								 		<td>
											<div class="tit">
												User
											</div>
											<div class="iconCounter"><span class="glyphicon glyphicon-send sendicon"></span></div>
			      					 	<div class="valCounter"><?php unreadusermsg();?></div>
								 		</td>
								 	</tr>
								 </table>

     					 </div>
     					</div>
     				   </div>
			 </div>
			 <div class="col-sm-4">
			 	<div class="panel-group">
					  <div class="panel panel-danger">
					    <div class="panel-heading counthead">Number of Music</div>
     					 <div class="panel-body" class="counter">
     					 <div class="iconCounter"><span class="glyphicon glyphicon-music"></span></div>
     					 	<div class="valCounter"><?php countmusic();?></div>
     					 </div>
     					</div>
     				   </div>
			 </div>

		</div>
 		<script src="asset/js/chpwd.js"></script>
	</body>
</html>
