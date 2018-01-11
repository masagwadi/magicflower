<!DOCTYPE html>
<html>
    <?php
    session_start();
    require 'functions.php';
    require 'database.php';
    ?>
    <?php
    include("nav.php");
    ?>

    <body>
        <header class="header" style="padding-top:100px;">

            <h1 style="text-align:center;">Order Details</h1>
        </header>

       <div style="width:96%; margin-left:2%;">

           <div class="order-body">
        <?php

        $theirID = $_GET['id'];

        $id = $_SESSION['masagwadi_tmp']['idCustomers'];

        $sql = "SELECT * FROM orders WHERE idOrders = '$theirID' AND userid = $id ";
        global $dbConn;
        $bankResult = $dbConn->query($sql) or die("Could not execute mysqli QUERY090 - I'm at 01 bank");

        if ($bankResult->num_rows != 1){
            redirect_to("profile");
        }

        $row = dbFetchAssoc($bankResult);


        do  {
            if (isset($row))
            {

                // Personal Details

                echo "<div class='cleanerprof'>";
                echo "<span class='cleanprofpic'><img src='images/cleaning_tools.jpg'/> </span><br />";

                echo "<span class='cleanerinfo'>";
                // echo "<b>Ref: </b>".$row['payref']."<br />";
                echo "<b>Name: </b>".$row['OrdersName']."<br />";
                echo "<b>Surname: </b>".$row['OrdersLname']."<br />";
                echo "<b>Phone: </b>".$row['OrdersPhone']."<br />";
                echo "<b>Email: </b>".$row['OrdersEmail']."<br /><br />";
                echo "<b>Address: </b><br />".$row['OrdersAdress']."<br />".$row['city']."<br />".$row['province']."<br />".$row['pcode']."<br /><br />";

                if($row['restype'] == 'iown'){
                    $restype = "Owner";
                }else{
                    $restype = "Renter";
                }
                echo "<b>Owner/Renter: </b>".$restype."<br /><br />";

                if($row['pets'] == 'yespets'){
                    $havepets = "YES";
                }else{
                    $havepets = "NO";
                }
                echo "<b>Pets ?: </b>".$havepets."<br />";
                echo $row['mypets']."<br /><br />";


                $orderIDnow = $row['idOrders'];






                // echo "<a href='viewcleaner.php?cleanerid=$orderIDnow'><span class='btn '>VIEW PROFILE</span></a>";
                echo "</span>";
                echo "</div>";


                // Order Details
                echo "<div class='cleanerprof'>";
                // echo "<span class='cleanprofpic'><img src='../images/cleaning_tools.jpg'/> </span><br />";

                echo "<span class='cleanerinfo'>";
                echo "<b>Ref: </b>".$row['payref']."<br />";
                echo "<b>Date: </b>".date("d - m - Y", strtotime($row["OrdersDate"]))."<br />";
                echo "<b>Time: </b>".$row['OrdersTime']."<br />";
                echo "<b>Frequency: </b>".$row['OrdersFreq']."<br />";
                echo "<b>Rooms: </b>".$row['OrdersRooms']."<br />";
                echo "<b>Bathrooms: </b>".$row['OrdersBathRooms']."<br />";
                echo "<b>Windows: </b>".$row['OrdersCleanWindow']."<br /> <br />";
                echo "<b>Total: R </b>".$row['OrderTotal']."<br />";
                echo "<b>Amount Due:  R </b>".$row['orderDue']."<br />";
                $voucherIDnow = $row['voucherIDorder'];
                if($voucherIDnow != "" && $voucherIDnow != "no voucher"){

                  echo "<b>Voucher Appied</b><br />";
                }



                echo "<b>Payment Option: </b>".$row['payop']."<br />";

                echo "<br /><b>Status: </b>";
                // echo "<b>Status: </b>".$row['OrderStatus']."<br />";
                $ordstat = $row['OrderStatus'];
                $proclaz = $scheclaz = $canclaz = $comclaz = '';

                echo "<a data-orderidclick='$orderIDnow' class='status-btn status-btn-active'>$ordstat</a>";


                // echo "<b>Rooms: </b>".$row['OrdersRooms']."<br /><br />";
                // echo "<b>Address: </b><br />".$row['OrdersAdress']."<br />".$row['city']."<br />".$row['province']."<br />".$row['pcode']."<br /><br />";




                $orderIDnow = $row['idOrders'];
                // echo "<a href='viewcleaner.php?cleanerid=$orderIDnow'><span class='btn '>VIEW PROFILE</span></a>";
                echo "</span>";
                echo "</div>";




            }else{
                echo "No Cleaner Data";
            }
        }
        while ($row = mysqli_fetch_assoc($bankResult));

        ?>


<div class='cleanerprof'>

<span class='cleanerinfo'>

<h3>Assigned Cleaners</h3>

<?php
  $sql = "SELECT * FROM cleanertoorder WHERE c2oorderID = '$theirID' ";
  global $dbConn;
  $bankResult = $dbConn->query($sql) or die("Could not execute mysqli QUERY090 - I'm at 01 bank");
  $row = dbFetchAssoc($bankResult);


  do  {
  if (isset($row))
  {
      $cleanerIDnow = $row['c2oclenerID'];
      $cleanertoorderID = $row['cleanertoorderID'];

      echo "<div class='cleaner-prev'>";
          echo "<span class='cleaner-avatar'><img src='images/cleaners/".getCleanerAvatar($cleanerIDnow)."' /></span> ";

          echo "<a ><b class='' >".getCleanerFullname($cleanerIDnow)."</b><br /></a></br>";


       echo "</div>";
  }else{
      echo "No Cleaner Assigned Yet";
  }
  }
  while ($row = mysqli_fetch_assoc($bankResult));



  ?>






</span>

</div>


<!-- Pocess form sub -->
<?php

if(isset($_POST['addcleanertoorder'])){

$clnID = $_POST['cleaner'];


$sqlchk = "SELECT * FROM cleanertoorder WHERE c2oclenerID='$clnID' AND  c2oorderID='$theirID' ";
global $dbConn;
$bankResultchk = $dbConn->query($sqlchk) or die("Could not execute mysqli QUERY090 - I'm at 01 bank");

if (dbNumRows($bankResultchk) >= 1) {
    // echo "Another One";
}else{
    $sql = "INSERT INTO cleanertoorder (c2oclenerID, c2oorderID)
    VALUES ('$clnID', '$theirID')";
    db_Query($sql);
}

header('Location: assign.php?id='.$theirID.'');

}


 ?>






           </div>


           <div class="vcode-err">

           </div>

        </div>

        <?php
        include("footer.php");
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
                    "autoWidth": true
                });
            });
        </script>
    </body>

</html>
