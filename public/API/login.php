
<?php

session_start();
if($_SESSION['islogin'] == 1){
	echo json_encode(array('status' => 0, 'key' => $_SESSION['sha1'], 'isAdmin'=>$_SESSION['isAdmin']));
	die;
};

/*
echo $_POST["user_name"]."\n";
echo $_POST["user_password"]."\n";
echo sha1($_POST["user_password"])."\n";
echo $_POST["user_mobilephone"]."\n";
echo $_POST["user_gender"]."\n";
echo $_POST["user_accountname"]."\n";
echo $_POST["user_emailaddress"]."\n";
echo $_POST["user_birthday"]."\n";
echo $_POST["user_address"]."\n";
echo $_POST["user_postcode"]."\n";
echo time()."001".rand(10000,99999)."\n";
*/

include('./setting.php');
$settings = new Settings_PHP;
$settings->load('./config.php');

$db_host = $settings->get('db.host');
$db_port = $settings->get('db.port');
$db_username = $settings->get('db.username');
$db_scheme = $settings->get('db.name');
$db_password = $settings->get('db.password');

$username=$_REQUEST["user_accountname"];
$password=sha1($_REQUEST["user_password"]);

$sql = "SELECT * FROM mushroom_yh where 用户名='".$username."' and 密码='".$password."'";

//$con = mysql_connect("localhost","root","root123");
$con = mysql_connect($db_host . ':' . $db_port,$db_username,$db_password);

mysql_select_db($db_scheme);
mysql_query("set character set 'utf8'");
mysql_query("set names 'utf8'");

$a2=mysql_query($sql,$con)or die("对不起，读入数据时出错了！". mysql_error());

/*

while($row2=mysql_fetch_array($a2))
{
echo '1';
$arr = array ('YHID'=>$row2["YHID"],'真实姓名'=>$row2['真实姓名'],'性别'=>$row2['性别']);
echo json_encode($arr);
echo "\n";
echo $arr['真实姓名'];
echo "\n";
echo sha1($arr['真实姓名']);
echo "\n";
echo openssl_digest($arr['真实姓名'],'sha512');
echo "\n";
//echo($row2["YHID"]."--".$row2['真实姓名'].'--'.$row2['性别']."<br>") ;
}
*/

if($row2=mysql_fetch_array($a2))
{
	$_SESSION['islogin'] = 1;
	$key = sha1(time().rand(10000,99999));
	$_SESSION['sha1'] = $key;
    $_SESSION['isAdmin'] = $row2['YHID'][12];
    $_SESSION['username'] = $row2['用户名'];
    $_SESSION['YHID'] = $row2['YHID'];
	echo json_encode(array('status'=>0, 'key'=>$key, 'isAdmin'=>$_SESSION['isAdmin']));
}
else{
	echo json_encode(array('status'=>601, 'msg'=>'No this user'));
}

mysql_close($con);

?>
