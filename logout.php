<?php
require_once("functions.php");
require_once("database.php");
session_start();

unset($_SESSION['user_all_info']);
unset($_SESSION['masagwadi_tmp']);
// destroy the session
session_destroy();

redirect_to("login.php");
?>
