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
                <li class="active">确认收货方式</li>
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
        <div class="col-lg-9 col-md-9 col-sm-12">
            <div class="row userInfo">
                <div class="col-xs-12 col-sm-12">
                    <div class="w100 clearfix">
                        <ul class="orderStep orderStepLook2">
                            <li> <a href="checkout?Stamp={{$stamp}}"> <i class="fa fa-map-marker "></i> <span> 地址</span> </a> 
                            </li>
                            <li class="active col-lg-4 col-md-4 col-sm-12"> <a href="orderdispatch?Stamp={{$stamp}}"><i class="fa fa-truck "> </i><span>送货</span> </a> 
                            </li>
                            <li> <a href="orderconfirm?Stamp={{$stamp}}"><i class="fa fa-check-square "> </i><span>下单</span></a> 
                            </li>
                        </ul>
                        <!--/.orderStep end-->
                    </div>
                    <div class="w100 clearfix">
                        <div class="row userInfo">
                            <div class="col-lg-12">
                                 <h2 class="block-title-2"> 确认送货方式 </h2>

                            </div>
                            <div class="col-xs-12 col-sm-12">
                            <form id='form_1'>
                            <input style="display:none" name='stamp' value='{{$stamp}}'>
                            <input style="display:none" name='step' value="2">
                                <div class="w100 row">
                                    <div class="form-group col-lg-12 col-sm-12 col-md-12 -col-xs-12">
                                        <table style="width:100%" class="table-bordered table tablelook2">
                                            <tbody>
                                                <tr>
                                                    <td>运输公司</td>
                                                    <td>运输工具</td>
                                                    <td>信息</td>
                                                    <td>价格</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="radio">
                                                            <input type="radio" name="dispatcher" id="optionsRadios1" value="1" checked> <i class="fa  fa-plane fa-2x"></i>自有配送</label>
                                                    </td>
                                                    <td>空运</td>
                                                    <td>2日到达</td>
                                                    <td>免运费</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="radio">
                                                            <input type="radio" name="dispatcher" id="optionsRadios2" value="2"> <i class="fa fa-truck fa-2x"></i> 自有配送</label>
                                                    </td>
                                                    <td>陆运</td>
                                                    <td>一周到达</td>
                                                    <td>免运费</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                              </form>
                                <!--/row-->
                                <div class="cartFooter w100">
                                    <div class="box-footer">
                                        <div class="pull-left"> <a class="btn btn-default" href="checkout?Stamp={{$stamp}}"> <i class="fa fa-arrow-left"></i> &nbsp; 送货地址 </a> 
                                        </div>
                                        <div class="pull-right btn btn-primary btn-small " onclick="order_checkout_step_2({{$stamp}})"> 确认配送方式&nbsp; <i class="fa fa-arrow-circle-right"></i> 
                                        </div>
                                    </div>
                                </div>
                                <!--/ cartFooter -->
                            </div>
                        </div>
                    </div>
                    <!--/row end-->
                </div>
            </div>
        </div>
        <!--/row end-->
        <div class="col-lg-3 col-md-3 col-sm-5 rightSidebar">
            <div class="contentBox">
                <div class="w100 costDetails">
                    <div class="table-block" id="order-detail-content">
                        <div class="w100 cartMiniTable">
                            <table id="cart-summary" class="std table">
                                <tbody>
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
                                        <td>支付总额</td>
                                        <td class=" site-color" id="total-price">￥{{$payprice}}</td>
                                    </tr>
                                </tbody>
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
<!-- /main-container -->
<div class="gap"></div>
@endsection