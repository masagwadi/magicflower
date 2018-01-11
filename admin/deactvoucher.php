<?php
  session_start();
  require '../functions.php';
  require '../database.php';
  include("nav.php");


$vid = $_GET['vcode'];

    $sql = "UPDATE `vouchers` SET `status` = 'inactive' WHERE `voucherID` = '$vid' ";
    global $dbConn;
    $test = $dbConn->query($sql) or die("Could not execute mysqli QUERY090 - Voucher");


  ?>
