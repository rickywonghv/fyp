<?php
//require 'permission.php';
if(isset($_GET['act'])){
	if($_GET['act']=="shuser"){
		alluser();
	}
}
	function alluser(){
		require 'db.php';
		$sql="select * from user";
		$stmt=$conn->prepare($sql);
		$stmt->execute();
		$data = $stmt->get_result();
		$result = array();
		     while($row = $data->fetch_assoc()) {
		          $result[] = $row;
		      }
		      echo json_encode($result);
	}
?>
