<?php
	if($_SESSION['type']=='superadmin'){
		echo '<li><a href="index.php">Home</a></li>
				<li><a href="admin.php">Administrator</a></li>
				<li><a href="adminlog.php">Admin Logging</a></li>
		        <li><a href="user.php">User</a></li>
		        <li><a href="music.php">Music</a></li>
		        <li><a href="adminmessage.php">Admin Message</a></li>';
	}elseif($_SESSION['type']=='admin'){
		echo '<li><a href="index.php">Home</a></li>
				<li><a href="user.php">User</a></li>
		        <li><a href="music.php">Music</a></li>
		        <li><a href="adminmessage.php">Admin Message</a></li>';
	}else{
		echo '<li><a href="index.php">Home</a></li>
				<li><a href="music.php">Music</a></li>
				<li><a href="adminmessage.php">Admin Message</a></li>';
	}
?>