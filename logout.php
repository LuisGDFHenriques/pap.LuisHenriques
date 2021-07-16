<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['nome']);
unset($_SESSION['carrinho']);
header("location:index.php");
?>

