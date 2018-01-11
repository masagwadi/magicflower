<?php
ini_set('display_errors', 'off');
//ob_start("ob_gzhandler");
//error_reporting(E_ALL);


// database connection config
$dbHost = 'localhost';
$dbUser = 'f2048920_masagwa';
$dbPass = 'Mrnaledi@30';
$dbName = 'f2048920_masagwadi';

//Project data
$site_title = 'masagwadi';
$email_id = 'masagwadi@gmail.com';

// setting up the web root and server root for
// this shopping cart application
$thisFile = str_replace('\\', '/', __FILE__);
$docRoot = $_SERVER['DOCUMENT_ROOT'];

$webRoot  = str_replace(array($docRoot, 'library/config.php'), '', $thisFile);
$srvRoot  = str_replace('library/config.php', '', $thisFile);

define('WEB_ROOT', $webRoot);
define('SRV_ROOT', $srvRoot);



if (!get_magic_quotes_gpc()) {
    if (isset($_POST)) {
        foreach ($_POST as $key => $value) {
            $_POST[$key] =  trim(addslashes($value));
        }
    }

    if (isset($_GET)) {
        foreach ($_GET as $key => $value) {
            $_GET[$key] = trim(addslashes($value));
        }
    }
}

require_once 'database.php';


?>
