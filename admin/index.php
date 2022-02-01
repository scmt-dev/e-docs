<?php
session_start();
if($_SESSION['user_role']!=='admin'){
    header('location: ../');
}
?>
admin

<a href="../logout.php">Logout</a>