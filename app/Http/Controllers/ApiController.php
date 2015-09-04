<?php 
namespace App\Http\Controllers;

use App\Db;
use Session;
use App\Models\User;
use App\Models\Jsonp;
use App\Models\Merchandise;
use App\Models\Menu;
use App\Models\News;
use App\Models\Tracking;
use App\Models\Order;
use App\Models\Cart;
use Request;
use Cache;
use Carbon;

class ApiController extends Controller {

	public function __construct()
	{
		//$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$data = array(1,2,3,4);
		$view = view('loginindex');
		$view->with('username', Session::get('User_Name'));
		return $view;
		//return view('loginindex');
	}


	//登出接口
	public function getLogout(){
		$UserModel = new User();
		$Jsonp = new Jsonp();
		$ret = $UserModel->logout();
		if($ret){
			$a = json_encode(array('status' => 0, 'errorMsg' => '', 'data' => array(), 'Msg' => 'Successful Logout!!'));
			echo $Jsonp->toJsonp($a);
		}else{
			$a = json_encode(array('status' => -1, 'errorMsg' => 'Logout Faild', 'data' => array()));
			echo $Jsonp->toJsonp($a);
		}
	}

	//登录接口
	public function getLogin(){

		$username = Request::input('username');
		$password = Request::input('password');
		$debug = Request::input('debug', 0);

		$UserModel = new User();
		$Jsonp = new Jsonp();

		//暂时Mock，拼接后的加密验证串需要前端直接传给后端，不需要后端处理
		$tk = Session::get('tk');
		if(empty($tk)){
			Session::put('tk', sha1(time()));
		}
		$SessionToken = Session::get('tk');
		$password = sha1(sha1($password) . $SessionToken);
		//End of Mock
		
		$ret = $UserModel->login($username, $password, $SessionToken);

		if($ret){	
			$data = Session::all();
			unset($data['tk']);
			//debug 开关
			if(0 == $debug){
				$data = array();
			}
			//array to Json(Jsonp)
			$a = json_encode(array('status' => 0, 'errorMsg' => '', 'data' => $data));
			echo $Jsonp->toJsonp($a);
		}else{
			//array to Json(Jsonp)
			$a = json_encode(array('status' => -1, 'errorMsg' => 'Login Faild', 'data' => ''));
			echo $Jsonp->toJsonp($a);
		}

	}

	public function postLogin(){

		$username = Request::input('username');
		$password = Request::input('password');
		$debug = Request::input('debug', 0);

		$UserModel = new User();
		$Jsonp = new Jsonp();

		$SessionToken = Session::get('tk');

		$ret = $UserModel->login($username, $password, $SessionToken);

		if($ret){	
			$data = Session::all();
			unset($data['tk']);
			//debug 开关
			if(0 == $debug){
				$data = array();
			}
			//array to Json(Jsonp)
			$a = json_encode(array('status' => 0, 'errorMsg' => '', 'data' => $data));
			echo $Jsonp->toJsonp($a);
		}else{
			//array to Json(Jsonp)
			$a = json_encode(array('status' => -1, 'errorMsg' => 'Login Faild', 'data' => ''));
			echo $Jsonp->toJsonp($a);
		}

	}

	//注册用户
	public function postRegister(){

		$username = Request::input('username');
		$password = Request::input('password');
		$email = Request::input('email');

		$UserModel = new User();
		$Jsonp = new Jsonp();

		//注册
		$ret = $UserModel->register($username, $password, $email);
		
		//登录
		if($ret){
			$SessionToken = Session::get('tk');
			$password = sha1($password . $SessionToken);
			$ret = $UserModel->login($username, $password, $SessionToken);
		}
		if($ret){
			$data = Session::all();
			unset($data['tk']);
			$a = json_encode(array('status' => 0, 'errorMsg' => '', 'data' => $data));
			echo $Jsonp->toJsonp($a);
		}else{
			$a = json_encode(array('status' => -1, 'errorMsg' => 'Register Faild', 'data' => ''));
			echo $Jsonp->toJsonp($a);
		};

	}

