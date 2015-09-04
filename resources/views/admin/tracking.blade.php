@extends('index.base-no-top-margin') 
@section('content')
<div class="container main-container headerOffset">
  <div class="row">
    <div class="breadcrumbDiv col-lg-12">
      <ul class="breadcrumb">
        <li> <a href="./">首页</a> </li>
        <li> <a href="./admin">管理员</a> </li>
        <li> 溯源管理</li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-9 col-md-9 col-sm-7">
      <h1 class="section-title-inner"><span><i class="fa fa-pencil-square-o"></i> 溯源管理 </span></h1>
      <div class="row userInfo">
        <div class="col-xs-12 col-sm-12">
          <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"> <a>溯源码查询</a> </h4>
          </div>
          <div class="panel-body">
          <h1 class="section-title-inner">输入数字溯源码</span> </h1>

            <div class="form-group">
              <input  type="text" class="form-control" id="trackid" placeholder="溯源码">
            </div>
            <button type="submit" class="btn   btn-primary" id="searchbutton" onClick='admintracking();'> <i class="fa fa-search"></i> 查询 </button>
        </div>
        </div>



        <div class="panel panel-default">
        <div style="display:none" id='hide_for_ZSID'>{{$ZSID}}</div>
          <div class="panel-heading">
            <h4 class="panel-title"> <a>溯源信息(如需新增记录，请先搜索对应溯源码)</a> </h4>
          </div>
          <div id="collapse2" class="panel-collapse collapse in">
          <form id='tracking_form'>
            <div class="panel-body">
               <table id="infoTable" class="footable">
                <thead>
                  <tr>
                    <th>时间</th>
                    <th>步骤</th>
                  </tr>
				        </thead>
				@foreach($zslist as $zsinfo)
                  <tr>
                    <td class="tm">{{$zsinfo['Opt_Time']}}</td>
                    <td><input class="inputCell" name="{{$zsinfo['Opt_Time']}}" type="text" value="{{$zsinfo['描述']}}"><span><button type="button"class="deleteButton btn btn-danger"><i class="fa fa-minus-circle "></i></button></span></td>
				          </tr>
				@endforeach
               </table>
            </div>
          </form>
          </div>
        </div>
        <div class="col-md-4">
            <button id="save" onclick="tracking_mod_submit()" class="btn btn-primary">保存</button>
           </div>
        <div style="float:right" class="col-md-4">
            <button style="float:right" id="addButton" onclick="appendDOM" name="singlebutton" class="btn btn-primary">添加记录</button>
           </div>
          <div class="clear clearfix"> </div>
        </div>
      </div>
      <!--/row end--> 
      
    </div>
    <div class="col-lg-3 col-md-3 col-sm-5"> </div>
  </div>
  <!--/row-->
  <div class="col-lg-12 clearfix">
          <ul class="pager">
            <li class="next pull-left"><a href="./admin"> &larr; 返回管理员</a></li>
          </ul>
        </div>
  <div style="clear:both"></div>
</div>
@endsection
