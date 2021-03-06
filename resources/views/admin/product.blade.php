@extends('index.base-no-top-margin') 
@section('content')
<div class="container main-container headerOffset">
    <div class="row">
        <div class="breadcrumbDiv col-lg-12">
            <ul class="breadcrumb">
                <li> <a href="./">首页</a> 
                </li>
                <li> <a href="./admin">管理员</a> 
                </li>
                <li class="active">产品管理</li>
            </ul>
        </div>
    </div>
    <div class="row col-lg-9 col-md-9 col-sm-7">
        <div class="col-lg-12 col-md-12 col-sm-100000">
             <h1 class="section-title-inner"><span><i class="fa fa-list-alt"></i> 产品管理 </span></h1>

            <div class="row userInfo">
                <div class="col-xs-12 col-sm-12">
                    <table class="footable">
                        <thead>
                            <tr>
                                <th data-class="expand" data-sort-initial="true"> <span title="table sorted by this column on load">产品名称</span> 
                                </th>
                                <th data-hide="phone,tablet" data-sort-ignore="true">简介</th>
                                <th data-hide="phone,tablet" data-sort-ignore="true">评论总数</th>
                                <th data-hide="phone,tablet" data-sort-ignore="true">规格</th>
                                <th data-hide="phone,tablet" data-sort-ignore="true">折扣</th>
                                <th data-hide="phone,tablet" data-sort-ignore="true">ID</th>
                                <th data-hide="default">单价</th>
                                <th data-hide="default" data-type="numeric">销量</th>
                                <th data-hide="phone" data-type="numeric">库存</th>
                                <th data-hide="phone" data-sort-ignore="true" style="text-align:center">编辑</th>
                                <th data-hide="phone" data-sort-ignore="true" style="text-align:center">删除</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($products as $product)
                            <tr>
                                <td>{{$product['产品名称']}}</td>
                                <td>{{$product['产品简介']}}</td>
                                <td>{{$product['评论总数']}}</td>
                                <td>{{$product['规格']}}</td>
                                <td>{{$product['折扣']}}</td>
                                <td>{{$product['CPID']}}</td>
                                <td>{{$product['单价']}}</td>
                                <td>{{$product['总销售量']}}</td>
                                <td>{{$product['库存']}}</td>
                                <td style="text-align:center"><a href="./admin/productedit?CPID={{$product['CPID']}}"><i class="fa fa-pencil-square-o"></i></a></td>
                                <td style="text-align:center"><a href="./api/productdelete?CPID={{$product['CPID']}}"><i class="fa fa-eject"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-lg-12 clearfix">
                    <ul class="pager">
                        <li class="next pull-left" ><a href="./admin/productcreate">新建产品</a>
                        </li>
                        <li class="next pull-left" style="margin-left:20px;"><a href="./admin"> &larr; 返回管理员</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--/row end-->
            @if($totalpage > 1)
            <div class="w100 categoryFooter">
                <div class="pagination pull-left no-margin-top">
                    <ul class="pagination no-margin-top">
                    @if ($currentpage > 1)
                        <li> <a href="./admin/product?Page={{$currentpage-1}}">«</a>

                        </li>
                    @endif 
                    @for ($i = 1; $i < $totalpage+1; $i++) 
                    @if($i == $currentpage) 
                    <li class="active"><a href="./admin/product?Page={{$i}}">{{$i}}</a>
                    </li>
                    @else
                        <li> <a href="./admin/product?Page={{$i}}">{{$i}}</a>
                        </li>
                    @endif 
                    @endfor 
                    @if ($currentpage < $totalpage) 
                    <li> <a href="./admin/product?Page={{$currentpage+1}}">»</a></li>
                    @endif
                    </ul>
                </div>
                <!-- <div class="pull-right pull-right col-sm-4 col-xs-12 no-padding text-right text-left-xs">
                    <p>Showing 1–450 of 12 results</p>
        </div>
--></div>
@endif
        </div>
        <div class="col-lg-3 col-md-3 col-sm-5"></div>
    </div>
    <!--/row-->
    <!-- 搜索 -->
    <div style="float:right;margin-top:50px;width:25%" class="panel panel-default">
        <div class="panel-heading">
             <h4 class="panel-title"> <a>搜索产品</a> </h4>

        </div>
        <div id="collapse2" class="panel-collapse collapse in">
            <div class="panel-body">
                <form class="form-horizontal">
                <!--
                    <div class="input-group" style="margin-bottom:20px">
                        <input type="text" class="form-control" placeholder="按名称搜索"> <span class="input-group-btn">
                        <button class="btn btn-default" type="button">搜索</button>
                      </span>

                    </div>
                -->
                    <div class="input-group" style="margin-bottom:20px">
                        <input id='product_search_id'type="text" class="form-control" placeholder="按ID搜索"> <span class="input-group-btn">
                        <button class="btn btn-default" type="button" onclick="product_id_search();">搜索</button>
                      </span>

                    </div>
            </div>
            <!-- /.col-lg-6 -->
            </form>
        </div>
    </div>
</div>
<div style="clear:both"></div>
</div>
@endsection
