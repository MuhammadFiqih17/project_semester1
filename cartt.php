<?php
session_start();
include "oke.php";

$prod = $_GET['id'];
$_SESSION['id'] = $prod;

if(isset($_SESSION['keranjang'][$prod])){
    $_SESSION['keranjang'][$prod]+=1;
}else{
    $_SESSION['keranjang'][$prod]=1;
}
header("Location: cart.php");
?>