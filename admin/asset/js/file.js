$(document).ready(function() {
   // Stuff to do as soon as the DOM is ready
   listfile();
   $("#upload").hide();
   $("#file").show();
});
$(document).on("click","#filebtn",function(){
  $("#upload").hide();
  $("#file").show();
  listfile();
  return false;
})
$(document).on("click","#uploadbtn",function(){
  $("#upload").show();
  $("#file").hide();
  $("#listallfile").html("");
  return false;
})
function getUrlVars() {
var vars = {};
var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
vars[key] = value;
});
return vars;
}

function listfile(){
  $.ajax({
    url:"asset/s3/list.php",
    dataType:"json",
    success:function(response){
      json=response;
      var NumOfJData = json.length;
      for (var i = 1; i < NumOfJData; i++) {
        var mbsize=json[i]['size']/1024/1024;
        var size=Math.round(mbsize* 1000)/1000;


        $("#listallfile").append("<tr><td><a href='https://s3-ap-southeast-1.amazonaws.com/musixcloud/"+json[i]['name']+"' >"+json[i]['name']+"</button></td><td>"+size+"<b>MB</b></td></tr>");
      }return false;
    }
  })
}

function opfile(filename){
  $.ajax({
    url:"asset/s3/list.php?act=download",
    type:"POST",
    data:'filename='+filename,
    success:function(response){

    }
  })
}
