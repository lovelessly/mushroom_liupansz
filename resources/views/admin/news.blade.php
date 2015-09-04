@extends('index.base-no-top-margin') 
@section('content')
<div class="container main-container headerOffset">
  <div class="row">
    <div class="breadcrumbDiv col-lg-12">
      <ul class="breadcrumb">
        <li> <a href="/">首页</a> </li>
        <li> <a href="./admin">管理员</a> </li>
        <li> <a href="./admin/content">内容管理</a> </li>
        <li class="active">新闻管理</li>
      </ul>
    </div>
  </div>
  
  
  <div class="row">
    <div class="col-lg-9 col-md-9 col-sm-7">
      <h1 class="section-title-inner"><span><i class="fa fa-list-alt"></i> 新闻列表</span></h1>
      <div class="row userInfo">
        <div class="col-lg-12">
        </div>
        
        <div class="col-xs-12 col-sm-12">
          <table class="footable">
            <thead>
              <tr>
                <th class="col-xs-8 col-sm-8" data-class="expand" > 新闻标题</th>
                <th data-hide="default" data-type="numeric" data-sort-initial="true"> 修改日期 </th>
                <th data-hide="phone" width='10%' data-sort-ignore="true"> 编辑新闻</th>
                <th data-hide="phone" width='10%' data-sort-ignore="true"> 删除新闻</th>
              </tr>
            </thead>
            <tbody>
            @foreach($newslist as $news)
              <tr>
                <td class="news_title">{{$news['newstitle']}}</td>
                <td data-value="78025368997" class="news_date">{{$news['Update_Time']}}</td>
                <td style="text-align:center"data-value="3"><a href="./admin/newsedit?NEWSID={{$news['NEWSID']}}"><i class="fa fa-pencil-square-o"></i></a></td>
                <td style="text-align:center"data-value="3"><a href="./api/deletenews?NEWSID={{$news['NEWSID']}}"><i class="fa fa-eject"></i></a></td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        
        <div class="col-lg-12 clearfix">
          <ul class="pager">
            <li class="previous pull-right"><a href="./admin/newscreate"> <i class="fa fa-plus"></i> 添加 </a></li>
          </ul>
        </div>
      </div>
      <!--/row end--> 
      <div class="w100 categoryFooter">
                <div class="pagination pull-left no-margin-top">
                    <ul class="pagination no-margin-top">
                    @if ($currentpage > 1)
                        <li> <a href="./admin/news?Page={{$currentpage-1}}">«</a>

                        </li>
                    @endif 
                    @for ($i = 1; $i < $totalpage+1; $i++) 
                    @if($i == $currentpage) 
                    <li class="active"><a href="./admin/news?Page={{$i}}">{{$i}}</a>
                    </li>
                    @else
                        <li> <a href="./admin/news?Page={{$i}}">{{$i}}</a>
                        </li>
                    @endif 
                    @endfor 
                    @if ($currentpage < $totalpage) 
                    <li> <a href="./admin/news?Page={{$currentpage+1}}">»</a></li>
                    @endif
                    </ul>
                </div>
                <!-- <div class="pull-right pull-right col-sm-4 col-xs-12 no-padding text-right text-left-xs">
                    <p>Showing 1–450 of 12 results</p>
        </div>
--></div>
      
    </div>
    <div class="col-lg-3 col-md-3 col-sm-5"> </div>
  </div>
  <!--/row-->
  
  <div style="clear:both"></div>
</div>
@endsection
