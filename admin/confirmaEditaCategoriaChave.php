<?php
include_once ("includes/body.inc.php");
$nome=addslashes($_POST['nomeCategoriaChave']);
$id=intval($_POST['categoriaChaveId']);
$idCategoria=intval($_POST['Categoria']);
$sql="UPDATE categoriachaves SET categoriaChaveNome='".$nome."', categoriaChaveCategoriaId=".$idCategoria;
$sql.=" where categoriaChaveId=".$id;
mysqli_query($con,$sql);
header("location:categoriaChaves.php");
?>