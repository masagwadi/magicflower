<?php
require_once("../functions.php");
require_once("../database.php");
session_start();
// if (logged_in() == true) {
//     redirect_to("profile.php");
// }
?>

<?php

if (isset($_POST['submit'])) {

    $name    = $_POST['name'];
    $lname    = $_POST['lname'];
    $email    = $_POST['email'];
    $cell    = $_POST['cell'];
    $uname    = $_POST['uname'];
    $pass    = $_POST['pass'];

        # insert data into mysql database
    $sql = "INSERT  INTO `admin` ( `AdminName`, `AdminLname`, `email`, `AdminPhone`, `username`, `password`)
        VALUES ( '$name', '$lname', '$email', '$cell ', '$uname', PASSWORD('$pass'))";
    global $dbConn;
    $test = $dbConn->query($sql) or die("Could not execute mysqli QUERY090 - Insert 248");





}
?>
<html>

<head>
    <title>Cleaner registration form</title>
    <link rel='shortcut icon' href='img/logo.png' type='image/x-icon' />
    <link href="css/cakeform.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/base.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css">


    <?php
    include 'nav.php';
    ?>

</head>



<body class="form-body register-bg">



<!-- The HTML registration form -->

<div class="form-wrapper">

    <?php
    if(!isset($errMSG)){
        $errMSG = '' ;

    }
    else{
        echo"$errMSG";
    }
    ?>

    <div class="register-box">
        <div class="register-logo">
            <a href="index.php"><img src="../img/logo.png" /></a>
        </div>
        <span class="register-form">
                <p class="register-box-msg">Add Admin</p>
                <form action="" method="post" enctype="multipart/form-data">
                   <label> Admin Name: </label>
                    <input type="text" class="form-control" name="name" placeholder="Voucher Name" required />
                    <br />
                   <label> Admin Surname: </label>
                    <input type="text" class="form-control" name="lname" placeholder="Voucher Name" required />
                    <br />

                     <label> Admin Email: </label>
                    <input type="email" class="form-control" name="email" placeholder="Voucher Name" required />
                    <br />

                     <label> Admin Cellnumber: </label>
                    <input type="number" class="form-control" name="cell" placeholder="Voucher Name" required />
                    <br />

                     <label> Admin Username: </label>
                    <input type="text" class="form-control" name="uname" placeholder="Voucher Name" required />
                    <br />

                     <label> Admin Password: </label>
                    <input type="text" class="form-control" name="pass" placeholder="Voucher Name" required />
                    <br />

                    <br />


                    <input class="btn btn-primary f-right" type="submit" name="submit" value="Add Admin" />
                    <br />

                    <br />
                    <?php
                    if (isset($themsg)) {
                        echo "$themsg";
                    }
                    ?>
                    <br />

                </form>
                </span>
    </div>

</div>

<div style="display:block; text-align: center; margin:0 auto; width:30%;">
    <a href="index.php" class="text-center inline-block infoblock bblue" style="font-size:24px;">Home</a><br /><br /><br />
    <a class="text-center inline-block infoblock bblue" href="book.php" style="font-size:24px;">Book</a><br /><br /><br />
</div>

<?php
include("../footer.php");
?>


</body>

</html>
