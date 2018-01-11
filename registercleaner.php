<?php
require_once("functions.php");
require_once("database.php");
session_start();
if (logged_in() == true) {
    redirect_to("profile.php");
}
?>

<?php

if (isset($_POST['submit'])) {

$username    = $_POST['username'];
$password    = $_POST['password'];
$first_name    = $_POST['first_name'];
$last_name    = $_POST['last_name'];
$email        = $_POST['email'];
$cell        = $_POST['cell'];

$imgFile = $_FILES['file']['name'];



if(empty($username)){
    $errMSG = "Please Enter Username.";
}
else if(empty($password)){
    $errMSG = "Please Enter Your password.";
}
else if(empty($imgFile)){
    $errMSG = "Please Select Image File.";
    $userpic = "none";
}else {

    $imgFile = rand(10,1000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_type = $_FILES['file']['type'];
    $tmp_dir = $_FILES['file']['tmp_name'];
    $imgSize = $_FILES['file']['size'];
    $folder="images/cleaners/";

    move_uploaded_file($file_loc,$folder.$imgFile);

    $folder = 'images/cleaners/'; // upload directory

    $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension

    // valid image extensions
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

    // rename uploading image
    // $userpic = $imgFile;
    $userpic = $imgFile;

    // allow valid image file formats
    if(in_array($imgExt, $valid_extensions)){
        // Check file size '5MB'
        if($imgSize < 5000000)    {
            move_uploaded_file($tmp_dir,$folder.$userpic);
        }
        else{
            $errMSG = "Sorry, your file is too large.";
        }
    }
    else{
        $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }

}

$exists = "";
$result = "SELECT username from cleaners WHERE username = '{$username}' LIMIT 1";
global $dbConn;
$sql = db_Query($result);

//mysqli_close($dbConn);
if (dbNumRows($sql) >= 1) {
    $exists .= "u";
}


$result = "SELECT email from cleaners WHERE email = '{$email}' LIMIT 1";
global $dbConn;
$sql = db_Query($result);
if (dbNumRows($sql)  >= 1) {
    $exists .= "e";
}

if ($exists == "u") {
    echo "<p><b>Error:</b> Username already exists!</p>";
}elseif ($exists == "e"){
     echo "<p><b>Error:</b> Email already exists!</p>";
 }elseif ($exists == "ue"){ echo "<p><b>Error:</b> Username and Email already exists!</p>";
 }else {

    # insert data into mysql database
    $sql = "INSERT  INTO `cleaners` ( `username`, `password`, `CleanerName`, `CleanerLname`, `email`, `image`, `CleanerPhone`)
        VALUES ( '$username', PASSWORD('$password'), '$first_name', '$last_name', '$email', '$userpic', '$cell')";
        global $dbConn;
        $test = $dbConn->query($sql) or die("Could not execute mysqli QUERY090 - Insert 248");


    if ($test === TRUE){
        redirect_to("login.php?msg=Registred successfully");
    } else {
        echo "<p>MySQL error no {$mysqli->errno} : {$mysqli->error}</p>";

        exit();
    }
}


}
?>
    <html>

    <head>
        <title>Cleaner registration form</title>
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
                    <a href="index.php"><img src="img/logo.png" /></a>
                </div>
            <span class="register-form">
                <p class="register-box-msg">Register a new Cleaner</p>
                <form action="" method="post" enctype="multipart/form-data">
<!--                    <label> Username: </label>-->
                    <input type="text" class="form-control" name="username" placeholder="Username" required />
                    <br />
<!--                    <label> Password: </label>-->
                    <input type="password" class="form-control" name="password" placeholder="Password" required/>
                    <br />
<!--                    <label> First name: </label>-->
                    <input type="text" class="form-control" name="first_name" placeholder="First Name"  required/>
                    <br />
<!--                    <label> Last name: </label>-->
                    <input type="text" class="form-control" name="last_name" placeholder="Last Name"  required/>
                    <br />
<!--                    <label> Email: </label>-->
                    <input type="email" class="form-control" name="email" placeholder="email"  required/>
                    <br />
                    <input type="number" class="form-control" name="cell" placeholder="cell number"  required/>
                    <input type="hidden" name="mukamberi" />
                    <br />
                    <br />
                    <label> Profile Pic: </label>
                    <label class="custom-file-upload f-white">
                        <input type="file" id="upload_file" name="file" accept="image/*" onchange="preview_image(event)" />
                        <i class="fa fa-cloud-upload"></i> Image Upload
                    </label>
                    <br />

                    <img id="output_image" />
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

            <div style="display:block; text-align: center; margin:0 auto; width:30%;">
                <a href="index.php" class="text-center inline-block infoblock bblue" style="font-size:24px;">Home</a><br /><br /><br />
                <a class="text-center inline-block infoblock bblue" href="book.php" style="font-size:24px;">Book</a><br /><br /><br />
            </div>

            <?php
            include("footer.php");
            ?>


    </body>

    </html>
