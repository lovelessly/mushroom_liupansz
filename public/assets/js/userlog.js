

$(document).ready(function () {


/*----------------------------
  Sign Up 
  ----------------------------*/ 
  
		$("#signUpButton").click(function(){
			var userid = $("#signup-userid").val();
			var userEmail = $("#signup-user-email").val();
			var password = $("#signup-password").val();
			var passwordCheck = $("#sign-up-password-check").val();
				if(passwordCheck = password) {
		   			$.post('./API/register.php',{'user_accountname': userid,'user_password':password,'user_emailaddress':userEmail},function(data){
		   				alert(data);
						  var t=data;  
						  var signup=eval('('+t+')');    	
				 			if(signup.status==0) {
		 						alert('Signup Successfully!');
		 						window.history.back(-1);
		 					}
		 					else {
		 						alert('The account is already existed!');

		 					}
		   			});
		   		}
		   		else{ 	
		   		 	alert("Password can not match.");
		   	  }
		});




/*----------------------------
  Login 
----------------------------*/
			
			
			
	  $("#logonButton").click(function(){
		
			var userid = $("#logon-id").val();
			var password = $("#logon-password").val();
			var remember = $('#rememberme').is(':checked');
			$.post('./API/login.php',{'user_accountname':userid,'user_password':password,},function(data){
//			alert(data);
			  var t=data;  
				var logon=eval('('+t+')'); 				    	
		 		if(logon.status==0) {
		 		  alert('Logon Successfully!');
		 		  
		 		  //Judge remember checkbox status
	  			if($('#rememberme').is(':checked')==true) {
	  				alert('Checked');
//	  			setCookie("name",userid,"s20");
	  				setCookie("name",userid);
	  				var ls=getCookie("name");
	  				
	  			}
	 		  
		 			window.history.back(-1);

		 		}
		 		else{
		 			alert('This Account does not exist!');
		 		}		    
			});


	   });
		

});


