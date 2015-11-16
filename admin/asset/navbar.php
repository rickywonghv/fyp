<?php
	if($_SESSION['type']=='superadmin'){
		echo '<li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
				<li><a href="admin.php"><span class="glyphicon glyphicon-user"></span> Administrator</a></li>
				<li><a href="adminlog.php"><span class="glyphicon glyphicon-record"></span> Admin Logging</a></li>
		        <li><a href="user.php"><span class="glyphicon glyphicon-user"></span> User</a></li>
		        <li><a href="music.php"><span class="glyphicon glyphicon-headphones"></span> Music</a></li>
		        <li><a href="adminmessage.php"><span class="glyphicon glyphicon-envelope"></span> Admin Message</a></li>';
	}elseif($_SESSION['type']=='admin'){
		echo '<li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
				<li><a href="user.php"><span class="glyphicon glyphicon-user"></span> User</a></li>
		        <li><a href="music.php"><span class="glyphicon glyphicon-headphones"></span> Music</a></li>
		        <li><a href="adminmessage.php"><span class="glyphicon glyphicon-envelope"></span> Admin Message</a></li>';
	}else{
		echo '<li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
				<li><a href="music.php"><span class="glyphicon glyphicon-headphones"></span> Music</a></li>
				<li><a href="adminmessage.php"><span class="glyphicon glyphicon-envelope"></span> Admin Message</a></li>';
	}
?>