<?php
session_start();
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subme = doBook();
    echo "haaaaaaaa";
}
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Magic Flower</title>
        <meta name="viewport" content="width=device-width">
        <link rel='shortcut icon' href='img/logo.png' type='image/x-icon' />
        <script type="text/javascript" src="js/formcalculations.js"></script>
        <link href="css/bookingform.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/base.css" />
        <!--       Fonts -->
        <link href="https://fonts.googleapis.com/css?family=GFS+Neohellenic" rel="stylesheet" />
    </head>

    <body onload='hideTotal()'>
        <div class="header">
            <span class="head hide">
                <img src="img/header1.jpeg" />
            </span>
            <span class="logo hide">
                <img src="img/logo.png" />
            </span>
        </div>
        <?php
        include("nav.php");
        ?>
        <style>
            .radiolabel > input {
                visibility: hidden;
                position: absolute;
            }

            .radiolabel > input + img {
                cursor: pointer;
                border: 2px solid transparent;
            }

            .radiolabel > input:checked + img {
                border: 2px solid #FFA400;
                background-color: #3DCAFF;
                color: white;
            }

            .radiolabel > input:checked + .selecto {
                border: 2px solid #FFA400;
                background-color: #3DCAFF;
                color: white;
            }

            input[type=range] {
                /*removes default webkit styles*/
                -webkit-appearance: none;
                /*fix for FF unable to apply focus style bug */
                border: 1px solid white;
                /*required for proper track sizing in FF*/
                width: 300px;
            }

            input[type=range]::-webkit-slider-runnable-track {
                width: 300px;
                height: 5px;
                background: #ddd;
                border: none;
                border-radius: 3px;
            }

            input[type=range]::-webkit-slider-thumb {
                -webkit-appearance: none;
                border: none;
                height: 16px;
                width: 16px;
                border-radius: 50%;
                background: goldenrod;
                margin-top: -4px;
            }

            input[type=range]:focus {
                outline: none;
            }

            input[type=range]:focus::-webkit-slider-runnable-track {
                background: #ccc;
            }

            input[type=range]::-moz-range-track {
                width: 300px;
                height: 5px;
                background: #ddd;
                border: none;
                border-radius: 3px;
            }

            input[type=range]::-moz-range-thumb {
                border: none;
                height: 16px;
                width: 16px;
                border-radius: 50%;
                background: goldenrod;
            }
            /*hide the outline behind the border*/

            input[type=range]:-moz-focusring {
                outline: 1px solid white;
                outline-offset: -1px;
            }

            input[type=range]::-ms-track {
                width: 300px;
                height: 5px;
                /*remove bg colour from the track, we'll use ms-fill-lower and ms-fill-upper instead */
                background: transparent;
                /*leave room for the larger thumb to overflow with a transparent border */
                border-color: transparent;
                border-width: 6px 0;
                /*remove default tick marks*/
                color: transparent;
            }

            input[type=range]::-ms-fill-lower {
                background: #777;
                border-radius: 10px;
            }

            input[type=range]::-ms-fill-upper {
                background: #ddd;
                border-radius: 10px;
            }

            input[type=range]::-ms-thumb {
                border: none;
                height: 16px;
                width: 16px;
                border-radius: 50%;
                background: goldenrod;
            }

            input[type=range]:focus::-ms-fill-lower {
                background: #888;
            }

            input[type=range]:focus::-ms-fill-upper {
                background: #ccc;
            }

            .selecto {
                color: black;
                text-align: center;
            }
        </style>
        <style>
            .nicehead {
                height: 200px;
                position: relative;
                background-image: url(nicehead);
                z-index: -1;
                margin-top: 40px;
                border-bottom: 3px solid #FFA400;
            }

            .nicehead:after {
                background-color: red;
                opacity: 0.5;
                width: 100%;
                height: 100%;
                position: absolute;
                top: 0;
                left: 0;
            }

            .btn2 {
                border-radius: 5px;
                font-family: 'GFS Neohellenic', sans-serif;
                font-size: 14px;
                padding: 13px 19px;
                border: 2px solid #028f02;
                display: inline-block;
                margin: 5px 0;
                background-color: #fff;
                cursor: pointer;
            }

            .btn2:hover {
                background-color: #028f02;
                border: 2px solid #fff;
                color: white;
                cursor: pointer;
            }
            .left-price {
                width: 20%;
                display: inline-block;
                vertical-align: top;

                position: fixed;
                top:100px;
            }

        </style>
        <div class=" hero">
            <img src="img/slider/01.png" />

        </div>
        <div id="wrap">
            <div class="form">
                <form action="" id="msform" style="margin-top:80px;" method="post">
                    <div class="cont_order">
                        <!--                            <fieldset>-->
                        <!--                                <legend>Book a trusted cleaner instantly below!</legend>-->
                        <h2>Book a trusted cleaner instantly below!</h2>
                        <br>
                        <br>
                        <label class="label-header">How often would you like us to clean?</label>
                        <br>
                        <i>Select a schedule that fits your needs.</i>
                        <br>




                        <select class="select" id="selectedfrequency" name='selectedfrequency' onchange="calculateTotal()">
                            <option value="OnceOff">Once Off</option>
                            <option value="Weekly">Weekly</option>
                            <option value="Bi-Weekly">Bi-Weekly</option>
                            <option value="Monthly">Monthly</option>
                        </select>



                        <br/>
                        <hr class="clear">
                        <br/>
                        <label class="label-header">How many rooms</label>
                        <select class="select" id="selectedrooms" name='selectedrooms' onchange="calculateTotal()">
                            <option value="0">Select</option>
                            <option value="1">1 Room (R20)</option>
                            <option value="2">2 Rooms (R25)</option>
                            <option value="3">3 Rooms (R35)</option>
                            <option value="4">4 Rooms (R75)</option>
                        </select>
                        <br/>
                        <hr class="clear">
                        <br/>
                        <label class="clear labeltitle label-header">Bathrooms</label>
                        <select class="select" id="bathrooms" name='bathrooms' onchange="calculateTotal()">
                            <option value="0">Select</option>
                            <option value="1">One(R5)</option>
                            <option value="2" selected>Two(R5)</option>
                            <option value="3">Three(R7)</option>
                            <option value="4">Four(R8)</option>
                            <option value="5">Five(R10)</option>
                        </select>
                        <br>
                        <hr class="clear">
                        <label class="clear labeltitle label-header">Additions</label>
                        <p>
                            <label for='cleaningmaterials' class="inlinelabel radiolabel">
                                <input type="checkbox" value="Yes" id="cleaningmaterials" name='cleaningmaterials' onclick="calculateTotal()" />
                                <span class="btn2 selecto">Include Cleaning Materials(R40)</span>
                                <br>
                            </label>
                        </p>
                        <br class="clear">
                        <b style="padding-left:30px;">And/Or</b>
                        <p>
                            <label class="inlinelabel radiolabel" for='includewindows'>
                                <input type="checkbox" value="Yes" id="includewindows" name="includewindows" onclick="calculateTotal()" />
                                <span class="btn2 selecto">Include Cleaning Windows(R20)</span>
                                <br>
                            </label>
                        </p>
                        <style>
                            input[type=checkbox]:checked + label {
                                display: inline-block;
                                height: 60px;
                                width: 60px;
                                border: 2px solid #FFA400;
                                background-color: #3DCAFF;
                            }
                        </style>
                        <hr class="clear">
                        <p class="hide">
                            <label class="inlinelabel" for=''>Test(R40)</label>
                            <img src="img/calendar.png" height="50px">
                            <input type="checkbox" id="test" name="" onclick="calculateTotal()">
                            <!--
