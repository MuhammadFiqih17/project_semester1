<?php 
session_start();
unset($_SESSION['keranjang']);
header("Location: indek.php");
?>