$(document).ready(function(){
	$.ajax({
		type:"GET",
		url:"asset/log.php?act=shlog",
		dataType:"json",
		success:function(response){
			json=response;
			var NumOfJData = json.length;							
				for(var i = 0; i < NumOfJData; i++) {
					$("#listlog").append("<tr><td>"+json[i]['id']+"</td><td>"+json[i]['adminid']+"</td><td>"+json[i]['username']+"</td><td>"+json[i]['logdate']+"</td><td>"+json[i]['logtime']+"</td><td>"+json[i]['logip']+"</td><td>"+json[i]['countryName']+"</td><td>"+json[i]['latitude']+"</td><td>"+json[i]['longitude']+"</td></tr>");		
				}
		}
	})
})