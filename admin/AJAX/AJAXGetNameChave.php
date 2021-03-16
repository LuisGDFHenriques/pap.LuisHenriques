<?php
// dados na base de dados
include_once("../includes/body.inc.php");
$id=intval($_POST['idChaves']);
$sql="Select chaveNome from chaves where chaveId=$id";
$result=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($result);
echo $dados[0];
?>