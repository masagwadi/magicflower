<head>
    <meta charset="UTF-8">
    <title>Magic Flower</title>

    <!-- Latest compiled and minified JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <meta name="viewport" content="width=device-width">
    <link rel='shortcut icon' href='../img/logo.png' type='image/x-icon' />
    <script type="text/javascript" src="../js/formcalculations.js"></script>
    <link href="../css/cakeform.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../css/base.css" type="text/css" />
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" media="screen and (min-width: 601px) and (max-width: 1024px)" href="../css/tablet.css" />
    <link rel="stylesheet" media="screen and (min-width: 220px) and (max-width: 600px)" href="../css/mobile.css" />

    <!--    //Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Poiret+One|Ranga" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab" rel="stylesheet">

        <!-- add bootstrap  -->
        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" >

    <!-- Optional theme -->
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">


    <!--
font-family: 'Ranga', cursive;
font-family: 'Poiret One', cursive;
-->
    <link href="https://fonts.googleapis.com/css?family=Ravi+Prakash" rel="stylesheet">
    <!--    font-family: 'Ravi Prakash', cursive;-->

    <!--    Font -->
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">


<!--    From Shining-->

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="shortcut icon" type="image/png" href="../images/mainlogoico.png"/>
    <meta name="description" content="Golden Empire Community" />
    <meta name="keywords" content="sliding menu, pushing menu, navigation, responsive, menu, css, jquery" />
    <meta name="author" content="Codrops" />
    <link rel="stylesheet" href="../css/default.css" type="text/css">
    <link rel="stylesheet" href="../css/component.css" type="text/css">
    <script src="../js/modernizr.custom.js"></script>
    <script src="../js/jquery.min.js"></script>
    <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
    <script src="../js/jquery-1.8.3.min.js"></script>

    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="../plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="../plugins/datatables/jquery.dataTables.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <!-- page script -->
<script src="../js/index.js"></script>

</head>


   <nav class="infosection" style="position:fixed; top 10px; ">

    <style>
        .hide {
            display: none;
        }

    </style>

<style>
    /* Remove margins and padding from the list, and add a black background color */
    ul.topnav {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: rgba(243, 127, 32, 1);
        color: red;
        margin-top: 20px;
    }

    /* Float the list items side by side */
    ul.topnav li {float: left; }

    /* Style the links inside the list items */
    ul.topnav li a {
        display: inline-block;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        transition: 0.3s;
        font-size: 17px;

    }

    /* Change background color of links on hover */
    ul.topnav li a:hover {background-color: #028f02;border-left:8px solid white;}

    /* Hide the list item that contains the link that should open and close the topnav on small screens */
    ul.topnav li.icon {display: none; background-color: black;}



    /* When the screen is less than 680 pixels wide, hide all list items, except for the first one ("Home"). Show the list item that contains the link to open and close the topnav (li.icon) */
    @media screen and (max-width:680px) {
        ul.topnav li:not(:first-child) {display: none;}
        ul.topnav li.icon {
            float: right;
            display: inline-block;
        }
    }

    /* The "responsive" class is added to the topnav with JavaScript when the user clicks on the icon. This class makes the topnav look good on small screens */
    @media screen and (max-width:680px) {
        ul.topnav.responsive {position: relative;}
        ul.topnav.responsive li.icon {
            position: absolute;
            right: 0;
            top: 0;
        }
        ul.topnav.responsive li {
            float: none;
            display: inline;
        }
        ul.topnav.responsive li a {
            display: block;
            text-align: left;
        }
    }
    .b-black {
        background-color: black;

    }
</style>

<script>

    /* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }

</script>

<ul class="topnav" style="display:inline">
    <li class="">
        <a href="index.php" style="padding:0;">
            <img src="../img/logo.png" height="70" style="list-style:none; margin-left:10px; margin-top:5px; margin-bottom:8px;  padding-right:10px;" />
        </a>
    </li>
</ul>

<ul class="topnav" id="myTopnav" >

    <li class=""><a href="index.php">HOME</a></li>
    <li class="bg-green "><a href="orders.php">ORDERS</a></li>
   <li class=""><a href="cleaners.php">CLEANERS</a></li>
    <!-- <li class=""><a href="profile.php">PROFILE</a></li> -->
    <li class=""><a href="reports.php">REPORTS</a></li>



    <?php
    if (isset($_SESSION['masagwadi_tmp_admin'])) {
        echo "
                <li class='mobile'><a href='logout.php'>Log Out</a></li>
                ";
    } else {
        echo "
                <li class='mobile'><a href='login.php'>Login</a></li>

                ";
    }

    ?>

    <li class="icon">
        <a href="javascript:void(0);" onclick="myFunction()">&#9776;</a>
    </li>

</ul>

<ul class="topnav desktop" id="myTopnav" style="float:right; position: absolute; top:0;z-index:9999;right:0;" >

           <?php
            if (isset($_SESSION['masagwadi_tmp_admin'])) {
               echo "
                <li class=''><a href='logout.php'>Log Out</a></li>
                ";
           } else {
               echo "
                <li class=''><a href='login.php'>Login</a></li>

                ";
           }
           ?>
           <li class="icon">
               <a href="javascript:void(0);" onclick="myFunction()">&#9776;</a>
           </li>

       </ul>


</nav>
