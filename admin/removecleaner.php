<!DOCTYPE html>
<html>
    <?php
    session_start();
    require '../functions.php';
    require '../database.php';
    ?>
    <?php
    include("nav.php");
    ?>

    <body>
        <header class="header" style="padding-top:100px;">

            <h1 style="text-align:center;">Remove CLEANERS</h1>
        </header>

       <div style="width:96%; margin-left:2%;">
        <?php

        $cleanerID = $_GET['cleanerid'];
        $bookingID = $_GET['bookid'];


        $sql = "DELETE FROM `cleanertoorder` WHERE `cleanertoorderID` = $cleanerID";
        db_Query($sql);


        header('Location: assign.php?id='.$bookingID.'');

        ?>

        </div>

        <?php
        include("../footer.php");
        ?>
        <script src="js/index.js"></script>


    </body>

</html>
