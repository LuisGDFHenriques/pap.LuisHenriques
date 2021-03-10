<?php
include_once ("includes/body.inc.php");

$nome=$_POST['marcaNome'];
$sql="insert into marcas(nmarcaNome) value('$nome');";

mysqli_query($con,$sql);
header("location:products.php");
?>

