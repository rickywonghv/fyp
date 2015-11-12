<?php
session_start();
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
		<title>Musix Cloud <?php echo $_SESSION['type'];?></title>
	</head>
	<body>

		<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
		    <div class="navbar-header">
		    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navmenu">
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>                        
     		</button>
		      <a class="navbar-brand">Test Msg</a>
		    </div>
		    <div class="collapse navbar-collapse" id="navmenu">
		      <ul class="nav navbar-nav">
		        
		      </ul>
				<ul class="nav navbar-nav navbar-right">
			    	<li><a href="logout.php"> <span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
				</ul>
		    </div>
		  </div>
		</nav>
		<div class="container">
		 <button class="btn btn-primary" id="addMsgBtn" data-toggle="modal" data-target="#addmsgmodal"><span class=""></span>Send Message</button>
		 <div id="msg">
		 	<div id="msgform">
				<div id="addmsgmodal" class="modal fade" role="dialog">
				  <div class="modal-dialog">
				    <!-- Modal content-->
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				        <h4 class="modal-title">Modal Header</h4>
				      </div>
				      <div class="modal-body">
				        <form role="form" method="post">
				        <input type="hidden" value=<?php echo $_SESSION['username'];?> >
				        	<b>From: </b><?php echo $_SESSION['username']; ?>
							<div class="form-group">
							  <label for="msg">Message:</label>
							  <textarea class="form-control" id="msg" rows="8"></textarea>
							</div>
							<button type="submit" id="submitmsg" class="btn btn-primary">Submit</button>
							<button type="reset" id="resetbtn" class="btn btn-danger">Reset</button>
				        </form>
				      </div>
				    </div>

				  </div>
				</div>
		 	</div>
		 </div>
		</div>
	</body>
</html>