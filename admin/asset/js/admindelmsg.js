		function del(id) {
					if (confirm("Are you sure to delete!") == true) {
					   $.ajax({
							url: "asset/adminmsg.php",
							data:"act=delmsg&id="+id,
							type: "POST",
							success: function(data){ 
								if(data=="success"){
									window.Location="adminmessage.php";
									$("#delmsgmsg").html('<div class="alert alert-success"><strong>Success!</strong>Deleted! </div>');
									return false;
								}else{
									$("#delmsgmsg").html("error");
									return false;
								}
							}
							
					   });
				    } else {
				        $("#delmsgmsg").html(data);
				    }
				
			}
	