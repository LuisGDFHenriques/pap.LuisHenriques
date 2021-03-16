<?php
// dados na base de dados
include_once("includes/body.inc.php");
$id=intval($_POST['idTelemoveis']);
$sql="Select telemovelModelo from telemoveis where telemoveisId=$id";
$result=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($result);
echo $dados[0];
?>