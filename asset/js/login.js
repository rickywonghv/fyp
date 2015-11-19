$(document).reday(function(){
	$("#loginbtn").click(function(){
		var email=$("#email").val();
		var pwd=$("#pwd").val();
		if(email==""||pwd==""){
			$("#msg").html('<div class="alert alert-danger"><strong>Error!</strong> Please fill in Username and Password!</div>');
		}else{
			$.ajax({
				type:"POST",
				url:"../asset/php/cklogin.php",
				data:"email="+email+"&pwd="+pwd,
				success:function(response){
					if(response=="true"){
						window
					}
				}

			})
		}
	})
})