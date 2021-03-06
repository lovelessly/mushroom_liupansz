@extends('index.base-no-top-margin')
@section('content')
<div class="container main-container headerOffset">
    <div class="row">
        <div class="breadcrumbDiv col-lg-12">
            <ul class="breadcrumb">
                <li> <a href="./">首页</a> 
                </li>
                <li> <a href="./category">产品列表</a> 
                </li>
                <li id="cpname" class="active">{{$cpinfo["产品名称"]}}</li>
            </ul>
        </div>
    </div>
    <div class="row transitionfx">
        <!-- left column -->
        <div class="col-lg-6 col-md-6 col-sm-6">
            <!-- product Image and Zoom -->
            <div class="main-image sp-wrap col-lg-12 no-padding style2 style2look2"> <a href='{{$cpinfo["展示图片"]}}'><img src='{{$cpinfo["展示图片"]}}' class="img-responsive" alt="img"></a> 
            </div>
        </div>
        <!--/ left column end -->
        <!-- right column -->
        <div class="col-lg-6 col-md-6 col-sm-5">
             <h1 class="product-title" id="cpname1">{{$cpinfo["产品名称"]}}</h1>

             <!--<h3 class="product-code">产品批号：00001</h3>-->

            <div class="product-price"> <span class="price-sales" id="price_now"> ￥{{$cpinfo["单价"]}} </span>  <!--<span class="price-standard" id="price_origin">￥40</span>-->
            </div>
            <div class="cart-actions">
                <div class="addto">
                    <button onclick="add_product_to_cart({{$cpinfo['CPID']}})" class="button btn-cart cart first" title="Add to Cart" type="button">加入购物车</button>
                </div>
                <div style="clear:both"></div>
                @if(intval($cpinfo["库存"]) > 0)
                <h3 class="incaps"><i class="fa fa fa-check-circle-o color-in"></i> 有库存 数量:{{intval($cpinfo["库存"])}}</h3><p id="cp_stock"> </p>
                @else
                 <h3 class="incaps"><i class="fa fa-minus-circle color-out"></i> 无库存</h3>
                @endif

            </div>
            <!--/.cart-actions-->
            <div class="clear"></div>
            <div class="product-tab w100 clearfix">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#details" data-toggle="tab">商品描述</a>
                    </li>
                    <li> <a href="#size" data-toggle="tab">商品规格</a>
                    </li>
                    <!--<li> <a href="#comments" data-toggle="tab">商品评价</a>
                    </li>-->
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="details">
                        {{$cpinfo["产品简介"]}}
                    </div>
                    <div class="tab-pane" id="size">
                        {{$cpinfo["规格"]}}
                    </div>
                    <!--
                    <div class="tab-pane" id="comments">
                        <table>
                            <colgroup>
                                <col style="width:33%">
                                    <col style="width:33%">
                                        <col style="width:33%">
                            </colgroup>
                            <tbody>
                                <tr>
                                    <td>xxxxxxxxx</td>
                                    <td>xxxxxxxxxxxxxxx</td>
                                    <td>xxxxxxxxx</td>
                                </tr>
                                <tr>
                                    <td>xxxxxxxxx</td>
                                    <td>xxxxxxx</td>
                                    <td>xxxxxxx</td>
                                </tr>
                                <tr>
                                    <td>xxxxxxxxx</td>
                                    <td>xxxxxxxxx</td>
                                    <td>xxxxxxxxx</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3">xxxxxxxxxx</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    -->
                </div>
                <!-- /.tab content -->
            </div>
            <!--/.product-tab-->
            <div style="clear:both"></div>
        </div>
        <!--/ right column end -->
    </div>
    <!--/.row-->
    <div style="clear:both"></div>
    <div class="gap"></div>
</div>
@endsection