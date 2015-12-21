<?php
session_start();
require 'permission.php';



	if($_GET['act']=='shadmin'){
		shadmin();
	}
	if($_GET['act']=='del'&&$_GET['aid']!=""){
		deladmin($_GET['aid']);
	}
	if($_GET['act']=='edit'&&$_GET['aid']!=""){
		sheditadmin($_GET['aid']);
	}
	if($_GET['act']=='chpwd'){
		chpwd();
	}
	if($_GET['act']=='dellog'){
		dellog();
	}

function shadmin(){
	require 'db.php';

	$sql="select adminid,username,type from admin";
	$stmt=$conn->prepare($sql);
	$stmt->execute();
	$stmt->bind_result($adminid, $username,$type);
	while($stmt->fetch()){
		echo '<ul class="list-group">
			<input type="hidden" id="hiddenaid" value='.$adminid.'>
				<li class="list-group-item"><b>Admin ID:</b> '.$adminid.'</li>
				<li class="list-group-item"><b>Username: </b>'.$username.'</li>
				<li class="list-group-item"><b>Admin Type: </b>'.$type.'</li>
				<li class="list-group-item">
					<button type="button" id="editBtn" class="btn btn-info btn-mg" data-toggle="modal" data-target="#adminEdit'.$adminid.'">Edit</button>
					<button type="button" class="btn btn-danger" onclick=deladmin('.$adminid.','.$_SESSION["aid"].') id="adminDelBtn" >Delete</button>
				</li>
			</ul>
			<!--Edit Model-->
			<div id="adminEdit'.$adminid.'" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title" >'.$username.' Edit</h4>
			      </div>
			      <div class="modal-body">
			      <form role="form" id="editForm" method="POST" action="adminedit.php">
			      	<ul class="list-group">
			      		<li class="list-group-item"><b>Admin ID:</b> '.$adminid.'</li>
			      		<input type="hidden" id="hidaid" name="hiddenaid" value="'.$adminid.'">
			      		<li class="list-group-item">
			      			<div class="form-group">
    							<label for="username">Username:</label>'.$username.'
 							</div>
 							<div class="form-group">
    							<label for="password">Password:</label>
    							<input type="password" class="form-control" name="editpassword" id="editpassword">
 							</div>
 							<div class="form-group">
    							<label for="conpassword">Confirm Password:</label>
    							<input type="password" class="form-control" name="editconpassword" id="editconpassword">
 							</div>
 							<div class="form-group">
										<label class="checkbox-inline">
									      <input type="radio" name="edittype" id="edittypesu" value="superadmin" checked> Super Admin
									   </label>
									   <label class="checkbox-inline">
									      <input type="radio" name="edittype" id="edittypeadmin" value="admin"> Admin
									   </label>
									   <label class="checkbox-inline">
									      <input type="radio" name="edittype" id="edittypemusic" value="musicadmin"> Music Admin
									   </label>
									</div>
 						</li>
			      	</ul>
			      	<input type="submit" class="btn btn-default" name="saveEdit" value="Save" id="saveEdit">
			      	<div id="sheditmsg"></div>
			      </div>

			       </form>
			    </div>

			  </div>
			</div>
			<!--End Edit Model-->';
	}
}

function deladmin($aid){
	require 'db.php';
	$sql="delete from admin where adminid=?";
	$stmt=$conn->prepare($sql);
	$stmt->bind_param('i',$aid);
	$stmt->execute();
	echo "success";
	printf($stmt->error);
}
function sheditadmin($aid){
	require 'db.php';
	$sql="select adminid,username,type from admin where adminid= ?";
	$stmt=$conn->prepare($sql);
	$stmt->bind_param('i',$aid);
	$stmt->bind_result($adminid, $username,$type);
	$stmt->execute();
	while($stmt->fetch()){
		echo '<ul class="list-group">
			<form method="post">
			<input type="hidden" id="hiddenaid" value='.$adminid.'>
				<li class="list-group-item"><b>Admin ID:</b>'.$adminid.'</li>
				<li class="list-group-item"><b>Username: </b>'.$username.'</li>
				<li class="list-group-item"><b>Password:</b><input type="password" id="newpwd"></li>
				<li class="list-group-item"><b>Confirm Password:</b><input type="password" id="newpwdb"></li>
				<li class="list-group-item"><b>Admin Type: </b>'.$type.'</li>
				<li class="list-group-item"></li>
			</form>
			</ul>';
	}

}

function chpwd(){
	require 'db.php';
	$aid=$_POST['aid'];
	$opwd=md5($_POST['opwd']);
	$npwd=md5($_POST['npwd']);
	$rnpwd=md5($_POST['rnpwd']);
	$sql="select adminid,password from admin where adminid=?";
	$stmt=$conn->prepare($sql);
	$stmt->bind_param('i',$aid);
	$stmt->bind_result($adminid,$password);
	$stmt->execute();
	$stmt->fetch();

	if($opwd==$password){
		require 'db.php';
		$sql="update admin set password=? where adminid=?";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param('si',$npwd,$adminid);
		$stmt->execute();
		echo "true";
	}elseif($opwd!=$password){
		echo 'wrongpwd';
	}else{
		echo "error";
	}
}

function dellog(){
	require 'db.php';
	$sql="delete from musixcloud.adminlog where logdate<curdate()-4";
	$stmt=$conn->prepare($sql);
	$stmt->execute();
	echo "success";
}

?>
