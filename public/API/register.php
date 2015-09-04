
<?php

session_start();

if($_SESSION['islogin'] == 1){
	Header("HTTP/1.1 301 Moved Permanently");
	Header("Location:main.php");
	die;
};

/*
echo $_POST["user_truename"]."\n";
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

$sql1 = "SELECT * FROM mushroom_yh where 用户名='".$_POST["user_accountname"]."'";

$sql = "INSERT INTO mushroom_yh (`YHID`,`用户名`,`密码`,`电子邮箱`) VALUES (".time()."001".rand(10000,99999).",'".$_POST["user_accountname"]."','".sha1($_POST["user_password"])."','".$_POST["user_emailaddress"]."')";

//echo $sql."\n";

$con = mysql_connect($db_host . ':' . $db_port,$db_username,$db_password);

if (!$con)
  {
      echo json_encode(array('status'=>999,'msg'=>"Could not connect to MySQL server."));
}

mysql_select_db($db_scheme);
mysql_query("set character set 'utf8'");
mysql_query("set names 'utf8'");

$result=mysql_query($sql1,$con);

if(mysql_num_rows($result))
{
//echo '1';
echo json_encode(array('status'=>1,'msg'=>'Account has already exist!'));
}
else
{
$a2=mysql_query($sql,$con);
    if(1 == $a2){
        echo json_encode(array('status'=>0,'msg'=>'Successfully Register'));
    }
    else{
        echo json_encode(array('status'=>999,'msg'=>"MySQL Error!"));
    }
};
mysql_close($con);

?>
