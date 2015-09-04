<?php 
namespace App\Http\Controllers;

use App\Db;
use Session;
use App\Models\User;
use App\Models\Jsonp;
use App\Models\Merchandise;
use App\Models\News;
use App\Logic\Fileupload;
use Request;

class FileController extends Controller {

	public function __construct()
	{
		$this->imagedir = dirname(__FILE__) . '/../../../public/Upload/image';
	}

	//新增一条产品记录
	public function postProductcreate()
	{
		$create_array = array();

		$Jsonp = new Jsonp();
		$Merchandise = new Merchandise();
		$Uploader = new Fileupload();

		$UserModel = new User();
		$auth = $UserModel->checkAdmin();
		if(!$auth){
			$a = json_encode(array('status' => -1, 'errorMsg' => 'Auth Faild', 'data' => array(), 'Msg' => ''));
			echo $Jsonp->toJsonp($a);
			die;
		}

		$create_array['产品名称'] = Request::input('product_name');
		$create_array['产品简介'] = Request::input('product_desc');
		$create_array['单价'] = Request::input('price');
		$create_array['规格'] = Request::input('spec');
		$create_array['库存'] = Request::input('stock');
		$create_array['折扣'] = Request::input('sales');
		foreach($create_array as $k => $v){
			if(empty($v)){
				$a = json_encode(array('status' => -1, 'errorMsg' => '请将参数填写完整:' . $k, 'data' => array(), 'Msg' => ''));
				echo $Jsonp->toJsonp($a);
				die;
			}
		}
		$create_array['Create_Time'] = strftime("%Y-%m-%d %H:%M:%S", time());

		
		foreach($create_array as $k => $v)
		{
			if(empty($v)){
				unset($create_array[$k]);
			}
		}

		if(Request::hasFile('image') and Request::file('image')->isValid()){
			$file = Request::file('image');
			$filestatus = $Uploader->FileStorage($file);
			if(!$filestatus){
				$a = json_encode(array('status' => -1, 'errorMsg' => 'Create Faild', 'data' => array(), 'Msg' => ''));
				echo $Jsonp->toJsonp($a);
				die;
			}else{
				$create_array['展示图片'] = $filestatus['filepath'];
			}
		}else{
			$a = json_encode(array('status' => -1, 'errorMsg' => '请添加图片', 'data' => array(), 'Msg' => ''));
			echo $Jsonp->toJsonp($a);
			die;
		}

		$ret = $Merchandise->insertProduct($create_array);

		if($ret){
			$a = json_encode(array('status' => 0, 'errorMsg' => '', 'data' => array(), 'Msg' => 'Updated!'));
			echo $Jsonp->toJsonp($a);
		}else{
			$a = json_encode(array('status' => -1, 'errorMsg' => '创建失败', 'data' => array(), 'Msg' => ''));
			echo $Jsonp->toJsonp($a);
		}

	}

	//更新一条产品记录
	public function postProductupdate()
	{
		$update_array = array();

		$Jsonp = new Jsonp();
		$Merchandise = new Merchandise();
		$Uploader = new Fileupload();

		$UserModel = new User();
		$auth = $UserModel->checkAdmin();
		if(!$auth){
			$a = json_encode(array('status' => -1, 'errorMsg' => 'Auth Faild', 'data' => array(), 'Msg' => ''));
			echo $Jsonp->toJsonp($a);
			die;
		}

		$CPID = Request::input('product_id');

		if(empty($CPID)){
			$a = json_encode(array('status' => -1, 'errorMsg' => 'Update Faild', 'data' => array(), 'Msg' => ''));
			echo $Jsonp->toJsonp($a);
			die;
		}
		$CPID = intval($CPID);

		$update_array['产品名称'] = Request::input('product_name');
		$update_array['产品简介'] = Request::input('product_desc');
		$update_array['单价'] = Request::input('price');
		$update_array['规格'] = Request::input('spec');
		$update_array['库存'] = Request::input('stock');
		$update_array['折扣'] = Request::input('sales');
		$update_array['Update_Time'] = strftime("%Y-%m-%d %H:%M:%S", time());

		
		foreach($update_array as $k => $v)
		{
			if(empty($v)){
				unset($update_array[$k]);
			}
		}

		if(Request::hasFile('image') and Request::file('image')->isValid()){
			$file = Request::file('image');
			$filestatus = $Uploader->FileStorage($file);
			if(!$filestatus){
				$a = json_encode(array('status' => -1, 'errorMsg' => 'Upload Faild', 'data' => array(), 'Msg' => ''));
				echo $Jsonp->toJsonp($a);
				die;
			}else{
				$update_array['展示图片'] = $filestatus['filepath'];
			}
		}

		$ret = $Merchandise->updateproduct($CPID, $update_array);

		if($ret){
			$a = json_encode(array('status' => 0, 'errorMsg' => '', 'data' => array(), 'Msg' => 'Updated!'));
			echo $Jsonp->toJsonp($a);
		}else{
			$a = json_encode(array('status' => -1, 'errorMsg' => '更新失败或不需要更新', 'data' => array(), 'Msg' => ''));
			echo $Jsonp->toJsonp($a);
		}

	}

