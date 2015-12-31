$(document).ready(function() {
   // Stuff to do as soon as the DOM is ready


   $("#composebtn").click(function(event) {
     /* Act on the event */
     $("#inbox").hide();
     $("#compose").show();
   });

   $("#inboxbtn").click(function(event) {
     /* Act on the event */
     $("#inbox").show();
     $("#compose").hide();
   });

   $(document).on('click','#sendmailbtn',function(){
     valid();
   })
});

function valid(){
  var to=$("#tomailinput").val();
  var sub=$("#mailsubinput").val();
  var cont=CKEDITOR.instances['maileditor'].getData();
//check email valid
  var x = document.getElementById('tomailinput');
 var atpos=x.value.indexOf("@");
 var dotpos=x.value.lastIndexOf(".");
 if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length){
   $(".mailmsg").html('<div class="alert alert-warning"><strong>Error!</strong>Not a valid e-mail address! </div>');
   $("#tomailinput").css('background', 'rgba(222, 81, 81, 0.64)');
   $("#tomailinput").css('color', '#fff');
   $("#tomaillabel").addClass('label-danger');
   $("#tomaillabel").css('color', '#fff');
   $("#tomailinput").focus();
  }
//end check email valid
  if(to==""){
    $("#tomaillabel").addClass('label-warning');
    $("#tomaillabel").css('color', '#fff');
    $("#tomailinput").css('background', 'rgba(222, 81, 81, 0.64)');
    $(".mailmsg").html('<div class="alert alert-warning"><strong>Error!</strong>You can not send a mail without mail address! Mail did not send! </div>');
    $("#tomailinput").focus();
    $("#tomailinput").css('color', '#fff');
    $("#tomailinput").attr('placeholder', '');
  }else if (sub=="") {
    $("#mailsublabel").addClass('label-danger');
    $("#mailsublabel").css('color', '#fff');
    $(".mailmsg").html('<div class="alert alert-warning"><strong>Error!</strong>You can not send a mail without subject! Mail did not send! </div>');
    $("#mailsubinput").css('background', 'rgba(222, 81, 81, 0.64)');
    $("#mailsubinput").css('color', '#fff');
    $("#mailsubinput").attr('placeholder', '');
    $("#tomailinput").focus();
  }else if (cont=="") {
    $("#maileditor").addClass('label-warning');
    $(".mailmsg").html('<div class="alert alert-danger"><strong>Error!</strong> Please enter something, the mail did not send! </div>');
    alert("You can not send a mail without content!");
  }else{
    sendmail(to,sub,cont);
  }
}

function sendmail(to,sub,cont){
  var to=to;
  var sub=sub;
  var cont=cont;
  $.ajax({
    url:"asset/mail/mail.php",
    type:"POST",
    data:"act=send&to="+to+"&subject="+sub+"&content="+cont,
    success:function(response){
      if(response=="success"){
        $(".mailmsg").html('<div class="alert alert-success"> The mail has been sent! </div>');
      }else{
        $(".mailmsg").html('<div class="alert alert-danger">'+response+'</div>');
      }
    }
  })

}
