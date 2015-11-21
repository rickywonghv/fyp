$(document).ready(function(){
	$("#loginbtn").click(function(){
			var email=$("#loginemail").val();
			var pwd=$("#loginpwd").val();
			if(email==""||pwd==""){
				$("#loginmsg").html('<div class="alert alert-danger"><strong>Error!</strong>Please enter Email and Password</div>');
				return false;
			}else{
				$.ajax({
					type:"POST",
					data:"loginemail="+email+"&loginpwd="+pwd,
					url:"asset/php/cklogin.php",
					success:function(response){
						if(response=="true"){
							window.location="user/index.php";
						}else if(response=="false"){
							$("#loginmsg").html('<div class="alert alert-warning"><strong>Error!</strong>Wrong Email or Password</div>');
							return false;
						}else{
							$("#loginmsg").html('<div class="alert alert-danger"><strong>Error!</strong></div>');
							return false;
						}
					}
				});
				return false;
			}
	});
});
