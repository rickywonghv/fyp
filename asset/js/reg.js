$(document).ready(function(){
  $("#regbtn").click(function(){
    var regemail=$("#regemail").val();
    if(regemail==""){
      $("#regmsg").html('<div class="alert alert-danger"><strong>Error!</strong>Please enter your Email</div>');
      return false; //check value is it null
    }else{
      //start ajax
      $.ajax({
        type:"POST",
        url:"asset/php/newmail.php",
        data:"formemail="+regemail,
        success:function(response){
          if(response=="success"){
            $("#regmsg").html('<div class="alert alert-success"><strong>Successful!</strong>The activation email has been send to '+regemail+' </div>');
            $("#regbtn").prop('disabled', true);
            return false;
          }else if(response=="notact"){
            $("#regmsg").html('<div class="alert alert-warning"><strong>Warning!</strong>You email has been register, but did not activate.</div>');
            $("#regbtn").prop('disabled', true);
            return false;
          }else if(response=="already"){
            $("#regmsg").html('<div class="alert alert-success"><strong></strong>Your email has been register,please login or choose another email.</div>');
            return false;
          }else if(response=="inv"){
            $("#regmsg").html('<div class="alert alert-danger"><strong>Error!</strong> Invalid</div>');
            return false;
          }
          else{
            $("#regmsg").html('<div class="alert alert-danger"><strong>Error!</strong>'+response+'</div>');
            return false;
          }
        }
      })
      return false;
      //end reg ajax
    }
  })
})
