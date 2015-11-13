<?php
require 'permission.php';
	function alluser(){
		require 'db.php';
		$sql="select * from user";
		$stmt=$conn->prepare($sql);
		$stmt->execute();
		$stmt->bind_result($userid,$fullname,$gender,$email,$dob,$intro,$type,$exp,$restDate,$restIp,$lastLogTime,$lastLogIp,$username,$password);
		while($stmt->fetch()){
			echo '<tr><td>'.$userid.'</td><td>'.$username.'</td><td>'.$fullname.'</td><td><button class="btn btn-info" data-toggle="modal" data-target="#detailuser'.$userid.'" id="userdetail'.$userid.'">Detail</button></td></tr>
			<!--User Detail Modal -->
  <div class="modal fade" id="detailuser'.$userid.'" role="dialog">
    <div class="modal-dialog">
   
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">'.$fullname.' User Detail</h4>
        </div>
        <div class="modal-body">
			<ul class="list-group">
			  <li class="list-group-item"><b>UserID:</b>'.$userid.'</li>
			  <li class="list-group-item"><b>Username:</b>'.$username.'</li>
			  <li class="list-group-item"><b>Full Name:</b>'.$fullname.'</li>
			  <li class="list-group-item"><b>Gender:</b>'.$gender.'</li>
			  <li class="list-group-item"><b>Email:</b>'.$email.'</li>
			  <li class="list-group-item"><b>Birthdaty:</b>'.$dob.'</li>
			  <li class="list-group-item"><b>Introduction:</b>'.$intro.'</li>
			  <li class="list-group-item"><b>Type:</b>'.$type.'</li>
			  <li class="list-group-item"><b>Exp Date:</b>'.$exp.'</li>
			  <li class="list-group-item"><b>Register Date:</b>'.$restDate.'</li>
			  <li class="list-group-item"><b>Register IP:</b>'.$restIp.'</li>
			  <li class="list-group-item"><b>Last Login Ip:</b>'.$lastLogIp.'</li>
			  <li class="list-group-item"><b>Last Login Time:</b>'.$lastLogTime.'</li>
			</ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>';
		}
	}
?>