	//删除一条产品
	public function getProductdelete(){

		$CPID = Request::input('CPID', 0);

		$UserModel = new User();
		$Jsonp = new Jsonp();
		//权限校验
		$auth = $UserModel->checkAdmin();

		$Merchandise = new Merchandise();

		//删除
		if($auth){
			$ret = $Merchandise->deleteCP($CPID);
		}else{
			$ret = false;
		}

		//非Ajax请求，返回上一页
		if(!Request::ajax()){
			return redirect()->back();
			die;
		}

		//Ajax请求
		if($ret){
			$a = json_encode(array('status' => 0, 'errorMsg' => '', 'data' => array(), 'Msg' => 'Successful Deleted'));
			echo $Jsonp->toJsonp($a);
		}else{
			$a = json_encode(array('status' => -1, 'errorMsg' => 'Delete Faild', 'data' => ''));
			echo $Jsonp->toJsonp($a);
		};

	}

	//删除用户
	public function getDeleteuser(){

		$YHID = Request::input('YHID', 0);

		$UserModel = new User();
		$Jsonp = new Jsonp();

		$auth = $UserModel->checkAdmin();

		//删除
		if($auth){
			$ret = $UserModel->delete($YHID);
		}else{
			$ret = false;
		}
		

		//非Ajax请求，返回上一页
		if(!Request::ajax()){
			return redirect()->back();
			die;
		}

		//Ajax请求
		if($ret){
			$a = json_encode(array('status' => 0, 'errorMsg' => '', 'data' => array(), 'Msg' => 'Successful Deleted'));
			echo $Jsonp->toJsonp($a);
		}else{
			$a = json_encode(array('status' => -1, 'errorMsg' => 'Delete Faild', 'data' => ''));
			echo $Jsonp->toJsonp($a);
		};

	}

	//删除一条新闻
	public function getDeletenews(){

		$NEWSID = Request::input('NEWSID', 0);

		$UserModel = new User();
		$Jsonp = new Jsonp();
		$News = new News();

		$auth = $UserModel->checkAdmin();

		//删除
		if($auth){
			$ret = $News->deleteNews($NEWSID);
		}else{
			$ret = false;
		}
		

		//非Ajax请求，返回上一页
		if(!Request::ajax()){
			return redirect()->back();
			die;
		}

		//Ajax请求
		if($ret){
			$a = json_encode(array('status' => 0, 'errorMsg' => '', 'data' => array(), 'Msg' => 'Successful Deleted'));
			echo $Jsonp->toJsonp($a);
		}else{
			$a = json_encode(array('status' => -1, 'errorMsg' => 'Delete Faild', 'data' => ''));
			echo $Jsonp->toJsonp($a);
		};

	}

	//追溯记录新增&&修改
	public function postTrackingsubmit(){

		$ZSID = Request::input('ZSID', -1);
		$tracking_data = Request::input('tracking_data');
		if(empty($tracking_data)){
			$tracking_data = '';
		}
		$tmp_array = json_decode($tracking_data, true);
		$data_array = array();
		foreach($tmp_array as $ar){
			array_push($data_array, array('Opt_Time' => $ar[0], '描述' => $ar[1], '操作员' => Session::get('User_Name'),));
		}

		$UserModel = new User();
		$Jsonp = new Jsonp();
		$Track = new Tracking();

		$auth = $UserModel->checkAdmin();

		//删除
		if($auth){
			if( 0 == $ZSID){
				//新增
				$ret = $Track->insertNewLog($data_array);
				$ZSID = $ret;
			}elseif( -1 == $ZSID){
				//参数错误
				$ret = false;
			}else{
				//修改
				$ret = $Track->modLog($ZSID, $data_array);
			}
		}else{
			$ret = false;
		}
		

		//非Ajax请求，返回上一页
		if(!Request::ajax()){
			return redirect()->back();
			die;
		}

		//Ajax请求
		if($ret != false){
			$a = json_encode(array('status' => 0, 'errorMsg' => '', 'data' => $ZSID, 'Msg' => 'Successful Submit'));
			echo $Jsonp->toJsonp($a);
		}else{
			$a = json_encode(array('status' => -1, 'errorMsg' => 'Submit Faild', 'data' => ''));
			echo $Jsonp->toJsonp($a);
		};

	}

