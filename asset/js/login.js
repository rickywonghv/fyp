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


function onSignIn(googleUser) {
	// Useful data for your client-side scripts:
	var profile = googleUser.getBasicProfile();
	console.log("ID: " + profile.getId()); // Don't send this directly to your server!
	console.log("Name: " + profile.getName());
	console.log("Image URL: " + profile.getImageUrl());
	console.log("Email: " + profile.getEmail());

	// The ID token you need to pass to your backend:
	var id_token = googleUser.getAuthResponse().id_token;
	console.log("ID Token: " + id_token);

	$.ajax({
		type:"POST",
		url:'asset/php/oauthlogin.php?act=login',
		data:'email='+profile.getEmail()+'&name='+profile.getName(),
		success:function(response){
			if(response=='success'){
				window.location="user/index.php";
			}else {
				alert(response);
			}
		}
	})

	// auth2 is initialized with gapi.auth2.init() and a user is signed in.


};
