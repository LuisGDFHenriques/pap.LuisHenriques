<?php
// dados na base de dados
include_once("../includes/body.inc.php");
$id=intval($_POST['idProduto']);
$sql="Select produtoNome from produtos where produtosId=$id";
$result=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($result);
echo $dados[0];
?>