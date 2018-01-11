<?php

if (!isset($_SESSION))
{
    session_start();
}


$dbHost = 'localhost';
$dbUser = 'f2048920_masagwa';
$dbPass = 'Mrnaledi@30';
$dbName = 'f2048920_masagwadi';
//global $dbConn;

//$dbConn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName) or die ('MySQL connect failed. ' . mysqli_connect_error());
//mysqli_select_db($dbConn,$dbName) or die('Cannot select database. ' . mysqli_error());

$dbConn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// check connection
if ($dbConn ->connect_error) {
    trigger_error('Database connection failed: '  . $dbConn ->connect_error, E_USER_ERROR);
    echo 'nooooooo';
}

//if (isset($dbConn)){
//    echo 'yeeeeee';
//}





























































function db_Query($sql)
{
    //global $dbConn;
// $result = mysqli_query($dbConn, $sql) or die("Could not execute mysqli QUERY - I'm at database.php");

    $result=$dbConn->query($sql) or die("Could not execute mysqli QUERY090 - I'm at database.php");

 return $result;
}

function dbAffectedRows()
{
    global $dbConn;
    return mysqli_affected_rows($dbConn);
}

function dbFetchArray($result, $resultType = MYSQL_NUM) {
    return mysqli_fetch_array($result, $resultType);
}

function dbFetchAssoc($result)
{
    return mysqli_fetch_assoc($result);
}

function dbFetchRow($result)
{
    return mysqli_fetch_row($result);
}

function dbFreeResult($result)
{
    return mysqli_free_result($result);
}

function dbNumRows($result)
{
    return mysqli_num_rows($result);
}

function dbSelect($dbName)
{
    return mysqli_select_db($dbName);
}

function dbInsertId()
{
    return mysqli_insert_id();
}

//mysqli_close($dbConn);

?>
