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

            <h1 style="text-align:center;">ORDERS</h1>
        </header>

       <div style="width:96%; margin-left:2%;">
        <?php
        $sql = "SELECT * FROM orders ";
        global $dbConn;
        $bankResult = $dbConn->query($sql) or die("Could not execute mysqli QUERY090 - I'm at 01 bank");
        $row = dbFetchAssoc($bankResult);
        $totaln = 0;

        echo "<table id='example2' class='table table-bordered table-hover'>";
        echo "<thead>";
        echo "<th class='font12'>"."ID".'</th>';
        echo "<th class='font12'>"."Freq".'</th>';
        echo "<th class='font12'>"."Rooms".'</th>';
        echo "<th class='font12'>"."Bathrooms".'</th>';
        echo "<th class='font12'>"."Windows".'</th>';
        echo "<th class='font12'>"."Order Date".'</th>';
        echo "<th class='font12'>"."Cost".'</th>';
        echo "<th class='font12'>"."Cleaning Date".'</th>';
        echo "<th class='font12'>"."Time".'</th>';
        echo "<th class='font12'>"."Name".'</th>';
        echo "<th class='font12'>"."Surname".'</th>';
        echo "<th class='font12'>"."Address".'</th>';
        echo "<th class='font12'>"."City".'</th>';
        echo "<th class='font12'>"."Province".'</th>';
        echo "<th class='font12'>"."Code".'</th>';
        echo "<th class='font12'>"."Pay Ref".'</th>';
        echo "<th class='font12'>"."Status".'</th>';
        echo "<th class='font12'>"."Action".'</th>';
        echo "</thead>";
        echo "<tbody>";
        do  {
            if (isset($row))
            {

                $totaln += $row["OrderTotal"];
                echo "<tr>";

                echo "<td class='font12 colhide'>".$row["idOrders"] .'</td>';
                echo "<td class='font12'>".$row["OrdersFreq"].'</td>';
                echo "<td class='font12'>".$row["OrdersRooms"].'</td>';
                echo "<td class='colhide'>".$row["OrdersBathRooms"].'</td>';
                echo "<td class='colhide'>".$row["OrdersCleanWindow"].'</td>';
                echo "<td class='colhide'>".$row["create_time"].'</td>';
                echo "<td class='colhide'>".$row["orderDue"].'</td>';
                echo "<td class='colhide'>".$row["OrdersDate"].'</td>';
                echo "<td class='colhide'>".$row["OrdersTime"].'</td>';
                echo "<td class='colhide'>".$row["OrdersName"].'</td>';
                echo "<td class='colhide'>".$row["OrdersLname"].'</td>';
                echo "<td class='colhide'>".$row["OrdersAdress"].'</td>';
                echo "<td class='colhide'>".$row["city"].'</td>';

                echo "<td class='colhide'>".$row["province"].'</td>';
                echo "<td class='colhide'>".$row["pcode"].'</td>';
                echo "<td class='colhide'>".$row["payref"].'</td>';
                echo "<td class='colhide'>".$row["OrderStatus"].'</td>';

                echo "<td class='font12'> <a href='assign.php?id=".$row['idOrders']."'><button class='btn btn-info btn-sml'>View</button></a>".'</td>';

                echo '</tr>';
            }
        }
        while ($row = mysqli_fetch_assoc($bankResult));
        echo "</tbody>";
        echo "<tfoot>";
        echo "<tr>";
        echo "<th class='font12'>"."ID".'</th>';
        echo "<th class='font12'>"."Freq".'</th>';
        echo "<th class='font12'>"."Rooms".'</th>';
        echo "<th class='font12'>"."Bathrooms".'</th>';
        echo "<th class='font12'>"."Windows".'</th>';
        echo "<th class='font12'>"."Order Date".'</th>';
        echo "<th class='font12'>"."Cost".'</th>';
        echo "<th class='font12'>"."Cleaning Date".'</th>';
        echo "<th class='font12'>"."Time".'</th>';
        echo "<th class='font12'>"."Name".'</th>';
        echo "<th class='font12'>"."Surname".'</th>';
        echo "<th class='font12'>"."Address".'</th>';
        echo "<th class='font12'>"."City".'</th>';
        echo "<th class='font12'>"."Province".'</th>';
        echo "<th class='font12'>"."Code".'</th>';
        echo "<th class='font12'>"."Pay Ref".'</th>';
        echo "<th class='font12'>"."Status".'</th>';
        echo "<th class='font12'>"."Action".'</th>';
        echo "</tr>";
        echo "</tfoot>";


        echo "</table>";


           echo $totaln;

        ?>

        </div>

        <?php
        include("../footer.php");
        ?>
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
    </body>

</html>
