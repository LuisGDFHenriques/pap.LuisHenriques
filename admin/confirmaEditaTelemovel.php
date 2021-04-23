<?php
include_once ("includes/body.inc.php");

$modelo=addslashes($_POST['modeloTelemovel']);
$preco=addslashes($_POST['preco']);
$id=intval($_POST['telemovelId']);
$descricao=addslashes($_POST['reviewTexto']);
$idMar=intval($_POST['telemovelMarcaId']);
$idCat=intval($_POST['produtoCategoria']);
$imagem=$_FILES['imagemTelemovel']['name'];
$novoNome="../images/".$imagem;
copy($_FILES['imagemTelemovel']['tmp_name'],$novoNome);
$sql="UPDATE produtos SET produtoNome='".$modelo."', produtoMarcaId='".$idMar."', produtoDescricao='".$descricao."', produtoPreco='".$preco."', produtoCategoriaId='".$idCat."'";
if($imagem!=''){
    $sql.=", produtoImagemURL='images/".$imagem."'";
    copy($_FILES['imagemTelemovel']['tmp_name'],$novoNome);
}
$sql.= "where produtoId=".$id;

mysqli_query($con,$sql);
header("location:produtos.php");
?>

