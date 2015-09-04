<?php

namespace App\Models;

use DB;
use Session;
use App\Models\Jsonp;
use Request;

date_default_timezone_set('PRC'); 

Class Cart {

	//获取指定ID的对应购物车信息
	public function getByUserID($UserID){
		$YHID = ''.$UserID;
		$ret = array();
		$records = DB::table('mushroom_gwc')->where('YHID', '=', $YHID)->join('mushroom_cp', 'mushroom_gwc.CPID', '=', 'mushroom_cp.CPID')->get();
		foreach($records as $obj){
			$tmp = (array)$obj;
			$tmp['totalprice'] = intval($tmp['Count']) * intval($tmp['单价']);
			array_push($ret, $tmp);
			unset($tmp);
		}

		return $ret;
	}

	//更新对应购物车对应产品数量
	public function update($User_ID, $CPID, $Count){
		$YHID = ''.$User_ID;
		$count = DB::table('mushroom_gwc')->where('YHID', '=', $YHID)->where('CPID', '=', $CPID)->count();
		if($count != 0 and $Count != -1){
			//修改购物车数量
			$ret = DB::table('mushroom_gwc')->where('YHID', '=', $YHID)->where('CPID', '=', $CPID)->update(array('Count' => $Count));
		}elseif($count == 0){
			//将新产品添加进购物车
			$ret = DB::table('mushroom_gwc')->insert(array('CPID' => $CPID, 'Count' => 1, 'YHID' => $YHID));
		}else{
			//
		}
		return true;
	}

	//删除对应购物车对应产品
	public function delete($User_ID, $CPID){
		$YHID = ''.$User_ID;
		DB::table('mushroom_gwc')->where('YHID', '=', $YHID)->where('CPID', '=', $CPID)->delete();
		return true;
	}
}

?>
