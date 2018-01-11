<?php


function getOrderInfo($data,$ordid){

  $data = $data;
  $ordid = $ordid;

  $sql = "SELECT $data FROM orders WHERE idOrders = '$ordid' ";
   global $dbConn;
   $bankResult = $dbConn->query($sql) or die("Could not execute mysqli QUERY090 - I'm at 01 bank");
   $row = dbFetchAssoc($bankResult);

   return $row[$data];

}



function getCleanerAvatar($data){

  $cleaner = $data;

  $sql = "SELECT * FROM cleaners WHERE CleanerID = '$cleaner' ";
   global $dbConn;
   $bankResult = $dbConn->query($sql) or die("Could not execute mysqli QUERY090 - I'm at 01 bank");
   $row = dbFetchAssoc($bankResult);

   return $row['image'];

}

function getCleanerFullname($data){

  $cleaner = $data;

  $sql = "SELECT * FROM cleaners WHERE CleanerID = '$cleaner' ";
   global $dbConn;
   $bankResult = $dbConn->query($sql) or die("Could not execute mysqli QUERY090 - I'm at 01 bank");
   $row = dbFetchAssoc($bankResult);

   $fulln = $row['CleanerName']."  ".$row['CleanerLname'];
   return $fulln;

}


function doBook()
{
    $bookname = $_POST['name'];
    $booktell = $_POST['phonenumber'];
    $bookaddress = $_POST['address'];
    $bookrooms = $_POST['selectedrooms'];
    $bookbathrooms = $_POST['bathrooms'];
    $bookmaterials = $_POST['cleaningmaterials'];
    $bookwindos = $_POST['includewindows'];
    $booktotal = $_COOKIE['TotPri'];
    $bookfrequency = $_POST['selectedfrequency'];
    $cleanedate = $_POST['cleandate'];
    $cleantime = $_POST['cleantime'];

    $sql = "INSERT INTO magic_book (book_name, book_tell, book_address, book_rooms, book_bathrooms, book_materials, book_windows, book_total, book_frequency, cleandate, cleantime  )
 VALUES ('$bookname', '$booktell','$bookaddress', '$bookrooms','$bookbathrooms', '$bookmaterials','$bookwindos', '$booktotal', '$bookfrequency', '$cleanedate', '$cleantime' )";
    db_Query($sql);

    $deledadeng = setcookie("TotPri", $booktotal, 1);
    header('Location: thankyou.php');
    exit;
}

function logged_in()
{
    if (isset($_SESSION['username']) && isset($_SESSION['user_id'])) {
        return true;
    } else {
        return false;
    }
}

function redirect_to($url)
{
    header("Location: {$url}");
}

// db_Query : checks if the query was succesfully executed
function db_Query($sql)
{
    global $dbConn;
    $result = $dbConn->query($sql) or die("Could not execute mysqli QUERY090 - I'm at Func db_Query FUNCTIONS.php 41");
    return $result;
}

function dbFetchAssoc($result)
{
    return mysqli_fetch_assoc($result);
}

function send_mail($email, $message, $subject)
{


    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html; charset=iso-8859-1" . "\r\n";
    $headers .= "From:" . "Magic Flower" . "<info@magicflower.co.za>" . "\r\n" . "Reply-To: masagwadi@gmail.com" . "\r\n";


    mail($email, "$subject", $message, $headers);


}

// Counts the number of rows in a query results
function dbNumRows($result)
{
    return mysqli_num_rows($result);
}


function randomString($length = 6)
{

    if ($length <= 4) {
        $length = 6;
    }

    $str = "";
    $characters = array_merge(range('A', 'Z'), range('0', '9'));
//    $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
//	$characters = array_merge(range('A','Z'), range("9 ","Q"), range('0','9'));
    $max = count($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
        $rand = mt_rand(0, $max);
        $str .= $characters[$rand];
    }
    return $str;
}


?>
