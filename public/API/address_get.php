
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

$YHID = intval($_REQUEST['YHID']);

$con = mysql_connect($db_host . ':' . $db_port,$db_username,$db_password);
mysql_select_db($db_scheme);
mysql_query("set character set 'utf8'");
mysql_query("set names 'utf8'");

$sql = "SELECT * FROM `mushroom_dz` WHERE YHID=" . $YHID .";";

$a2=mysql_query($sql,$con)or die("对不起，读入数据时出错了！". mysql_error());

$arrdata = array();
$count = 0;

while($row = mysql_fetch_array($a2)){
    $arrdata[$count] = array('地址名称' => $row['地址名称'],
                             '姓名' => $row['收货人'],
                             '公司' => $row['公司'],
                             '省会' => $row['省会'],
                             '城市' => $row['城市'],
                             '地址' => $row['地址'],
                             '地址2' => $row['地址2'],
                             '邮编' => $row['邮编'],
                             '联系号码' => $row['联系号码'],
                             '备注' => $row['备注'],
                             );
    $count += 1;

}
echo json_encode(array('status' => 0, 'data' => $arrdata));

?>
