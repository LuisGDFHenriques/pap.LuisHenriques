<?php
include_once ("includes/body.inc.php");
$id=intval($_GET['id']);
$sql= "delete from produtochaves where produtoChaveChaveId=".$id;
mysqli_query($con,$sql);
header("location:produtosChave.php");
?>
