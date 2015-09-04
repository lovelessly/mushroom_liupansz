$(document).ready(function(){
/***traking****/
    $("#track").click(function(){
    	var trakingnumber = $("#trakingnumber").val();
    	$.post('./API/index.php',{"trakingnumber":trakingnumber},function(data){alert(data)});
    })
    