	//新建一条新闻记录
	public function postNewscreate()
	{
		$create_array = array();

		$Jsonp = new Jsonp();
		$News = new News();
		$Uploader = new Fileupload();

		$NewsID = Request::input('NewsID');

		$UserModel = new User();
		$auth = $UserModel->checkAdmin();
		if(!$auth){
			$a = json_encode(array('status' => -1, 'errorMsg' => 'Auth Faild', 'data' => array(), 'Msg' => ''));
			echo $Jsonp->toJsonp($a);
			die;
		}

		$create_array['newstitle'] = Request::input('newstitle');
		$create_array['newscontent'] = Request::input('newscontent');
		$create_array['Update_Time']= strftime("%Y-%m-%d %H:%M:%S", time());
		$create_array['imgurl'] = Null;


		if(Request::hasFile('image') and Request::file('image')->isValid()){
			$file = Request::file('image');
			$filestatus = $Uploader->FileStorage($file);
			if(!$filestatus){
				$a = json_encode(array('status' => -1, 'errorMsg' => 'Upload Faild', 'data' => array(), 'Msg' => ''));
				echo $Jsonp->toJsonp($a);
				die;
			}else{
				$create_array['imgurl'] = $filestatus['filepath'];
			}
		}

		foreach($create_array as $k => $v)
		{
			if(($k == 'imgurl') and (empty($v))){
				$a = json_encode(array('status' => -1, 'errorMsg' => '请上传图片', 'data' => array(), 'Msg' => ''));
				echo $Jsonp->toJsonp($a);
				die;
			}elseif(empty($v)){
				$a = json_encode(array('status' => -1, 'errorMsg' => '请将参数填写完整:' . $k, 'data' => array(), 'Msg' => ''));
				echo $Jsonp->toJsonp($a);
				die;
			}
		}

		$ret = $News->insertNews($create_array);

		if($ret){
			$a = json_encode(array('status' => 0, 'errorMsg' => '', 'data' => array(), 'Msg' => '创建成功!'));
			echo $Jsonp->toJsonp($a);
		}else{
			$a = json_encode(array('status' => -1, 'errorMsg' => '创建失败', 'data' => array(), 'Msg' => ''));
			echo $Jsonp->toJsonp($a);
		}

	}

	//更新一条新闻记录
	public function postNewsupdate()
	{
		$update_array = array();

		$Jsonp = new Jsonp();
		$News = new News();
		$Uploader = new Fileupload();

		$NewsID = Request::input('NewsID');

		$UserModel = new User();
		$auth = $UserModel->checkAdmin();
		if(!$auth){
			$a = json_encode(array('status' => -1, 'errorMsg' => 'Auth Faild', 'data' => array(), 'Msg' => ''));
			echo $Jsonp->toJsonp($a);
			die;
		}

		if(empty($NewsID)){
			$a = json_encode(array('status' => -1, 'errorMsg' => 'Update Faild', 'data' => array(), 'Msg' => ''));
			echo $Jsonp->toJsonp($a);
			die;
		}

		$NewsID = intval($NewsID);

		$update_array['newstitle'] = Request::input('newstitle');
		$update_array['newscontent'] = Request::input('newscontent');
		$update_array['Update_Time']= strftime("%Y-%m-%d %H:%M:%S", time());

		
		foreach($update_array as $k => $v)
		{
			if(empty($v)){
				unset($update_array[$k]);
			}
		}

		if(Request::hasFile('image') and Request::file('image')->isValid()){
			$file = Request::file('image');
			$filestatus = $Uploader->FileStorage($file);
			if(!$filestatus){
				$a = json_encode(array('status' => -1, 'errorMsg' => 'Upload Faild', 'data' => array(), 'Msg' => ''));
				echo $Jsonp->toJsonp($a);
				die;
			}else{
				$update_array['imgurl'] = $filestatus['filepath'];
			}
		}

		$ret = $News->updateByID($NewsID, $update_array);

		if($ret){
			$a = json_encode(array('status' => 0, 'errorMsg' => '', 'data' => array(), 'Msg' => 'Updated!'));
			echo $Jsonp->toJsonp($a);
		}else{
			$a = json_encode(array('status' => -1, 'errorMsg' => '更新失败或不需要更新', 'data' => array(), 'Msg' => ''));
			echo $Jsonp->toJsonp($a);
		}

	}


}
