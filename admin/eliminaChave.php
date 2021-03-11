<?php
include_once ("includes/body.inc.php");
$id=intval($_GET['id']);
$sql= "delete from chaves where chaveId=".$id;
mysqli_query($con,$sql);
header("location:chaves.php");
?>