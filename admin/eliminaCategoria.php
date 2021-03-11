<?php
include_once("includes/body.inc.php");
$id=intval($_GET['id']);
$sql="delete from categorias where categoriaId = $id";
$result=mysqli_query($con,$sql);
header("location:categorias");
?>