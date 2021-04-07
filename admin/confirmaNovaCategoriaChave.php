<?php
include_once ("includes/body.inc.php");


$nome=$_POST['nomeCategoriaChave'];
$idCat=intval($_POST['Categoria']);
$sql="insert into categoriachaves(categoriaChaveNome,categoriaChaveCategoriaId) values('".$nome."',".$idCat.")";

mysqli_query($con,$sql);
header("location:categoriaChaves.php");
?>

