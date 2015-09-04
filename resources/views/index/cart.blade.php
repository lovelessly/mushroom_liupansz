@extends('index.base-no-top-margin') 
@section('content')
<div class="container main-container headerOffset">
    <div class="row">
        <div class="breadcrumbDiv col-lg-12">
            <ul class="breadcrumb">
                <li> <a href="./">首页</a> 
                </li>
                <li class="active">购物车</li>
            </ul>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-7">
             <h1 class="section-title-inner"><span><i class="glyphicon glyphicon-shopping-cart"></i> 购物车 </span></h1>

        </div>
        <div class="col-lg-3 col-md-3 col-sm-5 rightSidebar">
             <h4 class="caps"><a href="./category"><i class="fa fa-chevron-left"></i> 返回商城 </a></h4>

        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-7">
            <div class="row userInfo">
                <div class="col-xs-12 col-sm-12">
                    <div class="cartContent w100">
                        <table class="cartTable table-responsive" style="width:100%">
                            <tbody>
                                <tr class="CartProduct cartTableHeader">
                                    <td style="width:15%">产品</td>
                                    <td style="width:40%">详情</td>
                                    <td style="width:10%" class="delete">&nbsp;</td>
                                    <td style="width:10%">数量</td>
                                    <td style="width:10%">折扣</td>
                                    <td style="width:15%">总计</td>
                                </tr>
                                @foreach($productlist as $product)
                                <tr class="CartProduct" id="tr_{{$product['CPID']}}">
                                    <td class="CartProductThumb">
                                        <div> <a href="{{$product['展示图片']}}"><img src="{{$product['展示图片']}}" alt="img"></a> 
                                        </div>
                                    </td>
                                    <td>
                                        <div class="CartDescription">
                                             <h4> <a href="./productdetail?CPID={{$product['CPID']}}">{{$product['产品名称']}} </a> </h4>
 <span class="size">{{$product['规格']}}</span>

                                            <div class="price" id="price_{{$product['CPID']}}" price="{{$product['单价']}}"> <span>折后价 ￥{{$product['单价']}}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="delete" onclick="cart_delete({{$product['CPID']}})"><a title="Delete"> <i class="glyphicon glyphicon-trash fa-2x"></i></a>
                                    </td>
                                    <td>
                                        <input class="quanitySniper" onchange='submit_cart_count_change(this)' id="{{$product['CPID']}}" type="text" value="{{$product['Count']}}" name="quanitySniper">
                                    </td>
                                    <td>{{$product['折扣']}}</td>
                                    <td class="price" id="totalprice_{{$product['CPID']}}" total-price="{{$product['totalprice']}}">￥{{$product['totalprice']}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!--cartContent-->
                    <div class="cartFooter w100">
                        <div class="box-footer">
                            <div class="pull-left"> <a href="./category?Page=1" class="btn btn-default"> <i class="fa fa-arrow-left"></i> &nbsp; 继续购物 </a> 
                            </div>
                            <div class="pull-right">
                                <div class="btn btn-default" onclick='location.reload();'> <i class="fa fa-undo"></i> &nbsp; 刷新购物车</div>
                            </div>
                        </div>
                    </div>
                    <!--/ cartFooter -->
                </div>
            </div>
            <!--/row end-->
        </div>
        <div class="col-lg-3 col-md-3 col-sm-5 rightSidebar">
            <div class="contentBox">
                <div class="w100 costDetails">
                    <div class="table-block" id="order-detail-content"> <a class="btn btn-primary btn-lg btn-block " title="checkout" href="./checkout" style="margin-bottom:20px"> 确认订单 &nbsp; <i class="fa fa-arrow-right"></i> </a>

                        <div class="w100 cartMiniTable">
                            <table id="cart-summary" class="std table">
                                <tbody>
                                    <tr>
                                        <td>商品总价</td>
                                        <td class="price" id='all_price' all-price="{{$totalprice}}">￥{{$totalprice}}</td>
                                    </tr>
                                    <tr style="">
                                        <td>运费</td>
                                        <td class="price"><span class="success">免运费</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>支付总额</td>
                                        <td class="site-color" id="total-price" pay-price="{{$payprice}}">￥{{$payprice}}</td>
                                    </tr>
                                </tbody>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End popular -->
        </div>
        <!--/rightSidebar-->
    </div>
    <!--/row-->
    <div style="clear:both"></div>
</div>
<!-- /.main-container -->
<div class="gap"></div>
@endsection