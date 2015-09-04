@extends('index.base-no-top-margin') 
@section('content')
<div class="container main-container headerOffset">
  <div class="row">
    <div class="breadcrumbDiv col-lg-12">
      <ul class="breadcrumb">
        <li> <a href="./">首页</a> </li>
        <li> <a href="./admin/index">管理员</a> </li>
        <li class="active">内容管理</li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-9 col-md-9 col-sm-7">
      <h1 class="section-title-inner"><span><i class="fa fa-unlock-alt"></i> 内容管理 </span></h1>
      <div class="row userInfo">
        <div class="col-xs-12 col-sm-12">
          <ul class="myAccountList row">
            <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4  text-center ">
              <div class="thumbnail equalheight"> <a title="Orders" href="./admin/news"><i class="fa fa-newspaper-o"></i> 新闻管理 </a> </div>
			</li>
<!--
            <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4  text-center ">
              <div class="thumbnail equalheight"> <a title="My addresses" href="./admin/slider"><i  class="fa fa-file-image-o"></i> 首页图片管理</a> </div>
            </li>-->
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
