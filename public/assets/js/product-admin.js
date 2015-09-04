$(document).ready(function () {    
     
     
			$.post("./API/all_merchandise.php", function(data){
     		 
     		  /*Get Json Object*/
			 	  alert("Data Loaded: " + data);
				  var t=data;  
				  var jsonobj=eval('('+t+')');  
		 			var cp = eval(jsonobj.data); 


      		/*Pass value to DOM*/     
					var namels=$('.name');
					var detaills=$('.detail');
					var commentnols=$('.commentno');
					var specls=$('.spec');
					var discountls=$('.discount');					
					var idls=$('.id');
					var pricels=$('.price');
					var sellnols=$('.sellno');
					var stockls=$('.stock');	

				
					for (var i=0;i<cp.length;i++) {
						//add id
						namels[i].id="cp_name"+i;
						detaills[i].id="cp_detail"+i;
						commentnols[i].id="cp_comment"+i;
						specls[i].id="cp_spec"+i;
						discountls[i].id="cp_discount"+i;
						idls[i].id="cp_id"+i;
						pricels[i].id="cp_price"+i;
						sellnols[i].id="cp_sell"+i;
						stockls[i].id="cp_stock"+i;
						alert(stockls[i].id);


            //add content
						namels[i].innerHTML=cp[i].cp_name;
						alert(cp[i].cp_name);
						detaills[i].innerHTML=cp[i].cp_detail;
						commentnols[i].innerHTML=cp[i].cp_comment;
						specls[i].innerHTML=cp[i].cp_spec;
						discountls[i].innerHTML=cp[i].cp_discount;
						idls[i].innerHTML=cp[i].cp_id;
						pricels[i].innerHTML=cp[i].cp_price;
						sellnols[i].innerHTML=cp[i].cp_selled_count;
						stockls[i].innerHTML=cp[i].cp_stock;
						
						
					}      

					
					   
		  });
		  
});