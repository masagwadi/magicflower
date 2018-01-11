<?php
require 'functions.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Magic Flower</title>
    <meta name="viewport" content="width=device-width">
    <link rel='shortcut icon' href='img/logo.png' type='image/x-icon' />
    <script type="text/javascript" src="js/formcalculations.js"></script>
    <link href="css/cakeform.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/base.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" media="screen and (min-width: 601px) and (max-width: 1024px)" href="css/tablet.css" />
    <link rel="stylesheet" media="screen and (min-width: 220px) and (max-width: 600px)" href="css/mobile.css" />
</head>
<body>
<!--    This is for the facebook plugin-->
    <div id="fb-root"></div>
    <script>
        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=735203049943304";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
<!--     Facebook plugin ends here-->
    <header class="header">
        <?php
            include("nav.php");
        ?>
            <span class="blankspace"></span>
    </header>
    <style>
        .blankspace {
            display: block;
            width: 100%;
            height: 50px;
        }
        .leftside {
            width: 15%;
            float: left;
            display: block;
        }
        .rightbody {
            width: 70%;
            float: right;
            padding: 10px;
            display: block;
            border-left: 1px solid black;
        }
        .leftbody {
            width: 70%;
            float: left;
            padding: 10px;
            display: block;
            border-right: 1px solid black;
        }
        .sidemenu {
            list-style: none;
        }
        .sidemenu li {
            padding: 5px 10px;
            background-color: aqua;
            margin: 10px;
        }
        .leadership {
            width: 100%;
            margin: 15px 0;
            display: block;
        }
        .leader {
            width: 32%;
            overflow: hidden;
            display: inline-block;
            vertical-align: top;
        }
        .nameimage {
            position: relative;
            width: 100%;
            height: 250px;
            overflow: hidden;
            display: block;
            text-align: center;
            margin: 15px 0;
        }
        .nameimage img {
            width: 100%;
        }
        .nameimage h3 {
            position: absolute;
            bottom: 15px;
            background-color: white;
            color: #ed782a;
            padding: 2px;
            display: inline-block;
        }
        .leaderbio {
            padding: 0 10px;
            display: block;
        }
        .leaderbio h3 {
            text-align: center;
            padding-bottom: 15px;
        }
        .leadersocial {
            padding: 0 10px 25px 10px;
            display: block;
        }
        .leadersocial img {
            display: inline;
            width: 10%;
            margin: 10px 2px;
        }
        @media only screen and (min-width: 200px) and (max-width: 600px) {
            .leader {
                width: 100%;
            }
        }
        @media only screen and (min-width: 601px) and (max-width: 1200px) {
            .leader {
                width: 48%;
            }
        }
        @media only screen and (max-width: 800px) {
            .leftside {
                display: none;
            }
        }

        ul.topnav li a:active {
            background-color: black !important;

        }
    </style>
    <section class="content-wrap">
      <div style="padding:0 10%;">

        <h2>Privacy Policy</h2>
        <p>Magic Flower has created this privacy statement in order to demonstrate our firm commitment to privacy. The following discloses our information gathering and dissemination practices for this website: Magic Flower.co.za.</p>

        <h3>Privacy Policy</h3>
        <p>Our site’s registration form, order form, and survey forms require users to give us contact information (like their name and email address), and demographic information (like their zip code). We use customer contact information from the registration form to send the user information about our company and promotional material from some of our partners. The customer’s contact information is also used to contact the visitor when necessary. Users may opt-out of receiving future mailings; see the choice/opt-out section below. Demographic and profile data is also collected at our site. We use this data to tailor the visitor’s experience at our site, showing them content that we think they might be interested in, and displaying the content according to their preferences.</p>
        <p>We use cookies to deliver content specific to your interests. Cookies are not programs that will corrupt your computer or damage your files. The cookies used do not reveal your personal identity, nor can they capture personal or private data.</p>
        <p>This site contains links to other sites. Magic Flower is not responsible for the privacy practices or the content of such websites. The information you provide will be kept confidential within Magic Flower and its subsidiaries and used to support your customer relationship with Magic Flower.</p>

        <h3>Choice/Opt-Out</h3>
        <p>Our site provides users the opportunity to opt-out of receiving communications from us and our partners. This site gives users the following options for removing their information from our database to not receive future communications or to no longer receive our services. You can opt-out of receiving communications from Magic Flower.co.za by clicking the unsubscribe button found at the bottom of our email newsletters.</p>

        <h3>Contacting the Website</h3>
        <p>If you have any questions about this privacy statement, the practices of this site, or your dealings with this website, you can contact:</p>
        <ul class="policycon">
            <li>Magic Flower </li>
            <li>78 Gretna Green </li>
            <li>Summer Greens, Cape Town 7441 </li>
        </ul>

        <ul class="policycon">
            <li>079 867 7616 </li>
            <li>info@magicflower.co.za </li>
        </ul>


      </div>


        <hr>
        <br>








    </section>
    <?php
        include("footer.php");
        ?>
        <script src="js/index.js"></script>
</body>
</html>
