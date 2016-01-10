
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
         for(var i = 0; i < NumOfJData; i++) {
           var name=json[i]["title"];
           if(name.length>10){
             var res="<marquee behavior='scroll' direction='left'>"+json[i]["title"]+"</marquee>";
           }else{
             var res=json[i]["title"];
           }
           $("#playlist").append("<li class='list-group-item'><span><button type='button' class='song btn' value='play.php?url="+json[i]["songPath"]+"&code="+gentoken+"'>"+res+"</button></span> <span class='shsonglist'><a class='download' href='download.php?url="+json[i]["songPath"]+"' data-toggle='tooltip' title='Download'><span class='glyphicon glyphicon-download'></span></a><button type='button' class='btn btn-xs btn-success' onclick='songedit("+json[i]["songid"]+")'><span class='glyphicon glyphicon-edit'></span> <span class='hidden-xs'>Edit</span></button></span></li>");

         }
     }
   });
