<!DOCTYPE html>
<html>
<?php
session_start();
require '../functions.php';

?>
<?php

if (!isset($_SESSION['masagwadi_tmp_admin'])) {
    redirect_to("login.php");
}
include("nav.php");

?>

<body>
    <header class="header">

        <span class="head">
            <div id="cssSlider" style="margin-top:50px;">
                <div id="sliderImages">


                    <img id="si_3" src="../img/slider/3.jpg"  alt="" />
                    <img id="si_3" src="../img/slider/office-cleaning-1.jpg"  alt="" />
                    <img id="si_5" src="../img/slider/5.jpg"  alt="" />
                    <div style="clear:left;"></div>
                    <div class="headinfo">
                        <h1><b>Welcome Admin <br> Serve</b></h1>
                        <br>
                        <a href="orders.php"><h2 class="button">Orders</h2></a>
                         <a href="cleaners.php"><h2 class="button">View Cleaners</h2></a>
                         <a href="admin.php"><h2 class="button">Admin</h2></a>
                         <a href="addcleaner.php"><h2 class="button">Add Cleaner</h2></a>
                         <a href="addvoucher.php"><h2 class="button">Add Voucher</h2></a>
                         <a href="voucher.php"><h2 class="button">View Vouchers</h2></a>
                    </div>
                </div>
            </div>
        </span>
    </header>


    <?php
    include("../footer.php");
?>
        <script src="js/index.js"></script>
</body>

</html>
