<?php

session_start();
//unset session variables
$_SESSION = array();

//destroy

session_destroy();

//redirect
header('location: index.php');

echo "You are logged out";
exit;
?>