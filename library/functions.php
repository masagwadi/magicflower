<?php


require_once 'database.php';

function doRegister()
{

    $username = mysql_real_escape_string($_POST['username']);
    $fname 	= mysql_real_escape_string($_POST['firstname']);
    $lname 	=mysql_real_escape_string($_POST['lastname']);
    $pwd 	= mysql_real_escape_string($_POST['password']);
    $email 	= mysql_real_escape_string($_POST['email']);
    $phone 	= mysql_real_escape_string($_POST['mobile']);
    $gender = mysql_real_escape_string($_POST['gender']);



    $errorMessage = '';



    $sql = "SELECT uname FROM wg_tbl_users WHERE uname = '$username'";


    $result = db_Query($sql);
    if (dbNumRows($result) == 1) {
        $errorMessage = 'Username already exist, please try another name.';
        return $errorMessage;
    }



    $sql = "SELECT email FROM wg_tbl_users WHERE email = '$email'";
    $result = db_Query($sql);
    if (dbNumRows($result) == 1) {
        $errorMessage = 'Email already exist, go login. Click forgot password below if you forgot your password.';
        return $errorMessage;
    }




    $sql = "INSERT INTO wg_tbl_users (uname, fname, lname, pwd, email, phone, gender, is_active, utype, bdate)
            VALUES ('$username', '$fname', '$lname', PASSWORD('$pwd'), '$email', '$phone', '$gender', 'TRUE', 'USER', NOW())";
    db_Query($sql);
    header('Location: aregister');
    exit;
}
    function doLogin()
{
    $errorMessage = '';
    $username 	= $_POST['username'];
    $pwd 	= $_POST['password'];
    $sql = "SELECT fname, lname, email, is_active, phone,
            uname, id, pwd, gender, utype, bdate
            FROM wg_tbl_users
            WHERE uname = '$username' AND pwd = PASSWORD('$pwd')
            AND is_active != 'FALSE'";
        $result = db_Query($sql);
    if (dbNumRows($result) == 1) {
        $row = dbFetchAssoc($result);
        $_SESSION['masagwadi_tmp'] = $row;
        $_SESSION['masagwadi_user_name'] =	strtoupper( $row['fname'].' '.$row['lname']);
//        $_SESSION['masagwadi_user_id'] = $row['id'];
      //  $user_Id = $row['id'];
//        $bank_sql = "SELECT *
//            FROM wg_bank_users
//            WHERE id = '$user_Id' ";
//        $bank_query = db_Query($bank_sql);
//        if (dbNumRows($bank_query) == 1) {
//            $bank_row = dbFetchAssoc($bank_query);
//            $_SESSION['masagwadi_bank'] = $bank_row;
//        }
//        else {
//            $errorMessage = 'bank data pull fail.';
//        }
        header('Location: profile');
        exit;
    }
    else {
        $errorMessage = 'Not valid Username or password. Or Account is not Active. Please try again or contact to support.';
    }
    return $errorMessage;
}
function doLogout()
{
    unset($_SESSION['masagwadi_tmp']);
        //session_unregister('hlbank_user');
    header('Location: login');
    exit;
}
echo 'the end';
?>