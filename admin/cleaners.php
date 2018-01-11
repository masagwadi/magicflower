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

            <h1 style="text-align:center;">CLEANERS</h1>
        </header>

       <div style="width:96%; margin-left:2%;">

                <a href="addcleaner.php"><h2 class="button">Add A Cleaner</h2></a>

                <br>




        <?php
        $sql = "SELECT * FROM cleaners ";
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
