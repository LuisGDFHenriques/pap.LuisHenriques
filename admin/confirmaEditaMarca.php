<?php
include_once ("includes/body.inc.php");

$nome=$_POST['nomeMarca'];
$id=$_POST['idMarca'];
$sql="update marcas set marcaNome='$nome' where marcaId=$id";

mysqli_query($con,$sql);
header("location:marcas.php");
?>

