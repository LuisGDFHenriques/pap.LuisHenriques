<?php
// dados na base de dados
include_once("../includes/body.inc.php");
$id=intval($_POST['idChave']);
$idProduto=intval($_POST['idProduto']);
$sql="Select * from chaves where chaveCategoriaChaveId=$id and chaveId not in(
    select produtoChaveChaveId from produtoChaves where produtoChaveProdutoId = $idProduto)";
$result=mysqli_query($con,$sql);
while($dados=mysqli_fetch_array($result)){
    echo "<option value=\"".$dados['chaveId']."\">".$dados['chaveNome']."</option>";
};
?>