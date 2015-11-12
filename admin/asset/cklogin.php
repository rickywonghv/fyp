<?php
	session_start();
	date_default_timezone_set('Asia/Hong_Kong');
	require 'db.php';
		$user=$_POST['username'];
		$pwd=$_POST['pwd'];
			$sql="select adminid,username,password,type from admin where username= ?";
			$stmt=$conn->prepare($sql);
			$stmt->bind_param("s",$user);
			$stmt->execute();
			$stmt->bind_result($adminid,$reuser, $repwd,$type);
			$stmt->fetch();
			if(($user==$reuser)&&(md5($pwd)==$repwd)){
				
				//admin login logging
				require 'db.php';
				$id=rand(1,9999999);
				$logtime=date('H:i:s');
				$logdate=date('Y-m-d');
				$logip=$_SERVER['REMOTE_ADDR'];
				$sql="insert into adminlog(id,adminid,logtime,logdate,logip)values(?,?,?,?,?)";
				$stmt=$conn->prepare($sql);
				$stmt->bind_param("iisss",$id,$adminid,$logtime,$logdate,$logip);
				$stmt->execute();
				//end Admin Login Logging
				
				echo 'true';
				$_SESSION['username']=$reuser;
				$_SESSION['aid']=$adminid;
				$_SESSION['type']=$type;
			}else{
				echo 'false';
				
			}
	
?>