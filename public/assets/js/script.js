//set cookie
function setCookie(name,value) 
{ 
    var Days = 30; 
    var exp = new Date(); 
    exp.setTime(exp.getTime() + Days*24*60*60*1000); 
    document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString(); 
} 


//get cookies 
function getCookie(name) 
{ 
    var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
 
    if(arr=document.cookie.match(reg))
 
        return unescape(arr[2]); 
    else 
        return null; 
} 	
	
$(document).ready(function() {


    /*==================================
	Carousel
	====================================*/

    // NEW ARRIVALS Carousel
    $("#productslider").owlCarousel({
        navigation: true,
        items: 4,
        itemsTablet: [768, 2]
    });


    // BRAND  carousel
    var owl = $(".brand-carousel");

    owl.owlCarousel({
        //navigation : true, // Show next and prev buttons
        navigation: false,
        pagination: false,
        items: 8,
        itemsTablet: [768, 4],
        itemsMobile: [400, 2]


    });

    // Custom Navigation Events
    $("#nextBrand").click(function() {
        owl.trigger('owl.next');
    })
    $("#prevBrand").click(function() {
        owl.trigger('owl.prev');
    })


    // YOU MAY ALSO LIKE  carousel

    $("#SimilarProductSlider").owlCarousel({
        navigation: true

    });


    // Home Look 2 || Single product showcase 

    // productShowCase  carousel
    var pshowcase = $("#productShowCase");

    pshowcase.owlCarousel({
        autoPlay : 4000,
        stopOnHover: true,
        navigation: false,
        paginationSpeed: 1000,
        goToFirstSpeed: 2000,
        singleItem: true,
        autoHeight: true


    });

    // Custom Navigation Events
    $("#ps-next").click(function() {
        pshowcase.trigger('owl.next');
    })
    $("#ps-prev").click(function() {
        pshowcase.trigger('owl.prev');
    })
	
	
	
	// Home Look 3 || image Slider 

    // imageShowCase  carousel
    var imageShowCase = $("#imageShowCase");

    imageShowCase.owlCarousel({
        autoPlay: 4000,
        stopOnHover: true,
        navigation: false,
        pagination: false,
        paginationSpeed: 1000,
        goToFirstSpeed: 2000,
        singleItem: true,
        autoHeight: true


    });

    // Custom Navigation Events
    $("#ps-next").click(function() {
        imageShowCase.trigger('owl.next');
    })
    $("#ps-prev").click(function() {
        imageShowCase.trigger('owl.prev');
    })


    /*==================================
	Customs Script
	====================================*/
	
	 // Product Details Modal Change large image when click thumb image
	$(".modal-product-thumb a").click(function(){
	var largeImage= $(this).find("img").attr('data-large');
	$(".product-largeimg").attr('src',largeImage);
	$(".zoomImg").attr('src',largeImage);
	});
	
    // collapse according add  active class
    $('.collapseWill').on('click', function(e) {
        $(this).toggleClass("pressed"); //you can list several class names 
        e.preventDefault();
    });

    $('.search-box .getFullSearch').on('click', function(e) {
        $('.search-full').addClass("active"); //you can list several class names 
        e.preventDefault();
    });

    $('.search-close').on('click', function(e) {
        $('.search-full').removeClass("active"); //you can list several class names 
        e.preventDefault();
    });



    // Customs tree menu script	
    $(".dropdown-tree-a").click(function() { //use a class, since your ID gets mangled
        $(this).parent('.dropdown-tree').toggleClass("open-tree active"); //add the class to the clicked element
    });
	

    // Add to Wishlist Click Event	 // Only For Demo Purpose	
	
	$('.add-fav').click(function(e) { 
        e.preventDefault();
        $(this).addClass("active"); // ADD TO WISH LIST BUTTON 
		$(this).attr('data-original-title', 'Added to Wishlist');// Change Tooltip text 
    });

    // List view and Grid view 

    $('.list-view').click(function(e) { //use a class, since your ID gets mangled
        e.preventDefault();
        $('.item').addClass("list-view"); //add the class to the clicked element
		 $('.add-fav').attr("data-placement",$(this).attr("left"));
		
		
    });

    $('.grid-view').click(function(e) { //use a class, since your ID gets mangled
        e.preventDefault();
        $('.item').removeClass("list-view"); //add the class to the clicked element
    });


    // product details color switch 
    $(".swatches li").click(function() {
        $(".swatches li.selected").removeClass("selected");
        $(this).addClass('selected');

    });
	
	// Modal thumb link selected 
    $(".modal-product-thumb a").click(function() {
        $(".modal-product-thumb a.selected").removeClass("selected");
        $(this).addClass('selected');

    });


    if (/IEMobile/i.test(navigator.userAgent)) {
        // Detect windows phone//..
        $('.navbar-brand').addClass('windowsphone');
    }



    // top navbar IE & Mobile Device fix
    var isMobile = function() {
        //console.log("Navigator: " + navigator.userAgent);
        return /(iphone|ipod|ipad|android|blackberry|windows ce|palm|symbian)/i.test(navigator.userAgent);
    };


    if (isMobile()) {
        // For  mobile , ipad, tab

    } else {
		
			
		 $(function() {

            //Keep track of last scroll
            var tshopScroll = 0;
            $(window).scroll(function(event) {
                //Sets the current scroll position
                var ts = $(this).scrollTop();
                //Determines up-or-down scrolling
                if (ts > tshopScroll) {
                    // downward-scrolling
                    $('.navbar').addClass('stuck');
             
                } else {
                    // upward-scrolling
                    $('.navbar').removeClass('stuck');
                }
				
				if (ts < 600) {
                    // downward-scrolling
                    $('.navbar').removeClass('stuck');
					//alert()
                } 
				
				
				tshopScroll = ts;
				
                //Updates scroll position
              
            });
        });
		
        

    } // end Desktop else




    /*==================================
	Parallax  
	====================================*/
    if (/iPhone|iPad|iPod/i.test(navigator.userAgent)) {
        // Detect ios User // 
        $('.parallax-section').addClass('isios');
        $('.navbar-header').addClass('isios');
    }

    if (/Android|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        // Detect Android User // 
        $('.parallax-section').addClass('isandroid');
    }

    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        // Detect Mobile User // No parallax
        $('.parallax-section').addClass('ismobile');
        $('.parallaximg').addClass('ismobile');

    } else {
        // All Desktop 
        $(window).bind('scroll', function(e) {
            parallaxScroll();
        });

        function parallaxScroll() {
            var scrolledY = $(window).scrollTop();
            $('.parallaximg').css('marginTop', '' + ((scrolledY * 0.3)) + 'px');
        }


        if ($(window).width() < 600) {} else {
            $('.parallax-image-aboutus').parallax("50%", 0, 0.2, true);
        }
    }



    /*==================================
	 Custom Scrollbar for Dropdown Cart 
	====================================*/
    $(".scroll-pane").mCustomScrollbar({
        advanced: {
            updateOnContentResize: true

        },

        scrollButtons: {
            enable: false
        },

        mouseWheelPixels: "200",
        theme: "dark-2"

    });


    $(".smoothscroll").mCustomScrollbar({
        advanced: {
            updateOnContentResize: true

        },

        scrollButtons: {
            enable: false
        },

        mouseWheelPixels: "100",
        theme: "dark-2"

    });


    /*==================================
	Custom  animated.css effect
	====================================*/

    window.onload = (function() {
        $(window).scroll(function() {
            if ($(window).scrollTop() > 86) {
                // Display something
                $('.parallax-image-aboutus .animated').removeClass('fadeInDown');
                $('.parallax-image-aboutus .animated').addClass('fadeOutUp');
            } else {
                // Display something
                $('.parallax-image-aboutus .animated').addClass('fadeInDown');
                $('.parallax-image-aboutus .animated').removeClass('fadeOutUp');


            }

            if ($(window).scrollTop() > 250) {
                // Display something
            } else {
                // Display something

            }

        })
    })


    /*=======================================================================================
	Code for equal height - // your div will never broken if text get overflow  
	========================================================================================*/

    $(function() {
        $('.thumbnail.equalheight').responsiveEqualHeightGrid(); // add class with selector class equalheight
    });

    $(function() {
        $('.featuredImgLook2 .inner').responsiveEqualHeightGrid(); // add class with selector class equalheight
    });

    $(function() {
        $('.featuredImageLook3 .inner').responsiveEqualHeightGrid(); // add class with selector class equalheight
    });
    /*=======================================================================================
	 Code for tablet device || responsive check
	========================================================================================*/


    if ($(window).width() < 989) {


        $('.collapseWill').trigger('click');

    } else {
        // ('More than 960');
    }


    $(".tbtn").click(function() {
        $(".themeControll").toggleClass("active");
    });




    /*==================================
	Global Plugin
	====================================*/

    // For stylish input check box 

    $(function() {
        $("input[type='radio'], input[type='checkbox']").ionCheckRadio();

    });


    // customs select by minimalect
    $("select").minimalect();

    // cart quantity changer sniper
    $("input[name='quanitySniper']").TouchSpin({
        buttondown_class: "btn btn-link",
        buttonup_class: "btn btn-link"
    });



    // bootstrap tooltip 
   // $('.tooltipHere').tooltip();
	$('.tooltipHere').tooltip('hide')


    /*=======================================================================================
		end  
	========================================================================================*/
	


}); // end Ready




