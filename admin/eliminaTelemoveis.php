<?php
include_once ("includes/body.inc.php");
$id=intval($_GET['id']);
$sql= "delete from telemoveis where telemovelId=".$id;
mysqli_query($con,$sql);
header("location:telemoveis.php");
?>