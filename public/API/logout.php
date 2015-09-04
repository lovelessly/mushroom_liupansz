
<?php

session_start();
    
if($_SESSION['islogin'] != 1){
    echo json_encode(array('status' => 0, 'msg' => 'Please Login First!'));
    die;
};
    
session_unset();
session_destroy();

if($_SESSION['islogin'] != 1){
	echo json_encode(array('status' => 0, 'msg' => 'Successful Logout!'));
	die;
};


?>