function indexlogin(token){
	var username = $("#login-user").val();
	var password = $("#login-password").val();
	var pass = hex_sha1(hex_sha1($("#login-password").val()) + token);
	$.ajax({
                type: "POST",
                async: true, //同步执行
                url: './api/login',
                data: {'username':username, 'password':pass},
                dataType: "jsonp", //返回数据形式为json
                callback: "callback",
                success: function (result) {
                    if (result.status == 0) {                        
                        location.reload();
                    }else{
						alert('Login Faild');
					}
                },
                error: function (errorMsg) {
                    alert("不好意思，请求数据失败啦!");
                }
    });
}

function register(){
	var username = $("#register-username").val();
	var password = hex_sha1($("#register-password").val());
	var email = $("#register-email").val();
	$.ajax({
		type: "POST",
		async: true, //同步执行
		url: './api/register',
		data: {'username':username, 'password':password, 'email':email},
		dataType: "jsonp", //返回数据形式为jsonp
		callback: "callback",
		success: function (result) {
			if (result.status == 0) {
				location.reload();
			}else{
				alert('注册失败');
			}
		},
		error: function (errorMsg) {
			alert("该用户名已被注册 或 网络请求失败！");
		},
	});
}


function logout(){
	$.ajax({
		type:"GET",
		async: true, //同步执行
		url: './api/logout',
		success: function (result) {
			location.reload();
		},
		error: function (errorMsg) {
			alert("不好意思，请求数据失败啦!");
		},
	});
}

