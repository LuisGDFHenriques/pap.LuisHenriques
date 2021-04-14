<?php
include_once ("includes/body.inc.php");
$chvId=intval($_GET['chvId']);
$tlmId=intval($_GET['tlmId']);
$sql= "delete from telemovelchaves where telemovelChaveChaveId=".$chvId." and telemovelChaveTelemovelId=".$tlmId;
mysqli_query($con,$sql);
header("location:telemoveisChave.php?id=$tlmId");
?>