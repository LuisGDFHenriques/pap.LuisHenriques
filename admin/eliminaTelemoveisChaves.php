<?php
include_once ("includes/body.inc.php");

$chaveId=intval($_GET['chaveId']);
$produtoId=intval($_GET['produtoId']);
$sql= "delete from produtochaves where produtoChaveChaveId=".$chaveId." and produtoChaveProdutoId=".$produtoId;
mysqli_query($con,$sql);
header("location:produtosChave.php?id=$produtoId");
?>