function trackjump(){
	var id = $('#trackid').val();
	if($.trim(id) != ""){
		window.location = './track?ZSID='+id;
	}else{
		window.location = './track';
	}
}

function admintracking(){
    var id = $('#trackid').val();
    if($.trim(id) != ""){
        window.location = './admin/tracking?ZSID='+id;
    }else{
        window.location = './admin/tracking';
    }
}

function previewImage(file)
 {
    var MAXWIDTH = 260;
    var MAXHEIGHT = 180;
    var div = document.getElementById('preview');
    if (file.files && file.files[0])
    {
        div.innerHTML = '<img id=imghead>';
        var img = document.getElementById('imghead');
        img.onload = function() {
            var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
            img.width = rect.width;
            img.height = rect.height;
            img.style.marginTop = rect.top + 'px';

        }
        var reader = new FileReader();
        reader.onload = function(evt) {
            img.src = evt.target.result;
        }
        reader.readAsDataURL(file.files[0]);

    }
    else
    {
        var sFilter = 'filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
        file.select();
        var src = document.selection.createRange().text;
        div.innerHTML = '<img id=imghead>';
        var img = document.getElementById('imghead');
        img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
        var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
        status = ('rect:' + rect.top + ',' + rect.left + ',' + rect.width + ',' + rect.height);
        div.innerHTML = "<div id=divhead style='width:" + rect.width + "px;height:" + rect.height + "px;margin-top:" + rect.top + "px;" + sFilter + src + "\"'></div>";

    }

}
function clacImgZoomParam(maxWidth, maxHeight, width, height) {
    var param = {
        top: 0,
        left: 0,
        width: width,
        height: height
    };
    if (width > maxWidth || height > maxHeight)
    {
        rateWidth = width / maxWidth;
        rateHeight = height / maxHeight;

        if (rateWidth > rateHeight)
        {
            param.width = maxWidth;
            param.height = Math.round(height / rateWidth);

        } else
        {
            param.width = Math.round(width / rateHeight);
            param.height = maxHeight;

        }

    }

    param.left = Math.round((maxWidth - param.width) / 2);
    param.top = Math.round((maxHeight - param.height) / 2);
    return param;

}

