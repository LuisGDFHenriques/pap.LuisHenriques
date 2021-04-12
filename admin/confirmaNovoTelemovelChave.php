<?php
include_once ("includes/body.inc.php");


$chave=intval($_POST['chaveChaveTelemovel']);
$produto=intval($_POST['telemovelChaveTelemovel']);
$valor=addslashes($_POST['valorChaveTelemovel']);

$sql="insert into telemovelchaves(telemovelChaveChaveId, telemovelChaveTelemovelId, telemovelChaveValor) values(".$chave.",".$produto.",'".$valor."');";
mysqli_query($con,$sql);
header("location:telemoveisChave.php?id=$produto");

?>
