$(document).ready(function () {    
    $("#signin").click(function() {
   		var userid = $("#userid").val();
   		var password = $("#password").val();
   		$.post('./API/login.php',{'user_accountname':userid,'user_password':password,},function(data){alert(data)});
    }); 
});