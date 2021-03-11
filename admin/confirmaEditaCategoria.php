<?php
include_once ("includes/body.inc.php");

$nome=$_POST['nomeCategoria'];
$id=$_POST['idCategoria'];
$sql="update categorias set categoriaNome='$nome' where categoriaId=$id";

mysqli_query($con,$sql);
header("location:categorias.php");
?>