	//更新订单
	public function postUpdateorder(){

		$DDID = Request::input('DDID', 0);
		$Order_Status = Request::input('Order_Status', 0);

		$UserModel = new User();
		$Jsonp = new Jsonp();
		$Order = new Order();

		$auth = $UserModel->checkAdmin();

		//更新
		if($auth){
			$ret = $Order->modOrderStatus($DDID, $Order_Status);
		}else{
			$ret = false;
		}
		

		//非Ajax请求，返回上一页
		if(!Request::ajax()){
			return redirect()->back();
			die;
		}

		//Ajax请求
		if($ret != false){
			$a = json_encode(array('status' => 0, 'errorMsg' => '', 'data' => array(), 'Msg' => 'Successful Submit'));
			echo $Jsonp->toJsonp($a);
		}else{
			$a = json_encode(array('status' => -1, 'errorMsg' => 'Submit Faild', 'data' => ''));
			echo $Jsonp->toJsonp($a);
		};

	}

	//删除订单
	public function getOrderdelete(){

		$DDID = Request::input('OrderID', 0);
		$UserModel = new User();
		$Jsonp = new Jsonp();
		$Order = new Order();

		$auth = $UserModel->checkAdmin();

		//删除
		if($auth){
			$ret = $Order->delete($DDID);
		}else{
			$ret = false;
		}
		

		//非Ajax请求，返回上一页
		if(!Request::ajax()){
			return redirect()->back();
			die;
		}

		//Ajax请求
		if($ret != false){
			$a = json_encode(array('status' => 0, 'errorMsg' => '', 'data' => array(), 'Msg' => 'Successful Submit'));
			echo $Jsonp->toJsonp($a);
		}else{
			$a = json_encode(array('status' => -1, 'errorMsg' => 'Submit Faild', 'data' => ''));
			echo $Jsonp->toJsonp($a);
		};

	}

	//更新购物车
	public function postUpdatecart(){

		$CPID = Request::input('CPID', 0);
		$Count = Request::input('Count', 0);
		$UserModel = new User();
		$Jsonp = new Jsonp();
		$Cart = new Cart();

		$auth = $UserModel->checkLogin();

		//进行更新
		if($auth){
			if(0 == $CPID){
				$ret = false;
			}elseif( 0 == $Count){
				$User_ID = Session::get("User_ID");
				$ret = $Cart->delete($User_ID, $CPID);
			}else{
				$User_ID = Session::get("User_ID");
				$ret = $Cart->update($User_ID, $CPID, $Count);
			}
		}else{
			$ret = false;
		}
		

		//非Ajax请求，返回上一页
		if(!Request::ajax()){
			return redirect()->back();
			die;
		}

		//Ajax请求
		if($ret != false){
			$a = json_encode(array('status' => 0, 'errorMsg' => '', 'data' => array(), 'Msg' => 'Successful Submit'));
			echo $Jsonp->toJsonp($a);
		}else{
			$a = json_encode(array('status' => -1, 'errorMsg' => 'Submit Faild', 'data' => ''));
			echo $Jsonp->toJsonp($a);
		};

	}


	public function postOrdercheckout(){

		$Stamp = Request::input('stamp', 0);
		$step = Request::input('step', 0);
		$UserModel = new User();
		$Jsonp = new Jsonp();
		$Order = new Order();
		$data_array = Request::all();
		unset($data_array['stamp']);
		unset($data_array['step']);

		//echo json_encode($data_array);die;

		foreach($data_array as $key => $val){
			if($val == '' or empty($val)){
				$a = json_encode(array('status' => -1, 'errorMsg' => '参数错误:'.$key, 'data' => ''));
				echo $Jsonp->toJsonp($a);
				die;
			}
		}

		$auth = $UserModel->checkLogin();

		//订单流程处理，1-地址信息，2-配送信息，3-确认生成订单
		if($auth and 0!=$Stamp and 0!=$step){
			if(1 == $step){
				$ret = $Order->modPreOrderAddress($Stamp, $data_array);
			}elseif(2 == $step){
				$ret = $Order->modPreOrderDispatch($Stamp, $data_array);
			}elseif(3 == $step){
				$ret = $Order->Confirm($Stamp);
			}else{
				$ret = false;
			}
		}else{
			$ret = false;
		}
		

		//非Ajax请求，返回上一页
		if(!Request::ajax()){
			return redirect()->back();
			die;
		}

		//Ajax请求
		if($ret != false){
			$a = json_encode(array('status' => 0, 'errorMsg' => '', 'data' => array(), 'Msg' => 'Successful Submit'));
			echo $Jsonp->toJsonp($a);
		}else{
			$a = json_encode(array('status' => -1, 'errorMsg' => '请求失败，请刷新当前页面', 'data' => ''));
			echo $Jsonp->toJsonp($a);
		};
	}


}
