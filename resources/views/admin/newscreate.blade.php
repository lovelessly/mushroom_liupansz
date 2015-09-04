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
                <li> <a href="./admin/content">内容管理</a> 
                </li>
                <li> <a href="./admin/news">新闻管理</a> 
                </li>
                <li>编辑</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-7">
             <h1 class="section-title-inner"><span><i class="fa fa-pencil-square-o"></i> 新闻编辑 </span></h1>

            <div class="row userInfo">
                <div class="col-xs-12 col-sm-12">
                <form id='form_1'>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <h4 class="panel-title"> <a>新闻标题</a> </h4>

                        </div>
                        <div id="collapse2" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <input type="text" name='newstitle' class="form-control" id="newstitle" value="">
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <h4 class="panel-title"> <a>新闻内容</a> </h4>

                        </div>
                        <div id="collapse2" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <textarea class="form-control" name='newscontent' rows="20" id="newscontent"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <h4 class="panel-title"> <a>新闻图片</a> </h4>

                        </div>
                        <div class="panel-body">
                            <div id='preview'>
                                <img style="max-width:400px" src="">
                            </div>
                            <input onchange="previewImage(this)" name='image' id='fileuploader' style="margin-top:20px;display:none" type="file"></input>
                            <div class="col-md-4" style='margin-top:15px;'>
                                <input type='button' id="" name="" class="btn btn-primary" onclick="$('#fileuploader').click()" value='上传图片'></input>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <input style="width:70px" onclick="news_create_submit()" class="btn btn-primary" value="保存"></input>
                    </div>
                    <div class="clear clearfix"></div>
                </form>
                </div>
            </div>
            <!--/row end-->
        </div>
        <div class="col-lg-3 col-md-3 col-sm-5"></div>
    </div>
    <!--/row-->
    <div style="clear:both"></div>
</div>
<div class="gap"> </div>
@endsection