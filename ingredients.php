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

        <h2><b>Products and Ingredients</b></h2>
        <i>Here are the products we use and their ingredients</i><br>

       <br>
       <h4>All Purpose Scourer</h4>
        <p><b>Ingredients</b> - Basil, Soapwort, Saponified plant oils, Essential oils, Kaolin and Spring water.</p><br>
        
        
        
        <h4>Dishwashing Liquid</h4>
        <p><b>Ingredients</b> - Plant extracts, Saponified plant oils, Essential oils, Spring water.</p><br>
        
        <h4>Herbal Sanitiser & Loo Cleaner</h4>
        <p><b>Ingredients</b> - Plant extracts, Saponified plant oils, Essential oils, Spring water.</p><br>
        
        <h4>Laundry Liquid</h4>
        <p><b>Ingredients</b> - Soapwort, Saponified plant oils, Essential oils, Hydrosols, and Spring water.</p><br>
        
        <h4>Paw Paw Wash Brightner</h4>
        <p><b>Ingredients</b> - Soapwort, Soya Bean, Cluster bean, Essential oils, Hydrosols, Saponified plant oils, Spring water.</p><br>
        
        <h4>Auto Dishwash Paste</h4>
        <p><b>Ingredients</b> - Plant extracts, Saponified plant oils, Salt, Sodium bicarbonate, Kaolin, essential oils.</p><br>

     

        <h4>&nbsp </h4>
        <p>Satisfaction Guarantee</p>
        <p>If ever you are unsatisfied with our cleaning service, simply let us know and we will return to re-clean your
        home at no extra charge.Areas of Service<br />
        Magic Flower provides residential cleaning services in Cape town, Milnerton and surroundings.</p>

 


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
