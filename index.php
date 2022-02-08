<?php
session_start();
require 'config.php';
// check login session user id
if($_SESSION['user_id'] < 1){
    // redirect to login
    header('location: login.php');
}
echo '<pre>';
// print_r($_GET);
// print_r($_POST);
// echo $_GET['xx'];
// print_r($_SESSION);
// var_dump($_SERVER);

echo $_SERVER['ENVIRONMENT'];

print_r($config);

echo '</pre>';



?>
Home page

<a href="logout.php">Logout</a>