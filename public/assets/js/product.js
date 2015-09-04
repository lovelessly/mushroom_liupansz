$(document).ready(function () {    
   
			$.post("./API/merchandise.php",{'CPID':'1'}, function(data){
			 	  alert("Data Loaded: " + data);
				  var t=data;  
				  var jsonobj=eval('('+t+')');  
		 			var cp = eval(jsonobj.data); 
		 			alert(cp.cp_stock);

					document.getElementById("cpname").innerHTML=cp.cp_name;	
					document.getElementById("cpname1").innerHTML=cp.cp_name;	
				  document.getElementById("price_now").innerHTML=cp.cp_price;
					document.getElementById("price_origin").innerHTML=cp.cp_price/cp.cp_discount;				
			//		document.getElementById("cp_detail").innerHTML=cp.cp_detail;					
					document.getElementById("cp_stock").innerHTML=cp.cp_stock;
					document.getElementById("details").innerHTML=cp.cp_detail;
					document.getElementById("size").innerHTML=cp.cp_spec;
					document.getElementById("comments").innerHTML=cp.cp_comment;


					
					   
		  });
		  
		  
	  
		  
		  
		  
		  



});

