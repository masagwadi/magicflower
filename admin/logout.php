<?php
require_once("../functions.php");
require_once("../database.php");
session_start();

unset($_SESSION['user_all_info_admin']);
unset($_SESSION['masagwadi_tmp_admin']);
// destroy the session
session_destroy();

redirect_to("login.php");
?>
