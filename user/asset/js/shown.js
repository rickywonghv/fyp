
   // Stuff to do as soon as the DOM is ready
   var genuid=$("#genuid").val();
   $.ajax({
     url:"asset/php/function.php?act=shownsong",
     type:"POST",
     data:"uid="+genuid,
     dataType:"json",
     success:function(response){
       json=response;
       var NumOfJData = json.length;
       $("#playlist").append("<li class='list-group-item active'><span class='song' value="+json[0]["title"]+" id='upload/files/"+json[0]["songPath"]+"'>"+json[0]["title"]+"</span><a  class='download' href='download.php?url="+json[0]["songPath"]+"' data-toggle='tooltip' title='Download'><span class='glyphicon glyphicon-download'></span></a></li>");
         for(var i = 1; i < NumOfJData; i++) {
           $("#playlist").append("<li class='list-group-item'><span class='song' value="+json[i]["title"]+" id='upload/files/"+json[i]["songPath"]+"'>"+json[i]["title"]+"</span><a class='download' href='download.php?url="+json[i]["songPath"]+"' data-toggle='tooltip' title='Download'><span class='glyphicon glyphicon-download'></span></a></li>");

         }
     }
   });
