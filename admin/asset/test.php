<?php
require 'db.php';
	$sql="select userlog.logid,userlog.userid,user.username,userlog.logindate,userlog.logintime,userlog.logip,userlog.country,userlog.latitude,userlog.longitude from userlog inner join user on userlog.userid=user.userid";
	$stmt=$conn->prepare($sql);
	$stmt->execute();
	$data = $stmt->get_result();
	     $result = array();
	     while($row = $data->fetch_assoc()) {
	          $result[] = $row;
	      }
	      echo json_encode($result);
?>