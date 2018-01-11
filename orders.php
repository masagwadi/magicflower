<?php
session_start();
include 'database.php';
include 'functions.php';
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
        <link rel='shortcut icon' href='img/logo.png' type='image/x-icon' />
        <script type="text/javascript" src="js/formcalculations.js"></script>
        <link href="css/bookingform.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/base.css">
        <link rel="stylesheet" href="css/style.css">
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
        <nav class="infosection" style="position:fixed; top 10px;">
            <ul>
                <a href="index.php">
                    <li class="infoblock-logo"><img src="img/logo.png" height="50" style="margin-top:-15px;" /></li>
                </a>
            </ul>
            <ul>
                <a href="index">
                    <li class="infoblock bblue">HOME</li>
                </a>
                <a href="#">
                    <li class="infoblock bblue">ABOUT</li>
                </a>
                <a href="#">
                    <li class="infoblock bblue">PROFILES</li>
                </a>
                <a href="#">
                    <li class="infoblock bblue">SERVICES</li>
                </a>
            </ul>
        </nav>

        <div id="wrap" style="margin-top:100px;">

            <p>Orders</p>





            <?php

            $sql = "SELECT * FROM magic_book ";
            global $dbConn;
            $bookResult = $dbConn->query($sql) or die("Could not execute mysqli QUERY090 - I'm at 01 bank");
            $row = dbFetchAssoc($bookResult);///////////////////////////////////////////////////////////////*-95

            echo "<table id='example2' class='table table-bordered table-hover'>";
            echo "<thead>";
            echo "<th class='colhide'>"."Book ID".'</th>';
            echo "<th>"."Book Date".'</th>';
            echo "<th class='colhide'>"."Name".'</th>';
            echo "<th>"."Tell".'</th>';
            echo "<th>"."Email".'</th>';
            echo "<th>"."Address".'</th>';
            echo "<th>"."Rooms".'</th>';
            echo "<th>"."Bathrooms".'</th>';
            echo "<th>"."Materials".'</th>';
            echo "<th>"."Windows".'</th>';
            echo "<th>"."Frequency".'</th>';
            echo "<th>"."Cost".'</th>';
            echo "</thead>";
            echo "<tbody>";
            do  {
                if (isset($row))
                {

                    echo "<tr>";

                    echo "<td class='colhide'>".$row["book_ID"].'</td>';
                    echo "<td class='colhide'>".$row["book_date"].'</td>';
                    echo "<td class='colhide'>".$row["book_name"].'</td>';
                    echo "<td class='colhide'>".$row["book_tell"].'</td>';
                    echo "<td class='colhide'>"."massagwadi@gmail.com".'</td>';
                    echo "<td class='colhide'>".$row["book_address"].'</td>';
                    echo "<td class='colhide'>".$row["book_rooms"].'</td>';
                    echo "<td class='colhide'>".$row["book_bathrooms"].'</td>';
                    echo "<td class='colhide'>".$row["book_materials"].'</td>';
                    echo "<td class='colhide'>".$row["book_windows"].'</td>';
                    echo "<td class='colhide'>".$row["book_frequency"].'</td>';
                    echo "<td class='colhide'>".$row["book_total"].'</td>';

                    echo '</tr>';
                }
            }
            while ($row = mysqli_fetch_assoc($bookResult));
            echo "</tbody>";
            echo "<tfoot>";
            echo "<thead>";
            echo "<th class='colhide'>"."Book ID".'</th>';
            echo "<th>"."Book Date".'</th>';
            echo "<th class='colhide'>"."Name".'</th>';
            echo "<th>"."Tell".'</th>';
            echo "<th>"."Email".'</th>';
            echo "<th>"."Address".'</th>';
            echo "<th>"."Rooms".'</th>';
            echo "<th>"."Bathrooms".'</th>';
            echo "<th>"."Materials".'</th>';
            echo "<th>"."Windows".'</th>';
            echo "<th>"."Frequency".'</th>';
            echo "<th>"."Cost".'</th>';
            echo "</thead>";
            echo "</tfoot>";


            echo "</table>";
            ?>


                <style>
                    table {
                        border-collapse: collapse;
                    }

                    td {
                        min-width: 100px;
                        border: 1px solid;
                        padding: 5px;
                    }

                    th {
                        background-color: red;
                        padding: 5px 10px;
                        border: 1px solid black;
                        color: white;
                    }
                </style>









        </div>
        <!--End of wrap-->
        <div class="footer">
            Contact
        </div>
        <script src="js/index.js"></script>
    </body>

    </html>
