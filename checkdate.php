<?php

require_once("functions.php");
require_once("database.php");
session_start();

$date = $_GET['date'];

// echo date('Y-m-d',strtotime($date));

$date2v = date('Y-m-d',strtotime($date));




$sql = "SELECT * FROM orders WHERE `OrdersDate` LIKE '%$date2v%' ";
global $dbConn;
$bankResult = $dbConn->query($sql) or die("Could not execute mysqli QUERY090 - I'm at 01 bank");
$row = dbFetchAssoc($bankResult);

$howmany = dbNumRows($bankResult);


$a[8] = $a[9] = $a[10] = $a[11] = $a[12] = $a[13] = $a[14] = $a[15] = $a[16] = 0;

do  {
    if (isset($row))
    {

        switch ($row['OrdersTime']) {
            case "08H00 AM":
                $a[8]++;
                break;
            case "09H00 AM":
                $a[9]++;
                break;
            case "10H00 AM":
                $a[10]++;
            case "11H00 AM":
                $a[11]++;
                break;
            case "12H00 PM":
                $a[12]++;
                break;
            case "13H00 PM":
                $a[13]++;
                break;
            case "14H00 PM":
                $a[14]++;
                break;
            case "15H00 PM":
                $a[15]++;
                break;
            case "16H00 PM":
                $a[16]++;
                break;
            default:

        }



echo date('Y-m-d',strtotime($row['OrdersDate']))."  ".$row['OrdersTime']."<br />";



    }
}
while ($row = mysqli_fetch_assoc($bankResult));

 ?>

 <h1>wahemba</h1>
 <?php
echo $howmany."<br /><br /><br />";

//
// echo "8H00 - ".$a8."<br />";
// echo "9H00 - ".$a9."<br />";
// echo "10H00 - ".$a10."<br />";
// echo "11H00 - ".$a11."<br />";
// echo "12H00 - ".$a12."<br />";
// echo "13H00 - ".$a13."<br />";
// echo "14H00 - ".$a14."<br />";
// echo "15H00 - ".$a15."<br />";
// echo "16H00 - ".$a16."<br />";


for($i=8; $i < 16; $i++){
     if($a[$i] > 0){
       echo "<b class='high'>".$i."H00 - ".$a[$i]."</b><br />";
     }else{
       echo $i."H00 - ".$a[$i]."<br />";
     }

}



  ?>

  <style>
    .high{
      color: green;
    }
    .high::selection{
      color: red;
      background-color: yellow;
    }
  </style>
