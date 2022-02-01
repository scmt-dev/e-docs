<?php
session_start();
// check login session user id
if($_SESSION['user_id'] < 1){
    // redirect to login
    header('location: login.php');
}

?>
Home page

<a href="logout.php">Logout</a>