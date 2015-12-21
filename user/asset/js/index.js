$(document).ready(function(){
  $("body").on("contextmenu",function(){
           return false;
        });
  $("audio").on("contextmenu",function(){
           return false;
        });

$('a').bind('copy paste ', function (e) {
       e.preventDefault();
});

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
    if(filename==""){
      $("#uploadmsg").html('<div class="alert alert-dismissable alert-danger"><strong>Error! </strong> Please choose a song to upload!</div>');
      return false;
    }else if(singer==""){
      $("#uploadmsg").html('<div class="alert alert-dismissable alert-danger"><strong>Error! </strong> Please enter a singer </div>');
      return false;
    }else if(title==""){
      $("#uploadmsg").html('<div class="alert alert-dismissable alert-danger"><strong>Error! </strong> Please enter a title </div>');
      return false;
    }
    else{
      var file_data = $('#uploadsong').prop('files')[0];
      var form_data = new FormData();
      form_data.append('file', file_data);
      $.ajax({
                  url: 'upload/show.php',
                  dataType: 'json',
                  cache: false,
                  contentType: false,
                  processData: false,
                  data: form_data,
                  type: 'post',
                  before:function(){
                    $("#processstatus").prop('aria-valuenow',0);
                  },success: function(response){
                    console.log(response);
                    var resfilename=response.refilename;
                    $.ajax({
                      url:"asset/php/uploadid.php",
                      type:"POST",
                      data:"title="+title+"&singer="+singer+"&uid="+uid+"&path="+resfilename,
                      success:function(res){
                        $("#uploadmsg").html('<div class="alert alert-dismissable alert-success"><strong>Upload Successful! </strong>  has been upload! </div>');

                        $("#closeupload").click(function(){
                          window.location='index.php';
                        });
                        return false;
                      }
                    })

                  }
       });
       return false;
    }
  });

$('[data-toggle="tooltip"]').tooltip();


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
