
<?php

    include('./setting.php');
    $settings = new Settings_PHP;
    $settings->load('./config.php');
    echo 'PHP: ' . $settings->get('db.host') . '';
    //echo '1';
?>
