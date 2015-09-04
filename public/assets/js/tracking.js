$(document).ready(function () {  
//	alert('tracking');
	$("#searchbutton").click(function(){
		  var trackid= $('#trackid').val();
//		  alert(trackid);
//		  	alert('1');
		  $.post("./API/traceget.php", {"ZSID":trackid},function(data){
		  		alert(data);
		  		var t=data;  
				  var jsonobj=eval('('+t+')');  
		 			var opt = eval(jsonobj.data); 

					document.getElementById("tm0").innerHTML=opt[0].opt_time;	
					document.getElementById("opt0").innerHTML=opt[0].opt_desc;			 			
					document.getElementById("tm1").innerHTML=opt[1].opt_time;	
					document.getElementById("opt1").innerHTML=opt[1].opt_desc;	
					document.getElementById("tm2").innerHTML=opt[2].opt_time;	
					document.getElementById("opt2").innerHTML=opt[2].opt_desc;	
					document.getElementById("tm3").innerHTML=opt[3].opt_time;	
					document.getElementById("opt3").innerHTML=opt[3].opt_desc;	
					document.getElementById("tm4").innerHTML=opt[4].opt_time;	
					document.getElementById("opt4").innerHTML=opt[4].opt_desc;	
					document.getElementById("tm5").innerHTML=opt[5].opt_time;	
					document.getElementById("opt5").innerHTML=opt[5].opt_desc;						
							  
		  });
});

})