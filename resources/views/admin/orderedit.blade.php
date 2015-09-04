@extends('index.base-no-top-margin') 
@section('content')
<div class="container main-container headerOffset">
  <div class="row">
    <div class="breadcrumbDiv col-lg-12">
      <ul class="breadcrumb">
        <li> <a href="./">首页</a> </li>
        <li> <a href="./admin">管理员</a> </li>
        <li> <a href="./admin/order">订单管理</a> </li>
        <li>订单编辑</li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-9 col-md-9 col-sm-7">
    <div id='hidden' style="display:none">{{$orderdata['DDID']}}</div>
      <h1 class="section-title-inner"><span><i class="fa fa-pencil-square-o"></i> 订单编辑 </span></h1>
      <div class="row userInfo">
        <div class="col-xs-12 col-sm-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"> <a>订单详情</a> </h4>
          </div>
          <div id="collapse2" class="panel-collapse collapse in">
            <div class="panel-body">
               <table class="footable">
                <thead>
                  <tr>
                    <th>项目</th>
                    <th>详情</th>
                  </tr>
                </thead>
                  <tr>
                    <td>订单号</td>
                    <td>#{{$orderdata['DDID']}}</td>
                  </tr>
                  <tr>
                    <td>生成日期</td>
                    <td>{{$orderdata['下单时间']}}</td>
                  </tr>
                  <tr>
                    <td>金额</td>
                    <td>￥{{$orderdata['金额']}}</td>
                  </tr>
                  <tr>
                    <td>商品名称</td>
                    <td>
                    @foreach($orderdata['product_list'] as $product)
                    {{$product['产品名称']}}*{{$product['Count']}} <br>
                    @endforeach
                    </td>
                  </tr>
                  <tr>
                    <td>商品数量</td>
                    <td>{{$orderdata['totalcount']}}</td>
                  </tr>
                  <tr>
                    <td>商品单价</td>
                    <td>
                    @foreach($orderdata['product_list'] as $product)
                    {{$product['产品名称']}}:{{$product['单价']}}元 <br> 
                    @endforeach
                    </td>
                  </tr>
                  <tr>
                    <td>溯源码</td>
                    <td>{{$orderdata['ZSID']}}</td>
                  </tr>
                  <tr>
                    <td>用户名</td>
                    <td>{{$orderdata['用户名']}}</td>
                  </tr>
                  <tr>
                    <td>送货地址</td>
                    <td>{{$orderdata['送货地址']}}</td>
                  </tr>
                  <!--
                  <tr>
                    <td>物流单号</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>发票单位</td>
                    <td>123公司</td>
                  </tr>
                  <tr>
                    <td>付款方式</td>
                    <td>支付宝</td>
                  </tr>
                  -->
                  <tr>
                    <td>订单状态</td>
                    @if($orderdata['交易状态'] == 5)
                    <td data-value="1"><span class="label label-success">已完成</span></td>
                    @elseif($orderdata['交易状态'] == 4)
                    <td data-value="1"><span class="label label-warning">已发货</span></td>
                    @elseif($orderdata['交易状态'] == 3)
                    <td data-value="1"><span class="label label-info">已通过审核</span></td>
                    @elseif($orderdata['交易状态'] == 2)
                    <td data-value="1"><span class="label label-primary">已付款</span></td>
                    @elseif($orderdata['交易状态'] == 1)
                    <td data-value="1"><span class="label label-default">已下单</span></td>
                    @endif
                  </tr>
                  @if($orderdata['交易状态'] < 5)
                  <tr>
                    <td>更改状态</td>
                    <td>                  
                    <div class="form-group">

                      <select id="dropdown" name="selectbasic" class="form-control">
                        @if($orderdata['交易状态'] < 2 and $orderdata['交易状态'] != 1)
                        <option value="2">已付款</option>
                        @elseif($orderdata['交易状态'] < 2 and $orderdata['交易状态'] == 1)
                        <option value="1" selected="selected">已下单</option>
                        <option value="2">已付款</option>
                        @endif
                        @if($orderdata['交易状态'] < 3 and $orderdata['交易状态'] != 2)
                        <option value="3">已通过审核</option>
                        @elseif($orderdata['交易状态'] < 3 and $orderdata['交易状态'] == 2)
                        <option value="2" selected="selected">已付款</option>
                        <option value="3">已通过审核</option>
                        @endif
                        @if($orderdata['交易状态'] < 4 and $orderdata['交易状态'] != 3)
                        <option value="4">已发货</option>
                        @elseif($orderdata['交易状态'] < 4 and $orderdata['交易状态'] == 3)
                        <option value="3" selected="selected">已通过审核</option>
                        <option value="4">已发货</option>
                        @endif
                        @if($orderdata['交易状态'] < 5 and $orderdata['交易状态'] != 4)
                        <option value="5">已完成</option>
                        @elseif($orderdata['交易状态'] < 5 and $orderdata['交易状态'] == 4)
                        <option value="4" selected="selected">已发货</option>
                        <option value="5">已完成</option>
                        @endif
                      </select>

                  </div></td>
                  </tr>
                  @endif

               </table>
            </div>
          </div>
        </div>
        <div class="col-md-4">
            <button id="" name="singlebutton" class="btn btn-primary" onclick='order_edit_submit()'>保存</button>
           </div>
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
<!-- /wrapper -->
<div class="gap"> </div>
@endsection
