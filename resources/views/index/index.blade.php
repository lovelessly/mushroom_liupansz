@extends('index.base')
@section('banner')

<div class="banner" style='z-index:0'>
  <div class="full-container">
    <div class="slider-content">
      <ul id="pager2" class="container">
      </ul>
      <!-- prev/next links --> 
      
      <span class="prevControl sliderControl"> <i class="fa fa-angle-left fa-3x "></i></span> <span class="nextControl sliderControl"> <i class="fa fa-angle-right fa-3x "></i></span>
      <div class="slider slider-v1" 
      data-cycle-swipe=true
      data-cycle-prev=".prevControl"
      data-cycle-next=".nextControl" data-cycle-loader="wait">
        <div class="slider-item slider-item-img1"> <img src="images/slider/slider0.jpg" class="img-responsive parallaximg sliderImg" alt="img"> </div>
        <div class="slider-item slider-item-img1">
          <div class="sliderInfo">
            <div class="container">
              <div class="col-lg-12 col-md-12 col-sm-12 sliderTextFull ">
                <div class="inner text-center">
                  <div class="topAnima animated">
                    <h1 class="uppercase xlarge">新闻标题</h1>
                    <h3 class="hidden-xs"> 新闻内容 </h3>
                  </div>
                 </div>
              </div>
            </div>
          </div>
          <img src="images/slider/slider1.jpg" class="img-responsive parallaximg sliderImg" alt="img"> </div>
        <!--/.slider-item-->
        
        <div class="slider-item slider-item-img2 ">
          <div class="sliderInfo">
            <div class="container">
              <div class="col-lg-12 col-md-12 col-sm-12 sliderTextFull  ">
                <div class="inner dark maxwidth500 text-center animated topAnima">
                  <div class=" ">
                    <h1 class="uppercase xlarge"> 新闻标题</h1>
                    <h3 class="hidden-xs"> 新闻内容 </h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <img src="images/slider/slider3.jpg" class="img-responsive parallaximg sliderImg" alt="img"> </div>
        <!--/.slider-item-->
        
        <div class="slider-item slider-item-img3 ">
          <div class="sliderInfo">
            <div class="container">
              <div class="col-lg-5 col-md-4 col-sm-6 col-xs-8   pull-left sliderText white hidden-xs">
                <div class="inner">
      
                  <h3 class="price "> 新闻标题</h3>
                  <p class="hidden-xs">新闻内容 </p>
                 </div>
              </div>
            </div>
          </div>
          <img src="images/slider/slider4.jpg" class="img-responsive parallaximg sliderImg"  alt="img"> </div>
        <!--/.slider-item-->
      </div>
      <!--/.slider slider-v1--> 
    </div>
    <!--/.slider-content--> 
  </div>
  <!--/.full-container--> 
</div>
<!--/.banner style1-->

@endsection
@section('content')

  <div class="row featuredPostContainer globalPadding style2">
    <h3 class="section-title style2 text-center"><span>产品溯源</span></h3>
    <!--/.productslider--> 
    <div  id="tracking" class="container main-container" style='min-height:380px'>
      <input  id = "trackingNumberInput" type="text" placeholder="请输入数字溯源码"></input>
      <button id="track" class="btn btn-sucess">查询</button>
      <div id="sample"><img src="images/barcode.png"></img></div>
    </div>
  </div>
  <!--/.featuredPostContainer--> 

<div class="parallax-section parallax-image-1">
  <div class="container">
    <div class="row ">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="parallax-content clearfix">
       </div>
      </div>
    </div>
    <!--/.row--> 
  </div>
  <!--/.container--> 
</div>
<!--/.parallax-image-1-->


<!-- Main component call to action -->  
<div class="morePost row featuredPostContainer style2 globalPaddingTop " >
    <h3 class="section-title style2 text-center"><span>明星产品</span></h3>
    <div class="container">
      <div class="row xsResponse">

		@foreach($cplist as $cp)	
        <!--/.item1-->
        <div class="item col-sm-3 col-lg-3 col-md-3 col-xs-6">
          <div class="product">
          
            <div class="image">  
          <div class="quickview">
              <a title="Quick View" href="./productdetail?CPID={{$cp['CPID']}}" class="btn btn-xs  btn-quickview" > 快速查看 </a>
             </div><a href="./productdetail?CPID={{$cp['CPID']}}"><img src="{{$cp['展示图片']}}" alt="img" class="img-responsive" id="starcp1_img" style="min-height:240px"></a>
              <div class="promotion"> 
              @if($base_time < $cp['Create_Time']) 
              <span class="new-product"> 新品</span>
              @endif 
              <span class="discount" id="starcp1_discnt">{{$cp['折扣']}}折</span> </div>
            </div>
            <div class="description">
              <h4><a href="./productdetail?CPID={{$cp['CPID']}}" id="starcp1_cpname">{{$cp['产品名称']}}</a></h4>
              <div class="grid-description">
                <p id="starcp1_descrip">{{$cp['产品简介']}}</p>
              </div>
              <div class="list-description">
                <p> 产品详细描述 </p>
              </div>
              </div>
            <div class="price"> <span id="starcp1_price">￥{{$cp['单价']}}</span> </div>
            <div class="action-control" onclick="add_product_to_cart({{$cp['CPID']}})"> <a class="btn btn-primary"> <span class="add2cart" ><i class="glyphicon glyphicon-shopping-cart"> </i> 加入购物车 </span> </a> </div>
          </div>
		</div>
 
		<!--/.item-->
		@endforeach

      </div>
      <!-- /.row -->
    </div>
    <!--/.container--> 
  </div>
  <!--/.featuredPostContainer-->
  
  <!--/.section-block--> 
  
</div>
@endsection
