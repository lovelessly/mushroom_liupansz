@extends('index.base-no-top-margin') 
@section('content')
<div class="container main-container headerOffset"> 
  
  <!-- Main component call to action -->
  
  <div class="row">
    <div class="breadcrumbDiv col-lg-12">
      <ul class="breadcrumb">
        <li> <a href="./">首页</a> </li>
        <li class="./category">产品列表</li>
      </ul>
    </div>
  </div>
  <!-- /.row  -->
  
  <div class="row">   
    <!--left column-->
    <!--right column-->
    <div class="col-lg-12 col-md-12 col-sm-12">

    <!--头图部分
      <div class="w100 clearfix category-top">
        <div class="categoryImage"> <img style="height:300px; background-size:200px 300px" src="images/site/category.jpg" class="img-responsive" alt="img"> </div>
      </div>
    -->

      <!--/.category-top-->
      <!--
      <div class="row subCategoryList clearfix">
        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4  text-center ">
          <div class="thumbnail equalheight"> <a class="subCategoryThumb" href="sub-category.html"><img src="images/product/3.jpg" class="img-rounded " alt="img"> </a> <a  class="subCategoryTitle"><span> 产品类型1 </span></a></div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4  text-center">
          <div class="thumbnail equalheight"> <a class="subCategoryThumb" href="sub-category.html"><img src="images/site/casual.jpg" class="img-rounded " alt="img"> </a> <a  class="subCategoryTitle"><span> 产品类型2 </span></a></div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4  text-center">
          <div class="thumbnail equalheight"> <a class="subCategoryThumb" href="sub-category.html"><img src="images/site/shoe.jpg" class="img-rounded " alt="img"> </a> <a  class="subCategoryTitle"><span> 产品类型3 </span></a></div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4  text-center">
          <div class="thumbnail equalheight"> <a class="subCategoryThumb" href="sub-category.html"><img src="images/site/jewelry.jpg" class="img-rounded " alt="img"> </a> <a  class="subCategoryTitle"><span> 产品类型4 </span></a></div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4  text-center">
          <div class="thumbnail equalheight"> <a class="subCategoryThumb" href="sub-category.html"><img src="images/site/winter.jpg" class="img-rounded  " alt="img"> </a> <a  class="subCategoryTitle"><span> 产品类型5 </span></a></div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4  text-center">
          <div class="thumbnail equalheight"> <a class="subCategoryThumb" href="sub-category.html"><img src="images/site/Male-Fragrances.jpg" class="img-rounded " alt="img"> </a> <a  class="subCategoryTitle"><span> 产品类型5 </span></a></div>
        </div>
      </div>
      -->
      <!--/.subCategoryList-->
      
      <div class="w100 productFilter clearfix">
        <p class="pull-left"> 显示 <strong>{{$count}}</strong> 件商品 </p>
        <div class="pull-right ">
          <div class="change-view pull-right"> <a href="#" title="Grid" class="grid-view"> <i class="fa fa-th-large"></i> </a> <a href="#" title="List" class="list-view "><i class="fa fa-th-list"></i></a> </div>
        </div>
      </div>
      <!--/.productFilter-->
      <div class="row  categoryProduct xsResponse clearfix">

    @foreach($cplist as $cp)  
        <!--/.item1-->
        <div class="item col-sm-3 col-lg-3 col-md-3 col-xs-6">
          <div class="product">
          
            <div class="image">  
          <div class="quickview">
              <a title="Quick View" href="./productdetail?CPID={{$cp['CPID']}}" class="btn btn-xs  btn-quickview"  > 快速查看 </a>
             </div><a href="./productdetail?CPID={{$cp['CPID']}}"><img src="{{$cp['展示图片']}}" alt="img" class="img-responsive" id="starcp1_img" style="min-height:240px"></a>
              <div class="promotion">
              @if($base_time < $cp['Create_Time']) 
              <span class="new-product"> 新品</span>
              @endif 
              <span class="discount" id="starcp1_discnt">{{$cp['折扣']}}折</span> 
              </div>
            </div>
            <div class="description">
              <h4><a href="./productdetail?CPID={{$cp['CPID']}}" id="starcp1_cpname">{{$cp['产品名称']}}</a></h4>
              <div class="grid-description">
                <p id="starcp1_descrip">{{$cp['产品简介']}}</p>
              </div>
              <div class="list-description">
                <p> {{$cp['产品简介']}} </p>
              </div>
              </div>
            <div class="price"> <span id="starcp1_price">￥{{$cp['单价']}}</span> </div>
            <div class="action-control" onclick="add_product_to_cart({{$cp['CPID']}})"> <a class="btn btn-primary"> <span class="add2cart" ><i class="glyphicon glyphicon-shopping-cart"> </i> 加入购物车 </span> </a> </div>
          </div>
    </div>
 
    <!--/.item-->
    @endforeach 
      </div>
      <!--/.categoryProduct || product content end-->
      
      <div class="w100 categoryFooter">
        <div class="pagination pull-left no-margin-top">
          <ul class="pagination no-margin-top">
            @if ($currentpage > 1)
                        <li> <a href="category?Page={{$currentpage-1}}">«</a>
						</li>
						@endif
						@for ($i = 1; $i < $totalpage+1; $i++)
							@if($i == $currentpage)
							<li class="active"><a href="category?Page={{$i}}">{{$i}}</a>
							</li>
							@else
							<li> <a href="category?Page={{$i}}">{{$i}}</a>
							</li>
							@endif
						@endfor
						@if ($currentpage < $totalpage)
                        <li> <a href="category?Page={{$currentpage+1}}">»</a>
						</li>
						@endif
          </ul>
        </div>
      </div>
      <!--/.categoryFooter--> 
    </div>
    <!--/right column end--> 
  </div>
  <!-- /.row  --> 
</div>
<!-- /main container -->
@endsection
