
<?php

session_start();

//if($_SESSION['islogin'] == 0){
//	echo json_encode(array('status' => 999, 'msg' => 'Check Login Faild'));
//	die;
//};

include('./setting.php');
$settings = new Settings_PHP;
$settings->load('./config.php');

$db_host = $settings->get('db.host');
$db_port = $settings->get('db.port');
$db_username = $settings->get('db.username');
$db_scheme = $settings->get('db.name');
$db_password = $settings->get('db.password');

$newstitle = $_REQUEST["newstitle"];
$newscontent = $_REQUEST["newscontent"];
$image = $_REQUEST["image"];
$image_web_root = "http://liupansa.com/upload/";
$imageurl = $image_web_root . $image;

$con = mysql_connect($db_host . ':' . $db_port,$db_username,$db_password);
mysql_select_db($db_scheme);
mysql_query("set character set 'utf8'");
mysql_query("set names 'utf8'");

$sql = "INSERT INTO `mushroom`.`mushroom_news` ( `newstitle`, `newscontent`, `imgurl`, `status`, `weight`, `mod_time`) VALUES ('" . $newstitle . "','" . $newscontent . "','" . $imageurl . "', 1, 1, " . time() . ")";

$a2=mysql_query($sql,$con)or die("对不起，读入数据时出错了！". mysql_error());

if(1 == $a2){
    echo json_encode(array('status'=>0,'msg'=>'Successfully Import'));
}
else{
    echo json_encode(array('status'=>999,'msg'=>"MySQL Error!"));
}
mysql_close($con);

?>
