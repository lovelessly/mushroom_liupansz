$(document).ready(function () {

/*----------------------------
  News saved 
----------------------------*/

	$('#newssave').click(function(){
		var titlename = $('#newstitle').val();
		var content = $('#newscontent').val();
		var imgpath = document.getElementById('imgpath').innerHTML;
		
//		alert(imgpath);
		if(titlename !="" & content !="" && imgpath!=""){
				$.post('./API/newsimport.php',{'newstitle':titlename,'newscontent':content,'image':imgpath},function(data){
//					alert(data);
					t=data;
					var jsonobj = eval('('+t+')');
					if(jsonobj.status==0){
						alert("Save successfully!");
						window.location.href='http://liupansz.com/news-admin.html#';
					}else{
						alert("Save unsuccessfully!");
//						window.location.href="http://liupansz.com/news-admin.html";
					}
				});
	  }else{
	  	alert("Any Fields cannot be blank!");
	  }
	});
	
	
/*----------------------------
  News img upload 
----------------------------*/

	$('#newsimg_submit').click(function(){

//$(function(){

	
		if ($('#file').val() == '') {
			alert('Please choose an image!');
			return false;
		}
		else{

			//alert(img); 
			$.post("./API/upload_file.php",function(data){
//				alert(data);
				var t = data;
				var jsonobj_img = eval('('+t+')');	
//				alert(jsonobj_img.status);
				if (jsonobj_img.status='0'){
					document.getElementById('imgpath').innerHTML=jsonobj_img.data;
					alert('Upload sucessfully.');
				}
				else{
					alert('Upload failed.');
				}	
			});	
					

		};
	});
						
});

	

