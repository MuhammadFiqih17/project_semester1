<?php
session_start();
$id_barang = $_GET['hapus'];
unset($_SESSION['keranjang'][$id_barang]);
header("Location: cart.php");
echo "<script>
         alert('Successfully remove product from the cart!');
     </script>";
?>