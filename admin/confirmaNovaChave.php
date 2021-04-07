<?php
include_once ("includes/body.inc.php");

$nome=addslashes($_POST['nomeChave']);
$idCat=intval($_POST['chaveCategoria']);

copy($_FILES['tmp_name']);
$sql="insert into chaves(chaveNome, chaveCategoriaChaveId) values('".$nome."',".$idCat.");";
mysqli_query($con,$sql);
header("location:chaves.php");
?>
