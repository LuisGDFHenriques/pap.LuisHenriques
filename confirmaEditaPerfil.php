<?php
include_once ("includes/body.inc.php");
session_start();
$nome=addslashes($_POST['nomePerfil']);
$morada=addslashes($_POST['Morada']);
$cidade=addslashes($_POST['Cidade']);
$telemovel=addslashes($_POST['Telemovel']);
$codpostal=addslashes($_POST['CodPostal']);
$idPais=intval($_POST['pais']);
echo $sql="UPDATE perfis SET perfilNome='".$nome."', perfilMorada='".$morada."', perfilCidade='".$cidade."', perfilTelemovel='".$telemovel."',";
echo $sql.=" perfilCodPostal='".$codpostal."', perfilPaisId='".$idPais."' where perfilId=" . $_SESSION['id'];

mysqli_query($con,$sql);
header("location:Perfil.php");
?>