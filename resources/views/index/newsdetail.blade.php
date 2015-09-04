@extends('index.base-no-top-margin') 
@section('content')
<div class="gap"></div>
<section class="blog-intro parallaxOffset parallaxbg" style="background: url(images/blog/blogbg.jpg) no-repeat 50% -86px fixed; background-size: cover">
    <div class="display-table relative5 hw100">
        <div class="display-table-cell hw100 relative">
            <div class="container blogIntroContent zindex10 relative scrollme">
                <div class="row">
                    <div class="  wow  fadeInDown introContent text-center" data-wow-duration="0.2s" data-wow-delay=".5s">
                        	<h1 class="x2large"> {{$news['newstitle']}} </h1>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="overlay-shade"></div>
    <div class="background-overly g6"></div>
</section>
<div class="blog-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-centered blog-left">
                <div class="bl-inner">
                    <div class="item-blog-post">
                        <div class="post-header clearfix">
                        <div class="gap"></div>
                            <div class="post-info"> <span>更新时间 ：{{$news['Update_Time']}}</span>

                            </div>
                        </div>
                        <div class="post-main-view">
                            <div style="margin:30px auto" class="post-lead-image wow  fadeIn  " data-wow-duration="0.2s" data-wow-delay=".6s"> <img src="{{$news['imgurl']}}" class="img-responsive" alt="G">
                            </div>
                            <div class="post-description wow  fadeIn  " data-wow-duration="0.2s" data-wow-delay=".1s">
                            {{$news['newscontent']}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="gap"></div>
@endsection