<?php
require_once 'database.php';
require_once 'functions.php';
include("nav.php");

if(!isset($_GET['code']) && !isset($_GET['email'])) {
  redirect_to("forgot.php");
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
                          </br>
                          </br>
                          </br>
                          <a href='forgot'><p class='btn btn-sml btn-success'>Reset Password</p></a>
                      </div>";

    $classzo = 'hide';

    }

  }else{
    $nah=0;
    $msg = "<div class='alert alert-danger'>
                        <button class='close' data-dismiss='alert'>&times;</button>
                        <strong>Sorry!</strong> Missing or expired CODE, try reseting your password again
                        </br>
                        </br>
                        </br>
                        <a href='forgot'><p class='btn btn-sml btn-success'>Reset Password</p></a>
                    </div>";
    $classzo = 'hide';



  }

  if (empty($_POST["pass"])) {
      $nah=0;
  }
  elseif( $_POST["pass"] != $_POST["pass02"]){
      $cpasswordErr = "<span class='alert alert-danger'>Passwords Dont Match </span>";
      $nah=0;
  }else {
      $nah=1;
  }

if(isset($_POST['pass']) && $nah==1 ){
    $pass = $_POST['pass'];


$query = "SELECT * FROM customers WHERE activation_code='$acode' AND `CustomerEmail`='$email' ";
$resultcode=db_Query($query);

 if (dbNumRows($resultcode) == 1 & isset($_POST['pass']))
{



$query3 = "UPDATE `customers` SET `customers`.`CustomerPass` = PASSWORD('$pass') WHERE `customers`.`activation_code` = '$acode' AND `CustomerEmail`='$email'";

$resultcode2=db_Query($query3);

$newcode=rand(1000000,9999999);

$query4 = "UPDATE `customers` SET `customers`.`activation_code` = '$newcode' WHERE `customers`.`activation_code` = '$acode' AND `CustomerEmail`='$email'";

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
                    <a href='forgot'><p class='btn btn-sml btn-success'>Reset Password</p></a>
                </div>";

}
$classzo = 'hide';
}

?>



    <!DOCTYPE html>
    <html>

    <body class="mt100 thegirlsbg">
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
