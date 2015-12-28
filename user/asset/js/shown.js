
   // Stuff to do as soon as the DOM is ready
   var genuid=$("#genuid").val();
   var gentoken=$("#gentoken").val();
   $.ajax({
     url:"asset/php/function.php?act=shownsong",
     type:"POST",
     data:"uid="+genuid,
     dataType:"json",
     success:function(response){
       json=response;
       var NumOfJData = json.length;
       $("#playlist").append("<li class='list-group-item'><span><button type='button' class='song btn' value='upload/files/"+json[0]["songPath"]+"'&code="+gentoken+"'>"+json[0]["title"]+"</button></span><a  class='download' href='download.php?url="+json[0]["songPath"]+"' data-toggle='tooltip' title='Download'><span class='glyphicon glyphicon-download'></span></a></li>");
         for(var i = 1; i < NumOfJData; i++) {
           $("#playlist").append("<li class='list-group-item'><span><button type='button' class='song btn' value='play.php?url="+json[i]["songPath"]+"&code="+gentoken+"'>"+json[i]["title"]+"</button></span><a class='download' href='download.php?url="+json[i]["songPath"]+"' data-toggle='tooltip' title='Download'><span class='glyphicon glyphicon-download'></span></a></li>");

         }
     }
   });
