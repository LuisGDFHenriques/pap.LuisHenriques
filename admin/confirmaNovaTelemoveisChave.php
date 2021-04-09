<?php
include_once ("includes/body.inc.php");


$idCat=intval($_POST['Categoria']);
$idCha=intval($_POST['chave']);
$sql="insert into categoriachaves(categoriaChaveNome,categoriaChaveCategoriaId) values('".$nomeCat."',".$idCat.")";

mysqli_query($con,$sql);
header("location:telemoveisChaves.php");
?>

