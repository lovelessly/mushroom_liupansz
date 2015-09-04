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
                <li class="active">用户管理</li>
            </ul>
        </div>
    </div>
    <div class="row col-lg-9 col-md-9 col-sm-7">
        <div class="col-lg-12 col-md-12 col-sm-100000">
             <h1 class="section-title-inner"><span><i class="fa fa-list-alt"></i> 用户管理 </span></h1>

            <div class="row userInfo">
                <div class="col-xs-12 col-sm-12">
                    <table class="footable">
                        <thead>
                            <tr>
                                <th data-class="expand" data-sort-initial="true"> <span title="table sorted by this column on load">用户名</span> 
                                </th>
                                <th data-hide="phone" data-sort-ignore="true">邮箱地址</th>
                                <th data-hide="phone" data-sort-ignore="true">用户ID</th>
                                <th data-hide="phone" data-sort-ignore="true">是否管理员</th>
                                <!-- <th data-hide="phone" data-sort-ignore="true">【其他】</th>
                <th data-hide="phone" data-sort-ignore="true">【其他】</th>
                -->
                                <th data-hide="phone" data-sort-ignore="true">删除该用户</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user['用户名']}}</td>
                                <td>{{$user['电子邮箱']}}</td>
                                <td>{{$user['YHID']}}</td>@if(1 == $user['isAdmin'])
                                <td>是</td>@else
                                <td>否</td>@endif
                                <td style="text-align:center"><a href="./api/deleteuser?YHID={{$user['YHID']}}"><i class="fa fa-eject"></i></a>
                                </td>
                            </tr>
                        @endforeach
                            </tbody>
                    </table>
                </div>
                <div class="col-lg-12 clearfix">
                    <ul class="pager">
                        <li class="next pull-left"><a href="./admin"> &larr; 返回管理员</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--/row end-->
            <div class="w100 categoryFooter">
                <div class="pagination pull-left no-margin-top">
                    <ul class="pagination no-margin-top">
                    @if ($currentpage > 1)
                        <li> <a href="./admin/user?Page={{$currentpage-1}}">«</a>

                        </li>
                    @endif 
                    @for ($i = 1; $i < $totalpage+1; $i++) 
                    @if($i == $currentpage) 
                    <li class="active"><a href="./admin/user?Page={{$i}}">{{$i}}</a>
                    </li>
                    @else
                        <li> <a href="./admin/user?Page={{$i}}">{{$i}}</a>
                        </li>
                    @endif 
                    @endfor 
                    @if ($currentpage < $totalpage) 
                    <li> <a href="./admin/user?Page={{$currentpage+1}}">»</a></li>
                    @endif
                    </ul>
                </div>
                <!-- <div class="pull-right pull-right col-sm-4 col-xs-12 no-padding text-right text-left-xs">
                    <p>Showing 1–450 of 12 results</p>
        </div>
--></div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-5"></div>
    </div>
    <!--/row-->
    <div style="float:right;margin-top:50px;width:25%" class="panel panel-default">
        <div class="panel-heading">
             <h4 class="panel-title"> <a>搜索用户</a> </h4>

        </div>
        <div id="collapse2" class="panel-collapse collapse in">
            <div class="panel-body">
                <form class="form-horizontal">
                    <div class="input-group" style="margin-bottom:20px">
                        <input type="text" class="form-control" placeholder="按用户名搜索"> <span class="input-group-btn">
                        <button class="btn btn-default" type="button">搜索</button>
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
