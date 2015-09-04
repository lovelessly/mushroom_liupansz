<?php

namespace App\Models;

use DB;
use Session;
use App\Models\Jsonp;
use Request;

date_default_timezone_set('PRC'); 

Class User {

	//检查是否有后台管理权限
	public function checkAdmin(){
		//如果没有管理员权限，禁止对后台进行任何操作
		if(1 != Session::get('isAdmin') && Request::ajax()){
			$Jsonp = new Jsonp();
			$a = json_encode(array('status' => -1, 'errorMsg' => 'You have no Auth', 'data' => array(), 'Msg' => ''));
			echo $Jsonp->toJsonp($a);
			die;
		}elseif(1 != Session::get('isAdmin') && !Request::ajax()){
			return false;
		}else{
			return true;
		}
	}

	//检查是否有登录，管理员认为未登录
	public function checkLogin(){
		//如果没有登录权限，禁止查看某些页面
		if(!Session::get('isLogin') && Request::ajax()){
			$Jsonp = new Jsonp();
			$a = json_encode(array('status' => -1, 'errorMsg' => 'You have no Auth', 'data' => array(), 'Msg' => ''));
			echo $Jsonp->toJsonp($a);
			die;
		}elseif(!Session::get('isLogin') && !Request::ajax()){
			return false;
		}elseif(Session::get('isAdmin') == 1){
			return false;
		}else{
			return true;
		}
	}

	//检查是否有登录，不管是否管理员
	public function checkUserLogin(){
		//如果没有登录权限，禁止查看某些页面
		if(!Session::get('isLogin') && Request::ajax()){
			$Jsonp = new Jsonp();
			$a = json_encode(array('status' => -1, 'errorMsg' => 'You have no Auth', 'data' => array(), 'Msg' => ''));
			echo $Jsonp->toJsonp($a);
			die;
		}elseif(!Session::get('isLogin') && !Request::ajax()){
			return false;
		}else{
			return true;
		}
	}

	//登出接口
	public function logout(){
		Session::flush();
		if(Session::get('isLogin')){
			return false;
		}else{
			return true;
		}
	}

	//注册用户
	public function register($username, $password, $email){
		$YHID = time() . '000' . rand(10000, 99999);
		$data_array = array(
			'YHID' => $YHID,
			'用户名' => $username,
			'密码' => $password,
			'电子邮箱' => $email,
			);
		$ret = DB::table('mushroom_yh')->insert($data_array);
		if($ret === false){
			return false;
		}else{
			return true;
		}
	}

	//登录接口
	public function login($username, $password, $SessionToken){
		//Session::flush();
		//登陆前清理session中的垃圾数据
		//登录成功后数据存在Session中
		$tk = Session::get('tk');
		if(!empty($tk)){
			$tmp = Session::get('tk');
			Session::flush();
			Session::put('tk', $tmp);
			unset($tmp);
		}else{
			Session::flush();
		}
		$users = DB::table('mushroom_yh')->where('YHID', '>', 0)->where('用户名', '=', $username)->take(1)->get();
		//如果存在该用户
		if($users){
			$user = (array)$users[0];
			$password_sha1 = $user['密码'];
			$verify_password = sha1($password_sha1 . Session::get('tk'));
			//密码校验
			if($password == $verify_password){
				Session::put('User_Name', $user['用户名']);
				Session::put('isAdmin', $user['isAdmin']);
				Session::put('User_ID', $user['YHID']);
				Session::put('isLogin', true);
				return true;
			}else{
				return false;
			}
		//如果不存在该帐户
		}else{
			return false;
		}
	}

	//获取所有用户信息
	//status 预留字段
	public function getAllUser($status, $page = 1, $length = 20){
		$ret = array();
		$count = DB::table('mushroom_yh')->count();
		$users = DB::table('mushroom_yh')->orderBy('用户名')->skip(($page-1)*$length)->take($length)->get();
		foreach($users as $obj){
			$tmp = (array)$obj;
			array_push($ret, $tmp);
			unset($tmp);
		}
		$totalpage = ceil($count/$length);
		$ret = array('currentpage'=>$page, 'elements_per_page' => $length, 'totalpage'=>$totalpage, 'data'=>$ret);
		return $ret;
	}

	public function delete($YHID)
	{
		$ret = DB::table('mushroom_yh')->where('YHID', '=', $YHID)->delete();
		if($ret){
			return true;
		}else{
			return false;
		}
	}
}

?>
