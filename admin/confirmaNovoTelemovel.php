<?php
include_once ("includes/body.inc.php");

$Modelo=addslashes($_POST['modeloTelemovel']);
$idMar=intval($_POST['telemovelMarca']);

copy($_FILES['tmp_name']);
$sql="insert into telemoveis(telemovelModelo, telemovelMarcaId) values('".$Modelo."',".$idMar.");";
mysqli_query($con,$sql);
header("location:telemoveis.php");
?>
