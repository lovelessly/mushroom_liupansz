<?php

namespace App\Models;

use DB;
use Session;

date_default_timezone_set('PRC'); 

Class Tracking {

	public function __construct(){

		//需要配置主域
		$this->domain = 'http://mushroom；.baidu.com:8702';

	}

	//根据追溯ID获取
	public function getByZSID($ZSID, $page = 1, $length = 20){
		$ret = array();
		$count = DB::table('mushroom_zx')->where('ZSID', '=', $ZSID)->count();
		$materials = DB::table('mushroom_zx')->where('ZSID', '=', $ZSID)->orderBy('Opt_Time', 'desc')->get();
		foreach($materials as $obj){
			$tmp = (array)$obj;
			array_push($ret, $tmp);
			unset($tmp);
		}
		$totalpage = ceil($count/$length);
		$ret = array('currentpage'=>$page, 'elements_per_page' => $length, 'totalpage'=>$totalpage, 'data'=>$ret);
		return $ret;
	}

	//添加一条新的追溯ID以及相关记录
	//data_array包含所有记录
	public function insertNewLog($data_array){
		$create_time = strftime("%Y-%m-%d %H:%M:%S", time());
		$ZSID = DB::table('mushroom_zs')->insertGetId(array('Create_Time' => $create_time, 'Update_Time' => $create_time));
		foreach($data_array as $entity_array){
			$entity_array['ZSID'] = $ZSID;
			$ret = DB::table('mushroom_zx')->insert($entity_array);
			if(!$ret){
				return false;
			}
		}
		return $ZSID;
	}

	//修改一条追溯ID下的追溯记录
	//data_array包含所有记录
	public function modLog($ZSID, $data_array){
		$old = array();
		$ZSID = intval($ZSID);

		//修补zs表
		$count = DB::table('mushroom_zs')->where('ZSID', '=', $ZSID)->count();
		$create_time = strftime("%Y-%m-%d %H:%M:%S", time());
		if($count == 0){
			DB::table('mushroom_zs')->insert(array('ZSID' => $ZSID, 'Create_Time' => $create_time, 'Update_Time' => $create_time));
		}

		//获取已有记录，并以操作时间作为唯一Key
		$oldrecord = DB::table('mushroom_zx')->where('ZSID', '=', $ZSID)->orderBy('Opt_Time', 'desc')->get();
		
		foreach($oldrecord as $obj){
			$tmp = (array)$obj;
			$old[$tmp['Opt_Time']] = $tmp;
			unset($tmp);
		}

		//对比新旧记录，如果操作时间已存在，修改当前记录，如果操作时间不存在，新增操作记录
		foreach($data_array as $entity_array){
			$entity_array['ZSID'] = $ZSID;
			if(array_key_exists($entity_array['Opt_Time'], $old)){
				$ret = DB::table('mushroom_zx')->where('Opt_Time', '=', $entity_array['Opt_Time'])->update($entity_array);
			}else{
				$ret = DB::table('mushroom_zx')->insert($entity_array);
				if(!$ret){
					return false;
				}
			}
		}

		//对比新旧记录，如果操作时间已存在，但是当前数据不存在，删除已有记录
		$new = array();
		foreach($data_array as $obj){
			$tmp = (array)$obj;
			$new[$tmp['Opt_Time']] = $tmp;
			unset($tmp);
		}

		foreach($old as $time => $entity_array){
			if(!array_key_exists($time, $new)){
				$ret = DB::table('mushroom_zx')->where('Opt_Time', '=', $entity_array['Opt_Time'])->where('ZSID', '=', $ZSID)->delete();
			}
		}

		return true;
	}

}

?>
