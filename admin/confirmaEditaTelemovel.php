<?php
include_once ("includes/body.inc.php");

$modelo=addslashes($_POST['modeloTelemovel']);
$preco=addslashes($_POST['preco']);
$id=intval($_POST['telemovelId']);
$descricao=addslashes($_POST['reviewTexto']);
$idMar=intval($_POST['telemovelMarcaId']);
$imagem=$_FILES['imagemTelemovel']['name'];
$novoNome="../images/".$imagem;
copy($_FILES['imagemTelemovel']['tmp_name'],$novoNome);
$sql="UPDATE telemoveis SET telemovelModelo='".$modelo."', telemovelMarcaId='".$idMar."', telemovelDescricao='".$descricao."', telemovelPreco='".$preco."'";
if($imagem!=''){
    $sql.=", telemovelImagemURL='images/".$imagem."'";
    copy($_FILES['imagemTelemovel']['tmp_name'],$novoNome);
}
$sql.= "where telemovelId=".$id;

mysqli_query($con,$sql);
header("location:telemoveis.php");
?>

