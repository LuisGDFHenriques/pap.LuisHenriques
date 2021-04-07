<?php
include_once ("includes/body.inc.php");
$nome=addslashes($_POST['nomeChave']);
$id=intval($_POST['chaveId']);
$idCategoria=intval($_POST['chaveCategoria']);
$sql="UPDATE chaves SET chaveNome='".$nome."', chaveCategoriaChaveId=".$idCategoria;
$sql.=" where chaveId=".$id;
mysqli_query($con,$sql);
header("location:chaves.php");
?>