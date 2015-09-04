@extends('index.base-no-top-margin')
@section('content')
<div class="container main-container headerOffset">
    <div class="row">
        <div class="breadcrumbDiv col-lg-12">
            <ul class="breadcrumb">
                <li> <a href="../"> 首页 </a> 
                </li>
                <li> <a href="./track">产品溯源</a> 
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-7">
             <h1 class="section-title-inner"> <span> <i class="fa fa-barcode"></i> 输入数字溯源码</span> </h1>

            <div class="row userInfo">
                <div class="col-xs-12 col-sm-12">
                    <p>请在产品包装标签条形码下方找到溯源码</p>
                    <div role="form">
                        <div class="form-group">
                            <input id="trackid" type="text" class="form-control" placeholder="溯源码">
                        </div>
                        <button id="searchbutton" type="submit" class="btn   btn-primary" onclick="trackjump();"> <i class="fa fa-search"></i> 查询</button>
                    </div>

                    <div class="clear clearfix" style="margin-top:20px">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title"> <a>溯源信息</a> </h4>
                          </div>
                          <div id="collapse2" class="panel-collapse collapse in">
                            <div class="panel-body">
                               <table id="infoTable" class="footable">
                                <thead>
                                  <tr>
                                    <th>时间</th>
                                    <th>操作描述</th>
                                  </tr>
                                </thead>
                                  <tr>
                                  @foreach($tracking_list as $record)
                                    <td class="tm">{{$record['Opt_Time']}}</td>
                                    <td>{{$record['描述']}}</td>
                                  </tr>
                                  @endforeach
                               </table>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/row end-->
        </div>
        <div class="col-lg-3 col-md-3 col-sm-5"></div>
    </div>
    <!--/row-->
    <div style="clear:both"></div>
</div>
@endsection
