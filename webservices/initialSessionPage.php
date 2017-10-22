<?php

// Start the session
session_start();

$_SESSION['u_id_no'] = "1112222233";
$_SESSION['u_first_name'] = "John";
$_SESSION['u_last_name'] = "Smith";
$_SESSION['u_email'] = "john@smith.com";
$_SESSION['u_access'] = "WRITE";

header('Location: /calendar.php');
?>
