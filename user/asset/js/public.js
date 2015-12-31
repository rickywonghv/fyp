$(document).ready(function() {
   // Stuff to do as soon as the DOM is ready
   var genuid=$("#genuid").val();
   var gentoken=$("#gentoken").val();
   $.ajax({
     url:"asset/php/function.php?act=freesong",
     type:"POST",
     data:"uid="+genuid,
     dataType:"json",
     success:function(response){
       json=response;
       var NumOfJData = json.length;
       $("#pubmusic").append("<li class='list-group-item'><button type='button' class='song btn' value='play.php?url="+json[0]["songPath"]+"&code="+gentoken+"'><span class='songtit'></span> "+json[0]["title"]+"</button> <span class='art hidden-xs'>Artist:"+json[0]["singer"]+"</span> <button type='button' class='btn btn-info btn-xs musicdbtn' onclick='musicdet("+json[0]["songid"]+")' data-toggle='modal' data-target='#shmusicinfo'>Detail</button> <a  class='download' href='download.php?url="+json[0]["songPath"]+"' data-toggle='tooltip' title='Download'><span class='glyphicon glyphicon-download'></span></a></li>");
         for(var i = 1; i < NumOfJData; i++) {
           $("#pubmusic").append("<li class='list-group-item'><button type='button' class='song btn' value='play.php?url="+json[i]["songPath"]+"&code="+gentoken+"'> <span class='songtit'></span> "+json[i]["title"]+"</button><span class='art hidden-xs' > Artist:"+json[i]["singer"]+"</span> <button type='button' class='btn btn-info btn-xs musicdbtn' onclick='musicdet("+json[i]["songid"]+")' data-toggle='modal' data-target='#shmusicinfo'>Detail</button> <a class='download' href='download.php?url="+json[i]["songPath"]+"' data-toggle='tooltip' title='Download'><span class='glyphicon glyphicon-download'></span></a></li>");

         }
     }
   })

   $.ajax({
     url:"asset/php/function.php?act=permium",
     type:"POST",
     data:"uid="+genuid,
     dataType:"json",
     success:function(response){
       json=response;
       var NumOfJData = json.length;
       $("#premusic").append("<li class='list-group-item'><button type='button' class='song btn' value='play.php?url="+json[0]["songPath"]+"&code="+gentoken+"'><span class='songtit'></span> "+json[0]["title"]+"</button> <span class='art hidden-xs'>Artist:"+json[0]["singer"]+"</span> <button type='button' class='btn btn-info btn-xs musicdbtn' onclick='musicdet("+json[0]["songid"]+")' data-toggle='modal' data-target='#shmusicinfo'>Detail</button> <a  class='download' href='download.php?url="+json[0]["songPath"]+"' data-toggle='tooltip' title='Download'><span class='glyphicon glyphicon-download'></span></a></li>");
         for(var i = 1; i < NumOfJData; i++) {
           $("#premusic").append("<li class='list-group-item'><button type='button' class='song btn' value='play.php?url="+json[i]["songPath"]+"&code="+gentoken+"'><span class='songtit'></span> "+json[i]["title"]+"</button><span class='art hidden-xs'> Artist:"+json[i]["singer"]+"</span> <button type='button' class='btn btn-info btn-xs musicdbtn' onclick='musicdet("+json[i]["songid"]+")' data-toggle='modal' data-target='#shmusicinfo'>Detail</button> <a class='download' href='download.php?url="+json[i]["songPath"]+"' data-toggle='tooltip' title='Download'><span class='glyphicon glyphicon-download'></span></a></li>");

         }
     }
   })

});
