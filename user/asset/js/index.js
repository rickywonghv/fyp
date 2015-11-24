$(document).ready(function(){
  $("#settingchpwd").click(function(){
    $("#settingmodal").modal("hide");
    $("#chpwdmodal").modal("show");
  })

  $(".backtoset").click(function(){
    $("#settingmodal").modal("show");
    $("#chpwdmodal").modal("hide");
  });
})
