<?php
include_once ("includes/body.inc.php");


$nome=addslashes($_POST['nomeCategoriaChave']);
$idCat=intval($_POST['categoria']);
$tipo=addslashes($_POST['tipoCategoria']);
if($idCat==-1) {// n�o h� categoria
    $idCat = "NULL";
}
$sql="insert into categoriachaves(categoriaChaveNome,categoriaChaveCategoriaId,categoriaChaveTipo) values('".$nome."',".$idCat."',".$tipo."')";

mysqli_query($con,$sql);
header("location:categoriaChaves.php");
?>

