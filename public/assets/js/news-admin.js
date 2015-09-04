$(document).ready(function () {

			$.post("./API/newsget.php", function(data){
				  /*Get Json Object*/
//			 	  alert("Data Loaded: " + data);
				  var t=data;  
				  var jsonobj=eval('('+t+')');  
		 			var newsls = eval(jsonobj.data); 


          /*Pass value to DOM*/
					var ls=$('.news_title');
					var datels=$('.news_date');
					for (var i=0;i<ls.length;i++) {
						ls[i].id="new_title"+i;
						datels[i].id="new_date"+i;
//						alert(newsls[i].newstitle);
						ls[i].innerHTML=newsls[i].newstitle;
						datels[i].innerHTML=newsls[i].news_mod_time;
					}


	 			 			
					 
//					/*  Newsls1  */
//					alert(newsls[0].newstitle);
//			 	  										
//					alert(newsls[1].newstitle);
//					alert(newsls[1].news_mod_time);
//					
//					document.getElementById("news_title1").innerHTML=newsls[0].newstitle;
//					document.getElementById("news_time1").innerHTML=newsls[0].news_mod_time;
//
//					/*  Newsls2  */
//
//					
//					
//					
//					document.getElementById("news_title2").innerHTML=newsls[1].newstitle;
//					document.getElementById("news_time2").innerHTML=newsls[1].news_mod_time;
//					
//					/*  Newsls3  */
//					document.getElementById("news_title3").innerHTML=newsls[2].newstitle;
//					document.getElementById("news_time3").innerHTML=newsls[2].news_mod_time;
//
//					/*  Newsls4  */
//					document.getElementById("news_title4").innerHTML=newsls[3].newstitle;
//					document.getElementById("news_time4").innerHTML=newsls[3].news_mod_time;
//
//
//					/*  Newsls5  */
//					document.getElementById("news_title5").innerHTML=newsls[4].newstitle;
//					document.getElementById("news_time5").innerHTML=newsls[4].news_mod_time;
//
//					/*  Newsls6  */
//					document.getElementById("news_title6").innerHTML=newsls[5].newstitle;
//					document.getElementById("news_time6").innerHTML=newsls[5].news_mod_time;
//
//					/*  Newsls7  */
//					document.getElementById("news_title7").innerHTML=newsls[6].newstitle;
//					document.getElementById("news_time7").innerHTML=newsls[6].news_mod_time;
//
//					/*  Newsls8  */
//					document.getElementById("news_title8").innerHTML=newsls[7].newstitle;
//					document.getElementById("news_time8").innerHTML=newsls[7].news_mod_time;
//					
//					/*  Newsls9  */
//					document.getElementById("news_title9").innerHTML=newsls[8].newstitle;
//					document.getElementById("news_time9").innerHTML=newsls[8].news_mod_time;
//
//					/*  Newsls10  */
//					document.getElementById("news_title10").innerHTML=newsls[9].newstitle;
//					document.getElementById("news_time10").innerHTML=newsls[9].news_mod_time;
//					   
		  });
		  

	


})

