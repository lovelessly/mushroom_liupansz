
<?php

/* session_start();
if($_SESSION['islogin'] == 1){
	echo json_encode(array('status' => 0, 'key' => $_SESSION['sha1']));
	die;
}; */

include('./setting.php');
$settings = new Settings_PHP;
$settings->load('./config.php');

$db_host = $settings->get('db.host');
$db_port = $settings->get('db.port');
$db_username = $settings->get('db.username');
$db_scheme = $settings->get('db.name');
$db_password = $settings->get('db.password');

$YHID=$_REQUEST["YHID"];

$sql = "SELECT * FROM mushroom_sc where YHID='".$YHID."'";

$con = mysql_connect($db_host . ':' . $db_port,$db_username,$db_password);

mysql_select_db($db_scheme);
mysql_query("set character set 'utf8'");
mysql_query("set names 'utf8'");

$a2=mysql_query($sql,$con) or die;

$ret = array();

$count = 0;

while($row2=mysql_fetch_array($a2))
{

	$tmp = array('CPID'=>$row2['CPID'],
				 'cp_Type'=>$row2['产品类别'],
				 'AddTime'=>$row2['ADD_TIME'],
				);

 	$ret[$count] = $tmp; 

	$count += 1;

}

echo json_encode($ret);

mysql_close($con);

?>
