<?php
include_once ("includes/body.inc.php");

$modelo=addslashes($_POST['modeloTelemovel']);
$id=intval($_POST['telemovelId']);
$descricao=addslashes($_POST['reviewTexto']);
$idMar=intval($_POST['telemovelMarcaId']);
$imagem=$_FILES['imagemTelemovel']['tmp_name'];
$novoNome="images/".$imagem;
$sql="UPDATE telemoveis SET telemovelModelo='".$modelo."', telemovelMarcaId='".$idMar."', telemovelDescricao='".$descricao."'";
if($imagem!=''){
    $sql.=", telemovelImagemURL = 'images/".$imagem."'";
    copy($_FILES['imagemTelemovel']['name'],$novoNome);
}
mysqli_query($con,$sql);
header("location:telemoveis.php");
?>

