$(document).ready(function () {
    $("#signup").click(function() {	
   		var userid = $("#userid").val();
   		var password = $("#password").val();
   		var passwordcheck = $("#passwordcheck").val();
   		if(passwordcheck != password) {
   			alert("Password can not match.")
   			}
   		else{ 	
   		 	$.post('./API/register.php',{'user_accountname': userid,'user_password':password,'user_emailaddress':userid},function(data){alert(data)});
   		 	
  	  };
    });       
});

