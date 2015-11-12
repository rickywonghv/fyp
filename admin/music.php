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
		<link rel="stylesheet" href="asset/css/bootstrap.min.css">
		<link rel="stylesheet" href="asset/css/nav.css">
		<link rel="stylesheet" type="text/css" href="asset/css/bootstrap-theme.min.css">
		<link rel="stylesheet" type="text/css" href="asset/css/style.css">
		
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
			<div id="musicheader"><span class="glyphicon glyphicon-music"></span> Song List</div>
			<!--Start musiclist-->
			<div id="musiclist">
				<div class="table-responsive" align="center">
				<table class="table table-hover table-striped" align="center">
				    <thead>
				      <tr>
				      	<th>Song ID</th>
				        <th>Song Name</th>
				        <th>Singer</th>
				        <th>Upload Time</th>
				        <th>Total Play</th>
				        <th>Total Download</th>
				      </tr>
				    </thead>
				    <tbody id="listmusic">
				      	  
				    </tbody>
				  </table>
				  </div>
				<!--End musiclist-->
				<div id="musicdetail">
					<div id="mdetailmodal" class="modal fade musicdetail" role="dialog">
					  <div class="modal-dialog">
					    <!-- Modal content-->
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					        <h4 class="modal-title">Song Detail</h4>
					      </div>
					      <div class="modal-body">

					<div class="list-group">
					    <a href="#" class="list-group-item">Song ID:<div id="songid"></div></a>
					    <a href="#" class="list-group-item">Song Name:<div id="songname"></div></a>
					    <a href="#" class="list-group-item">Lyricist:<div id="lyricist"></div></a>
					    <a href="#" class="list-group-item">Singer:<div id="singer"></div></a>
					    <a href="#" class="list-group-item">Composer:<div id="composer"></div></a>
					    <a href="#" class="list-group-item">Album:<div id="album"></div></a>
					    <a href="#" class="list-group-item">Track:<div id="track"></div></a>
					    <a href="#" class="list-group-item">Year:<div id="year"></div></a>
					    <a href="#" class="list-group-item">Copyright:<div id="copyright"></div></a>
					    <a href="#" class="list-group-item">Art Path:<div id="artpath"></div></a>
					    <a href="#" class="list-group-item">Lyrics:<div id="lyrics"></div></a>
					    <a href="#" class="list-group-item">Song Path:<div id="songpath"></div></a>
					    <a href="#" class="list-group-item">Upload Time:<div id="uploadtime"></div></a>
					    <a href="#" class="list-group-item">Total Play:<div id="totalplay"></div></a>
					    <a href="#" class="list-group-item">Total Download:<div id="totaldownload"></div></a>
					</div>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					      </div>
					    </div>

					  </div>
					</div>
				</div>
			</div>
			<!--End Container-->
			</div>
		<script src="asset/js/music.js"></script>
	</body>
</html>