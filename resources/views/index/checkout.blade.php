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
                <li class="active">结账</li>
            </ul>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-7">
             <h1 class="section-title-inner"><span><i class="glyphicon glyphicon-shopping-cart"></i>结账</span></h1>

        </div>
        <div class="col-lg-3 col-md-3 col-sm-5 rightSidebar">
             <h4 class="caps"><a href="./category"><i class="fa fa-chevron-left"></i>返回商城</a></h4>

        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12">
            <div class="row userInfo">
                <div class="col-xs-12 col-sm-12">
                    <div class="w100 clearfix">
                        <ul class="orderStep orderStepLook2">
                            <li class="active col-lg-4 col-md-4 col-sm-12"> <a href="checkout?Stamp={{$stamp}}"> <i class="fa fa-map-marker "></i> <span> 地址</span> </a> 
                            </li>
                            <li> <a href="orderdispatch?Stamp={{$stamp}}"><i class="fa fa-truck "> </i><span>送货</span> </a> 
                            </li>
                            <li> <a href="orderconfirm?Stamp={{$stamp}}"><i class="fa fa-check-square "> </i><span>下单</span></a> 
                            </li>
                        </ul>
                        <!--/.orderStep end-->
                    </div>
                    <div class="w100 clearfix">
                        <div class="row userInfo">
                            <div class="col-lg-12">
                                 <h2 class="block-title-2"> 添加新地址 </h2>

                            </div>
                            <form id='form_1'>
                            <input style="display:none" name='stamp' value='{{$stamp}}'>
                            <input style="display:none" name='step' value='1'>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group required">
                                        <label for="InputName">姓名<sup>*</sup> 
                                        </label>
                                        <input required type="text" class="form-control" id="InputName" name="reciever_name" value="{{$preorder_array['reciever_name'] or ''}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="InputEmail">邮箱</label>
                                        <input type="text" class="form-control" id="InputEmail" name="email" value="{{$preorder_array['email'] or ''}}">
                                    </div>
                                    <div class="form-group required">
                                        <label for="InputAddress">街道地址<sup>*</sup> 
                                        </label>
                                        <input required type="text" class="form-control" id="InputAddress" name="address_1" value="{{$preorder_array['address_1'] or ''}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="InputAddress2">街道地址（第二行）</label>
                                        <input type="text" class="form-control" id="InputAddress2" name="address_2" value="{{$preorder_array['address_2'] or ''}}">
                                    </div>
                                    <div class="form-group required">
                                        <label for="InputCity">城市 <sup>*</sup> 
                                        </label>
                                        <input required type="text" class="form-control" id="InputCity" name="city" value="{{$preorder_array['city'] or ''}}">
                                    </div>
                                    <div class="form-group required">
                                        <label for="InputState">省份<sup>*</sup> 
                                        </label>
                                        <input required type="text" class="form-control" id="InputProvince" name="province" value="{{$preorder_array['province'] or ''}}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group required">
                                        <label for="InputZip">邮编 <sup>*</sup> 
                                        </label>
                                        <input required type="text" class="form-control" id="InputZip" name="code" value="{{$preorder_array['code'] or ''}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="InputAdditionalInformation">留言</label>
                                        <textarea rows="3" cols="26" name="tips" class="form-control" id="InputAdditionalInformation" value="{{$preorder_array['tips'] or ''}}">{{$preorder_array['tips'] or ''}}</textarea>
                                    </div>
                                    <div class="form-group required">
                                        <label for="InputMobile">手机 <sup>*</sup>
                                        </label>
                                        <input required type="tel" name="mobile" class="form-control" id="InputMobile" value="{{$preorder_array['mobile'] or ''}}">
                                    </div>
                                    <!-- <div class="form-group required">
                    <label for="addressAlias">请为这个地址命名<sup>*</sup></label>
                    <input required type="text" value="家庭地址/公司地址" name="addressAlias" class="form-control" id="addressAlias">
                  </div>
                  --></div>
                            </form>
                        </div>
                        <!--/row end-->
                    </div>
                    <div class="cartFooter w100">
                        <div class="box-footer">
                            <div class="pull-left"> <a class="btn btn-default" href="./category"> <i class="fa fa-arrow-left"></i> &nbsp; 返回商城 </a> 
                            </div>
                            <div class="pull-right">
                                <div class="btn btn-primary btn-small" onclick="order_checkout_step_1({{$stamp}})">送货 &nbsp; <i class="fa fa-arrow-circle-right"></i> 
                                </div>
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
<!-- /.main-container-->
<div class="gap"></div>
@endsection