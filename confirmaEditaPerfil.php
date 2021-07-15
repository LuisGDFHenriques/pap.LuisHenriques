<?php
include_once ("includes/body.inc.php");

$nome=addslashes($_POST['nomePerfil']);
$morada=addslashes($_POST['Morada']);
$cidade=addslashes($_POST['Cidade']);
$telemovel=addslashes($_POST['Telemovel']);
$codpostal=addslashes($_POST['CodPostal']);
$idPais=intval($_POST['pais']);
$sql="UPDATE perfis SET perfilNome='".$nome."', perfilMorada='".$morada."', perfilCidade='".$cidade."', perfilTelemovel='".$telemovel."',";
$sql.=" perfilCodPostal='".$codpostal."', perfilPaisId='".$idPais."' where perfilId=" .$_SESSION['id'];
$id=mysqli_insert_id($con);
$_SESSION['id']=$id;
mysqli_query($con,$sql);
header("location:Perfil.php");
?>