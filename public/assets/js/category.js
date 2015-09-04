$(document).ready(function () {       
   
			$.post("./API/all_merchandise.php", function(data){
			 	  alert("Data Loaded: " + data);
				  var t=data;  
				  var jsonobj=eval('('+t+')');  
		 			var starcp = eval(jsonobj.data); 
		 			

					/*  Star Product1  */

					document.getElementById("starcp1_img").src=starcp[0].cp_image;					
					document.getElementById("starcp1_discnt").innerHTML=starcp[0].cp_discount;					
					document.getElementById("starcp1_cpname").innerHTML=starcp[0].cp_name;
					document.getElementById("starcp1_descrip").innerHTML=starcp[0].cp_detail;
					document.getElementById("starcp1_price").innerHTML=starcp[0].cp_price*starcp[0].cp_discount;
					document.getElementById("starcp1_oldprice").innerHTML=starcp[0].cp_price;

					/*  Star Product2  */
					document.getElementById("starcp2_img").src=starcp[1].cp_image;
					document.getElementById("starcp2_discnt").innerHTML=starcp[1].cp_discount;
					document.getElementById("starcp2_cpname").innerHTML=starcp[1].cp_name;
					document.getElementById("starcp2_descrip").innerHTML=starcp[1].cp_detail;
					document.getElementById("starcp2_price").innerHTML=starcp[1].cp_price*starcp[1].cp_discount;
					document.getElementById("starcp2_oldprice").innerHTML=starcp[1].cp_price;					

					/*  Star Product3  */
					document.getElementById("starcp3_img").src=starcp[2].cp_image;
					document.getElementById("starcp3_discnt").innerHTML=starcp[2].cp_discount;
					document.getElementById("starcp3_cpname").innerHTML=starcp[2].cp_name;
					document.getElementById("starcp3_descrip").innerHTML=starcp[2].cp_detail;
					document.getElementById("starcp3_price").innerHTML=starcp[2].cp_price*starcp[2].cp_discount;
					document.getElementById("starcp3_oldprice").innerHTML=starcp[2].cp_price;		
					
					/*  Star Product4  */
					document.getElementById("starcp4_img").src=starcp[3].cp_image;
					document.getElementById("starcp4_discnt").innerHTML=starcp[3].cp_discount;
					document.getElementById("starcp4_cpname").innerHTML=starcp[3].cp_name;
					document.getElementById("starcp4_descrip").innerHTML=starcp[3].cp_detail;
					document.getElementById("starcp4_price").innerHTML=starcp[3].cp_price*starcp[3].cp_discount;
					document.getElementById("starcp4_oldprice").innerHTML=starcp[3].cp_price;		
					
					/*  Star Product5  */
					document.getElementById("starcp5_img").src=starcp[4].cp_image;
					document.getElementById("starcp5_discnt").innerHTML=starcp[4].cp_discount;
					document.getElementById("starcp5_cpname").innerHTML=starcp[4].cp_name;
					document.getElementById("starcp5_descrip").innerHTML=starcp[4].cp_detail;
					document.getElementById("starcp5_price").innerHTML=starcp[4].cp_price*starcp[4].cp_discount;
					document.getElementById("starcp5_oldprice").innerHTML=starcp[4].cp_price;		
					
					/*  Star Product6  */
					document.getElementById("starcp6_img").src=starcp[5].cp_image;
					document.getElementById("starcp6_discnt").innerHTML=starcp[5].cp_discount;
					document.getElementById("starcp6_cpname").innerHTML=starcp[5].cp_name;
					document.getElementById("starcp6_descrip").innerHTML=starcp[5].cp_detail;
					document.getElementById("starcp6_price").innerHTML=starcp[5].cp_price*starcp[5].cp_discount;
					document.getElementById("starcp6_oldprice").innerHTML=starcp[5].cp_price;		
	
					/*  Star Product7  */
					document.getElementById("starcp7_img").src=starcp[6].cp_image;
					document.getElementById("starcp7_discnt").innerHTML=starcp[6].cp_discount;
					document.getElementById("starcp7_cpname").innerHTML=starcp[6].cp_name;
					document.getElementById("starcp7_descrip").innerHTML=starcp[6].cp_detail;
					document.getElementById("starcp7_price").innerHTML=starcp[6].cp_price*starcp[6].cp_discount;
					document.getElementById("starcp7_oldprice").innerHTML=starcp[6].cp_price;		
									
					/*  Star Product8  */
					document.getElementById("starcp8_img").src=starcp[7].cp_image;
					document.getElementById("starcp8_discnt").innerHTML=starcp[7].cp_discount;
					document.getElementById("starcp8_cpname").innerHTML=starcp[7].cp_name;
					document.getElementById("starcp8_descrip").innerHTML=starcp[7].cp_detail;
					document.getElementById("starcp8_price").innerHTML=starcp[7].cp_price*starcp[7].cp_discount;
					document.getElementById("starcp8_oldprice").innerHTML=starcp[7].cp_price;							 

					/*  Star Product9  */
					document.getElementById("starcp9_img").src=starcp[8].cp_image;
					document.getElementById("starcp9_discnt").innerHTML=starcp[8].cp_discount;
					document.getElementById("starcp9_cpname").innerHTML=starcp[8].cp_name;
					document.getElementById("starcp9_descrip").innerHTML=starcp[8].cp_detail;
					document.getElementById("starcp9_price").innerHTML=starcp[8].cp_price*starcp[8].cp_discount;
					document.getElementById("starcp9_oldprice").innerHTML=starcp[8].cp_price;						 
					 

					
					
					   
		  });
		  
		  
	  
		  
		  
		  
		  



});

