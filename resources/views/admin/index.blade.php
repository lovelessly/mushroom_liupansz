@extends('index.base-no-top-margin') 
@section('content')
<div class="container main-container headerOffset">
  <div class="row">
    <div class="breadcrumbDiv col-lg-12">
      <ul class="breadcrumb">
        <li> <a href="./">首页</a> </li>
        <li> <a href="./admin/index">管理员</a> </li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-9 col-md-9 col-sm-7">
      <h1 class="section-title-inner"><span><i class="fa fa-wrench"></i> 管理员 </span></h1>
      <div class="row userInfo">
        <div class="col-xs-12 col-sm-12">
          <!--<p> 您已成功创建账户 </p>-->
          <h2 class="block-title-2"><span>欢迎来到管理员界面，在这里您可以管理网站相关信息</span></h2>
          <ul class="myAccountList row">
            <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4  text-center ">
              <div class="thumbnail equalheight"> <a title="Orders" href="./admin/product"><i class="fa fa-cubes"></i> 产品管理 </a> </div>
            </li>
            <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4  text-center ">
              <div class="thumbnail equalheight"> <a title="Orders" href="./admin/tracking"><i class="fa fa-barcode"></i> 溯源管理 </a> </div>
            </li>
            <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4  text-center ">
              <div class="thumbnail equalheight"> <a title="My addresses" href="./admin/order"><i  class="fa fa-book"></i> 订单管理</a> </div>
            </li>
            <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4  text-center ">
              <div class="thumbnail equalheight"> <a title="Add  address" href="./admin/content"> <i  class="fa fa-paint-brush"> </i> 内容管理</a> </div>
            </li>
            <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4  text-center ">
              <div class="thumbnail equalheight"> <a title="Personal information" href="./admin/user"><i class="fa fa-user"></i> 用户管理</a> </div>
            </li>
          </ul>
          <div class="clear clearfix"> </div>
        </div>
      </div>
      <!--/row end--> 
      
    </div>
    <div class="col-lg-3 col-md-3 col-sm-5"> </div>
  </div>
  <!--/row-->
  
  <div style="clear:both"></div>
</div>
@endsection
