$(document).ready(function(){
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


})
