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
                <li> <a href="./admin/product">产品管理</a> 
                </li>
                <li class="active">产品编辑</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-7">
             <h1 class="section-title-inner"><span><i class="fa fa-pencil-square-o"></i> 产品编辑 </span></h1>

            <p>双击条目进行修改</p>
            <div class="row userInfo">
                <div class="col-xs-12 col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <h4 class="panel-title"> <a>产品详情</a> </h4>

                        </div>
                        <div id="collapse2" class="panel-collapse collapse in">
							<div class="panel-body">
							<form id='form_1'>
								<input type="text" name='product_id' style="display: none" value="{{$product['CPID']}}"></input>
                                <table class="footable">
                                    <thead>
                                        <tr>
                                            <th>项目</th>
                                            <th>详情</th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <td>产品名称</td>
                                        <td class="editable">
                                            <input type="text" name='product_name' style="display: none"></input>
                                            <button type="button" class="btn btn-primary" style="display:none;margin-left:40px"><i class="fa fa-check-circle"></i>
                                            </button>
                                            <p>{{$product['产品名称']}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>产品简介</td>
                                        <td class="editable">
                                            <input type="text" name="product_desc" style="display: none"></input>
                                            <button type="button" class="btn btn-primary" style="display:none;margin-left:40px"><i class="fa fa-check-circle"></i>
                                            </button>
                                            <p>{{$product['产品简介']}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>单价</td>
                                        <td class="editable">
                                            <input type="text" name="price" style="display: none"></input>
                                            <button type="button" class="btn btn-primary" style="display:none;margin-left:40px"><i class="fa fa-check-circle"></i>
                                            </button>
                                            <p>{{$product['单价']}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>规格</td>
                                        <td class="editable">
                                            <input type="text" name='spec' style="display: none"></input>
                                            <button type="button" class="btn btn-primary" style="display:none;margin-left:40px"><i class="fa fa-check-circle"></i>
                                            </button>
                                            <p>{{$product['规格']}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>库存</td>
                                        <td class="editable">
                                            <input type="text" name="stock" style="display: none"></input>
                                            <button type="button" class="btn btn-primary" style="display:none;margin-left:40px"><i class="fa fa-check-circle"></i>
                                            </button>
                                            <p>{{$product['库存']}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>折扣</td>
                                        <td class="editable">
                                            <input type="text" name='sales' style="display: none"></input>
                                            <button type="button" class="btn btn-primary" style="display:none;margin-left:40px"><i class="fa fa-check-circle"></i>
                                            </button>
                                            <p>{{$product['折扣']}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>销量</td>
                                        <td>{{$product['总销售量']}}</td>
                                    </tr>
                                    <tr>
                                        <td>评论总数</td>
                                        <td>{{$product['评论总数']}}</td>
                                    </tr>
                                    <tr>
                                        <td>ID</td>
                                        <td>{{$product['CPID']}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <h4 class="panel-title"> <a>产品图片</a> </h4>

                        </div>
                        <div class="panel-body">
                            <div id='preview'>
                                <img style="max-width:400px" src="{{$product['展示图片']}}">
                            </div>
                            <input onchange="previewImage(this)" name='image' id='fileuploader' style="margin-top:20px;display:none" type="file"></input>
                            <div class="col-md-4" style='margin-top:15px;'>
                    			<input type='button' id="" name="" class="btn btn-primary" onclick="$('#fileuploader').click()" value='上传图片'></input>
                			</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <input onclick="fsubmit();" id="" name="singlebutton" class="btn btn-primary" value="保存"></input>
				</div>
</form>
                <div class="clear clearfix"></div>
            </div>
        </div>
        <!--/row end-->
    </div>
    <div class="col-lg-3 col-md-3 col-sm-5"></div>
</div>
<!--/row-->
<div style="clear:both"></div>
</div>
<!-- /wrapper -->
<div class="gap"></div>
@endsection
