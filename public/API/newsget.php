
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


$con = mysql_connect($db_host . ':' . $db_port,$db_username,$db_password);
mysql_select_db($db_scheme);
mysql_query("set character set 'utf8'");
mysql_query("set names 'utf8'");

$sql = "SELECT * FROM `mushroom`.`mushroom_news` WHERE status=1 ORDER BY weight DESC LIMIT 100;";

$a2=mysql_query($sql,$con)or die("对不起，读入数据时出错了！". mysql_error());

$arrdata = array();
$count = 0;

while($row = mysql_fetch_array($a2)){
    $arrdata[$count] = array('newstitle' => $row['newstitle'],
                             'newscontent' => $row['newscontent'],
                             'imageurl' => $row['imgurl'],
                             'newsid' => $row['NEWSID'],
                             'news_mod_time' => strftime("%H:%M:%S %d-%m-%Y",$row['mod_time']),
                             );
    $count += 1;

}
echo json_encode(array('status' => 0, 'data' => $arrdata));

?>
