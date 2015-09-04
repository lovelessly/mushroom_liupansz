<?php

namespace App\Models;

use DB;
use Session;
use Config;

date_default_timezone_set('PRC'); 

Class Merchandise {

	public function __construct(){

		//需要配置主域
		$this->domain = Config::get('app.domain');

	}

	//所有产品获取
	public function getAll($page = 1, $length = 20){
		$ret = array();
		$count = DB::table('mushroom_cp')->count();
		$materials = DB::table('mushroom_cp')->orderBy('Create_Time', 'desc')->skip(($page-1)*$length)->take($length)->get();
		foreach($materials as $obj){
			array_push($ret, (array)$obj);
		}
		$totalpage = ceil($count/$length);
		$ret = array('currentpage'=>$page, 'elements_per_page' => $length, 'totalpage'=>$totalpage, 'data'=>$ret);
		return $ret;
	}

	//根据产品类别获取
	public function getByCPType($CPType, $page = 1, $length = 20){
		$ret = array();
		$count = DB::table('mushroom_cp')->where('产品类别', '=', $CPType)->count();
		$materials = DB::table('mushroom_cp')->where('产品类别', '=', $CPType)->orderBy('Create_Time', 'desc')->skip(($page-1)*$length)->take($length)->get();
		foreach($materials as $obj){
			$tmp = (array)$obj;
			array_push($ret, $tmp);
			unset($tmp);
		}
		$totalpage = ceil($count/$length);
		$ret = array('currentpage'=>$page, 'elements_per_page' => $length, 'totalpage'=>$totalpage, 'data'=>$ret);
		return $ret;
	}

	//根据CPID获取单条信息
	public function getByCPID($CPID){
		$ret = array();
		$materials = DB::table('mushroom_cp')->where('CPID', '=', $CPID)->get();
		foreach($materials as $obj){
			$tmp = (array)$obj;
			array_push($ret, $tmp);
			unset($tmp);
		}
		$ret = array('currentpage'=> 1, 'elements_per_page' => 1, 'totalpage'=> 1, 'data'=>$ret);
		return $ret;
	}

	//根据是否明星产品获取
	public function getByIsStar($isStar, $page = 1, $length = 20){
		$ret = array();
		$count = DB::table('mushroom_cp')->where('isstar', '=', $isStar)->count();
		$materials = DB::table('mushroom_cp')->where('isstar', '=', $isStar)->orderBy('Create_Time', 'desc')->skip(($page-1)*$length)->take($length)->get();
		foreach($materials as $obj){
			array_push($ret, (array)$obj);
		}
		$totalpage = ceil($count/$length);
		$ret = array('currentpage'=>$page, 'elements_per_page' => $length, 'totalpage'=>$totalpage, 'data'=>$ret);
		return $ret;
	}

	//添加一条新的产品
	public function insertProduct($data_array){
		$ret = DB::table('mushroom_cp')->insert($data_array);
		return $ret;
	}

	//删除一条产品记录
	public function deleteCP($CPID){
		$ContentID = intval($CPID);
		$ret = DB::table('mushroom_cp')->where('CPID', '=', $CPID)->delete();
		return $ret;
	}


	//修改一条产品
	public function updateproduct($CPID, $data_array){
		$CPID = intval($CPID);
		$ret = DB::table('mushroom_cp')->where('CPID', '=', $CPID)->update($data_array);
		return $ret;
	}

}

?>
