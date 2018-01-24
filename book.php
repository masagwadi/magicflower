<?php
require 'functions.php';
include 'database.php';
?>
    <?php
ob_start();
session_start();


if (!isset($_SESSION['masagwadi_tmp'])) {
    redirect_to("login");
}


if(isset($_POST['donate_submit']))
{

    $firstorder = "";

    $theuserid = $_SESSION['masagwadi_tmp']['idCustomers'];
    $frequency=$_POST['selectedfrequency'];
    // $mount=number_format($_COOKIE["TotPri"], 2, ',', ' ');
    $mount=$_COOKIE["TotPri"];

    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $restype=$_POST['restype'];
    $pets = $_POST['pets'];
    $mypets = $_POST['mypets'];
    $payop = $_POST['payop'];
    $kids = $_POST['kids'];

    $OriginalAmount = $mount;
// #######################################################
// ################### Voucher Land ########################


    //set/initiate usevoucher to no

    $vid = "no voucher";
    if(isset($_SESSION['voucher']['value'])){

         $value = $_SESSION['voucher']['value'];
         $type = $_SESSION['voucher']['type'];
         $vid = $_SESSION['voucher']['vid'];

       if($type == "percent"){

         $discountnow = $mount * ($value/100);
         $mount = $mount - $discountnow;
         $mount = number_format($mount, 2, ',', ' ');


        //  $mount = number_format($_COOKIE["finalPri"], 2, ',', ' ');


         }else{

          $mount = $mount - $value;
          $mount = number_format($mount, 2, ',', ' ');
        //   $mount = number_format($_COOKIE["finalPri"], 2, ',', ' ');
         }


        if($mount < 0){
            $mount =0;
            $mount = number_format($mount, 2, ',', ' ');
        }



        unset($_SESSION['voucher']);


    }else{


        $sql = "SELECT firstorder FROM customers WHERE idCustomers = '$theuserid' LIMIT 1";

        global $dbConn;
        $result = db_Query($sql);

        if (dbNumRows($result)  >= 1) {
            $user = $result->fetch_array();

            if($user['firstorder'] == 0){

                $mount = $mount*0.7;

                // Update the status

                $query3 = "UPDATE `customers` SET `customers`.`firstorder` = 1 WHERE `customers`.`idCustomers` = '$theuserid' ";

                $resultcode2=db_Query($query3);

                $firstorder .="<b>Welcome, we happy you joined the family, we have applied a 30% off discount on your order, we looking forward for a magical jouney together</b>";
            }


        }

        $firstorder .="<b>Welcome, we happy you joined the family, we have applied a 30% off discount on your order, we looking forward for a magical jouney together</b>";


    }




// ########################### END OF V LAND  ####################
// ###########################################################




    // $message=$_POST['message'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $rooms=$_POST['selectedrooms'];
    $bathrooms=$_POST['bathrooms'];
    $window=$_POST['newwindow'];
    $bdate=$_POST['bdate'];
    $time=$_POST['time'];

    $specialinst = $_POST['specialinst'];

    $city=$_POST['city'];
    $province=$_POST['province'];
    $pcode=$_POST['pcode'];

    if(!isset($_POST['specialinst'])){
        $specialinst = "No Instruction";
    }

    if (!isset($_POST['cleaningmaterials']) || $_POST['cleaningmaterials'] == ''){

        $materials = 'No';
    }else{
        $materials=$_POST['cleaningmaterials'];
    }

//    if (!isset($_POST['includewindows']) || $_POST['includewindows'] == ''){
//
//        $window = 'No';
//    }else {
//        $window=$_POST['includewindows'];
//    }


    if (($frequency=="")||($mount=="")||($fname=="")||($lname=="")||($email=="")||($phone==""))
    {
        $errormsg= "All fields are required, please fill the form again.";

    }
    else{


        $payref = randomString(8);



        $from="From: $fname<book@magicflower.com>\r\nReturn-path: book@magicflower.com";
        $subject="Booking";
        $message2send="<html>
            <head>
            <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
            <title></title>
            <style>
            #email-wrap {

    }
    </style>
        </head>
        <body>
        <div id='email-wrap' style='background: #151515; color: #FFF;      padding:10px;'>

            <h1>Hey , Magic</h1>
            <br>
            <b>You have an Order</b><br>

            <div class='details'>

                    <div>
                    <h3>Personal Detils </h3>
                    <p>$fname $lname</p>
                    <p>$email</p>
                    <p>$phone</p>
                    <p>$address ($restype)</p>
                    <p>$city</p>
                    <p>$province</p>
                    <p>$pcode</p>
                    </div>

                    <div>

                    <h3>Order Details</h3>
                    <p>Date: $bdate</p>
                    <p>Time: $time</p>
                    <p>Frequency: $frequency</p>
                    <p>Rooms: $rooms</p>
                    <p>Bathrooms: $bathrooms</p>
                    <p>Payment Option: $payop</p>
                    <p>Windows: $window</p>
                    <p>Special Instruction: $specialinst</p>
                      <br>
                    <p>
                    $firstorder
                    </p>

                    <h3>Cost</h3>
                    <mark> <p style='padding:5px;'>R  $mount</p> </mark>


                    </div>

            </div>


        </div>
</body>
</html>

        ";
        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        // Additional headers
        //        $headers .= 'To: ' .$to. "\r\n";
        $headers .= 'From: ' .$from. "\r\n";


        mail("magicflowerclean@gmail.com", $subject, $message2send, $headers);
        $errormsg= "Thank you, we will be in touch!";












        $from = "info@magicflower.co.za";
        $headersto  = 'MIME-Version: 1.0' . "\r\n";
        $headersto .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headersto .= "From:"."Magic Flower" ."<".$from.">" . "\r\n". "Reply-To: masagwadi@gmail.com" . "\r\n" ;
        $subjectto ="Booking Details: ref ".$payref;

        $message2sendto ="

        <html xmlns='http://www.w3.org/1999/xhtml' lang='en' xml:lang='en'>
  <head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
    <meta name='viewport' content='width=device-width'>
<style type='text/css'>


p{
color: #777777 !important;
}

hr {

}
* {
    box-sizing: border-box;
    font-family: 'Josefin Slab', serif;
}
.details div {



}
.copyr {

}
h3 {
display:block;

}
</style>

<style type='text/css' media='only screen and (max-width: 596px)'>
    @media only screen and (max-width: 596px) {

    .details div {
        width:98%;
        float: left;
        padding-left:5%;
        margin-right:2%;

        }

    }
</style>
<body style='max-width: 540px !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; margin: 0; Margin: 0 auto !important; padding: 0; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box;'>

            <div class='top' style='width: 100%;
background-color:white;
padding:10px;'>
            <a href='http://www.magicflower.co.za' align='center' class='text-center'>
                      <img style='width:20%;
    margin:0 auto !important;
    display: block;' src='http://drive.google.com/uc?export=view&id=0B2hCuolOM6-vcUxSRFFlaXltSmc' class='swu-logo' alt='Logo Image'>
                    </a>
            </div>
            <div class='mainheader' style='background-color: black;
    padding:15px;'>
            <h1 style='color: #f7931d;
    text-align:center;'>Your booking was received</h1>
            <img style='width:80%; margin:0 auto !important; display: block;' src='http://drive.google.com/uc?export=view&id=0B2hCuolOM6-vcUxSRFFlaXltSmc' class='swu-logo' alt='Logo Image'>
            </div>

            <div class='content' style='padding:15px;
  color: #777777 !important;'>

            <p>Hey $fname, </p>

            <p>Thanks for placing your order, we are busy processing it and it will be schedulled soon.</p>


            </div>

            <hr style='max-width: 580px; height: 0; border-right: 0; border-top: 0; border-bottom: 1px solid #cacaca; border-left: 0; margin: 20px auto; Margin: 20px auto; clear: both;'>

            <div class='details'>

                    <div style='width:48%;float: left;padding-left:5%;margin-right:2%;'>
                    <h3>Personal Detils </h3>
                    <p>$fname $lname</p>
                    <p>$email</p>
                    <p>$phone</p>
                    <p>$address ($restype)</p>
                    <p>$city</p>
                    <p>$province</p>
                    <p>$pcode</p>

                    </div>

                    <div style='width:48%;float: left;padding-left:5%;margin-right:2%;'>

                    <h3>Order Details</h3>
                    <p>Date: $bdate</p>
                    <p>Time: $time</p>
                    <p>Frequency: $frequency</p>
                    <p>Rooms: $rooms</p>
                    <p>Bathrooms: $bathrooms</p>
                    <p>Payment Option: $payop</p>
                    <p>Windows: $window</p>
                    <br>

                    <h3>Cost</h3>
                    <mark><p style='padding:6px;'>R  $mount</p></mark>
                <p>
                $firstorder
                </p>
                    </div>


                    <div style='width:48%;float: left;padding-left:5%;margin-right:2%;'>

                    <h3>Payments Details</h3>
                    <p>Bank: First National Bank</p>
                    <p>Account Name: Magic Flower</p>
                    <p>Brabch Name: Woodstock</p>
                    <p>Branch Code: 201909</p>
                    <p>Account Number: 626 428 457 07</p>
                    <p>Reference: $payref</p>


                    </div>


            </div>

             <hr style='max-width: 580px; height: 0; border-right: 0; border-top: 0; border-bottom: 1px solid #cacaca; border-left: 0; margin: 20px auto; Margin: 20px auto; clear: both;'>

             <div>

             <p>Thank you very much for choosing Magic flower.</p>

             </div>

             <div>
                <p class='copyr' style='text-align:center; font-size:11px;'>&#xA9; Copyright 2017 Magic Flower. All Rights Reserved.</p>
             </div>


  </body>
</html>
        ";

        mail($email, $subjectto, $message2sendto, $headersto);
        $hide = "hide";
        $show = "block";



        //booking to database



        $bdate= date('Y-m-d', strtotime($bdate));

        $sql2 = "INSERT INTO orders (OrdersFreq, OrdersRooms, OrdersBathRooms, OrdersCleaningMaterials, OrdersCleanWindow, OrdersName, OrdersLname, OrdersEmail, OrdersPhone, OrdersAdress, OrdersDate, OrdersTime, OrderTotal, city, province, pcode, restype, pets, mypets, kids, payop, payref, orderDue, voucherIDorder, userid) VALUES ('$frequency', '$rooms', '$bathrooms', '$materials', '$window', '$fname', '$lname', '$email', '$phone', '$address', '$bdate', '$time', '$OriginalAmount', '$city', '$province', '$pcode', '$restype', '$pets', '$mypets', '$kids', '$payop', '$payref', '$mount', '$vid' , '$theuserid')";
        global $dbConn;
//        $bankInsert = $dbConn->query($sql2) or die("Could not execute mysqli QUERY090 - I'm at o2 INSERT bank ");
        db_Query($sql2);

//        header("Location: bookthanks.php");


    }

}
?>




        <!doctype html>
        <html>

        <head>
            <meta charset="UTF-8">
            <title>Magic Flower</title>
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
            <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
            <link rel='shortcut icon' href='img/logo.png' type='image/x-icon' />
            <link rel="stylesheet" href="css/styles.css">

            <link rel='stylesheet' media='screen and (min-width: 320px) and (max-width: 600px)' href='css/mobile.css' />
            <link rel='stylesheet' media='screen and (min-width: 601px) and (max-width: 1024px)' href='css/tablet.css' />

            <link rel="stylesheet" href="css/donate.css" />
            <script src='js/jquery.min.js'></script>


            <script src='js/accordion.js'></script>
            <link rel="stylesheet" href="css/accordion.css">
            <link rel="stylesheet" href="css/jquery-clockpicker.min.css">
            <link rel="stylesheet" href="css/jquery-ui.css">
            <link rel="stylesheet" href="css/jquery.ptTimeSelect.css">
            <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>



            <link rel='stylesheet' type='text/css' href='css/timepicki.css' />

            <script type="text/javascript" src="js/formcalculations.js"></script>
            <link href="css/bookingform.css" rel="stylesheet" type="text/css" />
            <link rel="stylesheet" href="css/style.css" />
            <link rel="stylesheet" href="css/base.css" />
            <!--       Fonts -->
            <link href="https://fonts.googleapis.com/css?family=GFS+Neohellenic" rel="stylesheet" />

            <script>
            </script>

            <style>
                label > input {
                    /* HIDE RADIO */
                    visibility: hidden;
                    /* Makes input not-clickable */
                    position: absolute;
                    /* Remove input from document flow */
                }

                label > input + img {
                    /* IMAGE STYLES */
                    cursor: pointer;
                    border: 2px solid transparent;
                    width: 120px;
                    display: inline;
                    margin-right: 20px;
                    border: 1px solid yellow;
                    opacity: 0.6;
                }

                label > input:checked + img {
                    /* (RADIO CHECKED) IMAGE STYLES */
                    border: 2px solid green;
                    background-color: yellow;
                    opacity: 1;
                }

                input[type=radio]:checked + span {
                    color: white;
                    border: 2px solid #FFA400;
                    background-color: #27AE60;
                }

                .shortma {
                    display: inline-block;
                }
            </style>
            <style>
                .btn2 {
                    border: 2px solid #FFA400;
                    padding: 10px;
                    display: inline-block;
                }

                input[type=checkbox]:checked + span {
                    color: white;
                    /*height: 60px;
                            width: 60px;*/
                    border: 2px solid #FFA400;
                    background-color: #27AE60;
                }

                .total {
                    padding: 15px;
                    float: left;
                    vertical-align: bottom;
                    /*background-color: #f37f20;*/
                    /*color: white;*/
                    background-color: #fff;
                    width:100%;
                    border: 2px solid green;
                    border-bottom-right-radius: 10px;
                    border-bottom: 10px solid green;
                }

                .prizo {
                    margin-left: 75px;
                    background-color: white;
                    padding: 10px 5px;
                }

                .left-price hr {
                    margin-left: 75px;
                }

                #cookiey {
                    padding: 5px;
                    vertical-align: bottom;
                    color: red;
                    color: white;
                }
            </style>








        </head>
        <?php
    include 'nav.php';
    ?>

            <body onload='hideTotal()'>



                <header>
                    <span class="shorthead">
                <img src="img/slider/5.jpg"/>
                <span class="headeroverlay"></span>
                    <h1 class="pagetitle"></h1>
                    </span>

                </header>


                <section style=" display:<?php if(isset($show)){ echo $show; }else { echo " none "; } ?>; background-color:black; width:100%; padding:15px 10%; color: white; padding-bottom:50px;" class="main-form ">

                    <div>
                        <h1>Thank You for Choosing Magic Flower</h1>
                        <h4>Your order have been received and is being scheduled. We have emailed you your order details with payment instructions.</h4>
                        <img style="width: 50%; height: auto;" src="img/logo.png" />

                    </div>


                </section>



                <section style="" class="main-form <?php if(isset($hide)){ echo $hide; }else { echo " "; } ?>">

                    <span class="b-green">
               <?php
                if(isset($errormsg)){
                    echo $errormsg;
                }else {
                    echo "";
                }
                ?>
            </span>


                    <!-- multistep form  id="bookingform" -->
                    <form method="post" action="" enctype="multipart/form-data" id="msform">
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active">How often</li>
                            <li>Date &amp; Additions</li>
                            <li>Personal Details</li>
                        </ul>
                        <!-- fieldsets -->
                        <fieldset>
                            <label class="label-header">Cleaning Frequency</label>
                            <h3 class="fs-subtitle">Please select how often you would love to receive the services</h3>
                            <select class="select" id="selectedfrequency" name='selectedfrequency' onchange="calculateTotal()" onclick="calculateTotal()">
                                <option value="OnceOff">Once Off</option>
                                <option value="Weekly">Weekly</option>
                                <option value="Bi-Weekly">Bi-Weekly</option>
                                <option value="Monthly">Monthly</option>
                            </select>
                                <br>
                                <br> <label class="label-header">Start Date: </label>
                                <br>
                                <input class="full-input" type="date" id="datepicker" name="bdate" required>
                                <br>
