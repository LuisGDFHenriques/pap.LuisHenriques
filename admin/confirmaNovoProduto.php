<?php
include_once ("includes/body.inc.php");

print_r($_FILES);
$modelo=addslashes($_POST['modeloTelemovel']);
$preco=addslashes($_POST['preco']);
$descricao=addslashes($_POST['reviewTexto']);
$destaque=addslashes($_POST['destaqueProduto']);
$idMar=intval($_POST['telemovelMarca']);
$idCat=intval($_POST['produtoCategoria']);
$imagem=$_FILES['imagemTelemovel']['name'];
$novoNome="images/".$imagem;

copy($_FILES['imagemTelemovel']['tmp_name'],"../".$novoNome);
echo $sql="insert into produtos(produtoNome, produtoMarcaId, produtoImagemURL, produtoDescricao, produtoPreco, produtoCategoriaId, produtoDestaque) values('".$modelo."',".$idMar.",'".$novoNome."','".$descricao."','".$preco."','".$idCat."',".$destaque.");";
mysqli_query($con,$sql);
//header("location:produtos.php");
?>
