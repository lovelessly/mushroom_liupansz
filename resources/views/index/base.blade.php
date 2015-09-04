<!DOCTYPE html>
<html lang="en">
    
    <head>
        <base href="{{Config::get('app.domain')}}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <title>六盘山珍</title>
        <!-- Bootstrap core CSS -->
        <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">
        <!-- styles needed by checkRadio -->
        <link href="assets/css/ion.checkRadio.css" rel="stylesheet">
        <link href="assets/css/ion.checkRadio.cloudy.css" rel="stylesheet">
        <!-- styles needed by mCustomScrollbar -->
        <link href="assets/css/jquery.mCustomScrollbar.css" rel="stylesheet">
        <!-- css3 animation effect for this template -->
        <link href="assets/css/animate.min.css" rel="stylesheet">

        <!-- styles needed by carousel slider -->
        <link href="assets/css/owl.carousel.css" rel="stylesheet">
        <link href="assets/css/owl.theme.css" rel="stylesheet">

        <!-- styles needed by checkRadio -->
        <link href="assets/css/ion.checkRadio.css" rel="stylesheet">
        <link href="assets/css/ion.checkRadio.cloudy.css" rel="stylesheet">

        <!-- styles needed by mCustomScrollbar -->
        <link href="assets/css/jquery.mCustomScrollbar.css" rel="stylesheet">
        <link href="assets/css/soup_index.css" rel="stylesheet">
        <script>
            paceOptions = {
                elements: true
            };
        </script>
        <script src="assets/js/pace.min.js"></script>
    </head>
    
    <body>
        <!-- Modal Login start -->
        <div class="modal signUpContent fade" id="ModalLogin" tabindex="-1" role="dialog">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                         <h3 class="modal-title-site text-center"> 登陆 </h3>

                    </div>
                    <div class="modal-body">
                        <div class="form-group login-username">
                            <div>
                                <input name="username" id="login-user" class="form-control input" size="20" placeholder="Enter Username" type="text">
                            </div>
                        </div>
                        <div class="form-group login-password">
                            <div>
                                <input name="password" id="login-password" class="form-control input" size="20" placeholder="Password" type="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <div class="checkbox login-remember">
                                    <label>
                                        <input name="rememberme" value="forever" checked="checked" type="checkbox">记住我</label>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div>
                                <input name="submit" class="btn  btn-block btn-lg btn-primary" value="LOGIN" type="submit" onclick="indexlogin('{{Session::get('tk')}}')">
                            </div>
                        </div>
                        <!--userForm-->
                    </div>
                    <div class="modal-footer">
                        <p class="text-center"><a data-toggle="modal" data-dismiss="modal" href="#ModalSignup"> 注册 </a> 
                            <!--<br> <a href=""> 忘记密码 </a> -->
                        </p>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.Modal Login -->
        <!-- Modal Signup start -->
        <div class="modal signUpContent fade" id="ModalSignup" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                         <h3 class="modal-title-site text-center"> 注册 </h3>

                    </div>
                    <div class="modal-body">
                        <div class="form-group reg-username">
                            <div>
                                <input name="login" id='register-username' class="form-control input" size="20" placeholder="Enter Username" type="text">
                            </div>
                        </div>
                        <div class="form-group reg-email">
                            <div>
                                <input name="reg" id='register-email' class="form-control input" size="20" placeholder="Enter Email" type="text">
                            </div>
                        </div>
                        <div class="form-group reg-password">
                            <div>
                                <input name="password" id='register-password' class="form-control input" size="20" placeholder="Password" type="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <div class="checkbox login-remember">
                                    <label>
                                        <input name="rememberme" id="rememberme" value="forever" checked="checked" type="checkbox">记住我</label>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div>
                                <input name="submit" class="btn  btn-block btn-lg btn-primary" value="REGISTER" type="submit" onclick="register()">
                            </div>
                        </div>
                        <!--userForm-->
                    </div>
                    <div class="modal-footer">
                        <p class="text-center"> <a data-toggle="modal" data-dismiss="modal" href="#ModalLogin"> 登陆 </a> 
                        </p>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- Fixed navbar start -->
        <div class="navbar navbar-tshop navbar-fixed-top megamenu" role="navigation">
            <div class="navbar-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6">
                            <div class="pull-left ">
                                <ul class="userMenu ">
                                    <li class="phone-number"> <a href="callto:+86{{Config::get('mushroom.contact_phone_num_2')}}"> <span> <i class="glyphicon glyphicon-phone-alt "></i></span> <span class="hidden-xs" style="margin-left:5px">{{Config::get('mushroom.contact_phone_num')}}</span> </a> 
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6 no-margin no-padding">
							<div class="pull-right">
								<ul class="userMenu">
<!--
                                    <li> <a href="account.html"><span class="hidden-xs" id="showname"> 我的账户</span> <i class="glyphicon glyphicon-user hide visible-xs "></i></a> 
									</li>
