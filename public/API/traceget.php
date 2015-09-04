
<?php

session_start();


include('./setting.php');
$settings = new Settings_PHP;
$settings->load('./config.php');

$db_host = $settings->get('db.host');
$db_port = $settings->get('db.port');
$db_username = $settings->get('db.username');
$db_scheme = $settings->get('db.name');
$db_password = $settings->get('db.password');

$zsid = intval($_REQUEST["ZSID"]);

$sql = "SELECT * FROM mushroom_zx where ZSID=" . $zsid . " ORDER BY `时间` DESC;";

$con = mysql_connect($db_host . ':' . $db_port,$db_username,$db_password);
    
if (!$con)
{
      echo json_encode(array('status'=>999,'msg'=>"Could not connect to MySQL server."));
}

mysql_select_db($db_scheme);
mysql_query("set character set 'utf8'");
mysql_query("set names 'utf8'");

    $ret = array();
    
    $count = 0;
    
    $a2=mysql_query($sql,$con) or die;
    
    while($row2=mysql_fetch_array($a2))
    {
        $tmp = array('status'=>0,
                     'opt_time'=>date('Y-m-d H:i:s',$row2["时间"]),
                     'opt_desc'=>$row2["描述"],
                     'opt'=>$row2["操作员"],
                     );
        
        $ret[$count] = $tmp; 
        $count += 1;
        
    }
    
    $ret = array('status'=>0,
                 'error_msg'=>'',
                 'data'=>$ret,
                 );
    if(0 == $count){
        $ret['status'] = -1;
        $ret['error_msg'] = 'Error ZSID';
    }
    
    echo json_encode($ret);
    
    mysql_close($con);

?>
