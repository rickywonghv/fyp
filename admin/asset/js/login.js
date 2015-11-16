$(document).ready(function(){
	$("#loginbtn").click(function(){
		var user=$("#username").val();
		var pass=$("#pwd").val();
		if(google.loader.ClientLocation==null){
			if(user.length>0&&pass.length>0){
			$.ajax({
				type:"POST",
				data:"username="+user+"&pwd="+pass+"&countryname=null&latitude=null&longitude=null",
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
		}else{
			if(user.length>0&&pass.length>0){
			var countryname=google.loader.ClientLocation.address.country;
			var latitude=google.loader.ClientLocation.latitude;
			var longitude=google.loader.ClientLocation.longitude;
			$.ajax({
				type:"POST",
				data:"username="+user+"&pwd="+pass+"&countryname="+countryname+"&latitude="+latitude+"&longitude="+longitude,
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
		}
		
	})
})