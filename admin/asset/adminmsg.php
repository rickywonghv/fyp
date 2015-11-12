<?php
if(isset($_GET['msg'])){
	if($_GET['msg']=='sendmsg'){
		sendmsg();
	}
	if($_GET['msg']=='shmsg'){
		shmsg();
	}
}
if(isset($_POST['act'])){
	if($_POST['act']=='delmsg'){
		del($_POST['id']);
	}
}

function del($id){
	require 'db.php';
		$sql="delete from adminmsg where msgid=?";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param('i',$id);
		$stmt->execute();
		echo "success";
	}

function listadmin(){
	require 'asset/db.php';
	$sql="select adminid,username from admin";
	$stmt=$conn->prepare($sql);
	$stmt->execute();
	$result=$stmt->bind_result($aid,$username);
	while($result=$stmt->fetch()){
		 echo "<option class='adminopt' id=".$aid.">".$username."</option>";
	}
}
function shmsg(){
	session_start();
	require 'db.php';
	$sql="select * from adminmsg where toadmin=?";
	$stmt=$conn->prepare($sql);
	$stmt->bind_param('s',$_SESSION['username']);
	$stmt->execute();
	$data = $stmt->get_result();
     $result = array();
     while($row = $data->fetch_assoc()) {
          $result[] = $row;
      }
       echo json_encode($result); 

	//while($result=$stmt->fetch()){
		//echo "<tr><td>".$fromadmin."</td><td>".$date."</td><td>".$time."</td><td><button type='button' value=".$msgid." data-toggle='modal' data-target='#m".$msgid."' class='btn btn-info'>Detail</button></td></tr>";
		
	//}
}
function sendmsg(){
	require 'db.php';
	date_default_timezone_set('Asia/Hong_Kong');
	$msgid=rand(1,9999);
	$date=date('Y-m-d');
	$time=date('H:i:s');
	$from=$_POST['from'];
	$to=$_POST['toadmin'];
	$msg=$_POST['msg'];
	$ip=$_SERVER['REMOTE_ADDR'];
	try{
		$sql="INSERT INTO adminmsg (msgid,fromadmin,toadmin,msg,date,time,ip) values(?,?,?,?,?,?,?)";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param('issssss',$msgid,$from,$to,$msg,$date,$time,$ip);
		$stmt->execute();
		echo 'true';
	}catch(Exception $e){
		printf($e->getMessage());
	}
	
}
?>