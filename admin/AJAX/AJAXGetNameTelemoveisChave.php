<?php
// dados na base de dados
include_once("../includes/body.inc.php");
$id=intval($_POST['idProduto']);
$sql="Select * from produtochaves where produtoChaveChaveId=$id";
$result=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($result);
echo $dados['produtoChaveChaveId'];
?>
