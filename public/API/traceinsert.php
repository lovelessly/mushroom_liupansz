
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
    $gsid = intval($_REQUEST["GSID"]);
    $cpid = intval($_REQUEST["CPID"]);
    $desc = addslashes($_REQUEST["desc"]);
    $opt = addslashes($_REQUEST["opt"]);

$sql1 = "SELECT * FROM mushroom_zs where ZSID='".intval($_REQUEST["ZSID"])."'";

$sql = "INSERT INTO mushroom_zs (`ZSID`,`GSID`,`CPID`,`ADD_TIME`,`MOD_TIME`) VALUES (" . $zsid . "," . $gsid . "," . $cpid . "," . time() . "," . time() .")";

$con = mysql_connect($db_host . ':' . $db_port,$db_username,$db_password);
    
$sql2 = "INSERT INTO mushroom_zx (`时间`,`描述`,`操作员`,`ZSID`) VALUES (" . time() . ",'" . $desc . "','" . $opt . "'," . $zsid .")";

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
//echo json_encode(array('status'=>1,'msg'=>'ZSID has already exist!'));
    $a3=mysql_query($sql2,$con);
    if(1 == $a3){
        echo json_encode(array('status'=>0,'msg'=>'Successfully Insert!'));
    }
    else{
        echo json_encode(array('status'=>0,'msg'=>'Mysql Error!!!'));
    }
}
else
{
$a2=mysql_query($sql,$con);
    if(1 == $a2){
        //echo json_encode(array('status'=>0,'msg'=>'Successfully Insert!'));
        $a3=mysql_query($sql2,$con);
        if(1 == $a3){
            echo json_encode(array('status'=>0,'msg'=>'Successfully Insert!'));
        }
        else{
            echo json_encode(array('status'=>0,'msg'=>'Mysql Error!'));
        }
    }
    else{
        echo json_encode(array('status'=>999,'msg'=>"MySQL Error!"));
    }
};
mysql_close($con);

?>
