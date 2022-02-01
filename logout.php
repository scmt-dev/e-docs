<?php
session_start(); // use session
session_destroy(); // delete all session
header('location: login.php'); // redirect to login page
?>