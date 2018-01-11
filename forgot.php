<?php
session_start();

require_once("database.php");
require_once("functions.php");
require_once("nav.php");

if (logged_in() == true) {
    redirect_to("profile.php");
}
?>

<?php
if(isset($_POST['btn-submit']))
{
    $email = $_POST['email'];

    $sql = "SELECT CustomerEmail FROM customers WHERE 	CustomerEmail='$email' LIMIT 1";
    $result = db_Query($sql);
    $row = dbFetchAssoc($result);

    if (dbNumRows($result) == 1)
    {
        //Generate a random code
        $code=rand(1000000,9999999);

        $query2 ="UPDATE customers SET activation_code='$code' WHERE CustomerEmail='$email' ";
        $result2 = db_Query($query2);


        //        $stmt = $user->runQuery("UPDATE wg_tbl_users SET tokenCode=:token WHERE userEmail=:email");
        //        $stmt->execute(array(":token"=>$code,"email"=>$email));

        $message= "
        Hello ,
        <br /><br />
        We got requested to reset your password, if you did this then just click the following link to reset your password, if not just ignore this email,
        <br /><br />
        Click Following Link To Reset Your Password
        <br /><br />
        <a href='http://magicflower.co.za/reset?email=$email&code=$code' class='but'>click here to reset your password</a>
        <br /><br />
        thank you :)
        ";
        $subject = "Password Reset";

        send_mail($email,$message,$subject);

        $Errmsgf = "<div class='alert alert-success'>

        We've sent an email to $email.
        Please click on the password reset link in the email to generate new password.
        <br>
        Make sure you also check your SPAM folder if the mail is not in your inbox.
        </div>";


    }
    else
    {
        $Errmsgf = "<div class='alert alert-danger'>

        <strong>Sorry!</strong>  $email not found.
        </div>";

    }
}

?>

<html>
    <head>
        <title>Forgot your Username or Password?</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel='shortcut icon' href='img/logo.png' type='image/x-icon' />
        <link href="css/cakeform.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="css/base.css" type="text/css" />
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body class="hold-transition login-page login-bg mt100 thegirlsbg">

        <h1 class="text-center bgcwhite">Forgot your Password?</h1>

        <hr />

        <div class="login-box b-black-op" >
            <div class="register-logo">
                <a href="index.php"><img src="img/logo.png" /></a>
            </div>
            <br>
            <div class="login-box-body" style="padding:15px;">
                <p class="login-box-msg">Please enter your email address below.</p><br>
                <?php
                if(isset($Errmsgf)){
                    echo "<b class='text-center'>$Errmsgf</b>";
                }
                ?>
                <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" placeholder="Email" name="email" required>

                    </div>
<br>
                    <div class="row">

                        <div class="col-xs-4">
                            <input type="submit" class="btn btn-primary btn-block btn-flat" name="btn-submit" value="Submit" />
                        </div><!-- /.col -->
                    </div>
                </form>


                <a href="login.php">Login</a><br><br>
                <a href="register.php" class="text-center">Register a new membership</a>

            </div><!-- /.login-box-body -->
        </div>


<?php
include("footer.php");
?>


    </body>
</html>