<input type="radio" name="one" /><label class="inlinelabel" for=''>Test(R40)</label>
<input type="radio" name="one" checked/><label class="inlinelabel" for=''>Test(R40)</label>
-->
                        </p>
                        <label class="labeltitle label-header">When should we come?</label>
                        <label>Date:
                            <input type="date" name="cleandate" required/>
                        </label>
                        <br>
                        <label>At this time:
                            <select class="select" name="cleantime" required>
                                <option value="0">Select</option>
                                <option value="8">8:00am</option>
                                <option value="9">9:00am</option>
                                <option value="10">10:00am</option>
                                <option value="11">11:00am</option>
                                <option value="12">12:00pm</option>
                                <option value="13">1:00pm</option>
                                <option value="14">2:00pm</option>
                                <option value="15">3:00pm</option>
                                <option value="16">4:00pm</option>
                                <option value="17">5:00pm</option>
                                <option value="18">6:00pm</option>
                                <option value="913">Between 9:00AM - 3:00PM</option>
                            </select>
                            <br>
                            <br>
                            <style>
                                .total {
                                    /*                                position: fixed;*/
                                    top: 180px;
                                    right: 30px;
                                    margin: 5px 15px;
                                    padding: 5px;
                                    float: left;
                                    vertical-align: bottom;
                                    background-color: red;
                                    color: white;
                                }

                                #cookiey {
                                    padding: 5px;
                                    vertical-align: bottom;
                                    color: red;
                                    color: white;
                                }
                            </style>

                            <hr class="clear">
                            <div class="cont_details">
                                <!--                            <fieldset>-->
                                <legend>Contact Details</legend>
                                <label for='name'>Name</label>
                                <input type="text" id="name" name='name' />
                                <br/>
                                <br>
                                <label for='phonenumber'>Phone Number</label>
                                <input type="text" id="phonenumber" name='phonenumber' />
                                <br/>
                                <label for='address'>Address</label>
                                <textarea type="text" id="address" name='address' cols="40" rows="10">
                                </textarea>
                                <br/>
                                <!--                            </fieldset>-->
                            </div>
                            <!--                <input type='submit' id='submit' value='Book' onclick="calculateTotal()" />-->
                            <input type='submit' id='submit' value='Book' />
                            </div>
                        </form>
                    </div>
                <div class="left-price">
                    <div class="total" id="totalPrice"></div>
                    <hr>

                    <!--
<div class="total" id="frePri"></div>
<hr>

<div class="total" id="romPri"></div>
<hr>

<div class="total" id="batPri"></div>
<hr>
-->




                    <div class="" id="class2"></div>

                </div>
            </div>
            <!--End of wrap-->
            <?php
            include("footer.php");
            ?>
            <script src="js/index.js"></script>
            </body>

        </html>
