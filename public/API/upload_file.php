<?php
session_start();
//if($_SESSION['islogin'] == 0){
//    echo json_encode(array('status' => 999, 'msg' => 'Check Login Faild'));
//    die;
//};
include('./setting.php');
$settings = new Settings_PHP;
$settings->load('./config.php');
    
$db_host = $settings->get('db.host');
$db_port = $settings->get('db.port');
$db_username = $settings->get('db.username');
$db_scheme = $settings->get('db.name');
$db_password = $settings->get('db.password');

if ($_FILES["file"]["size"] < 200000000)
  {
  if ($_FILES["file"]["error"] > 0)
    {
    //echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    echo json_encode(array('status' => 999, 'msg' => 'File Error'));
    }
  else
    {
    //echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    //echo "Type: " . $_FILES["file"]["type"] . "<br />";
    //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
    $filename = sha1($_FILES["file"]["name"] . time()) . '.jpg';
    
    if (file_exists("../upload/" . $filename))
      {
      echo json_encode(array('status' => 999, 'msg' => 'File Exist'));
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"], "../upload/" . $filename);
      echo json_encode(array('status' => 0, 'msg' => 'Success', 'data' => $filename));
      }
    }
  }
else
  {
  echo json_encode(array('status' => 999, 'msg' => 'Type Error'));
  }
?>