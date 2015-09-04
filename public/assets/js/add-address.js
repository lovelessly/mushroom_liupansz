
$(document).ready(function () {

	$('#save-address').click(function(){


		var InputName = $("#InputName").val();
		var InputCompany = $("#InputCompany").val();
		var InputAddress = $("#InputAddress").val();
		var InputAddress2 = $("#InputAddress2").val();
		var InputCity = $("#InputCity").val();
		var State = $("#State").find("option:selected").text();
		var InputZip = $("#InputZip").val();
		var InputAdditionalInformation = $("#InputAdditionalInformation").val();
		var InputMobile = $("#InputMobile").val();
		var addressAlias = $("#addressAlias").val();	
		var userid = getCookie("name");		
	
		$.post('./API/address_insert.php',{'name':InputName,'company':InputCompany,'address':InputAddress,'address2':InputAddress2,
			'city':InputCity,'province':State,'code':InputZip,'note':InputAdditionalInformation,'mobile':InputMobile,'title':addressAlias,
			'YHID':userid},function(data){
			alert(data);

			var t=data;  
		 	var address=eval('('+t+')'); 				    	
		 	if(address.status==0) {
		 		alert('Add address successfully!');
				window.location.href='http://liupansz.com/my-address.html';		 		
		 	}else{
		 		alert('Fail to add address.');
		 	}


		});

	});


		

});