<?php
include_once ("includes/body.inc.php");

$nome=$_POST['nomeCategoria'];
$sql="insert into categorias(categoriaNome) values('$nome')";

mysqli_query($con,$sql);
header("location:categorias.php");
?>

