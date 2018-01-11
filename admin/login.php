<?php
require_once("../functions.php");
require_once("../database.php");
session_start();
if (isset($_SESSION['masagwadi_tmp_admin'])) {
    redirect_to("index.php");
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

    $sql = "SELECT * from admin WHERE username = '$username' AND password = PASSWORD('$password') LIMIT 1";
    $result = $dbConn->query($sql) or die("Could not execute mysqli QUERY090 - I'm at Func login 21");


    if ($result->num_rows != 1) {
        $logerror= "<div class='alert alert-danger'><b>Error:</b> Invalid username/password combination</div>";

    } else {
        // Authenticated, set session variables
        $user = $result->fetch_array();
        $_SESSION['masagwadi_tmp_admin'] = $user;
        $_SESSION['user_id_admin'] = $user['AdminID'];
        $_SESSION['username_admin'] = $user['username'];


        $row = dbFetchAssoc($result);
        $_SESSION['user_all_info_admin'] = $row;
        // update status to online
        // $timestamp = time();
        // $sql = "UPDATE magic_users SET status={$timestamp} WHERE id={$_SESSION['user_id']}";
        // $result = $mysqli->query($sql);

        redirect_to("index.php?id={$_SESSION['user_id_admin']}");
        // do stuffs
    }
}


?>
<html>
    <head>
        <title>Admin Login Form</title>

        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel='shortcut icon' href='../img/logo.png' type='image/x-icon' />
        <link href="../css/cakeform.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../css/base.css" type="text/css" />
        <link rel="stylesheet" href="../css/style.css">

    </head>
    <body class="hold-transition login-page login-bg">


        <div class="login-box b-black-op" >
            <div class="register-logo">
                <a href="index.php"><img src="../img/logo.png" /></a>
            </div>
            <div class="login-box-body" style="padding:15px;">
                <p class="login-box-msg">Sign in to start your session</p><br>
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


                <!-- <a href="forgot.php">I forgot my password</a><br>
                <a href="register.php" class="text-center">Register a new membership</a> -->

            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->

<div style="display:block; text-align: center; margin:0 auto; width:30%;">
    <a href="index.php" class="text-center inline-block infoblock bblue" style="font-size:24px;">Home</a><br /><br /><br />
        <a class="text-center inline-block infoblock bblue" style="font-size:24px;" href="book.php">Book</a><br /><br /><br />
        </div>



        <?php
    include("../footer.php");
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
