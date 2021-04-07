<?php
include_once ("includes/body.inc.php");
$id=intval($_GET['id']);
$sql= "delete from categoriachaves where categoriaChaveId=".$id;
mysqli_query($con,$sql);
header("location:categoriaChaves.php");
?>