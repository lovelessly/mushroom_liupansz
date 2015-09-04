$(document).ready(function () {
	
	var userid = getCookie("name");	
	$.post("./API/address_get.php", {'YHID':userid},function(data){
		  /*Get Json Object*/
//		 	  alert("Data Loaded: " + data);
		  var t=data;  
		  var jsonobj=eval('('+t+')');  
			var addressls = eval(jsonobj.data); 
	
	
	     /*Pass value to DOM*/
			var namels=$('.address-name');
			var companyls=$('.address-company');
			var line1ls=$('.address-line1');
			var line2ls=$('.address-line2');
			var mobilels=$('.address-mobile');
			var phonels=$('.address-phone');
			
			for (var i=0;i<addressls.length;i++) {
			  namels[i].id="address-name"+i;
			  companyls[i].id='address-company'+i;
			  line1ls[i].id='address-line1'+i;
			  line2ls[i].id='address-line2'+i;
			  mobilels[i].id='address-mobile'+i;
		  	phonels[i].id='address-phone'+i;	
				

			  namels[i].innerHTML=addressls[i].\u59d3\u540d;
			  companyls[i].innerHTML=addressls[i].\u516c\u53f8;
			  line1ls[i].innerHTML=addressls[i].\u5730\u5740+', '+addressls[i].\u5730\u57402;
			  line2ls[i].innerHTML=addressls[i].\u7701\u4f1a+', '+addressls[i].\u57ce\u5e02;
			  mobilels[i].innerHTML=addressls[i].\u8054\u7cfb\u53f7\u7801;
		  	phonels[i].innerHTML=addressls[i].\u8054\u7cfb\u53f7\u7801;	//				

			}


	 			 			

					   
	});

})

