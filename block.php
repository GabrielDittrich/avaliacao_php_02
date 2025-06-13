<?php session_start();
if (!isset($_SESSION['email']) || !isset($_SESSION['password'])){
    header('location:index.php?code=0');
}
?>