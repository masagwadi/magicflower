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

            <h1 style="text-align:center;">Vouchers</h1>
            <a href="addvoucher.php"><h2 class="button">Add Voucher</h2></a>
        </header>

       <div style="width:96%; margin-left:2%;">

<span class="vcode-err"></span>

                <br>


<ul class="voucher-list">


        <?php
        $sql = "SELECT * FROM vouchers ";
        global $dbConn;
        $bankResult = $dbConn->query($sql) or die("Could not execute mysqli QUERY090 - I'm at 01 bank");
        $row = dbFetchAssoc($bankResult);


        do  {
            if (isset($row))
            {

           $voucherIDnow = $row['voucherID'];

           echo "<li>";
           if($row['status'] == "active"){
               echo "<span data-vidstatus='$voucherIDnow' class='vactive'></span>";
           }else{
                echo "<span data-vidstatus='$voucherIDnow' class='vinactive'></span>";
           }

                echo "<span>".$row['voucherName']."  |  </span>";
                echo "<span>".$row['voucherDscrp']."  |  </span>";
                echo "<span>".$row['voucherType']."  |  </span>";
                echo "<span>".$row['voucherValue']."  |  </span>";
                echo "<span>".$row['dateCreated']."  |  </span>";
                echo "<span>".$row['number']."  |  </span>";
                echo "</span>".$row['voucherCode']."  |  </span>";


                if($row['status'] == "active"){
                    echo "<a ><span class=' vstop' data-vid='$voucherIDnow'>Deactivate</span></a>";
                }else{
                     echo "<a ><span class=' vstart' data-vid='$voucherIDnow'>Activate</span></a>";
                }

              echo "</li>";



            }else{
                echo "No Voucher Data";
            }
        }
        while ($row = mysqli_fetch_assoc($bankResult));

        ?>
</ul>


        </div>

        <?php
        include("../footer.php");
        ?>


    </body>

</html>
