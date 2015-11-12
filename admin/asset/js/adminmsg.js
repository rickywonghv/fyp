$(document).ready(function(){
	$.ajax({
					type:"GET",
					dataType:"json",
					url:"asset/adminmsg.php?msg=shmsg",
					success:function(res){
						json=res;
						if(json==""){
							$("#listamsg").html('<tr><td colspan=5><div class="alert alert-warning">You have no message! </div></td></tr>');
						}else{
							var NumOfJData = json.length;							
							for(var i = 0; i < NumOfJData; i++) {
								$("#listamsg").append("<tr><td><div class='msgidd'>"+json[i]["msgid"]+"</div></td><td>"+json[i]["fromadmin"]+"</td><td>"+json[i]["date"]+"</td><td>"+json[i]["time"]+"</td><td><button class='btn btn-info' data-toggle='modal' type='button' data-target=#"+json[i]["msgid"]+">Detail</button><td><button type='button' class='btn btn-danger delbtn' onclick='del("+json[i]["msgid"]+")'>Delete</button></td></td><tr>");

								$("#shmsgmodal").append('<div id='+json[i]["msgid"]+' class="modal fade" role="dialog"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Message Detail</h4></div><div class="modal-body"><p><b>From Admin:</b>'+json[i]["fromadmin"]+'</p><p><b>Message:</b>'+json[i]["msg"]+'</p><p><b>Receive Time: </b>'+json[i]["time"]+'</p><p><b>Receive Date: </b>'+json[i]["date"]+'<p><b>Sent from IP: </b>'+json[i]["ip"]+'</p></div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div></div></div></div>');							

							}

						}
							
					},
					error:function(){
						$("#listamsg").html('error');
					}
				});



	$("#amsgbtn").click(function(){
		var fromAdmin=$("#fromAdmin").val();
		var fromAid=$("#fromAid").val();
		var toadmin=$('#toadmin :selected').text();
		var msg=$("textarea#msgarea").val();
		if(msg==""){
			$("#callback").html('<div class="alert alert-warning"><strong>Warning!</strong>Please fill in message! </div>');
			return false;
		}else if(fromAdmin==toadmin){
			$("#callback").html('<div class="alert alert-warning"><strong>Warning!</strong>You can not send message to yourself! </div>');
			return false;
		}else{
			$.ajax({
				type:"POST",
				data:"from="+fromAdmin+"&toadmin="+toadmin+"&msg="+msg,
				url:"asset/adminmsg.php?msg=sendmsg",
				success:function(response){
					if(response=="true"){
						$("#callback").html('<div class="alert alert-success"><strong>Success!</strong>Your message sent already! </div>');
						$("#amsgbtn").attr('disabled','disabled');
						$("#closebtn").click(function(){
							window.location='adminmessage.php';
						})
						return false;
					}else{
						$("#callback").html('<div class="alert alert-danger"><strong>Error!</strong>Your message not sent! </div>');
						return false;
					}
				}
			})
			return false;
		}
	});
	
})