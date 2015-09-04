@extends('index.base-no-top-margin') 
@section('content')
<div class="container main-container headerOffset">
    <div class="row">
        <div class="breadcrumbDiv col-lg-12">
            <ul class="breadcrumb">
                <li> <a href="./">首页</a> 
                </li>
                <li class="active"><a href="./news">市场新闻</a> </li>
            </ul>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <!--right column-->
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="w100 clearfix category-top">
                 <h2> 市场新闻 </h2>
                <div class="categoryImage">
                    <img src="images/site/category.jpg" class="img-responsive" alt="img">
                </div>
            </div>
            <div style="margin-top:30px" class="row  categoryProduct xsResponse clearfix">
                @foreach($newslist as $news)
                <div class="item col-sm-4 col-lg-4 col-md-4 col-xs-6 list-view" onclick="news_jump({{$news['NEWSID']}})">
                    <div class="product">
                        <div class="image"> <img style='height:80px;' src="{{$news['imgurl']}}" alt="img" class="img-responsive" id="news_img1">
                        </div>
                        <div class="description">
                             <h4>{{$news['newstitle']}}</h4>
                            <div class="list-description">
                                <p id="news_content1">{{$news['newscontent']}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/.item1-->
                @endforeach
            </div>
            <div class="w100 categoryFooter">
                <div class="pagination pull-left no-margin-top">
					<ul class="pagination no-margin-top">
						@if ($currentpage > 1)
                        <li> <a href="news?Page={{$currentpage-1}}">«</a>
						</li>
						@endif
						@for ($i = 1; $i < $totalpage+1; $i++)
							@if($i == $currentpage)
							<li class="active"><a href="news?Page={{$i}}">{{$i}}</a>
							</li>
							@else
							<li> <a href="news?Page={{$i}}">{{$i}}</a>
							</li>
							@endif
						@endfor
						@if ($currentpage < $totalpage)
                        <li> <a href="news?Page={{$currentpage+1}}">»</a>
						</li>
						@endif
                    </ul>
				</div>
<!--
                <div class="pull-right pull-right col-sm-4 col-xs-12 no-padding text-right text-left-xs">
                    <p>Showing 1–450 of 12 results</p>
				</div>
-->
            </div>
            <!--/.categoryFooter-->
        </div>
        <!--/right column end-->
    </div>
    <!-- /.row -->
</div>
@endsection
