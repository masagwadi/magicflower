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
        <link rel="stylesheet" href="css/contactform.css">
        <link rel="stylesheet" href="css/normalize.css">

        <style>

        </style>


    </head>

    <body>

        <header class="header">
            <?php
            include("nav.php");
            ?>
            <span class="head">

                <img  src="img/header1.jpeg" />


            </span>

        </header>


        <section class="content-wrap">

            <div class="container">
                <div class="row header">
                    <h1>CONTACT US &nbsp;</h1>
                    <h3>Fill out the form below to learn more!</h3>
                </div>
                <div class="row body">
                    <form action="#">
                        <ul>

                            <li>
                                <p class="left">
                                    <label for="first_name">first name</label>
                                    <input type="text" name="first_name" placeholder="John" />
                                </p>
                                <p class="pull-right">
                                    <label for="last_name">last name</label>
                                    <input type="text" name="last_name" placeholder="Smith" />
                                </p>
                            </li>

                            <li>
                                <p>
                                    <label for="email">email <span class="req">*</span></label>
                                    <input type="email" name="email" placeholder="john.smith@gmail.com" />
                                </p>
                            </li>
                            <li><div class="divider"></div></li>
                            <li>
                                <label for="comments">comments</label>
                                <textarea cols="46" rows="3" name="comments"></textarea>
                            </li>

                            <li>
                                <input class="button c-black" type="submit" value="Submit" />
<!--                                <small>or press <strong>enter</strong></small>-->
                            </li>

                        </ul>
                    </form>
                </div>
            </div>




            <div class="container">
                <div class="row header2">
                    <h1>OUR DETAIL &nbsp;</h1>
                    <h3></h3>
                </div>
                <div class="row body">

                    <section>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26502.4337231871!2d18.507525660288525!3d-33.868936225627266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1dcc59550fd5cfeb%3A0x5d3b409e27ded873!2sMilnerton%2C+Cape+Town!5e0!3m2!1sen!2sza!4v1477240509693"height="400" frameborder="0" style="border:0; width:100%;" allowfullscreen></iframe>
                    </section>


                    <h3>Physical Address:</h3>

                    <label>7th Floor, Zurich House, 70 Fox Street, Marshalltown,</label>
                    <p>Johannesburg, South Africa </p>

                    <p>Tel: +27 (0) 11 403 4440/1/2</p>
                    <p>Fax : +27 (0) 11 403 4443</p>

                    <h3>Postal Address:</h3>

                    <p>PO Box 61624, </p>
                    <p>Marshalltown 2107</p>

                </div>
            </div>



        </section>



        <?php
        include("footer.php");
        ?>


        <script src="js/index.js"></script>

    </body>

</html>
