<?php

ob_start();
const DB_HOST = 'localhost';
const DB_USER = 'afmfaith_masagwa';
const DB_PASS = 'Mrnaledi@3007';
const DB_NAME = 'afmfaith_magicflower';

$dbConn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>
