<?php

session_start();
require '../functions.php';
require '../database.php';


$orderid = $_GET['orderid'];
$statv = $_GET['statv'];

$sql = "UPDATE `orders` SET `OrderStatus` = '$statv' WHERE `orders`.`idOrders` = $orderid ";
    global $dbConn;
    $test = $dbConn->query($sql) or die("Could not execute mysqli QUERY090 - Voucher");


 ?>
