$(document).ready(function(){
					$.ajax({
						type:"GET",
						url:"asset/adminfunction.php?act=shadmin",
						dataType:"html",
						success:function(response){
							$("#admindisplay").html(response);
						}
					});

				$("#addAdminBtn").click(function(){
					var user=$("#user").val();
					var pwda=$("#pwd").val();
					var pwdb=$("#pwdb").val();
					var type=$("input[name=type]:checked").val();
					if(pwda.length<8){
						$('#response').html('<div class="alert alert-warning"><strong>Warning!</strong>Password length should more than 8!</div>');
						return false;
					}
					else if(pwda!=pwdb){
						$('#response').html('<div class="alert alert-warning"><strong>Warning!</strong>Password are not match! </div>');
						return false;
					}else if(user==""||pwda==""||pwdb==""||type==""){
						$('#response').html('<div class="alert alert-warning"><strong>Warning!</strong>Should fill in all column!</div>');
						return false;
					}else{
						$.ajax({
							type:'POST',
							data:'user='+user+'&pwd='+pwda+'&type='+type,
							url:'asset/addadmin.php',
							success:function(response){
								if(response=='success'){
									$('#success').html('<div class="alert alert-success"><strong>Success!</strong>Add Successfully.</div>');
									window.location='admin.php';
								}else{
									$('#response').html('<div class="alert alert-warning"><strong>Warning!</strong>This admin exist already! </div>');
									return false;
								}
							}
						});
					return false;
					}
				})
			});

function deladmin(id,aid){
	if(id==aid){
		alert("You can delete yourself");
	}else{
		var r=confirm("Sure to delete?");
		if(r==true){
			$.ajax({
				type:"GET",
				url:"asset/adminfunction.php?act=del&aid="+id,
				dataType:'html',
				success:function(response){
					if(response=="success"){
						alert("Already Delete");
						window.location="admin.php";
					}else{
						alert("Error");
						window.location="admin.php";
					}
				}
			})
		}
	}
	
}