$(".editable").dblclick(function(){
  var input = $(this).children("input"),
      para = $(this).children("p"),
      button  = $(this).children("button")
      paraText = para.html();
    console.log(paraText)
    input.val(paraText);

    input.toggle();
    para.toggle();
    button.toggle();
  


  button.click(function(){
     var text = input.val();
     para.html(text);

    input.toggle();
    para.toggle();
    button.toggle();
  });

});


function fsubmit(){
    data = new FormData($('#form_1')[0]);
    $.ajax({
        url: '../file/productupdate',
        type: 'POST',
        data: data,
        dataType: 'JSON',
        cache: false,
        processData: false,
        contentType: false,
        success: function (result) {
            if(result.status == 0){
                alert('更新成功');
                window.location.href = window.location.protocol + '//' + window.location.host + '/admin/product?Page=1';
            }else{
                alert(result.errorMsg);
            }
        },
        error:function(errorMsg){
            alert('更新失败');
        }
    });

}

function product_id_search(){
    id = $('#product_search_id').val();
    window.location.href = window.location.protocol + '//' + window.location.host + '/admin/product' + '?CPID=' + id;
}

function product_create_submit(){
    data = new FormData($('#form_1')[0]);
    $.ajax({
        url: '../file/productcreate',
        type: 'POST',
        data: data,
        dataType: 'JSON',
        cache: false,
        processData: false,
        contentType: false,
        success: function (result) {
            if(result.status == 0){
                alert('添加成功');
                window.location.href = window.location.protocol + '//' + window.location.host + '/admin/product?Page=1';
            }else{
                alert(result.errorMsg);
            }
        },
        error:function(errorMsg){
            alert('添加失败');
        }
    });

}

function order_id_search(){
    id = $('#order_search_id').val();
    window.location.href = './admin/order' + '?OrderID=' + id;
}

function news_update_submit(){
    data = new FormData($('#form_1')[0]);
    $.ajax({
        url: '../file/newsupdate',
        type: 'POST',
        data: data,
        dataType: 'JSON',
        cache: false,
        processData: false,
        contentType: false,
        success: function (result) {
            if(result.status == 0){
                alert('更新成功');
                window.location.href = window.location.protocol + '//' + window.location.host + '/admin/news?Page=1';
            }else{
                alert(result.errorMsg);
            }
        },
        error:function(errorMsg){
            alert('更新失败');
        }
    });
}

function news_create_submit(){
    data = new FormData($('#form_1')[0]);
    $.ajax({
        url: '../file/newscreate',
        type: 'POST',
        data: data,
        dataType: 'JSON',
        cache: false,
        processData: false,
        contentType: false,
        success: function (result) {
            if(result.status == 0){
                alert('添加成功');
                window.location.href = window.location.protocol + '//' + window.location.host + '/admin/news?Page=1';
            }else{
                alert(result.errorMsg);
            }
        },
        error:function(errorMsg){
            alert('添加失败');
        }
    });

}


function gettable(id) {
    var count = 0;
    var b = new Array();
    $("#"+id).find("tr").each(function(i) {
        var tmp = new Array();
        var count_t = 0;
        $(this).find("td").each(function(j) {
            var t = $(this).text();
            if(t == ''){
                t = $(this).find("input").val();
            }
            tmp[count_t] = t;
            count_t = count_t + 1;
        });
        var key = tmp[0];
        var value = tmp[1];
        if(key != '' && key != undefined){
            b[count] = [key, value];
            count = count + 1;
        }
    });
    return b;
};

function tracking_mod_submit(){
    var postdata = gettable('infoTable');
    postdata = JSON.stringify(postdata);
    var ZSID = $('#hide_for_ZSID').html();
    $.ajax({
        url: '../api/trackingsubmit',
        type: 'POST',
        data: {ZSID:ZSID, tracking_data:postdata},
        dataType: 'JSON',
        success: function (result) {
            if(result.status == 0){
                alert('编辑成功');
                window.location.href = window.location.protocol + '//' + window.location.host + '/admin/tracking?ZSID=' + result.data;
            }else{
                alert(result.errorMsg);
            }
        },
        error:function(errorMsg){
            alert('编辑失败');
        }
    });
}

function order_edit_submit(){
    var select_val = $('#dropdown').val();
    var ddid = $('#hidden').html();
    $.ajax({
        url: '../api/updateorder',
        type: 'POST',
        data: {DDID:ddid, Order_Status:select_val},
        dataType: 'JSON',
        success: function (result) {
            if(result.status == 0){
                alert('修改成功');
                window.location.href = window.location.protocol + '//' + window.location.host + '/admin/order?Page=1';
            }else{
                alert(result.errorMsg);
            }
        },
        error:function(errorMsg){
            alert('修改失败');
        }
    });
}

