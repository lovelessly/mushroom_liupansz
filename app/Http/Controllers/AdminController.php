<?php 
namespace App\Http\Controllers;

use App\Db;
use Session;
use App\Models\User;
use App\Models\Jsonp;
use App\Models\Merchandise;
use App\Models\News;
use App\Models\Tracking;
use App\Models\Order;
use Request;
use View;

class AdminController extends Controller {

	public function __construct()
	{
		//$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */

	//默认页
	public function getIndex()
	{
		$UserModel = new User();
		$auth = $UserModel->checkAdmin();
		if(!$auth){
			 return redirect('/');
		}
		$view = view('admin.index');
		return $view;
	}

	//内容管理
	public function getContent()
	{
		$UserModel = new User();
		$auth = $UserModel->checkAdmin();
		if(!$auth){
			 return redirect('/');
		}
		$view = view('admin.content');
		return $view;
	}

	//订单管理
	public function getOrder()
	{
		$Page = Request::input('Page', 1);
		$OrderID = Request::input('OrderID', 0);

		$UserModel = new User();
		$auth = $UserModel->checkAdmin();
		if(!$auth){
			 return redirect('/');
		}
		$OrderModel = new Order();

		if(empty($OrderID) or $OrderID ==0){
			$res = $OrderModel->getAllOrder($Page, 10);
		}else{
			$res = $OrderModel->getByOrderID($OrderID);
		}

		/* debug
		if(Request::input('debug', 0) == 1)
		{
			echo json_encode($res);die;
		}
		*/

		$view = view('admin.order');
		$view->with('totalpage', $res['totalpage']);
		$view->with('currentpage', $Page);
		$view->with('orderlist', $res['data']);
		return $view;
	}

	//订单编辑
	public function getOrderedit()
	{
		$OrderID = Request::input('OrderID', 0);
		$UserModel = new User();
		$auth = $UserModel->checkAdmin();
		if(!$auth){
			 return redirect('/');
		}
		$OrderModel = new Order();

		if(empty($OrderID) or $OrderID == 0){
			return redirect('/admin/order');
		}else{
			$res = $OrderModel->getByOrderID($OrderID);
		}
		$orderdata = $res['data'][0];
		//echo json_encode($orderdata);die;
		$view = view('admin.orderedit');
		$view->with('orderdata', $orderdata);
		return $view;
	}

	//产品管理
	public function getProduct()
	{
		$Page = Request::input('Page', 1);
		$CPID = Request::input('CPID', 0);
		$UserModel = new User();
		$auth = $UserModel->checkAdmin();
		if(!$auth){
			 return redirect('/');
		}
		$Merchandise = new Merchandise();
		if(empty($CPID) or $CPID ==0){
			$res = $Merchandise->getAll($Page, 10);
		}else{
			$res = $Merchandise->getByCPID($CPID);
		}
		$productlist = $res['data'];
		$view = view('admin.product');
		$view->with('products', $productlist);
		$view->with('totalpage', $res['totalpage']);
		$view->with('currentpage', $Page);
		return $view;
	}


	//产品编辑
	public function getProductedit()
	{
		$CPID = Request::input('CPID', 0);
		$UserModel = new User();
		$auth = $UserModel->checkAdmin();
		if(!$auth){
			 return redirect('/');
		}
		$Merchandise = new Merchandise();
		$res = $Merchandise->getByCPID($CPID);
		$productinfo = $res['data'];
		//如果查不到产品信息，返回产品管理页面
		if(count($productinfo) != 0){
			$view = view('admin.productedit');
			$view->with('product', $productinfo[0]);
			return $view;
		}else{
			return redirect()->back();
		}
	}

	//产品创建
	public function getProductcreate()
	{
		$UserModel = new User();
		$auth = $UserModel->checkAdmin();
		if(!$auth){
			 return redirect('/');
		}

		$view = view('admin.productcreate');
		return $view;
	}

	//追溯管理
	public function getTracking()
	{
		$Tracker = new Tracking();

		$ZSID = Request::input('ZSID', 0);

		$UserModel = new User();
		$auth = $UserModel->checkAdmin();
		if(!$auth){
			 return redirect('/');
		}

		$res = $Tracker->getByZSID($ZSID);

		$view = view('admin.tracking');
		$view->with('ZSID', $ZSID);
		$view->with('zslist', $res['data']);

		return $view;
	}

	//新闻管理
	public function getNews()
	{
		$Page = Request::input('Page', 1);
		$News = new News();

		$UserModel = new User();
		$auth = $UserModel->checkAdmin();
		if(!$auth){
			 return redirect('/');
		}

		$res = $News->getAllNews($Page, 10);
		//echo json_encode($res);die;

		$view = view('admin.news');
		$view->with('newslist', $res['data']);
		$view->with('currentpage', $Page);
		$view->with('totalpage', $res['totalpage']);
		return $view;
	}

	//新闻编辑
	public function getNewsedit()
	{
		$NEWSID = Request::input('NEWSID', 1);
		$News = new News();

		$UserModel = new User();
		$auth = $UserModel->checkAdmin();
		if(!$auth){
			 return redirect('/');
		}

		$res = $News->getByNEWSID($NEWSID);
		//echo json_encode($res['data'][0]);die;

		$view = view('admin.newsedit');
		$view->with('newsdata', $res['data'][0]);
		return $view;
	}


	//新闻新建
	public function getNewscreate()
	{
		$UserModel = new User();
		$auth = $UserModel->checkAdmin();
		if(!$auth){
			 return redirect('/');
		}

		$view = view('admin.newscreate');
		return $view;
	}

	//用户管理
	public function getUser()
	{
		$Page = Request::input('Page', 1);
		$UserModel = new User();
		$auth = $UserModel->checkAdmin();
		if(!$auth){
			 return redirect('/');
		}
		$res = $UserModel->getAllUser(1, $Page, 10);
		//echo json_encode($res);die;
		$users = $res['data'];
		$view = view('admin.user');
		$view->with('users', $users);
		$view->with('totalpage', $res['totalpage']);
		$view->with('currentpage', $Page);
		return $view;
	}

}
