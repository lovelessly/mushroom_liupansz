$(document).ready(function () {

/*==================================
	Parallax Effect for Home page
	====================================*/


    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {} else {



        // Tiny jQuery Plugin
        // by Chris Goodchild
        $.fn.exists = function (callback) {
            var args = [].slice.call(arguments, 1);

            if (this.length) {
                callback.call(this, args);
            }

            return this;
        };

        // Usage Parallax 
        $('.parallax-image-1').exists(function () {

            //alert('1 here');
            var offsetParallax1 = $(".parallax-image-1").offset().top;
            $('.parallax-image-1').parallax("50%", offsetParallax1, 0.1, true);

        });

        $('.parallax-image-2').exists(function () {

            //alert('2 here');
            var offsetParallax2 = $(".parallax-image-2").offset().top;
            $('.parallax-image-2').parallax("50%", offsetParallax2, 0.1, true);

        });


    } // mobile userAgent end 


/*==================================
	Home Page Slider  || jQuery Cycle
	====================================*/



    $('.slider-v1').cycle({
        //Specify options
        fx: 'scrollHorz',
        //Name of transition effect 
        slides: '.slider-item',
        timeout: 5000,
        // set time for nex slide 
        speed: 1200,
        easeIn: 'easeInOutExpo',
        // easing 
        easeOut: 'easeInOutExpo',
        pager: '#pager2',
        //Selector for element to use as pager container 
    });


    $('.slider-v2').cycle({
        //Specify options
        fx: 'scrollHorz',
        //Name of transition effect 
        slides: '.slider-item',
        timeout: 5000,
        // set time for nex slide 
        speed: 1200,
        easeIn: 'easeInOutExpo',
        // easing 
        easeOut: 'easeInOutExpo',
        pager: '#pager',
        //Selector for element to use as pager container 
    });


    // show loading image
    $('#loader_img').show();

    // main image loaded 
    $('.sliderImg').load(function () {
        // hide/remove the loading image
        $('#loader_img').hide();
    });




/*----------------------------
  Sign Up 
  ----------------------------*/ 
  
		$("#signUpButton").click(function(){
			alert('yeye');
			var userid = $("#signup-userid").val();
			var userEmail = $("#signup-user-email").val();
			var password = $("#signup-password").val();
			var passwordCheck = $("#sign-up-password-check").val();
				if(passwordCheck = password) {
		   			$.post('./API/register.php',{'user_accountname': userid,'user_password':password,'user_emailaddress':userEmail},function(data){alert(data)});
		   		}
		   		else{ 	
		   		 	alert("Password can not match.");
		   	  }
		});




/*----------------------------
  Login 
----------------------------*/

		$("#logInButton").click(function(){
			alert('yeyeye');
			var userid = $("#login-user").val();
			var password = $("#login-password").val();
			if($.trim(userid) !="" && $.trim(password) != ""){
			  $.post('./API/login.php',{'user_accountname':userid,'user_password':password,},function(data){alert(data)});
	        }else{
	        	alert("");
	        }
		});


/*----------------------------
  Homepage Tracking 
----------------------------*/

	  $("#track").click(function(){
	    var trackingNumber =$("div#tracking>input").val();
	      if($.trim(trackingNumber) != ""){
	      		window.location = './track?ZSID='+trackingNumber;
	      	}else{
				window.location = './track';;
			}
	        });




  
		  

}); // end Ready

