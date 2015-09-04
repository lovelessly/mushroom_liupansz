@extends('index.base-no-top-margin') 
@section('content')
<div class="container main-container headerOffset">
    <div class="row">
        <div class="breadcrumbDiv col-lg-12">
            <ul class="breadcrumb">
                <li> <a href="./">首页</a> 
                </li>
                <li> <a href="./cart">购物车</a> 
                </li>
                <li class="active">确认订单</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-7">
             <h1 class="section-title-inner"><span><i class="glyphicon glyphicon-shopping-cart"></i>确认收货方式</span></h1>

        </div>
        <div class="col-lg-3 col-md-3 col-sm-5 rightSidebar">
             <h4 class="caps"><a href="./category"><i class="fa fa-chevron-left"></i>返回商城</a></h4>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row userInfo">
                <div class="col-xs-12 col-sm-12">
                    <div class="w100 clearfix">
                        <ul class="orderStep orderStepLook2">
                            <li > <a href="checkout?Stamp={{$stamp}}"> <i class="fa fa-map-marker "></i> <span> 地址</span> </a> 
                            </li>
                            <li> <a href="orderdispatch?Stamp={{$stamp}}"><i class="fa fa-truck "> </i><span>送货</span> </a> 
                            </li>
                            <li class="active col-lg-4 col-md-4 col-sm-12"> <a href="orderconfirm?Stamp={{$stamp}}"><i class="fa fa-check-square "> </i><span>下单</span></a> 
                            </li>
                        </ul>
                        <!--/.orderStep end-->
                    </div>
                    <div class="w100 clearfix">
                        <div class="row userInfo">
                            <div class="col-lg-12">
                                 <h2 class="block-title-2"> 订单详情 </h2>

                            </div>
                            <div class="col-xs-12 col-sm-12">
                                <div class="cartContent w100 checkoutReview ">
                                    <table class="cartTable table-responsive" style="width:100%">
                                        <tbody>
                                            <tr class="CartProduct cartTableHeader">
                                                <th style="width:15%">产品</th>
                                                <th class="checkoutReviewTdDetails">详情</th>
                                                <th style="width:10%">单价</th>
                                                <th class="hidden-xs" style="width:5%">数量</th>
                                                <th class="hidden-xs" style="width:10%">折扣</th>
                                                <th style="width:15%">总计</th>
                                            </tr>
                                            @foreach($preorder_array['product'] as $product)
                                            <tr class="CartProduct">
                                                <td class="CartProductThumb">
                                                    <div> <a href="{{$product['展示图片']}}"><img src="{{$product['展示图片']}}"></a> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="CartDescription">
                                                         <h4> <a href="productdetail?CPID={{$product['CPID']}}">{{$product['产品名称']}}</a> </h4>
                                                         <span class="size">{{$product['规格']}}</span>
                                                    </div>
                                                </td>
                                                <td class="delete">
                                                    <div class="price ">￥{{$product['单价']}}</div>
                                                </td>
                                                <td class="hidden-xs">{{$product['Count']}}</td>
                                                <td class="hidden-xs">{{$product['折扣']}}</td>
                                                <td class="price">￥{{$product['totalprice']}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!--cartContent-->
                                <div class="w100 costDetails">
                                    <div class="table-block" id="order-detail-content">
                                        <table class="std table" id="cart-summary">
                                            <tr>
                                                <td>商品总价</td>
                                                <td class="price">￥{{$totalprice}}</td>
                                            </tr>
                                            <tr style="">
                                                <td>运费</td>
                                                <td class="price"><span class="success">免运费</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>总价</td>
                                                <td id="total-price" class="price">￥{{$payprice}}</td>
                                            </tr>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--/costDetails-->
                                <!--/row-->
                            </div>
                        </div>
                    </div>
                    <!--/row end-->
                    <div class="cartFooter w100">
                        <div class="box-footer">
                            <div class="pull-left"> <a class="btn btn-default" href="./orderdispatch?Stamp={{$stamp}}">
                    <i class="fa fa-arrow-left"></i> &nbsp; 配送方式 </a> 
                            </div>
                            <div class="pull-right btn btn-primary btn-small " onclick="order_checkout_step_3({{$stamp}})"> 确认订单 &nbsp; <i class="fa fa-check"></i>

                            </div>
                        </div>
                    </div>
                    <!--/ cartFooter -->
                </div>
            </div>
        </div>
        <!--/row end-->
    </div>
    <!--/row-->
    <div style="clear:both"></div>
</div>
<!-- /main-container -->
<div class="gap"></div>@endsection