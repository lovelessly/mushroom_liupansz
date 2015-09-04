$(document).ready(function(){
/***traking****/
    $("#mailstatus").click(function(){
    	var trakingnumber = $("mailcode").val();
    	$.post('./API/index.php',{"trakingnumber":trakingnumber},function(data){alert(data)});
    })
    
})