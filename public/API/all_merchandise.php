
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
$type = $_REQUEST["type"];
$type = intval($type);
$startid = intval($_REQUEST["startid"]);
$limit = intval($_REQUEST["limit"]);
if(0 == $limit){
	$limit += 1;
};


$sql = "SELECT * FROM mushroom_cp WHERE 产品类别=" . $type . ' AND CPID > ' . $startid . ' LIMIT ' . $limit;

$con = mysql_connect($db_host . ':' . $db_port,$db_username,$db_password);

mysql_select_db($db_scheme);
mysql_query("set character set 'utf8'");
mysql_query("set names 'utf8'");

$a2=mysql_query($sql,$con) or die;

$ret = array();

$count = 0;

while($row2=mysql_fetch_array($a2))
{
	$tmp = array('status'=>0, 
			     'cp_name'=>$row2["产品名称"],
				 'cp_detail'=>$row2["产品简介"],
				 'cp_selled_count'=>$row2["总销售量"],
				 'cp_comment'=>$row2["评论总数"],
			     'cp_image'=>$row2["展示图片"],
			     'cp_price'=>$row2["单价"],
			     'cp_spec'=>$row2["规格"],
			     'cp_stock'=>$row2["库存"],
				 'cp_discount'=>$row2["折扣"],
				 'cp_id' => $row2["CPID"],
				 );

 	$ret[$count] = $tmp; 
	$count += 1;

}

$ret = array('status'=>0,
			 'error_msg'=>'',
			 'data'=>$ret,
			);

echo json_encode($ret);

mysql_close($con);

?>
