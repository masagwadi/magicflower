<!DOCTYPE html>
<html>

<?php
session_start();
require_once("database.php");
require_once("functions.php");
include("nav.php");

if (!isset($_SESSION['masagwadi_tmp'])) {
    redirect_to("login.php");
} else {
?>



    <head>
        <title>User Profile</title>
        <script src="script.js" type="text/javascript"></script>


        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link href="css/cakeform.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="css/base.css" type="text/css" />
        <link rel="stylesheet" href="css/style.css" type="text/css"/>

    </head>

    <body>
       <header>


       </header>


        <?php

        $id = $_SESSION['masagwadi_tmp']['idCustomers'];


    ## query database
    # fetch data from mysql database


    $sql = "SELECT * FROM customers WHERE idCustomers = '$id' LIMIT 1";

    global $dbConn;
    $result = db_Query($sql);

    if (dbNumRows($result)  >= 1) {
        $user = $result->fetch_array();
    }else {
        // echo "<p>MySQL error no {$mysqli->errno} : {$mysqli->error}</p>";
        // exit();
        echo "something went wrong";
    }

    // if (dbNumRows($result) == 1) {
    //     # calculating online status
    //     if (time() - $user['status'] <= (5*60)) { // 300 seconds = 5 minutes timeout
    //         $status = "Online";
    //     } else {
    //         $status = "Offline";
    //     }
    //
    // } else { // 0 = invalid user id
    //     echo "<p><b>Error:</b> Invalid user ID.</p>".dbNumRows($result);
    // }


        ?>



            <hr />
            <style>




            </style>

            <div class="profile-wrapper mt100">


                <!-- Left side column. contains the logo and sidebar -->


                <!-- Content Wrapper. Contains page content -->
                <div class="container">



                    <span class="profleft">
                        <span class="profimg">
                            <img src="images/profilepic.png"/>

                            <h3><?php echo $_SESSION['masagwadi_tmp']['username'] ?></h3><br><br><br>
                            <hr>
                        </span>
                        <span class="profdetails">
                            <br><p><?php echo $_SESSION['masagwadi_tmp']['CustomerName'] ?></p>
                            <p><?php echo $_SESSION['masagwadi_tmp']['CustomerLname'] ?></p>
                            <p><?php echo $_SESSION['masagwadi_tmp']['CustomerEmail'] ?></p>
                            <p><?php echo $_SESSION['masagwadi_tmp']['CustomerPhone'] ?></p>
                        </span>
                    </span>


                    <span class="profright">

                        <h4>Orders:</h4>


                        <?php

                            $sql = "SELECT * FROM orders WHERE userid = $id ";
                            global $dbConn;
                            $bankResult = $dbConn->query($sql) or die("Could not execute mysqli QUERY090 - I'm at 01 bank");
                            $row = dbFetchAssoc($bankResult);

                            $totaln = 0;


                            echo "<table id='example2' class='table table-bordered table-hover'>";
                      echo "<thead>";
                      echo "<th class='font12 desktop'>"."ID".'</th>';
                      echo "<th class='font12 desktop'>"."Freq".'</th>';
                      echo "<th class='font12 desktop'>"."Order Date".'</th>';
                      echo "<th class='font12'>"."Cost".'</th>';
                      echo "<th class='font12'>"."Cleaning Date".'</th>';
                    //   echo "<th class='font12'>"."Time".'</th>';

                      echo "<th class='font12'>"."Pay Ref".'</th>';
                      echo "<th class='font12 desktop'>"."Status".'</th>';
                      echo "<th class='font12'>"."Action".'</th>';
                      echo "</thead>";
                      echo "<tbody>";
                      do  {
                          if (isset($row))
                          {

                              $totaln += $row["OrderTotal"];
                              echo "<tr>";

                              echo "<td class='font12 colhide desktop'>".$row["idOrders"] .'</td>';
                              echo "<td class='font12 desktop'>".$row["OrdersFreq"].'</td>';

                              echo "<td class='colhide desktop'>".date("Y - m - d", strtotime($row["create_time"])).'</td>';
                              echo "<td class='colhide'> R ".$row["orderDue"].'</td>';
                              echo "<td class='colhide'>".date("Y - m - d", strtotime($row["OrdersDate"])).'</td>';
                            //   echo "<td class='colhide'>".$row["OrdersTime"].'</td>';

                              echo "<td class='colhide'>".$row["payref"].'</td>';
                              echo "<td class='colhide desktop'>".$row["OrderStatus"].'</td>';

                              echo "<td class='font12'> <a href='vieworder.php?id=".$row['idOrders']."'><button class='btn btn-info btn-sml'>View</button></a>".'</td>';

                              echo '</tr>';
                          }
                      }
                      while ($row = mysqli_fetch_assoc($bankResult));
                      echo "</tbody>";
                      echo "<tfoot>";
                      echo "<tr>";
                      echo "<th class='font12 desktop'>"."ID".'</th>';
                      echo "<th class='font12 desktop'>"."Freq".'</th>';
                      echo "<th class='font12 desktop'>"."Order Date".'</th>';
                      echo "<th class='font12'>"."Cost".'</th>';
                      echo "<th class='font12'>"."Cleaning Date".'</th>';
                    //   echo "<th class='font12'>"."Time".'</th>';

                      echo "<th class='font12'>"."Pay Ref".'</th>';
                      echo "<th class='font12 desktop'>"."Status".'</th>';
                      echo "<th class='font12'>"."Action".'</th>';
                      echo "</tr>";
                      echo "</tfoot>";


                      echo "</table>";





                         ?>



                    </span>


                </div>
                <!-- /.content-wrapper -->

                <script src="js/index.js"></script>

                <script>
                    $(function () {
                        $("#example1").DataTable();
                        $("#example200").DataTable();
                        $("#example201").DataTable();
                        $('#example2').DataTable({
                            "paging": true,
                            "lengthChange": true,
                            "searching": true,
                            "ordering": true,
                            "info": true,
                        "order": [[ 0, "desc" ]],
                            "autoWidth": true
                        });
                    });
                </script>



                <?php
            }
            include("footer.php");
            ?>

            </div>
            <!-- ./wrapper -->



    </body>



    </html>
