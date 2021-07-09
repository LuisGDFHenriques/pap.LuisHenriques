<?php
include_once ("includes/body.inc.php");

$nome=addslashes($_POST['nomePerfil']);
$morada=addslashes($_POST['Morada']);
$cidade=addslashes($_POST['Cidade']);
$telemovel=addslashes($_POST['Telemovel']);
$codpostal=addslashes($_POST['CodPostal']);
$idPais=intval($_POST['pais']);
$sql="UPDATE perfis SET perfilNome='".$nome."', perfilMorada='".$morada."', perfilCidade='".$cidade."', perfilTelemovel='".$telemovel."', perfilCodPostal='".$codpostal."', perfilPaisId='".$idPais."'";

mysqli_query($con,$sql);
header("location:Perfil.php");
?>