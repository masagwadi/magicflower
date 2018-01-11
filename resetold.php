<?php
require_once 'database.php';
require_once 'functions.php';
include("nav.php");

$classzo = $hid = $emailErr = $firstnameErr = $lastnameErr = $usernameErr = $mobileErr = $passwordErr = $cpasswordErr = $genderErr = '';
$email = $firstname = $lastname = $username = $mobile = $password = $cpassword = '';
$class = 'none';

if (empty($_POST["pass"])) {
    $nah=0;
}
elseif( $_POST["pass"] != $_POST["pass02"]){
    $cpasswordErr = "Passwords Dont Match";
    $nah=0;
}else {
    $nah=1;
}


if(isset($_GET['code'])) {
    $acode = $_GET['code'];
  }else{
    $nah==0;
    $msg = "<div class='alert alert-danger'>
                        <button class='close' data-dismiss='alert'>&times;</button>
                        <strong>Sorry!</strong> Missing or expired CODE, try reseting your password again
                        </br>
                        </br>
                        </br>
                        <a href='fpass'><p class='btn btn-sml btn-success'>Reset Password</p></a>
                    </div>";
    $classzo = 'hide';
  }

if(isset($_POST['pass']) && $nah==1 ){
    $pass = $_POST['pass'];


$query = "select * from wg_tbl_users where activation_code='$acode'";
$resultcode=db_Query($query);

 if (dbNumRows($resultcode) == 1 & isset($_POST['pass']))
{



$query3 = "UPDATE `wg_tbl_users` SET `wg_tbl_users`.`pwd` = PASSWORD('$pass') WHERE `wg_tbl_users`.`activation_code` = '$acode'";

$resultcode2=db_Query($query3);

$newcode=rand(1000000,9999999);

$query4 = "UPDATE `afmfaith_stokie`.`wg_tbl_users` SET `wg_tbl_users`.`activation_code` = '$newcode' WHERE `wg_tbl_users`.`activation_code` = '$acode'";

$resultcode3=db_Query($query4);

$msg = "<h4 class='alert alert-info'>
<button class='close' data-dismiss='alert'>&times;</button>
Password Changed
<br>
You can go and login
</br>
</br>
</br>
<a href='login'><p class='btn btn-sml btn-success'>Login</p></a>
</h4>";
}
else
{
$msg = "<div class='alert alert-danger'>
                    <button class='close' data-dismiss='alert'>&times;</button>
                    <strong>Sorry!</strong> Wrong CODE or expired, try reseting your password again
                    </br>
                    </br>
                    </br>
                    <a href='fpass'><p class='btn btn-sml btn-success'>Reset Password</p></a>
                </div>";

}}

?>



    <!DOCTYPE html>
    <html>

    <body>
        <div style="text-align:center; margin-top:50px;background-image:url('images/banner.jpg');background-size: cover;min-height:100%;margin-bottom:0;color:white;padding:10px; padding-top:30px; ">

            <form action="" method="POST" style="max-width:600px; margin:15px auto;background-color:rgba(0,0,0,0.7);border-radius:10px;border:2px solid white;padding:15px;">
                <h1 class="form-signin-heading">Password Reset.</h1>
                <br />

                <?php
    if(isset($msg))
    {
        echo $msg;
    }
                ?>
                <div class="<?php echo $classzo;?>">


                    <h4><span class="tred"><?php echo $cpasswordErr;?></span></h4>
                    <p>Enter New Password:</p>
                    <input type="password" name="pass" style="width:80%; color:white; background-color:black;height:40px;" required/>
                    <br /><br />
                    <p>Confirm New Password:</p>

                    <br />
                    <input type="password" name="pass02" style="width:80%; color:white; background-color:black;height:40px;" required/>
                    <br /><br />

                    <input class="btn btn-sml btn-success" type="submit" name="submit" value="Change Password"  />
                  </div>
            </form>




        </div>

    </body>

    </html>
