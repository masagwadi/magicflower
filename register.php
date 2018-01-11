<?php
require_once("functions.php");
require_once("database.php");
require_once("nav.php");
session_start();
if (logged_in() == true) {
    redirect_to("profile.php");
}
?>

<?php

if (isset($_POST['submit'])) {

$username    = $_POST['username'];
$password    = $_POST['password'];
$cpassword    = $_POST['cpassword'];
$first_name    = $_POST['first_name'];
$last_name    = $_POST['last_name'];
$email        = $_POST['email'];
$cell        = $_POST['cell'];

$imgFile = $_FILES['file']['name'];
$errMSG = "";


if(empty($username)){
    $errMSG .= "Please Enter Username.";
}
else if(empty($password)){
    $errMSG .= "Please Enter Your password.";
}

$exists = "";
$result = "SELECT username from customers WHERE username = '{$username}' LIMIT 1";
global $dbConn;
$sql = db_Query($result);


if($password != $cpassword){
    $exists .= "p";
}

//mysqli_close($dbConn);
if (dbNumRows($sql) >= 1) {
    $exists .= "u";
}


$result = "SELECT CustomerEmail from customers WHERE CustomerEmail = '{$email}' LIMIT 1";
global $dbConn;
$sql = db_Query($result);
if (dbNumRows($sql)  >= 1) {
    $exists .= "e";
}

if ($exists == "u") {
    $errMSG .= "<br />Username already exists!";
}elseif ($exists == "pu"){
     $errMSG .= "<br />Passwords dont match<br />Username already exists!";
 }elseif ($exists == "pe"){
     $errMSG .= "<br />Passwords dont match <br />Email already exists!";
 }elseif ($exists == "e"){
     $errMSG .= "<br />Email already exists!";
 }elseif ($exists == "ue"){ $errMSG = "<br /> Username and Email already exists!";
 }elseif ($exists == "pue"){ $errMSG = "<br />Passwords dont match <br /> Username and Email already exists!";
 }else {

    # insert data into mysql database

    $newcode=rand(1000000,9999999);

    $sql = "INSERT  INTO `customers` ( `username`, `CustomerPass`, `CustomerName`, `CustomerLname`, `CustomerEmail`, `CustomerPhone`, `Customerscol`, `activation_code`)
        VALUES ( '$username', PASSWORD('$password'), '$first_name', '$last_name', '$email','$cell', 'nopic', $newcode)";
        global $dbConn;
        $test = $dbConn->query($sql) or die("Could not execute mysqli QUERY090 - Insert 248");


    if ($test === TRUE){

        $_SESSION['goconfirm'] = "Please check your email and confirm before you can login";


        $message= "
        Hey $first_name,
        <br /><br />
        Welcome to the Magic Flower Family,
        <br /><br />
        Click the Following Link To Activate Your Password
        <br /><br />
        <a href='http://magicflower.co.za/activate?email=$email&code=$newcode' class='but'>click here to activate your account</a>
        <br /><br />
        thank you :)
        ";
        $subject = "Activate Account: Magic Flower";

        send_mail($email,$message,$subject);





        redirect_to("login.php");
    } else {
        echo "<p>MySQL error no {$mysqli->errno} : {$mysqli->error}</p>";

        exit();
    }
}


}
?>
    <html>

    <head>
        <title>User registration form</title>
        <link rel='shortcut icon' href='img/logo.png' type='image/x-icon' />
        <link href="css/cakeform.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="css/base.css" type="text/css" />
        <link rel="stylesheet" href="css/style.css">


        <script type='text/javascript'>
            function preview_image(event) {
                var reader = new FileReader();
                reader.onload = function () {
                    var output = document.getElementById('output_image');
                    output.src = reader.result;
                }
                reader.readAsDataURL(event.target.files[0]);
            }
        </script>
        <style>
            #output_image {
                max-width: 150px;
            }

            label {
                font-weight: 400;
                margin: 10px 0;
                display: inline-block;
            }

            input[type="file"] {
                display: none;
            }
            .f-white {
                color: white !important;
            }
            .upload {
                border: 1px solid #ccc;
                display: inline-block;
                padding: 6px 12px;
                cursor: pointer;
            }

            #wrapper .upload::before {}

            .title {
                text-align: center;
            }
        </style>



        <style>
            input[type="file"] {
                display: none;
            }

            .custom-file-upload {
                border: 1px solid #ccc;
                display: inline-block;
                padding: 6px 12px;
                cursor: pointer;
                background-color: #00a65a;
            }
        </style>

        <?php
          include 'nav.php';
          ?>

    </head>



        <body class="form-body register-bg thegirlsbg">



        <!-- The HTML registration form -->

        <div class="form-wrapper">



            <div class="register-box">

            <span class="register-form">
                <p class="">Register a new membership</p>
                <form action="" method="post" enctype="multipart/form-data">

                    <div class="register-logo">
                        <a ><img src="img/logo.png" /></a>
                    </div>

                        <div>
                            <?php
                            if(!isset($errMSG)){
                                $errMSG = '' ;
                            }
                            else{
                            echo"$errMSG";
                            }
                            ?>

                        </div>

                    <br><br>
<!--                    <label> Username: </label>-->

<!--                    <label> First name: </label>-->
                    <input type="text" class="form-control" name="first_name" placeholder="First Name" value="<?php if(isset($first_name)){ echo $first_name;} ?>"  required/>
                    <br />
<!--                    <label> Last name: </label>-->
                    <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="<?php if(isset($last_name)){ echo $last_name;} ?>"  required/>
                    <br />

                    <input type="number" class="form-control" name="cell" placeholder="cell number" value="<?php if(isset($cell)){ echo $cell;} ?>"  required/>
                    <br>
<!--                    <label> Email: </label>-->
                    <input type="email" class="form-control" name="email" placeholder="email" value="<?php if(isset($email)){ echo $email;} ?>"  required/>
                    <br />

                    <input type="text" class="form-control" name="username" placeholder="Username" value="<?php if(isset($username)){ echo $username;} ?>" required />
                    <br />
<!--                    <label> Password: </label>-->
                    <input type="password" class="form-control" name="password" placeholder="Password" value="<?php if(isset($password)){ echo $password;} ?>" required/>
                    <br />

                    <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password" value="<?php if(isset($cpassword)){ echo $cpassword;} ?>" required/>
                    <br />

                    <input type="hidden" name="mukamberi" />
                    <br />
                    <br />

                    <input class="btn btn-primary f-right" type="submit" name="submit" value="Register" />
                    <br />
                    <br />
                    <?php
                        if (isset($themsg)) {
                            echo "$themsg";
                        }
                     ?>
                    <br />
                    <a href="login.php" class="text-center">I already have an account...</a>
                </form>
                </span>
            </div>

        </div>



            <?php
            include("footer.php");
            ?>


    </body>

    </html>
