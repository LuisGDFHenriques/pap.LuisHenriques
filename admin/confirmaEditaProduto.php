<?php
include_once ("includes/body.inc.php");

$modelo=addslashes($_POST['nomeProduto']);
$preco=addslashes($_POST['preco']);
$id=intval($_POST['produtoId']);
$descricao=addslashes($_POST['reviewTexto']);
$destaque=addslashes($_POST['destaqueProduto']);
$idMar=intval($_POST['produtoMarcaId']);
$idCat=intval($_POST['produtoCategoria']);
$imagem=$_FILES['imagemProduto']['name'];
$novoNome="../images/".$imagem;
copy($_FILES['imagemProduto']['tmp_name'],$novoNome);
$sql="UPDATE produtos SET produtoNome='".$modelo."', produtoMarcaId='".$idMar."', produtoDescricao='".$descricao."', produtoPreco='".$preco."', produtoCategoriaId='".$idCat."', produtoDestaque='".$destaque."'";
if($imagem!=''){
    $sql.=", produtoImagemURL='images/".$imagem."'";
    copy($_FILES['imagemProduto']['tmp_name'],$novoNome);
}
$sql.= "where produtoId=".$id;

mysqli_query($con,$sql);
header("location:produtos.php");
?>

