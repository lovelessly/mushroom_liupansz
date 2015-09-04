$(document).ready(function () {



			$.post("./API/newsget.php", function(data){
//			 	  alert("Data Loaded: " + data);
				  var t=data;  
				  var jsonobj=eval('('+t+')');  
		 			var newsls = eval(jsonobj.data); 

		 			
					 
					/*  Newsls1  */
					document.getElementById("news_img1").src=newsls[0].imageurl;
					document.getElementById("news_title1").innerHTML=newsls[0].newstitle;
					document.getElementById("news_content1").innerHTML=newsls[0].newscontent;

					/*  Newsls2  */
					document.getElementById("news_img2").src=newsls[1].imageurl;
					document.getElementById("news_title2").innerHTML=newsls[1].newstitle;
					document.getElementById("news_content2").innerHTML=newsls[1].newscontent;
					
					/*  Newsls3  */
					document.getElementById("news_img3").src=newsls[2].imageurl;
					document.getElementById("news_title3").innerHTML=newsls[2].newstitle;
					document.getElementById("news_content3").innerHTML=newsls[2].newscontent;

					/*  Newsls4  */
					document.getElementById("news_img4").src=newsls[3].imageurl;
					document.getElementById("news_title4").innerHTML=newsls[3].newstitle;
					document.getElementById("news_content4").innerHTML=newsls[3].newscontent;


					/*  Newsls5  */
					document.getElementById("news_img5").src=newsls[4].imageurl;
					document.getElementById("news_title5").innerHTML=newsls[4].newstitle;
					document.getElementById("news_content5").innerHTML=newsls[4].newscontent;

					/*  Newsls6  */
					document.getElementById("news_img6").src=newsls[5].imageurl;
					document.getElementById("news_title6").innerHTML=newsls[5].newstitle;
					document.getElementById("news_content6").innerHTML=newsls[5].newscontent;

					/*  Newsls7  */
					document.getElementById("news_img7").src=newsls[6].imageurl;
					document.getElementById("news_title7").innerHTML=newsls[6].newstitle;
					document.getElementById("news_content7").innerHTML=newsls[6].newscontent;

					/*  Newsls8  */
					document.getElementById("news_img8").src=newsls[7].imageurl;
					document.getElementById("news_title8").innerHTML=newsls[7].newstitle;
					document.getElementById("news_content8").innerHTML=newsls[7].newscontent;

					   
		  });


})

