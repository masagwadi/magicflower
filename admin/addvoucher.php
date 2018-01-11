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

    $vname    = $_POST['vname'];
    $vdscrp    = $_POST['vdscrp'];
    $vtype    = $_POST['vtype'];
    $vvalue    = $_POST['vvalue'];
    $vnumber        = $_POST['vnumber'];
    $vstatus        = $_POST['vstatus'];
    $vcode        = $_POST['vcode'];

    if($_POST['mukamberi'] == ""){

        # insert data into mysql database
        $sql = "INSERT  INTO `vouchers` ( `voucherName`, `voucherDscrp`, `voucherType`, `voucherValue`, `number`, `status`, `voucherCode`)
            VALUES ( '$vname', '$vdscrp', '$vtype', '$vvalue ', '$vnumber', '$vstatus', '$vcode')";
            global $dbConn;
            $test = $dbConn->query($sql) or die("Could not execute mysqli QUERY090 - Insert 248");

            $themsg = "Voucher Successfully Added";

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
                    <a href="index.php"><img src="../img/logo.png" /></a>
                </div>
            <span class="register-form">
                <p class="register-box-msg">Add Voucher</p>
                <form action="" method="post" enctype="multipart/form-data">
                   <label> Voucher Name: </label>
                    <input type="text" class="form-control" name="vname" placeholder="Voucher Name" required />
                    <br />
                   <label> Voucher Descrip: </label>
                    <textarea type="password" class="form-control" name="vdscrp" required/></textarea>
                    <br />
                   <label> Voucher Type: </label>
                    <select class="form-control" name="vtype">
                            <option value="value">Value</option>
                            <option value="percent">Percentage(%)</option>
                    </select>
                    <br />
                   <label> Voucher Value: </label>
                    <input type="text" class="form-control" name="vvalue"   required/>
                    <br />
                   <label> Number of Vouchers: </label>
                    <input type="number" class="form-control" name="vnumber"   required/>
                    <br />


                    <label> Status: </label>
                    <select class="form-control" name="vstatus">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>


                    <br />
                    <label>Voucher Code: </label>
                    <input id="vouchervalue" type="text" class="form-control" name="vcode"  required/><br>
                    <span class="btn btn-warning" id="genrandom">Genarate Random</span><br>
                    <span class="vcode-err"></span>
                    <input class="hide" type="hidden" name="mukamberi" />
                    <br />
                    <br />


                    <br />


                    <input class="btn btn-primary f-right" type="submit" name="submit" value="Add Voucher" />
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
