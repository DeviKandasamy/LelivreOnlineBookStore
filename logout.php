<?php
session_start();
$_SESSION["loggedin"] = false;
session_destroy();

// Redirect user to the home page.
header("location:index.php");
?>
