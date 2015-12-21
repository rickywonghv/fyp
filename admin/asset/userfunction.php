<?php
//require 'permission.php';
if(isset($_GET['act'])){
	if($_GET['act']=="shuser"&&isset($_GET['uid'])){
		user($_GET['uid']);
	}else if($_GET['act']=="shuser"){
		alluser();
	}
}
	function alluser(){
		require 'db.php';
		$sql="select userid, fbuid, email, type, fullname, gender, dob, intro, expDate, regDate, regIp, uToken from user";
		$stmt=$conn->prepare($sql);
		$stmt->execute();
		$data = $stmt->get_result();
		$result = array();
		     while($row = $data->fetch_assoc()) {
		          $result[] = $row;
		      }
		      echo json_encode($result);
	}

	function user($uid){
		require 'db.php';
		$sql="select userid, fbuid, email, type, fullname, gender, dob, intro, expDate, regDate, regIp, uToken from user where userid=?";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param("i",$uid);
		$stmt->execute();
		$data = $stmt->get_result();
		$result = array();
		     while($row = $data->fetch_assoc()) {
		          $result[] = $row;
		      }
		      echo json_encode($result);
	}
?>
