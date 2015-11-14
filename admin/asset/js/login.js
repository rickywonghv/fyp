$(document).ready(function(){
	$("#loginbtn").click(function(){
		var user=$("#username").val();
		var pass=$("#pwd").val();
		$.ajax({
						type:"GET",
						dataType:"json",
						url:"http://freegeoip.net/json",
						success:function(response){
							json=response;
							var countryname=json.country_name;
							var latitude=json.latitude;
							var longitude=json.longitude;
							if(user.length>0&&pass.length>0){
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
					});
		
		return false;
	})
})