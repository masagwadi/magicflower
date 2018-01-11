<?php
ob_start();
session_start();
require 'functions.php';
include 'database.php';


$code = $_GET['vcode'];
?>







<!doctype html>
    <html>

    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/formcalculations.js"></script>
    </head>






<?php

$sql = "SELECT * from vouchers WHERE voucherCode = '$code' AND status = 'active' ";
$result = $dbConn->query($sql) or die("Could not execute mysqli QUERY090 - I'm at Func login 21");
$row = dbFetchAssoc($result);


if ($result->num_rows != 1) {

  $error = "Invalid Code/Voucher";

  $results = "fail";

  $value = 0;
  $type = "null";
  $vid = "null";

}else{

  $value = $row['voucherValue'];
  $type = $row['voucherType'];
  $vid = $row['voucherID'];

$_SESSION['voucher']['value'] = $value;
$_SESSION['voucher']['type'] = $type;
$_SESSION['voucher']['vid'] = $vid;

// echo = "<script>createCookie('vouchvalue', ;".$_SESSION['voucher']['value']." , 7)</script>";

  if($type == "value"){
    $error = "Congrats a R$value discount will be applied to your order";
  }else{
    $error = "Congrats a $value% discount will be applied to your order";
  }


  $results = "5000";
}


 ?>



<div class="maerror">
  <h1><?php echo $error; ?></h1>
</div>
<div class="results">
    <?php echo $results; ?>
</div>

<div class="vvalue"><?php echo $value; ?></div>

<div class="vtype"><?php echo $type; ?></div>

<div class="vid"><?php echo $vid; ?></div>


<?php
include 'footer.php';
?>

</html>