<!--
                                <br> <label class="label-header">End Date: </label>
                                <br>
                                <input class="full-input" type="date" id="datepicker" name="enddate" required>
                                <br> -->

                                <label class="label-header">Time: </label>
                                <br>
                                <select name="time" class='thetimes'>
                                <option value="08H00 AM">08:00 AM</option>
                                <option value="09H00 AM">09:00 AM</option>
                                <option value="10H00 AM">10:00 AM</option>
                                <option value="11H00 AM">11:00 AM</option>
                                <option value="12H00 PM">12:00 PM</option>
                                <option value="13H00 PM">13:00 PM</option>
                                <option value="14H00 PM">14:00 PM</option>
                                <option value="15H00 PM">15:00 PM</option>
                                <option value="16H00 PM">16:00 PM</option>
                                </select>







                            <label class="clear labeltitle label-header">How many rooms</label>
                            <select class="select" id="selectedrooms" name='selectedrooms' onchange="calculateTotal()" onclick="calculateTotal()">
                                <option value="0">Select</option>
                                <option value="1">One Room</option>
                                <option value="2">One-bedroom Apartment </option>
                                <option value="3">Two-bedroom Apartment</option>
                                <option value="4">Three-bedroom House</option>
                                <option value="5">Four-bedroom House</option>
                            </select>



                            <label class="clear labeltitle label-header">Bathrooms</label>
                            <select class="select" id="bathrooms" name='bathrooms' onchange="calculateTotal()" onclick="calculateTotal()">
                                <option value="0">Select</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                                <option value="4">Four</option>
                            </select>
                            <br>

                            <label class="clear labeltitle label-header">Veranda/Balcony</label>
                            <select class="select" id="veranda" name='veranda' onchange="calculateTotal()" onclick="calculateTotal()">
                                <option value="0">Select</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                                <option value="4">Four</option>
                            </select>
                            <br>


                            <div style="displayblock; width:100%; height:1px;"></div>

                            <input type="button" name="next" class="next action-button" value="Next" />
                        </fieldset>


                        <fieldset>

                            <label class="clear labeltitle label-header">Additions</label>
                            <!-- <p>
                        <label for='cleaningmaterials' class="inlinelabel radiolabel">
                            <input type="checkbox" value="Yes" id="cleaningmaterials" name='cleaningmaterials' onclick="calculateTotal()" />
                            <span class="btn2 selecto">Include Cleaning Materials(R40)</span>
                            <br>
                        </label>
                    </p> -->

                            <label>Pets?</label>
                            <br />

                            <label class="inlinelabel radiolabel" for="r10">
                                <input type="radio" value="yespets" name="pets" id="r10" onclick="changeclasspets()" />
                                <span class="btn2 selecto">Yes</span>
                                <br>
                            </label>
                            <label class="inlinelabel radiolabel" for="r20">
                                <input type="radio" value="nopets" name="pets" id="r20" onclick="changeclasspetsNO()" />
                                <span class="btn2 selecto">No</span>
                                <br>
                            </label>
                            <br />
                            <input class="gost" id="gost1" type="text" name="mypets" placeholder="which Pets do you have?" />
                            <br />


                            <label>Kids?</label>
                            <br />

                            <label class="inlinelabel radiolabel" for="r110">
                                <input type="radio" value="yeskids" name="kids" id="r110" onclick="changeclasskids()" />
                                <span class="btn2 selecto">Yes</span>
                                <br>
                            </label>
                            <label class="inlinelabel radiolabel" for="r210">
                                <input type="radio" value="nokids" name="kids" id="r210" onclick="changeclasskidsNO()" />
                                <span class="btn2 selecto">No</span>
                                <br>
                            </label>
                            <br />
                            <!--                    <input class="gost" id="gost2" type="number" name="noofkids" placeholder="Numer of kids"/>-->



                            <br class="clear">
                            <!-- <b style="padding-left:30px;">And/Or</b> -->


