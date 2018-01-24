<?php
require 'functions.php';
include 'database.php';
?>
    <?php
ob_start();
session_start();




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



                <!-- <header>
                    <span class="shorthead">
                <img src="img/slider/5.jpg"/>
                <span class="headeroverlay"></span>
                    <h1 class="pagetitle"></h1>
                    </span>

                </header> -->






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

                            <label class="clear labeltitle label-header">Windows</label>
                            <select class="select" id="newwindow" name='newwindow' onchange="calculateTotal()" onclick="calculateTotal()">
                                <option value="0">Select</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                                <option value="4">Four</option>
                            </select>
                            <br>

                            <div style="displayblock; width:100%; height:1px;"></div>


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
                            <br class="clear">
                            <hr />






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







                            <p class="hide">
                                <label class="inlinelabel" for=''>Test(R40)</label>
                                <img src="img/calendar.png" height="50px">
                                <input type="checkbox" id="test" name="" onclick="calculateTotal()">

                        </fieldset>





                    <script>
                        $(function () {
                            $("#datepicker").datepicker();
                        });

                        $('#timetime').timepicker({
                            'timeFormat': 'h:i A'
                        });
                    </script>





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
