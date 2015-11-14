<?php

require 'permission.php';
require 'asset/db.php';
	$sql="select adminlog.id,adminlog.adminid,admin.username,adminlog.logdate,adminlog.logtime,adminlog.logip From adminlog INNER JOIN admin ON adminlog.adminid=admin.adminid ORDER BY adminlog.logdate DESC,adminlog.logtime DESC;";
	$stmt=$conn->prepare($sql);
	$stmt->execute();
	$stmt->bind_result($id,$adminid,$username,$logdate,$logtime,$logip);
	while($stmt->fetch()){
		echo '<tr><td>'.$id.'</td><td>'.$adminid.'</td><td>'.$username.'</td><td>'.$logdate.'</td><td>'.$logtime.'</td><td>'.$logip.'</td></tr>';
	}
?>