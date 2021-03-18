<?php
include_once ("includes/body.inc.php");
$modelo=addslashes($_POST['modeloTelemovel']);
$descricao=addslashes($_POST['descricaoTelemovel']);
$id=intval($_POST['telemovelId']);
$idMar=intval($_POST['telemovelMarca']);
$imagem=$_FILES['imagemTelemovel']['name'];
$novoNome="images/".$imagem;

copy($_FILES['imagemTelemovel']['tmp_name'],"../".$novoNome);
$sql="UPDATE telemoveis SET telemovelModelo='".$modelo."', telemovelMarcaId='".$idMar."', telemovelDescricao='".$descricao."', telemovelImagemURL=".$imagem;
mysqli_query($con,$sql);
header("location:telemoveis.php");
?>

