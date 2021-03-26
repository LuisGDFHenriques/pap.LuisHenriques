<?php
include_once ("includes/body.inc.php");
$id=intval($_GET['id']);
$sql= "delete from telemovelchave where telemovelChaveChaveId=".$id;
mysqli_query($con,$sql);
header("location:telemoveisChave.php");
?>