<!--
                            <p>
                                <label class="inlinelabel radiolabel" for='includewindows'>
                                    <input type="checkbox" value="Yes" id="includewindows" name="includewindows" onclick="calculateTotal()" />
                                    <span class="btn2 selecto">Include Cleaning Windows(R20)</span>
                                    <br>
                                </label>
                            </p>
-->

                            <label class="clear labeltitle label-header">Windows</label>
                            <select class="select" id="newwindow" name='newwindow' onchange="calculateTotal()" onclick="calculateTotal()">
                                <option value="0">Select/None</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                                <option value="4">Four</option>
                                <option value="5">Five</option>
                                <option value="6">Six</option>
                                <option value="7">Seven</option>
                                <option value="8">Eight</option>
                                <option value="9">Nine</option>
                                <option value="10">Ten</option>
                            </select>


                            <br class="clear">
                            <hr />
                            <p>
                                <label class="inlinelabel radiolabel">Special Instructions</label>
                                <br />
                                <br />
                                <textarea name="specialinst" id="Specialinst" cols="" rows=""></textarea>
                            </p>


                            <p class="hide">
                                <label class="inlinelabel" for=''>Test(R40)</label>
                                <img src="img/calendar.png" height="50px">
                                <input type="checkbox" id="test" name="" onclick="calculateTotal()">

                            </p>

                            <div style="displayblock; width:100%; height:1px;"></div>

                            <input type="button" name="previous" class="previous action-button" value="Previous" />
                            <input type="button" name="next" class="next action-button" value="Next" />
                        </fieldset>


                        <fieldset>
                            <h2 class="fs-title">Personal Details</h2>
                            <!--                    <h3 class="fs-subtitle">We will never sell it</h3>-->

                            <input class="inputfull" type="text" name="fname" placeholder="First Name" value="<?php echo $_SESSION['masagwadi_tmp']['CustomerName']; ?>" readonly />
                            <input class="inputfull" type="text" name="lname" placeholder="Last Name" value="<?php echo $_SESSION['masagwadi_tmp']['CustomerLname']; ?>" readonly  />
                            <input class="inputfull" type="email" name="email" placeholder="email" value="<?php echo $_SESSION['masagwadi_tmp']['CustomerEmail']; ?>"  readonly />
                            <input class="inputfull" type="tell" name="phone" placeholder="Phone" value="<?php echo $_SESSION['masagwadi_tmp']['CustomerPhone']; ?>"  readonly />
                            <h2 class="fs-title">Cleaning Address</h2>
                            <label>Type</label>
                            <br />

                            <label class="inlinelabel radiolabel">
                                <input type="radio" value="irent" name="restype" id="r1" required/>
                                <span class="btn2 selecto">I Am Renting</span>
                                <br>
                            </label>
                            <label class="inlinelabel radiolabel">
                                <input type="radio" value="iown" name="restype" id="r2" />
                                <span class="btn2 selecto">I Own</span>
                                <br>
                            </label>
                            <br />

                            <textarea class="inputfull" name="address" placeholder="address"></textarea>

                            <input class="inputfull" type="text" name="city" placeholder="City" />
                            <select class="inputfull" name='province'>
                                <option value='WesternCape'>Western Cape</option>
                            </select>
                            <input class="inputfull" type="text" name="pcode" placeholder="Postal Code" />

                            <br />


                            <label>Payment Option</label>
                            <br />
                            <select name="payop" class="inputfull">
                                <option value="cash">Cash</option>
                                <option value="transfare">Transfare</option>
                            </select>


                    <script>
                        $(function () {
                            $("#datepicker").datepicker();
                        });

                        $('#timetime').timepicker({
                            'timeFormat': 'h:i A'
                        });
                    </script>


                    <!-- <p class='datetimo'>Date:<br> <input type="text" id="datepicker" name="bdate" required></p> -->

