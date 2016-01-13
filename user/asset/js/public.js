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
         for(var i = 0; i < NumOfJData; i++) {
           var name=json[i]["title"];
           if(name.length>10){
             var res="<marquee behavior='scroll' direction='left'>"+json[i]["title"]+"</marquee>";
           }else{
             var res=json[i]["title"];
           }
           var arts=json[i]["singer"];
           if(arts==null){
             var reart='null';
           }else if(name.length>10){
             var reart="<span class='hidden'>"+json[i]["singer"]+"</span>";
           }else{
             var reart=json[i]["singer"];
           }

           $("#premusic").append("<li class='list-group-item'><button type='button' class='song btn' value='play.php?url="+json[i]["songPath"]+"&code="+gentoken+"'> <span class='songtit'></span> "+res+"</button><span class='shsonglist'><span class='art hidden-xs' > "+reart+"</span> <button type='button' class='btn btn-info btn-xs musicdbtn' onclick='musicdet("+json[i]["songid"]+")' data-toggle='modal' data-target='#shmusicinfo'>Detail</button> <a class='download' href='download.php?url="+json[i]["songPath"]+"' data-toggle='tooltip' title='Download'><span class='glyphicon glyphicon-download'></span></a></span></li>");

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
         for(var i = 0; i < NumOfJData; i++) {
           var name=json[i]["title"];
           if(name.length>10){
             var res="<marquee behavior='scroll' direction='left'>"+json[i]["title"]+"</marquee>";
           }else{
             var res=json[i]["title"];
           }
           var arts=json[i]["singer"];
           if(arts==null){
             var reart='null';
           }else if(name.length>10){
             var reart="<span class='hidden'>"+json[i]["singer"]+"</span>";
           }else{
             var reart=json[i]["singer"];
           }
           $("#premusic").append("<li class='list-group-item'><button type='button' class='song btn' value='play.php?url="+json[i]["songPath"]+"&code="+gentoken+"'><span class='songtit'></span> "+res+"</button> <span class='shsonglist'><span class='art hidden-xs'> "+reart+"</span> <button type='button' class='btn btn-info btn-xs musicdbtn' onclick='musicdet("+json[i]["songid"]+")' data-toggle='modal' data-target='#shmusicinfo'>Detail</button> <a class='download' href='download.php?url="+json[i]["songPath"]+"' data-toggle='tooltip' title='Download'><span class='glyphicon glyphicon-download'></span></a></li>");

         }
     }
   })

   $.ajax({
     url:"asset/php/function.php",
     type:"POST",
     data:"act=hotsong",
     dataType:"json",
     success:function(response){
       json=response;
       var NumOfJData = json.length;
         for(var i = 0; i < NumOfJData; i++) {
           var name=json[i]["title"];
           if(name.length>10){
             var res="<marquee behavior='scroll' direction='left'>"+json[i]["title"]+"</marquee>";
           }else{
             var res=json[i]["title"];
           }
           var arts=json[i]["singer"];
           if(arts==null){
             var reart='null';
           }else if(name.length>10){
             var reart="<span class='hidden'>"+json[i]["singer"]+"</span>";
           }else{
             var reart=json[i]["singer"];
           }
           $("#pubmusic").append("<li class='list-group-item'><button type='button' class='song btn' value='play.php?url="+json[i]["songPath"]+"&code="+gentoken+"'><span class='songtit'></span> "+res+"</button> <span class='shsonglist'><span class='art hidden-xs'> "+reart+"</span> <button type='button' class='btn btn-info btn-xs musicdbtn' onclick='musicdet("+json[i]["songid"]+")' data-toggle='modal' data-target='#shmusicinfo'>Detail</button> <a class='download' href='download.php?url="+json[i]["songPath"]+"' data-toggle='tooltip' title='Download'><span class='glyphicon glyphicon-download'></span></a></li>");

         }
     }
   })

});
