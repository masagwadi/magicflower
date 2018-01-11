<?php

//$frequency=$_POST['selectedfrequency'];
//$mount=$_COOKIE["TotPri"];
//$fname=$_POST['fname'];
//$lname=$_POST['lname'];
//$email=$_POST['email'];
//// $message=$_POST['message'];
//$phone=$_POST['phone'];
//$address=$_POST['address'];
//$rooms=$_POST['selectedrooms'];
//$bathrooms=$_POST['bathrooms'];
//
//$materials=$_POST['cleaningmaterials'];
//$window=$_POST['includewindows'];



echo "
<html xmlns='http://www.w3.org/1999/xhtml' lang='en' xml:lang='en'>
  <head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
    <meta name='viewport' content='width=device-width'>
<style type='text/css'>




p{
color: #777777 !important;
}

* {
    box-sizing: border-box;
    font-family: 'Josefin Slab', serif;
}

.copyr {

}
</style>

<body style=' max-width: 540px !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; margin: 0; Margin: 0 auto !important; padding: 0; -moz-box-sizing: border-box; -webkit-box-sizing: border-box;box-sizing: border-box;'>

            <div  style='width: 100%;background-color:white;padding:10px;'>
            <a href='http://www.magicflower.co.za' align='center' class='text-center'>
                      <img style='width:20%;margin:0 auto !important;display: block;' src='http://drive.google.com/uc?export=view&id=0B2hCuolOM6-vcUxSRFFlaXltSmc' class='swu-logo' alt='Logo Image'>
                    </a>
            </div>
            <div style='background-color: black; padding:15px;'>
            <h1 style='color: #f7931d; text-align:center;'>Your booking was received</h1>
            <img style='width:80%; margin:0 auto !important; display: block;' src='http://drive.google.com/uc?export=view&id=0B2hCuolOM6-vcUxSRFFlaXltSmc' class='swu-logo' alt='Logo Image'>
            </div>

            <div style='padding:15px; color: #777777 !important;' >

            <p>Hey , </p>

            <p>Thanks for placing your order, we are busy processing it and it will be schedulled soon.</p>

            <a style='font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: bold; color: #fefefe; text-decoration: none; display: inline-block; padding: 8px 16px 8px 16px; border: 0px solid #f7931d;
    border-radius: 3px; text-align: left; color: #fefefe; background: #f7931d; border: 2px solid #f7931d;' href='#'>Login</a>
            </div>

            <hr style=' max-width: 580px;height: 0;border-right: 0;border-top: 0; border-bottom: 1px solid #cacaca;border-left: 0;margin: 20px auto;Margin: 20px auto;clear: both;'>

            <div class='details'>

                    <div style='width:48%;float: left;padding-left:5%;margin-right:2%;'>
                    <h3>Personal Detils </h3>
                      <p>$fname $lname</p>
                      <p>$email</p>
                      <p>$phone</p>
                      <p>$address</p>

                    </div>

                    <div style='width:48%;float: left;padding-left:5%;margin-right:2%;'>

                    <h3>Order Details</h3>
                    <p>Frequency: $frequency</p>
                      <p>Rooms: $rooms</p>
                      <p>Bathrooms: $bathrooms</p>
                      <p>Cleaning Materials: $materials</p>
                      <p>Windows: $window</p>
                      <br>


                    <h3>Cost</h3>
                    <h4>R  $mount</h4>

                    </div>

            </div>

             <hr style=' max-width: 580px;height: 0;border-right: 0;border-top: 0; border-bottom: 1px solid #cacaca;border-left: 0;margin: 20px auto;Margin: 20px auto;clear: both;'>

             <div>

             <p>Thank you very much for choosing Magic flower.</p>

             </div>

             <div>
                <p style='text-align:center;
font-size:11px;'>&#xA9; Copyright 2017 Magic Flower. All Rights Reserved.</p>
             </div>


  </body>
</html>
";


?>