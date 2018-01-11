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

            <h1 style="text-align:center;">CLEANER</h1>
        </header>

       <div style="width:96%; margin-left:2%;">
        <?php

        $theirID = $_GET['cleanerid'];

        $sql = "SELECT * FROM cleaners WHERE CleanerID = '$theirID' ";
        global $dbConn;
        $bankResult = $dbConn->query($sql) or die("Could not execute mysqli QUERY090 - I'm at 01 bank");
        $row = dbFetchAssoc($bankResult);


        do  {
            if (isset($row))
            {
                echo "<div class='cleanerprof'>";
                if ($row['image'] == "noimage") {
                    echo "<span class='cleanprofpic'><img src='../images/cleaners/cleanprof.png'/> </span><br />";
                }else{
                    echo "<span class='cleanprofpic'><img src='../images/cleaners/".$row['image']."'/> </span><br />";
                }
                echo "<span class='cleanerinfo'>";
                echo "<b>Username: </b>".$row['username']."<br />";
                echo "<b>Name: </b>".$row['CleanerName']."<br />";
                echo "<b>Surname: </b>".$row['CleanerLname']."<br />";
                echo "<b>Phone: </b>".$row['CleanerPhone']."<br />";
                echo "<b>Email: </b>".$row['email']."<br /><br />";
                $cleanerIDnow = $row['CleanerID'];
                echo "<a href='viewcleaner.php?cleanerid=$cleanerIDnow'><span class='btn '>VIEW PROFILE</span></a>";
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

        <h3>Cleaning Assigned</h3>

        <?php
          $sql = "SELECT * FROM cleanertoorder WHERE c2oclenerID = '$theirID' ";
          global $dbConn;
          $bankResult = $dbConn->query($sql) or die("Could not execute mysqli QUERY090 - I'm at 01 bank");
          $row = dbFetchAssoc($bankResult);


          do  {
          if (isset($row))
          {
              $cleanerIDnow = $row['c2oclenerID'];
              $theorderID = $row['c2oorderID'];

              echo "<div class='cleaner-prev'>";
                  echo "<span class='cleaner-avatar'><img src='../images/cleaners/".getCleanerAvatar($cleanerIDnow)."' /></span> ";

                  echo "<span class='cleaner-text'>";
                  echo "<a href='assign.php?id=$theorderID' ><b class='' >".getOrderInfo('payref',$theorderID)."</b></a><br />";
                  $thedate = getOrderInfo('OrdersDate',$theorderID);
                  echo "<a><b class='' >".date('Y - m - d',strtotime($thedate) )."</b><br /></a></br>";
                  echo "</span>";

               echo "</div>";
          }else{
              echo "No Cleaner Assigned Yet";
          }
          }
          while ($row = mysqli_fetch_assoc($bankResult));



          ?>


        </span>

        </div>
















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
                    "autoWidth": true
                });
            });
        </script>
    </body>

</html>
