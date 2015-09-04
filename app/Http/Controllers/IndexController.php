<?php 
namespace App\Http\Controllers;

use Session;
use App\Models\User;
use App\Models\Jsonp;
use App\Models\Merchandise;
use App\Models\Tracking;
use App\Models\News;
use App\Models\Order;
use App\Models\Cart;
use Request;
use View;
use Config;
use Cache;

class IndexController extends Controller {

	public function __construct()
	{
		//$this->middleware('auth');
		$tk = Session::get('tk');
		if(empty($tk)){
			Session::put('tk', sha1(time().'random_token'.rand(1,99999)));
			unset($tk);
		}else{
			unset($tk);
		}
		//设置新品时间，5天内为新品
		$this->newproduct_period = intval(Config::get('mushroom.newproduct_period'));
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */

	//首页
	public function getIndex()
	{
		$Merchandise = new Merchandise();
		$res = $Merchandise->getByIsStar(1);
		$view = view('index.index');
		$cplist = $res['data'];
		//echo json_encode(Session::get('isLogin'));die;
		$view->with('username', Session::get('User_Name'));
		$view->with('cplist', $cplist);
		$view->with('base_time',strftime("%Y-%m-%d %H:%M:%S", time()-3600*24*$this->newproduct_period));
		return $view;
	}

	//关于我们页面
	public function getAbout()
	{
		$view = view('index.about');
		//echo json_encode(Session::get('isLogin'));die;
		$view->with('username', Session::get('User_Name'));
		$view->with('base_time',strftime("%Y-%m-%d %H:%M:%S", time()-3600*24*$this->newproduct_period));
		return $view;
	}

	//追溯信息页面
	public function getTrack()
	{
		$Tracer = new Tracking();
		$ZSID = Request::input('ZSID', 0);
		$res = $Tracer->getByZSID($ZSID);
		$tracking_list = $res['data'];
		//echo json_encode($a);die;
		$view = view('index.tracking');
		$view->with('username', Session::get('User_Name'));
		$view->with('tracking_list', $tracking_list);
		return $view;
	}

	//新闻页面
	public function getNews()
	{
		$Newser = new News();
		$Page = Request::input('Page', 1);
		$ret = $Newser->getNewsByStatus(1, $Page, 5);
		$news_list = $ret['data'];
		$view = view('index.news');
		$view->with('newslist', $news_list);
		$view->with('currentpage', $ret['currentpage']);
		$view->with('totalpage', $ret['totalpage']);
		return $view;
	}

	//新闻页面
	public function getNewsdetail()
	{
		$Newser = new News();
		$NEWSID = Request::input('NEWSID', 0);
		if($NEWSID == 0){
			 return redirect('/news');
		}
		$ret = $Newser->getByNEWSID($NEWSID);
		$news = $ret['data'];
		if(count($news) != 1){
			return redirect('/news');
		}
		$news = $news[0];
		//echo json_encode($news);die;
		$view = view('index.newsdetail');
		$view->with('news', $news);
		return $view;
	}

	//产品列表页面
	public function getCategory()
	{
		$Merchandise = new Merchandise();
		$Page = Request::input('Page', 1);
		$ret = $Merchandise->getAll($Page, 8);
		$view = view('index.category');
		$cplist = $ret['data'];
		//当前页面展示结果个数
		$count = count($cplist);
		$view->with('username', Session::get('User_Name'));
		$view->with('cplist', $cplist);
		$view->with('count', $count);
		$view->with('currentpage', $ret['currentpage']);
		$view->with('totalpage', $ret['totalpage']);
		$view->with('base_time',strftime("%Y-%m-%d %H:%M:%S", time()-3600*24*$this->newproduct_period));
		//echo json_encode($ret);die;
		return $view;
	}

	//产品详情页面
	public function getProductdetail()
	{
		$CPID = Request::input('CPID', 0);
		$Merchandise = new Merchandise();
		$res = $Merchandise->getByCPID($CPID);
		$view = view('index.index');
		$cpinfo = $res['data'][0];
		//echo json_encode($cpinfo);die;
		$view = view('index.productdetail');
		$view->with('username', Session::get('User_Name'));
		$view->with('cpinfo', $cpinfo);
		return $view;
	}

	//订单页面
	public function getOrdermanage()
	{
		$UserModel = new User();
		$auth = $UserModel->checkLogin();
		if(!$auth){
			 return redirect('/');
		}

		$User_ID = Session::get("User_ID");
		$Page = Request::input('Page', 1);
		$Order = new Order();
		$res = $Order->getByUserID($User_ID);
		//echo json_encode($res);die;
		$view = view('index.order');
		$view->with('username', Session::get('User_Name'));
		$view->with('totalpage', $res['totalpage']);
		$view->with('currentpage', $Page);
		$view->with('orderlist', $res['data']);
		return $view;
	}

	//购物车页面
	public function getCart()
	{
		$UserModel = new User();
		$auth = $UserModel->checkLogin();
		if(!$auth){
			 return redirect('/');
		}

		$User_ID = Session::get("User_ID");

		$Cart = new Cart();
		$res = $Cart->getByUserID($User_ID);
		$totalprice = 0;
		foreach($res as $entity){
			$totalprice = $totalprice + $entity['totalprice'];
		}
		$payprice = $totalprice;
		//echo json_encode($res);die;
		$view = view('index.cart');
		$view->with('username', Session::get('User_Name'));
		$view->with('productlist', $res);
		$view->with('totalprice', $totalprice);
		$view->with('payprice', $payprice);
		return $view;
	}

	//订单地址编辑确认
	public function getCheckout()
	{
		$UserModel = new User();
		$auth = $UserModel->checkLogin();
		if(!$auth){
			 return redirect('/');
		}

		$User_ID = Session::get("User_ID");
		$stamp = Request::input('Stamp', 0);
		if(0 == $stamp){
			$stamp = time();
		}
		$CacheKey = 'preorder_'.$User_ID.'_'.$stamp;

		//拿取缓存中预订单数据
		if (Cache::has($CacheKey)) {
		    $preorder_array = Cache::get($CacheKey);
		}else{
			$preorder_array = array();
		}

		//如果预订单中没有产品数据,塞入产品数据
		if(empty($preorder_array) or empty($preorder_array['step'])){
			$Cart = new Cart();
			$res = $Cart->getByUserID($User_ID);
			$totalprice = 0;
			foreach($res as $entity){
				//商品总价
				$totalprice = $totalprice + $entity['totalprice'];
			}
			//支付总价（暂时不做运费处理）
			$payprice = $totalprice;
			//echo json_encode($res);die;
			$preorder_array['product'] = $res;
			$preorder_array['payprice'] = $payprice;
			$preorder_array['totalprice'] = $totalprice;
			$preorder_array['step'] = 1;
		}
		
		//写入缓存，考虑误操作，60min之后过期
		Cache::put($CacheKey, $preorder_array, 60);
		//echo json_encode($preorder_array);die;

		$view = view('index.checkout');
		$view->with('username', Session::get('User_Name'));
		$view->with('stamp', $stamp);
		$view->with('totalprice', $preorder_array['totalprice']);
		$view->with('payprice', $preorder_array['payprice']);
		$view->with('preorder_array', $preorder_array);
		return $view;
	}

	//订单配送确认
	public function getOrderdispatch()
	{
		$UserModel = new User();
		$auth = $UserModel->checkLogin();
		if(!$auth){
			 return redirect('/');
		}

		$User_ID = Session::get("User_ID");
		$stamp = Request::input('Stamp', 0);

		$CacheKey = 'preorder_'.$User_ID.'_'.$stamp;

		//拿取缓存中预订单数据
		if (Cache::has($CacheKey)) {
		    $preorder_array = Cache::get($CacheKey);
		}else{
			$preorder_array = array();
		}

		if(0==$stamp or empty($preorder_array) or intval($preorder_array['step']) <= 1){
			return redirect('/checkout?Stamp='. $stamp);
		}

		$view = view('index.orderdispatch');
		$view->with('username', Session::get('User_Name'));
		$view->with('stamp', $stamp);
		$view->with('totalprice', $preorder_array['totalprice']);
		$view->with('payprice', $preorder_array['payprice']);
		$view->with('preorder_array', $preorder_array);
		return $view;
	}

	//确认订单页面
	public function getOrderconfirm()
	{
		$UserModel = new User();
		$auth = $UserModel->checkLogin();
		if(!$auth){
			 return redirect('/');
		}

		$User_ID = Session::get("User_ID");
		$stamp = Request::input('Stamp', 0);

		$CacheKey = 'preorder_'.$User_ID.'_'.$stamp;

		//拿取缓存中预订单数据
		if (Cache::has($CacheKey)) {
		    $preorder_array = Cache::get($CacheKey);
		}else{
			$preorder_array = array();
		}

		if(0==$stamp or empty($preorder_array) or intval($preorder_array['step']) <= 2){
			return redirect('/checkout?Stamp='. $stamp);
		}
		//echo json_encode($preorder_array);die;
		$view = view('index.orderconfirm');
		$view->with('username', Session::get('User_Name'));
		$view->with('stamp', $stamp);
		$view->with('totalprice', $preorder_array['totalprice']);
		$view->with('payprice', $preorder_array['payprice']);
		$view->with('preorder_array', $preorder_array);
		return $view;
	}
}
