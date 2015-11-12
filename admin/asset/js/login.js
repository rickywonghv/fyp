$(document).ready(function(){
	$("#loginbtn").click(function(){
		var user=$("#username").val();
		var pass=$("#pwd").val();
		if(user.length>0&&pass.length>0){
			$.ajax({
				type:"POST",
				data:"username="+user+"&pwd="+pass,
				url:"asset/cklogin.php",
				success:function(html){
					if(html=='true'){
						window.location='index.php';
					}else{
						$("#message").html('<div class="alert alert-danger"><strong>Error!</strong>Wrong Username or Password</div>');
					}
				}
			});
		}else{
			$("#message").html('<div class="alert alert-danger"><strong>Error!</strong> Please fill in Username and Password!</div>');
		}
		return false;
	})
})