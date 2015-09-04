<?php

namespace App\Models;

use DB;
use Session;
use Config;
use Cache;

date_default_timezone_set('PRC'); 

Class Order {

	public function __construct(){

		//需要配置主域
		$this->domain = Config::get('app.domain');

	}

	//依据用户ID获取指定订单
	public function getByUserID($YHID, $page = 1, $length = 20){
		$ret = array();
		$count = DB::table('mushroom_dd')->where('YHID', '=', $YHID)->count();
		$main = DB::table('mushroom_dd')->where('mushroom_dd.YHID', '=', $YHID)->orderBy('DDID', 'desc')->join('mushroom_yh', 'mushroom_dd.YHID', '=', 'mushroom_yh.YHID')
														 ->skip(($page-1)*$length)->take($length)
														 ->get();
		foreach($main as $obj){
			$tmp = (array)$obj;
			$productinfo = DB::table('mushroom_dx')->where('DDID', '=', $tmp['DDID'])->join('mushroom_cp', 'mushroom_dx.CPID', '=', 'mushroom_cp.CPID')->get();
			$tmp['product_list'] = array();
			$totalcount = 0;
			foreach($productinfo as $obj){
				$tmp_1 = (array)$obj;
				array_push($tmp['product_list'], $tmp_1);
				$totalcount +=  intval($tmp_1['Count']);
				unset($tmp_1);
			}
			$tmp['totalcount'] = $totalcount;
			array_push($ret, $tmp);
			unset($tmp);
		}

		$totalpage = ceil($count/$length);
		$ret = array('domain'=>$this->domain, 'currentpage'=>$page, 'elements_per_page' => $length, 'totalpage'=>$totalpage, 'data'=>$ret);
		return $ret;
	}

	//依据订单ID获取指定订单
	public function getByOrderID($OrderID, $page = 1, $length = 20){
		$ret = array();
		$count = DB::table('mushroom_dd')->where('DDID', '=', $OrderID)->count();
		$main = DB::table('mushroom_dd')->where('DDID', '=', $OrderID)->orderBy('DDID', 'desc')->join('mushroom_yh', 'mushroom_dd.YHID', '=', 'mushroom_yh.YHID')
														 ->skip(($page-1)*$length)->take($length)
														 ->get();
		foreach($main as $obj){
			$tmp = (array)$obj;
			$productinfo = DB::table('mushroom_dx')->where('DDID', '=', $tmp['DDID'])->join('mushroom_cp', 'mushroom_dx.CPID', '=', 'mushroom_cp.CPID')->get();
			$tmp['product_list'] = array();
			$totalcount = 0;
			foreach($productinfo as $obj){
				$tmp_1 = (array)$obj;
				array_push($tmp['product_list'], $tmp_1);
				$totalcount +=  intval($tmp_1['Count']);
				unset($tmp_1);
			}
			$tmp['totalcount'] = $totalcount;
			array_push($ret, $tmp);
			unset($tmp);
		}

		$totalpage = ceil($count/$length);
		$ret = array('domain'=>$this->domain, 'currentpage'=>$page, 'elements_per_page' => $length, 'totalpage'=>$totalpage, 'data'=>$ret);
		return $ret;
	}

	//获取所有订单
	public function getAllOrder($page = 1, $length = 20){
		$ret = array();
		$count = DB::table('mushroom_dd')->count();
		$main = DB::table('mushroom_dd')->orderBy('DDID', 'desc')->join('mushroom_yh', 'mushroom_dd.YHID', '=', 'mushroom_yh.YHID')
														 ->skip(($page-1)*$length)->take($length)
														 ->get();
		foreach($main as $obj){
			$tmp = (array)$obj;
			$productinfo = DB::table('mushroom_dx')->where('DDID', '=', $tmp['DDID'])->join('mushroom_cp', 'mushroom_dx.CPID', '=', 'mushroom_cp.CPID')->get();
			$tmp['product_list'] = array();
			$totalcount = 0;
			foreach($productinfo as $obj){
				$tmp_1 = (array)$obj;
				array_push($tmp['product_list'], $tmp_1);
				$totalcount +=  intval($tmp_1['Count']);
				unset($tmp_1);
			}
			$tmp['totalcount'] = $totalcount;
			array_push($ret, $tmp);
			unset($tmp);
		}

		$totalpage = ceil($count/$length);
		$ret = array('domain'=>$this->domain, 'currentpage'=>$page, 'elements_per_page' => $length, 'totalpage'=>$totalpage, 'data'=>$ret);
		return $ret;
	}

	//修改订单状态
	public function modOrderStatus($OrderID, $OrderStatus){
		$Order_Status = intval($OrderStatus);
		$Order_ID = intval($OrderID);
		$ret_1 = DB::table('mushroom_dd')->where('DDID', '=', $OrderID)->take(1)->get();
		$OrderInfo = array();
		foreach($ret_1 as $obj){
			$OrderInfo = (array)$obj;
		}
		if(intval($OrderInfo['交易状态']) > $Order_Status){
			return false;
		}else{
			$ret = DB::table('mushroom_dd')->where('DDID', '=', $Order_ID)->update(array('交易状态' => $Order_Status));
			return true;
		}
	}

	//删除订单
	public function delete($OrderID){
		$Order_ID = intval($OrderID);
		$ret = DB::table('mushroom_dd')->where('DDID', '=', $Order_ID)->delete();
		$ret = DB::table('mushroom_dx')->where('DDID', '=', $Order_ID)->delete();
		return true;
	}

	//修改预订单地址信息
	public function modPreOrderAddress($Stamp, $data_array) {
		$User_ID = Session::get("User_ID");
		$CacheKey = 'preorder_'.$User_ID.'_'.$Stamp;
		$preorder_array = Cache::get($CacheKey);
		$preorder_array = array_merge($preorder_array, $data_array);
		$preorder_array['step'] = 2;
		Cache::put($CacheKey, $preorder_array, 30);
		return true;
	}

	//修改预订单配送信息
	public function modPreOrderDispatch($Stamp, $data_array) {
		$User_ID = Session::get("User_ID");
		$CacheKey = 'preorder_'.$User_ID.'_'.$Stamp;
		$preorder_array = Cache::get($CacheKey);
		$current_step = $preorder_array['step'];
		if($current_step < 2){
			return false;
		}else{
			$preorder_array = array_merge($preorder_array, $data_array);
			$preorder_array['step'] = 3;
			Cache::put($CacheKey, $preorder_array, 30);
			return true;
		}
	}

	//确认生成订单
	public function Confirm($Stamp) {
		$User_ID = Session::get("User_ID");
		$CacheKey = 'preorder_'.$User_ID.'_'.$Stamp;
		$preorder_array = Cache::get($CacheKey);
		$current_step = $preorder_array['step'];

		$data_array = array();

		if($current_step < 3){
			return false;
		}else{
			$data_array['下单时间'] = strftime("%Y-%m-%d %H:%M:%S", time());
			$data_array['金额'] = $preorder_array['payprice'];
			$data_array['运费'] = 0;
			$data_array['送货方式'] = $preorder_array['dispatcher'];
			$data_array['送货地址'] = $preorder_array['province'].$preorder_array['city'].$preorder_array['address_1'].$preorder_array['address_2'];
			$data_array['交易状态'] = 1;
			$data_array['ZSID'] = 1;
			$data_array['YHID'] = Session::get("User_ID");
			$data_array['tip'] = $preorder_array['tips'];
			$data_array['zipcode'] = $preorder_array['code'];
			$id = DB::table('mushroom_dd')->insertGetId($data_array);
			if(!$id){
				return false;
			}else{
				foreach($preorder_array['product'] as $product){
					$tmp_array = array();
					$tmp_array['CPID'] = $product['CPID'];
					$tmp_array['Count'] = $product['Count'];
					$tmp_array['DDID'] = $id;
					DB::table('mushroom_dx')->insert($tmp_array);
					unset($tmp_array);
				}
				//删除预订单
				Cache::forget($CacheKey);
				$YHID = Session::get("User_ID");
				//删除购物车
				DB::table('mushroom_gwc')->where('YHID','=', $YHID)->delete();
				return true;
			}
		}
	}
}

?>
