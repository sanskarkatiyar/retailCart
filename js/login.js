function log_in()
{
 var email=$("#user_email").val();
 var pass=$("#user_password").val();
  $.ajax
  ({
  type:'post',
  url:'login.php',
  data:{
   log_in:"log_in",
   user_email:email,
   user_password:pass
  },
  success:function(response) {
  if(response=="success")
  {
    window.location.href="index.php";
  }
  else
  {
    
    //alert("Wrong Details");
  }
  }
  });

 return false;
}