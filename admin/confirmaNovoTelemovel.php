<?php
include_once ("includes/body.inc.php");

$modelo=addslashes($_POST['modeloTelemovel']);
$descricao=addslashes($_POST['descricaoTelemovel']);
$idMar=intval($_POST['telemovelMarca']);
$imagem=$_FILES['imagemTelemovel']['name'];
$novoNome="assets/images/".$imagem;

copy($_FILES['imagemTelemovel']['tmp_name'],$novoNome);
$sql="insert into telemoveis(telemovelModelo, telemovelMarcaId, telemoveImagemURL, telemovelDescricao) values('".$modelo."','".$idMar."','assets/images/".$imagem."','".$descricao."');";
mysqli_query($con,$sql);
header("location:telemoveis.php");
?>