-->
									@if(Session::get('isLogin'))
									<li> <a href="" > <span class="hidden-xs">{{Session::get('User_Name')}}</span></a>
									</li>
									<li> <a onclick='logout();'><span class=""><i class="glyphicon glyphicon-log-out"></i>&nbsp;退出</span></a>
									</li>
									@else
                                    <li> <a href="userlog.html" data-toggle="modal" data-target="#ModalLogin"> <span class="hidden-xs">登陆</span> <span class="hide visible-xs "><i class="glyphicon glyphicon-log-in"></i>&nbsp;登陆</span> </a> 
                                    </li>
                                    <li class="hidden-xs"> <a href="userlog.html" data-toggle="modal" data-target="#ModalSignup"> 注册 </a> 
									</li>
									@endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.navbar-top-->
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only"> 导航 </span>  <span class="icon-bar"> </span>  <span class="icon-bar"> </span>  <span class="icon-bar"> </span> 
					</button>
					@if(Session::get('isLogin'))
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-cart">  <a href="./cart" class="dropdown-toggle"><i class="fa fa-shopping-cart colorWhite"> </i>  <span class="cartRespons colorWhite"> 购物车 </span></a>
                    </button>
                    @else
					@endif
					<a class="navbar-brand " href=""> <img src="images/logo.png" alt="TSHOP"> </a> 
                    <!-- this part for mobile -->
                </div>
                <!-- this part is duplicate from cartMenu keep it for mobile -->
                <!--/.navbar-cart-->
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"> <a href="./"> 首页 </a> 
                        </li>
                        <li class="active"> <a href="track"> 产品溯源 </a> 
                        </li>
                        <li class="active"> <a href="category"> 在线购买 </a> 
                        </li>
                        <li class="active"> <a href="news"> 市场新闻 </a> 
                        </li>
                        <!--
                        <li class="active"> <a href="#"> 农户风采 </a> 
                        </li>
                        -->
                        <li class="active"> <a href="about"> 关于我们 </a> 
                        </li>
                        
                        @if(Session::get('isAdmin'))
                        <li class="active hidden-xs"> <a href="./admin"> 管理后台 </a> 
                        </li>
                        @elseif(Session::get('isLogin'))
                        <li class="active"> <a href="./ordermanage"> 我的订单 </a> 
                        </li>
                        @endif
                    </ul>
                    <!--- this part will be hidden for mobile version -->
					<div class="nav navbar-nav navbar-right hidden-xs">
						@if(Session::get('isLogin') and false == Session::get('isAdmin'))
                        <div class="dropdown  cartMenu "> <a href="./cart" class="dropdown-toggle"> <i class="fa fa-shopping-cart"> </i> <span class="cartRespons"> 购物车 </span>  </a>
						
                            <!--/.dropdown-menu-->
                        </div>
                        @else
						@endif
                        <!--/.cartMenu-->
                        <!--/.search-box -->
                    </div>
                    <!--/.navbar-nav hidden-xs-->
                </div>
                <!--/.nav-collapse -->
            </div>
            <!--/.container -->
            <div class="search-full text-right"> <a class="pull-right search-close"> <i class=" fa fa-times-circle"> </i> </a>
                <div class="searchInputBox pull-right">
                    <input type="search" id="searchBox" data-searchurl="search?=" name="q" placeholder="请输入需要搜索的商品" class="search-input">
                    <button class="btn-nobg search-btn" type="submit"> <i class="fa fa-search"> </i> 
                    </button>
                </div>
            </div>
            <!--/.search-full-->
        </div>
        <!-- /.Fixed navbar -->
        <div style="margin-bottom: 60px;margin-top: 60px;">
			<!--yield new data -->
			@yield('content')
        </div>
        <footer style='position:fixed;bottom:0px;margin:0px;width:100%;z-index:99'>
            <div class="footer-bottom">
                <div class="container" style="margin:0;padding:0">
                    <p class="pull-left">&nbsp; &nbsp; 2015 &copy; {{Config::get('mushroom.Company_Name')}}</p>
                </div>
            </div>
        </footer>
        <!-- Le javascript==================================================- -> 

        <!-- Placed at the end of the document so the pages load faster -->
        <script type="text/javascript" src="assets/js/jquery/1.10.1/jquery-1.10.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery.parallax-1.1.js"></script>
        <script type="text/javascript" src="assets/js/helper-plugins/jquery.mousewheel.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery.mCustomScrollbar.js"></script>
        <script type="text/javascript" src="assets/js/ion-checkRadio/ion.checkRadio.min.js"></script>
		<script src="assets/js/grids.js"></script>
		<script src="assets/js/sha1.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/jquery.minimalect.min.js"></script>
        <script src="assets/js/bootstrap.touchspin.js"></script>
        <script src="assets/js/script.js"></script>
        <script src="assets/js/jquery.cycle2.min.js"></script>  
        <script src="assets/js/jquery.easing.1.3.js"></script> 
        <script src="assets/js/bootstrap.touchspin.js"></script> 
        <script src="assets/js/home.js"></script> 
    </body>

</html>
