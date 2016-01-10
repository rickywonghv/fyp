$(document).ready(function(){
/*
  $("body").on("contextmenu",function(){
           return false;
        });
  $("audio").on("contextmenu",function(){
           return false;
        });
*/
$("#albumlist").hide();
$('a').bind('copy paste ', function (e) {
       e.preventDefault();
});

$("#album").click(function(){
  $("#mainlist").hide();
  $("#albumlist").show();
  album();
  $("#album").hide();
  return false;
})
$("#home").click(function(){
  $("#mainlist").show();
  $("#albumlist").hide();
  $("#album").show();
  $("#listallalb").html("");
  return false;
})

  $("#hideuploaded").click(function(){
    $("#testplayer").hide();
    $("#freeplay").prop('class','col-md-8');
    $(".welcome").html('<span id="openuploaded" onclick=openuploaded(); >Click to open your uploaded</span>');
  })


  if($("#gentype").val()!=2){
    $("#permium").hide();
    $("#freeplay").prop('class','col-md-8');
  }
  $("#settingchpwd").click(function(){
    $("#settingmodal").modal("hide");
    $("#chpwdmodal").modal("show");
  })

  $(".backtoset").click(function(){
    $("#settingmodal").modal("show");
    $("#chpwdmodal").modal("hide");
  });

  $("#chpwdbtn").click(function(){
    var opwd=$("#opwd").val();
    var npwd=$("#npwd").val();
    var conpwd=$("#conpwd").val();
    if((opwd=="")||(npwd=="")||(conpwd=="")){
      $("#msg").html('<div class="alert alert-dismissable alert-danger"><strong>Error </strong>Please enter all </div>');
      return false;
    }else if (npwd!=conpwd) {
      $("#msg").html('<div class="alert alert-dismissable alert-warning"><strong>Error </strong>Password not match </div>');
      return false;
    }
    else{
      $.ajax({
        url:"asset/php/function.php?act=chpwd",
        type:"POST",
        dataType:"html",
        data:"opwd="+opwd+"&npwd="+npwd+"&conpwd="+conpwd,
        success:function(response){
          if(response=="success"){
            $("#msg").html('<div class="alert alert-dismissable alert-success"><strong>Success</strong>Password changed already </div>');
            $("#chpwdbtn").prop('disabled',true);
            return false;
          }else if(response=="wrongpwd"){
            $("#msg").html('<div class="alert alert-dismissable alert-danger"><strong>Error</strong> Wrong old password</div>');
            return false;
          }else if(response=="null") {
            $("#msg").html('<div class="alert alert-dismissable alert-danger"><strong>Error</strong> null</div>');
            return false;
          }
          else{
            $("#msg").html('<div class="alert alert-dismissable alert-warning"><strong>Error</strong>'+response+'</div>');
            return false;
          }
        }
      })
      return false;
    }
  })

  $('#uploadBtn').on('click', function() {
    filename=$("#uploadsong").val();
    singer=$("#singer").val();
    title=$("#title").val();
    uid=$("#uid").val();

      var file_data = $('#uploadsong').prop('files')[0];
      var form_data = new FormData();
      form_data.append('file', file_data);
      $.ajax({
                  url: 'upload/upload.php',
                  dataType: 'json',
                  cache: false,
                  contentType: false,
                  processData: false,
                  data: form_data,
                  type: 'post',
                  beforeSend:function(){
                    $("#uploadpro").prop('aria-valuenow',0);
                    $("#uploadpro").html('<img src="asset/img/loading.gif">');
                  },complete:function(){
                      $('#uploadpro').hide();
                    },
                  progress:function(per){
                    $("#uploadpro").prop('aria-valuenow',per);
                  }
                  ,success: function(response){
                    console.log(response);
                    //var resfilename=response.refilename;
                    $("#uploadmodal").modal("hide");
                    $("#musicinfomodal").modal({backdrop: 'static',keyboard: false,show:true});

                    $("#title").val(response.Title);
                    $("#singer").val(response.Artist);
                    $("#album").val(response.Album);
                    $("#infofilename").val(response.FileName);
                    if(response.Artist==null){
                      var name=$("#genname").val();
                      $("#singer").val(name);
                    }
                  }
       });
       return false;
  // }
  });

  $("#musicinfoBtn").click(function(){
    var retitle=$("#title").val();
    var resinger=$("#singer").val();
    var realbum=$("#album").val();
    var filename=$("#infofilename").val();
    var uid=$("#uid").val();
    var art=$("#artpa").val();
    if(resinger==""){
      $(".musicinfomsg").html('<div class="alert alert-dismissable alert-danger"><strong>Error! </strong> Please enter a singer </div>');
      return false;
    }else if(retitle==""){
      $(".musicinfomsg").html('<div class="alert alert-dismissable alert-danger"><strong>Error! </strong> Please enter a title </div>');
      return false;
    }else{
      $.ajax({
        url:"asset/php/uploadid.php",
        type:"POST",
        data:"title="+retitle+"&singer="+resinger+"&uid="+uid+"&path="+filename+"&album="+realbum,
        success:function(res){
          $("#musicinfomsg").html('<div class="alert alert-dismissable alert-success"><strong>Upload Successful! </strong>  has been upload! </div>');
          $("#musicinfoBtn").hide();
          $("#infofooter").html('<button type="button" class="btn btn-default infomusicclose" data-dismiss="modal">Close</button>');
          $(".infomusicclose").click(function(){
            window.location='index.php';
          })
          return false;
        }
      })
      return false;
    }

  })



$('[data-toggle="tooltip"]').tooltip();

$("#sendBtn").click(function(){
  var sub=$("#adminmsgsub").val();
  var cont=CKEDITOR.instances['adminmsgeditor'].getData()
  var uid=$("#genuid").val();
  if(sub==""){
    $("#msgcallback").html('<div class="alert alert-dismissable alert-warning"> Please enter the subject </div>');
    return false;
  }else if(cont==""){
    $("#msgcallback").html('<div class="alert alert-dismissable alert-warning"> Please enter something! </div>');
    return false;
  }else{
    $.ajax({
      url:"asset/php/function.php",
      type:"POST",
      data:"act=sdmsg&uid="+uid+"&subject="+sub+"&content="+cont,
      success:function(response){
        if(response=="success"){
          $("#msgcallback").html('<div class="alert alert-dismissable alert-success"> Your message sent already! </div>');
          $("#sendBtn").hide();
          $("#closemsg").click(function(){
            window.location='index.php';
          })
          return false;
        }else if(response=="wrong"){
          $("#msgcallback").html('<div class="alert alert-dismissable alert-danger"> Wrong </div>');
          return false;
        }else{
          alert(response);
          return false;
        }
      }
    })
  }
})


$(document).on('click', '.albumname', function(e){
  $("#albumsong").html("");
  var name=$(this).text();
  shalbsong(name);
})

})

