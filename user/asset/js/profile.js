
function vpro(uid){
  $.ajax({
      url:"asset/php/function.php?act=viewpro&uid="+uid,
      type:'GET',
      dataType:'json',
      success:function(response){
        if(response[0]['type']==1){
           var ttype="Free Account";
        }else if(response[0]['type']==0){
          var ttype="Block";
        }else if(response[0]['type']==2){
          var ttype="Paid Account";
        }
        if(response[0]['expDate']==null){
          var texpDate="No Expire Date";
        }else{
          var texpDate=response[0]['expDate'];
        }
        $("#vprouserid").html(response[0]['userid']);
        $("#vprofbuid").html(response[0]['fbuid']);
        $("#vproemail").html(response[0]['email']);
        $("#vproname").html(response[0]['fullname']);
        $("#protype").html(ttype);
        $("#vprogender").html(response[0]['gender']);
        $("#vproexp").html(texpDate);
        $("#vproreg").html(response[0]['regDate']);
        $("#singer").val(response[0]['fullname']);
        return false;
      }
  });
  return false;
}
