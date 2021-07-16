<?php
session_start();
$id=intval($_GET['id']);
$cont=0;
foreach ($_SESSION['carrinho'] as $produto){
$cont++;
if($produto==$id){
$_SESSION['carrinho'][$cont-1]=0;
}
}
header("location:carrinho.php");
?>