document.onkeypress = function (event) {
  event = (event || window.event);
if (event.keyCode == 123) {
  return true;
}
}
document.onmousedown = function (event) {
event = (event || window.event);
if (event.keyCode == 123) {
return true;
}
}
document.onkeydown = function (event) {
event = (event || window.event);
if (event.keyCode == 123) {
return true;
}
}

function unloadJS(scriptName) {
  var head = document.getElementsByTagName('head').item(0);
  var js = document.getElementById(scriptName);
  js.parentNode.removeChild(js);
}

function openuploaded(){
  var name=$("#genname").val();
  var type=$("#gentype").val();
  $("#testplayer").show();
  if(type==1){
    $("#freeplay").prop('class','col-md-8');
  }else{
    $("#freeplay").prop('class','col-md-4');
  }

  $(".welcome").html('Welcome back '+name);
}
function musicdet(songid){

  $.ajax({
    url:"asset/php/function.php",
    type:"POST",
    data:"act=musicdet&songid="+songid,
    dataType:"json",
    success:function(response){
      var json=response[0]
      $("#musicinfotitle").html(json["title"]);
      $("#infosongid").html(json["songid"]);
      $("#infosongname").html(json["title"]);
      $("#infolyricist").html(json["lyricist"]);
      $("#infosinger").html(json["singer"]);
      $("#infocomposer").html(json["composer"]);
      $("#infoalbum").html(json["album"]);
      $("#infotrack").html(json["track"]);
      $("#infoyear").html(json["year"]);
      $("#infocopyright").html(json["copyright"]);
      $("#infolyrics").html(json["lyrics"]);
      $("#infouploadtime").html(json["uploadDateTime"]);
      $("#infototalplay").html(json["totalPlay"]);
      $("#infototaldownload").html(json["totalDownload"]);
      $("#infouploadUser").html(json["fullname"]);

    }
  })
}

function album(){
  $.ajax({
    url:"asset/php/function.php",
    type:"POST",
    data:"act=albumlist",
    dataType:"json",
    cache:false,
    complete:function(){
      return false;
    },
    success:function(response){
      json=response;
      var NumOfJData = json.length;
        for(var i = 0; i < NumOfJData; i++) {
          var name=json[i]["album"];
          if(name.length>20){
            var res="<marquee behavior='scroll' direction='left'>"+json[i]["album"]+"</marquee>";
          }else{
            var res=json[i]["album"];
          }
          $("#listallalb").append("<tr><td><button class='btn albumname'>"+res+"</button></td><td></td></tr>");
        }
    }
  })
return false;
}

function shalbsong(albname){
  $.ajax({
    url:"asset/php/function.php",
    type:"POST",
    data:"act=shalbsong&songname="+albname,
    dataType:"json",
    success:function(response){
      json=response;
      var NumOfJData = json.length;
        for(var i = 0; i < NumOfJData; i++) {
          //$("#listallalb").append("<tr><td><button class='btn albumname'>"+json[i]['album']+"</button></td><td></td></tr>");

          $("#albumsong").append("<tr><td><button type='button' class='song btn' value='play.php?url="+json[i]["songPath"]+"&code="+gentoken+"'> <span class='songtit'></span> "+json[i]["title"]+"</button></td><td><span class='shsonglist'><span class='art hidden-xs' > Artist:"+json[i]["singer"]+"</span></td><td> <button type='button' class='btn btn-info btn-xs musicdbtn' onclick='musicdet("+json[i]["songid"]+")' data-toggle='modal' data-target='#shmusicinfo'>Detail</button></td><td> <a class='download' href='download.php?url="+json[i]["songPath"]+"' data-toggle='tooltip' title='Download'><span class='glyphicon glyphicon-download'></span></a></span></td></tr> ");
        }
    }
  })
}
