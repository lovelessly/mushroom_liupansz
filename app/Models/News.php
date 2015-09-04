<?php

namespace App\Models;

use DB;
use Session;
use Config;

date_default_timezone_set('PRC'); 

Class News {

	public function __construct(){

		//需要配置主域
		$this->domain = Config::get('app.domain');

	}

	//获取所有新闻
	public function getAllNews($page = 1, $length = 20){
		$ret = array();
		$count = DB::table('mushroom_news')->count();
		$news = DB::table('mushroom_news')->orderBy('Update_Time', 'desc')->skip(($page-1)*$length)->take($length)->get();
		foreach($news as $obj){
			$tmp = (array)$obj;
			array_push($ret, $tmp);
			unset($tmp);
		}
		$totalpage = ceil($count/$length);
		$ret = array('domain'=>$this->domain, 'currentpage'=>$page, 'elements_per_page' => $length, 'totalpage'=>$totalpage, 'data'=>$ret);
		return $ret;
	}

	//根据新闻状态获取
	public function getNewsByStatus($status, $page = 1, $length = 20){
		$ret = array();
		$count = DB::table('mushroom_news')->where('status', '=', $status)->count();
		$news = DB::table('mushroom_news')->where('status', '=', $status)->orderBy('Update_Time', 'desc')->skip(($page-1)*$length)->take($length)->get();
		foreach($news as $obj){
			$tmp = (array)$obj;
			array_push($ret, $tmp);
			unset($tmp);
		}
		$totalpage = ceil($count/$length);
		$ret = array('domain'=>$this->domain, 'currentpage'=>$page, 'elements_per_page' => $length, 'totalpage'=>$totalpage, 'data'=>$ret);
		return $ret;
	}

	//根据NEWSID获取单条信息
	public function getByNEWSID($NEWSID, $page = 1, $length = 20){
		$ret = array();
		$count = DB::table('mushroom_news')->where('NEWSID', '=', $NEWSID)->count();
		$news = DB::table('mushroom_news')->where('NEWSID', '=', $NEWSID)->orderBy('Update_Time', 'desc')->skip(($page-1)*$length)->take($length)->get();
		foreach($news as $obj){
			$tmp = (array)$obj;
			array_push($ret, $tmp);
			unset($tmp);
		}
		$totalpage = ceil($count/$length);
		$ret = array('domain'=>$this->domain, 'currentpage'=>$page, 'elements_per_page' => $length, 'totalpage'=>$totalpage, 'data'=>$ret);
		return $ret;
	}

	//添加一条新新闻
	public function insertNews($data_array){
		$ret = DB::table('mushroom_news')->insert($data_array);
		return $ret;
	}

	//删除一条新闻
	public function deleteNews($NEWSID){
		$NEWSID = intval($NEWSID);
		$ret = DB::table('mushroom_news')->where('NEWSID', '=', $NEWSID)->delete();
		return $ret;
	}

	//修改一条新闻
	public function updateByID($NewsID, $update_array){
		$NewsID = intval($NewsID);
		$ret = DB::table('mushroom_news')->where('NEWSID', '=', $NewsID)->update($update_array);
		return true;
	}


}

?>
