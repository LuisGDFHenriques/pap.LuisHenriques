<?php
include_once ("includes/body.inc.php");

$id=intval($_POST['telemovelId']);
$modelo=addslashes($_POST['modeloTelemovel']);
$descricao=addslashes($_POST['descricaoTelemovel']);
$idMar=intval($_POST['telemovelMarca']);
$imagem=$_FILES['imagemTelemovel']['name'];
$novoNome="images/".$imagem;
$sql="UPDATE telemoveis SET telemovelModelo='".$modelo."', telemovelMarcaId='".$idMar."', telemovelDescricao='".$descricao."'";
if($imagem!=''){
    $sql.=", telemovelImagemURL='images/".$imagem."'";
    copy($_FILES['imagemTelemovel']['tmp_name'],"../".$novoNome);
}
mysqli_query($con,$sql);
header("location:telemoveis.php");
?>

