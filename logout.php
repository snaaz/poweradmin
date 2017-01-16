<?php
session_start();
session_unset();
unset($_SESSION['user']['firstname']);
unset($_SESSION['user']['lastname']);
unset($_SESSION['message']);
unset($_SESSION['error']);
$_SESSION = array();
session_destroy();
header("Location:login.html");
exit();
?>