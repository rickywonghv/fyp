<?php
	session_start();
	if(empty($_SESSION['username'])||empty($_SESSION['type'])||$_SESSION['type']=='musicadmin'){
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
		<script src="asset/js/file.js" charset="utf-8"></script>
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
			<div class="col-xs-12">
				<ul class="nav nav-tabs">
				  <li role="presentation" id="filebtn"><a href="">File</a></li>
				  <li role="presentation" id="uploadbtn"><a href="">Upload</a></li>
				</ul>
			</div>
			<div class="" id="file">
				<h3>Files</h3>
				<table class='table table-striped table-hover table-condensed'>
				  <thead>
				    <tr>
				      <th>Filename</th><th>File Size</th>
				    </tr>
				  </thead>
				  <tbody id="listallfile">
				    <tr>
				      <td></td>
				    </tr>
				  </tbody>
				</table>
			</div>
			<div class="" id="upload">
				<h3>Upload File</h3>
				<div class="" id="uploadform">
					<?php include "asset/s3/upload.php"; ?>
					<form method="post" action="<?php echo $uploadURL; ?>" enctype="multipart/form-data">
			<?php
			    foreach ($params as $p => $v)
			        echo "        <input type=\"hidden\" name=\"{$p}\" value=\"{$v}\" />\n";
			?>
							<div class="fileinput">
								<input type="file" class="form-control" name="file" />
							</div>
							<div class="submitbtn">
								<input type="submit" class="btn btn-info" value="Upload" />
							</div>

			    </form>
				</div>
			</div>
		</div>
		<script type="text/javascript">
		  var uploadget = getUrlVars()["act"];
		  if(uploadget==="uploaded"){
		    alert("The file has been uploaded!");
				window.location="file.php";
		  }
  </script>
	</body>
</html>
