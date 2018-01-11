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

        <h2>About Us</h2>

        <p>Since 2016, Magic Flower has been helping its neighbors enjoy the moments in their lives that matter and
        discover how great it is to stay in a clean house. Founded by Apinda-asanda Nobuntu, Magic Flower is a
        locally owned and operating cleaning service that values its customers, community, and the environment.</p>

        <p>Our goal is to keep your house clean. We have a dream of sparkling kitchens and bathrooms, polished
        furniture, vacuumed carpets, freshly made beds, and wooden floors so shiny you can see the reflection of
        your face smiling back at you. After all, we believe your home deserves to be cleaned – beyond your
        expectations – by trained, quality professionals just the way you want it.</p>

        <p>So please, join us in our mission, and experience for yourself what it's like to truly “Stay in a clean Home.”
        Testimonials</p>

        <p>Read what our customers have to say about their apartment and house cleaning experience with Magic
        Flower</p>

        <span class='about-images'>
          <img src="img/customer-testimonials1.jpg"  />
        </span>
        <span class='about-images'>
          <img src="img/thankyou.jpg"  />
        </span>

        <h4>&nbsp </h4>
        <p>Satisfaction Guarantee</p>
        <p>If ever you are unsatisfied with our cleaning service, simply let us know and we will return to re-clean your
        home at no extra charge.Areas of Service<br />
        Magic Flower provides residential cleaning services in Cape town, Milnerton and surroundings.</p>

        <!-- <span class='about-map'>
          <img src="img/milnton.png"  />
        </span> -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52998.760410497554!2d18.49018795955442!3d-33.87877043186137!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1dcc59550fd5cfeb%3A0x5d3b409e27ded873!2sMilnerton%2C+Cape+Town!5e0!3m2!1sen!2sza!4v1484432967165"  height="350" frameborder="0" style="border:2px solid red; width:100%;" allowfullscreen></iframe>


      </div>


        <hr>
        <br>

                   <section class="clear-fix hide">
            <h1 class="title--left title">The<span class="tc-green rambla">Team</span></h1>
        </section>



        <section class="languages hide">
            <article class="grid-x4">
                <div class="profile tc-dark-orange">
                   <span class="profile-image">
                       <img src="img/apinda1.jpg" />
                   </span>

                    <h2 class="">Apinda Nobuntu</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda molestias, tempora eaque sapiente nemo</p>
                    <span class="leadersocial">
                        <img src="img/facebook_circle.png" />
                        <img src="img/twitter_circle.png" />
                        <img src="img/youtube_circle.png" />
                        <img src="img/instagram_circle.png" />
                    </span>
                    <a href="#" class="bg-dark-orange">CEO/FOUNDER</a>
                </div>
            </article>
            <article class="grid-x4">
                <div class="profile tc-blue">
                    <span class="profile-image">
                        <img src="img/sagwadi.jpg"  />
                    </span>
                    <h2 class="">Sagwadi Maluleke</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda molestias, tempora eaque sapiente nemo! </p>
                    <span class="leadersocial">
                        <img src="img/facebook_circle.png" />
                        <img src="img/twitter_circle.png" />
                        <img src="img/youtube_circle.png" />
                        <img src="img/instagram_circle.png" />
                    </span>
                    <a href="#" class="bg-blue">MARKETING</a>

                </div>
            </article>

            <article class="grid-x4">
                <div class="profile tc-dark-orange">
                    <span class="profile-image">
                        <img src="img/apinda1.jpg" />
                    </span>

                    <h2 class="">Apinda Nobuntu</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda molestias, tempora eaque sapiente nemo</p>
                    <span class="leadersocial">
                        <img src="img/facebook_circle.png" />
                        <img src="img/twitter_circle.png" />
                        <img src="img/youtube_circle.png" />
                        <img src="img/instagram_circle.png" />
                    </span>
                    <a href="#" class="bg-dark-orange">CEO/FOUNDER</a>
                </div>
            </article>
            <article class="grid-x4">
                <div class="profile tc-blue">
                    <span class="profile-image">
                        <img src="img/sagwadi.jpg"  />
                    </span>
                    <h2 class="">Sagwadi Maluleke</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda molestias, tempora eaque sapiente nemo! </p>
                    <span class="leadersocial">
                        <img src="img/facebook_circle.png" />
                        <img src="img/twitter_circle.png" />
                        <img src="img/youtube_circle.png" />
                        <img src="img/instagram_circle.png" />
                    </span>
                    <a href="#" class="bg-blue">MARKETING</a>

                </div>
            </article>

        </section>



    </section>
    <?php
        include("footer.php");
        ?>
        <script src="js/index.js"></script>
</body>
</html>
