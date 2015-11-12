<?php
	session_start();
	if(empty($_SESSION['username'])||empty($_SESSION['type'])){
		header("Location:login.php");
	}
	require 'asset/count.php';
	require 'asset/adminmsg.php';
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
		<link rel="stylesheet" href="asset/css/nav.css">
		<title>Musix Cloud <?php echo $_SESSION['type'];?></title>
		<script src="asset/js/admindelmsg.js"></script>
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
		<div id="delmsgmsg"></div>
			<div id="amsgdetail"></div>
		 	<div id="adminmsg">
		 		<button class="btn btn-success" id="asendmsgbtn" data-toggle="modal" data-target="#amsgmodal">Send Message</button>
		 		<div id="amsgform">
					<div id="amsgmodal" class="modal fade" role="dialog">
					  <div class="modal-dialog">
					    <!--Message form content-->
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" id="closebtn" class="close" data-dismiss="modal">&times;</button>
					        <h4 class="modal-title">Send Message To Other Admin</h4>
					      </div>
					      <!--Msg form Start-->
					      <form role="form" method="POST">
					      <div class="modal-body">
					      	<div id="fromUsername"><b>From:</b><?php echo $_SESSION['username'];?> <input type="hidden" id="fromAid" value=<?php echo $_SESSION['aid'];?> ><input type="hidden" id="fromAdmin" value=<?php echo $_SESSION['username'];?> ></div>
					      	<div id="toUsername">
								<div class="form-group">
								  <label for="toadmin"><b>To:</b></label>
								  <select class="form-control" id="toadmin">								   
								    <?php listadmin();?>
								  </select>
								</div>
					      	</div>
					       	<div id="amsgtext">
					       		<textarea class="form-control" id="msgarea" placeholder="Message"></textarea>
					       	</div>
					       	<div id="callback"></div>
					      </div>
					      <div class="modal-footer">
					        <button type="submit" id="amsgbtn" class="btn btn-primary">Submit</button>
					        <button type="reset" id="amsgrestbtn" class="btn btn-danger">Reset</button>
					      </div>
					      </form>
					      <!--Msg form End-->
					    </div>
					  </div>
					</div>
		 		</div>
		 	</div>
		 	<!--Show Message-->
		 	<div id="ashmsg">
		 	<input type="hidden" id="hidusername" value=<?php echo $_SESSION['username'];?>>
		 		<div class="table-responsive">
				<table class="table table-hover table-striped">
				    <thead>
				      <tr>
				      	<th>Message ID</th>
				        <th>Send From</th>
				        <th>Received Date</th>
				        <th>Received Time</th>
				        <th>Detail</th>
				      </tr>
				    </thead>
				    <tbody id="listamsg">
				      				     
				    </tbody>
				  </table>
				  </div>
				  <!--Show Message Detail-->
				  <div id="shmsgmodal"></div>
				  <!--Show Message Detail End-->
		 	</div>
			<!--Show Message End-->
		</div>
		<script src="asset/js/adminmsg.js"></script>
	</body>
</html>