<?php
include_once("../includes/body.inc.php");
$id=intval($_POST['idMarca']);
$sql="Select marcaNome from marcas where marcaId = $id";
$result=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($result);
echo $dados[0];
?>