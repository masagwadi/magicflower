<?php
session_start();
require '../functions.php';
require '../database.php';
include("nav.php");


$oid = $_GET['oid'];

$sql = "DELETE FROM orders WHERE `idOrders` = '$oid' ";
global $dbConn;
$test = $dbConn->query($sql) or die("Could not execute mysqli QUERY090 - Voucher");


$sql = "DELETE FROM cleanertoorder WHERE `c2oorderID` = '$oid' ";
global $dbConn;
$test = $dbConn->query($sql) or die("Could not execute mysqli QUERY090 - Voucher");

?>