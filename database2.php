<?php

ob_start();
const DB_HOST = 'localhost';
const DB_USER = 'f2048920_masagwa';
const DB_PASS = 'Mrnaledi@30';
const DB_NAME = 'f2048920_masagwadi';

$dbConn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($dbConn ->connect_error) {
    trigger_error('Database connection failed: '  . $dbConn ->connect_error, E_USER_ERROR);
    echo 'nooooooo';
}




?>
