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
    
    $name = $_REQUEST["name"];
    $company = $_REQUEST["company"];
    $address = $_REQUEST["address"];
    $address2 = $_REQUEST["address2"];
    $city = $_REQUEST["city"];
    $province = $_REQUEST["province"];
    $code = $_REQUEST["code"];
    $note = $_REQUEST["note"];
    $mobile = $_REQUEST["mobile"];
    $title = $_REQUEST["title"];
    $YHID = intval($_REQUEST["YHID"]);
    
    $con = mysql_connect($db_host . ':' . $db_port,$db_username,$db_password);
    mysql_select_db($db_scheme);
    mysql_query("set character set 'utf8'");
    mysql_query("set names 'utf8'");
    
    $sql = "INSERT INTO `mushroom`.`mushroom_dz` ( `地址名称`, `收货人`, `公司`, `省会`, `城市`, `地址`, `地址2`, `邮编`,  `联系号码`, `备注`, `操作`, `状态`, `YHID`) VALUES ('" . $title . "','" . $name . "','" . $company . "','" . $province . "','" . $city . "','" . $address . "','" . $address2 . "','" . $code . "','" . $mobile . "','" . $note . "','" . "1" . "','" . "1" . "','" . $YHID . "')";
    
    
    $a2=mysql_query($sql,$con)or die("对不起，读入数据时出错了！". mysql_error());
    
    if(1 == $a2){
        echo json_encode(array('status'=>0,'msg'=>'Successfully Import'));
    }
    else{
        echo json_encode(array('status'=>999,'msg'=>"MySQL Error!"));
    }
    mysql_close($con);
    
    ?>
