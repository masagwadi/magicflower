<?php
require_once 'database.php';
require_once 'functions.php';
include("nav.php");

if(!isset($_GET['code']) && !isset($_GET['email'])) {
  redirect_to("login");
}


$classzo = $hid = $emailErr = $firstnameErr = $lastnameErr = $usernameErr = $mobileErr = $passwordErr = $cpasswordErr = $genderErr = '';
$email = $firstname = $lastname = $username = $mobile = $password = $cpassword = '';
$class = 'none';

if(isset($_GET['code']) && isset($_GET['email'])) {
    $acode = $_GET['code'];
    $email = $_GET['email'];

    $query = "SELECT * FROM `customers` WHERE `activation_code`='$acode' AND `CustomerEmail`='$email' ";
    $resultcode=db_Query($query);
    if (dbNumRows($resultcode) < 1 ){

      $nah=0;
      $msg = "<div class='alert alert-danger'>
                          <button class='close' data-dismiss='alert'>&times;</button>
                          <strong>Sorry!</strong> Missing or expired CODE, try reseting your password again
                      </div>";

    $classzo = 'hide';

  }else{

    $query3 = "UPDATE `customers` SET `customers`.`active` = 1 WHERE `customers`.`activation_code` = '$acode' AND `CustomerEmail`='$email'";

    $resultcode2=db_Query($query3);

    $newcode=rand(1000000,9999999);

    $query4 = "UPDATE `customers` SET `customers`.`activation_code` = '$newcode' WHERE `customers`.`activation_code` = '$acode' AND `CustomerEmail`='$email'";

    $resultcode3=db_Query($query4);

    $msg = "<div class='alert alert-success'>
                        <button class='close' data-dismiss='alert'>&times;</button>
                        <strong>Welcome!</strong> Your account was activated, please login to continue
                    </div>";

  }





  }else{
    $nah=0;
    $msg = "<div class='alert alert-danger'>
                        <button class='close' data-dismiss='alert'>&times;</button>
                        <strong>Sorry!</strong> Missing or expired CODE, email us for assistance
                        </br>
                    </div>";
    $classzo = 'hide';



  }



?>



    <!DOCTYPE html>
    <html>

    <body class="mt100 thegirlsbg">
        <div style="text-align:center; margin-top:50px;background-image:url('images/banner.jpg');background-size: cover;min-height:100%;margin-bottom:0;color:white;padding:10px; padding-top:30px; ">

            <form action="" method="POST" style="max-width:600px; margin:15px auto;background-color:rgba(0,0,0,0.7);border-radius:10px;border:2px solid white;padding:15px;">
                <h1 class="form-signin-heading">Account Activation.</h1>
                <br />

                <?php
    if(isset($msg))
    {
        echo $msg;
    }
                ?>

            </form>




        </div>

    </body>

    </html>