function add_product_to_cart(id){
    $.ajax({
        url: '../api/updatecart',
        type: 'POST',
        data: {CPID:id, Count:-1},
        dataType: 'JSON',
        success: function (result) {
            if(result.status == 0){
                //location.reload();
                window.location.href = window.location.protocol + '//' + window.location.host + '/cart';
            }else{
                //alert(result.errorMsg);
            }
        },
        error:function(errorMsg){
        }
    });
}

function submit_cart_count_change(obj){
    var cpid = obj.id;
    var count = obj.value;
    var price = $('#price_'+cpid).attr('price');
    var totalprice = price * count;
    var diffprice = totalprice - $('#totalprice_'+cpid).attr('total-price');
    $('#totalprice_'+cpid).html('￥'+totalprice);
    $('#totalprice_'+cpid).attr('total-price',totalprice);
    var allprice = Number($('#all_price').attr('all-price')) + diffprice;
    var payprice = Number($('#total-price').attr('pay-price')) + diffprice;
    $('#all_price').html('￥'+allprice);
    $('#all_price').attr('all-price',allprice);
    $('#total-price').html('￥'+payprice);
    $('#total-price').attr('pay-price',payprice);
    $.ajax({
        url: '../api/updatecart',
        type: 'POST',
        data: {CPID:cpid, Count:count},
        dataType: 'JSON',
        success: function (result) {
            if(result.status == 0 && count == 0){
                location.reload();
                //window.location.href = window.location.protocol + '//' + window.location.host + '/admin/order?Page=1';
            }else{
                //alert(result.errorMsg);
            }
        },
        error:function(errorMsg){
        }
    });
}

function cart_delete(id){

    var diffprice = Number($('#totalprice_'+id).attr('total-price'));
    var allprice = Number($('#all_price').attr('all-price')) - diffprice;
    var payprice = Number($('#total-price').attr('pay-price')) - diffprice;
    $('#all_price').html('￥'+allprice);
    $('#all_price').attr('all-price',allprice);
    $('#total-price').html('￥'+payprice);
    $('#total-price').attr('pay-price',payprice);

    $("#tr_"+id).remove();
    
    $.ajax({
        url: '../api/updatecart',
        type: 'POST',
        data: {CPID:id, Count:0},
        dataType: 'JSON',
        success: function (result) {
            if(result.status == 0){
                //location.reload();
                //window.location.href = window.location.protocol + '//' + window.location.host + '/admin/order?Page=1';
            }else{
                alert("删除失败，请刷新页面！");
            }
        },
        error:function(errorMsg){
        }
    });
}

function order_checkout_step_1(timestamp){
    data = new FormData($('#form_1')[0]);
    $.ajax({
        url: '../api/ordercheckout',
        type: 'POST',
        data: data,
        dataType: 'JSON',
        cache: false,
        processData: false,
        contentType: false,
        success: function (result) {
            if(result.status == 0){
                window.location.href = window.location.protocol + '//' + window.location.host + '/orderdispatch?Stamp=' + timestamp;
            }else{
                alert(result.errorMsg);
            }
        },
        error:function(errorMsg){
            alert('网络异常');
        }
    });
}

function order_checkout_step_2(timestamp){
    data = new FormData($('#form_1')[0]);
    $.ajax({
        url: '../api/ordercheckout',
        type: 'POST',
        data: data,
        dataType: 'JSON',
        cache: false,
        processData: false,
        contentType: false,
        success: function (result) {
            if(result.status == 0){
                window.location.href = window.location.protocol + '//' + window.location.host + '/orderconfirm?Stamp=' + timestamp;
            }else{
                alert(result.errorMsg);
            }
        },
        error:function(errorMsg){
            alert('网络异常');
        }
    });
}

function order_checkout_step_3(timestamp){
    $.ajax({
        url: '../api/ordercheckout',
        type: 'POST',
        data: {step:3,stamp:timestamp},
        dataType: 'JSON',
        success: function (result) {
            if(result.status == 0){
                window.location.href = window.location.protocol + '//' + window.location.host + '/ordermanage';
            }else{
                alert(result.errorMsg);
            }
        },
        error:function(errorMsg){
            alert('网络异常');
        }
    });
}

function news_jump(id){
    window.location.href = window.location.protocol + '//' + window.location.host + '/newsdetail?NEWSID=' + id;
}