<br><br>



                  <label for="">Voucher</label><br>

                  <div id="voucher-block">
                  <input id="voucher-code" type="text" name="vouchercode"  placeholder="Enter Voucher Code"><br>
                  <button class="btn" type="button" name="button" id="applyvcode" >Apply</button><br>
                  </div>

                  <div class="vcode-err"></div>

<br><br> <br>

                            <p>All fields must be filled to submit</p>
                            <input type="button" name="previous" class="previous action-button" value="Previous" />
                            <input type="submit" name="donate_submit" class=" action-button" value="Submit" />

                            <!--        <button type="submit" name="donate-submit" class="submit action-button" >Donate</button>-->
                        </fieldset>


</form>



                </section>





                    <div class="left-price <?php if(isset($hide)){ echo $hide; }else { echo " "; } ?>">
                    <h4>Summary</h4>

                    <!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
                    <script src='http://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script> -->

                    <script src="js/datepicker.js"></script>


                    <div class="total" id="totalPrice">


                    </div>
                    <br />
                    <div id="monthlydue"></div>
                    <br />
                    <hr>


                    <div class="" id="class2"></div>
                </div>


                <!-- jQuery -->
                <script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
                <!-- jQuery easing plugin -->
                <script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>

                <script src='js/jquery.min.js'></script>
                <script src='js/jquery-ui.min.js'></script>
                <script src="js/datepicker.js"></script>



                <script src="js/donate.js"></script>

                <script>
                    //jQuery time
                    var current_fs, next_fs, previous_fs; //fieldsets
                    var left, opacity, scale; //fieldset properties which we will animate
                    var animating; //flag to prevent quick multi-click glitches

                    $(".next").click(function () {
                        if (animating) return false;
                        animating = true;

                        current_fs = $(this).parent();
                        next_fs = $(this).parent().next();

                        //activate next step on progressbar using the index of next_fs
                        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                        //show the next fieldset
                        next_fs.show();
                        //hide the current fieldset with style
                        current_fs.animate({
                            opacity: 0
                        }, {
                            step: function (now, mx) {
                                //as the opacity of current_fs reduces to 0 - stored in "now"
                                //1. scale current_fs down to 80%
                                scale = 1 - (1 - now) * 0.2;
                                //2. bring next_fs from the right(50%)
                                left = (now * 50) + "%";
                                //3. increase opacity of next_fs to 1 as it moves in
                                opacity = 1 - now;
                                current_fs.css({
                                    'transform': 'scale(' + scale + ')'
                                });
                                next_fs.css({
                                    'left': left,
                                    'opacity': opacity
                                });
                            },
                            duration: 800,
                            complete: function () {
                                current_fs.hide();
                                animating = false;
                            },
                            //this comes from the custom easing plugin
                            easing: 'easeInOutBack'
                        });
                    });

                    $(".previous").click(function () {
                        if (animating) return false;
                        animating = true;

                        current_fs = $(this).parent();
                        previous_fs = $(this).parent().prev();

                        //de-activate current step on progressbar
                        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                        //show the previous fieldset
                        previous_fs.show();
                        //hide the current fieldset with style
                        current_fs.animate({
                            opacity: 0
                        }, {
                            step: function (now, mx) {
                                //as the opacity of current_fs reduces to 0 - stored in "now"
                                //1. scale previous_fs from 80% to 100%
                                scale = 0.8 + (1 - now) * 0.2;
                                //2. take current_fs to the right(50%) - from 0%
                                left = ((1 - now) * 50) + "%";
                                //3. increase opacity of previous_fs to 1 as it moves in
                                opacity = 1 - now;
                                current_fs.css({
                                    'left': left
                                });
                                previous_fs.css({
                                    'transform': 'scale(' + scale + ')',
                                    'opacity': opacity
                                });
                            },
                            duration: 800,
                            complete: function () {
                                current_fs.hide();
                                animating = false;
                            },
                            //this comes from the custom easing plugin
                            easing: 'easeInOutBack'
                        });
                    });

                    //    $(".submit").click(function(){
                    //        return true;
                    //    })
                </script>



                <script type="text/javascript">

                document.cookie = "vouchvalue="+ "null";

                </script>


                <?php
        include 'footer.php';
        ?>







            </body>

        </html>
