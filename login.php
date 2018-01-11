<?php
require_once("functions.php");
require_once("database.php");
include("nav.php");
session_start();
if (isset($_SESSION['masagwadi_tmp'])) {
    redirect_to("profile.php");
}
?>
<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // processing remember me option and setting cookie with long expiry date
    if (isset($_POST['remember'])) {
        session_set_cookie_params('604800'); //one week (value in seconds)
        session_regenerate_id(true);
    }

    $sql = "SELECT * from customers WHERE username = '$username' AND CustomerPass = PASSWORD('$password') AND active = 1 LIMIT 1";
    $result = $dbConn->query($sql) or die("Could not execute mysqli QUERY090 - I'm at Func login 21");


    if ($result->num_rows != 1) {
        $logerror= "<div class='alert alert-danger'><b>Error:</b> Invalid username/password combination <br />Make sure that you have activated your profile via the link sent to you on registration</div>";

    } else {
        // Authenticated, set session variables
        $user = $result->fetch_array();
        $_SESSION['masagwadi_tmp'] = $user;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['image'] = $user['image'];

        $row = dbFetchAssoc($result);
        $_SESSION['user_all_info'] = $row;
        // update status to online
        // $timestamp = time();
        // $sql = "UPDATE magic_users SET status={$timestamp} WHERE id={$_SESSION['user_id']}";
        // $result = $mysqli->query($sql);

        redirect_to("profile.php?id={$_SESSION['user_id']}");
        // do stuffs
    }
}


?>
<html>
    <head>
        <title>User Login Form</title>

        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel='shortcut icon' href='img/logo.png' type='image/x-icon' />
        <link href="css/cakeform.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="css/base.css" type="text/css" />
        <link rel="stylesheet" href="css/style.css">

    </head>
    <body class="hold-transition login-page login-bg thegirlsbg">


        <div class="login-box b-black-op mt100" >
            <br>
            <div class="register-logo">

                <a ><img src="img/logo.png" /></a>
                <br>
            </div>
            <br>
            <div class="login-box-body" style="padding:15px;">
                <p class="login-box-msg">Sign in to start your session</p><br>
                <p><?php if(isset($_SESSION['goconfirm'])){ echo $_SESSION['goconfirm'];
                    unset($_SESSION['goconfirm']);
                } ?></p>

                <?php
                if (isset($logerror)){
                    echo $logerror;
                }else{
                    echo "";
                }
                ?>
                <br>
                <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Username" name="username" required>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <br>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck" style="padding:15px;">
                                <label>
                                    <input type="checkbox" name="remember"> Remember Me
                                </label>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-xs-4">
                            <input type="submit" class="btn btn-primary btn-block btn-flat" name="submit" value="Login"/>
                        </div><!-- /.col -->
                    </div>
                </form>


                <a href="forgot.php">I forgot my password</a><br>
                <a href="register.php" class="text-center">Register a new membership</a>

            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->


        <?php
    include("footer.php");
        ?>
















        <!-- jQuery 2.1.4 -->
        <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="../../bootstrap/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="../../plugins/iCheck/icheck.min.js"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script>



    </body>
</html>
