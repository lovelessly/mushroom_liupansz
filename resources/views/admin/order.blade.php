@extends('index.base-no-top-margin') 
@section('content')
<div class="container main-container headerOffset">
  <div class="row">
    <div class="breadcrumbDiv col-lg-12">
      <ul class="breadcrumb">
        <li> <a href="./">首页</a> </li>
        <li> <a href="./admin">管理员</a> </li>
        <li class="active">订单管理</li>
      </ul>
    </div>
  </div>
  
  
  <div class="row col-lg-9 col-md-9 col-sm-7" >
    <div class="col-lg-12 col-md-12 col-sm-100000">
      <h1 class="section-title-inner"><span><i class="fa fa-list-alt"></i> 订单管理</span></h1>
      <div class="row userInfo">
        
        <div class="col-xs-12 col-sm-12">
          <table class="footable">
            <thead>
              <tr>
                <th data-class="expand" > <span title="table sorted by this column on load">订单号</span> </th>
                <th data-hide="phone,tablet" data-sort-ignore="true">商品名称</th>
                <th data-hide="phone,tablet" data-sort-ignore="true">商品数量</th>
                <th data-hide="phone,tablet" data-sort-ignore="true">商品总价</th>
                <th data-hide="phone,tablet" data-sort-ignore="true">溯源码</th>
                <th data-hide="phone,tablet" data-sort-ignore="true">用户名</th>
                <th data-hide="phone,tablet" data-sort-ignore="true">送货地址</th>
                <th data-hide="default"> 金额</th>
                <th data-hide="default" data-type="numeric"> 日期 </th>
                <th data-hide="phone" data-type="numeric"> 订单状态 </th>
                <th data-hide="phone" data-sort-ignore="true" style="text-align:center"> 编辑 </th>
                <th data-hide="phone" data-sort-ignore="true" style="text-align:center"> 删除 </th>

              </tr>
            </thead>
            <tbody>
            @foreach($orderlist as $order)
              <tr>
                <td>#{{$order['DDID']}}</td>
                <td>
                @foreach($order['product_list'] as $product)
                {{$product['产品名称']}}*{{$product['Count']}} &nbsp;
                @endforeach
                </td>
                <td>{{$order['totalcount']}}</td>
                <td>￥{{$order['金额']}}</td>
                <td>{{$order['ZSID']}}</td>
                <td>{{$order['用户名']}}</td>
                <td>{{$order['送货地址']}}</td>
                <td>￥{{$order['金额']}}</td>
                <td data-value="78025368997">{{$order['下单时间']}}</td>
                @if($order['交易状态'] == 5)
                <td data-value="1"><span class="label label-success">已完成</span></td>
                @elseif($order['交易状态'] == 4)
                <td data-value="1"><span class="label label-warning">已发货</span></td>
                @elseif($order['交易状态'] == 3)
                <td data-value="1"><span class="label label-info">已通过审核</span></td>
                @elseif($order['交易状态'] == 2)
                <td data-value="1"><span class="label label-primary">已付款</span></td>
                @elseif($order['交易状态'] == 1)
                <td data-value="1"><span class="label label-default">已下单</span></td>
                @endif
                <td style="text-align:center"><a href="./admin/orderedit?OrderID={{$order['DDID']}}"><i class="fa fa-pencil-square-o"></i></a></td>
                <td style="text-align:center"><a href="./api/orderdelete?OrderID={{$order['DDID']}}"><i class="fa fa-eject"></i></a></td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        
        <div class="col-lg-12 clearfix">
          <ul class="pager">
            <li class="next pull-left"><a href="./admin"> &larr; 返回管理员</a></li>
          </ul>
        </div>
      </div>
      <!--/row end--> 
      @if($totalpage > 1)
      <div class="w100 categoryFooter">
                <div class="pagination pull-left no-margin-top">
                    <ul class="pagination no-margin-top">
                    @if ($currentpage > 1)
                        <li> <a href="./admin/order?Page={{$currentpage-1}}">«</a>

                        </li>
                    @endif 
                    @for ($i = 1; $i < $totalpage+1; $i++) 
                    @if($i == $currentpage) 
                    <li class="active"><a href="./admin/order?Page={{$i}}">{{$i}}</a>
                    </li>
                    @else
                        <li> <a href="./admin/order?Page={{$i}}">{{$i}}</a>
                        </li>
                    @endif 
                    @endfor 
                    @if ($currentpage < $totalpage) 
                    <li> <a href="./admin/order?Page={{$currentpage+1}}">»</a></li>
                    @endif
                    </ul>
                </div>
      </div>
      @endif
      
    </div>
    <div class="col-lg-3 col-md-3 col-sm-5"> </div>
  </div>
  <!--/row-->
        <div style="float:right;margin-top:50px;width:25%" class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"> <a>搜索订单</a> </h4>
          </div>
          <div id="collapse2" class="panel-collapse collapse in">
            <div class="panel-body">
              <form class="form-horizontal">
               <div class="input-group" style="margin-bottom:20px">
                      <input id='order_search_id' type="text" class="form-control" placeholder="按单号搜索">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button" onclick="order_id_search()">搜索</button>
                      </span>

               </div>
               <!--
                <div class="input-group" style="margin-bottom:20px">
                      <input type="text" class="form-control" placeholder="按用户搜索">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button">搜索</button>
                      </span>

               </div>
               -->
  </div><!-- /.col-lg-6 -->
              </form>
            </div>
          </div>
        </div>
  
  <div style="clear:both"></div>
</div>
@endsection
