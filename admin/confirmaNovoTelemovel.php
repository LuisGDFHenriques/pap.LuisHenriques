<?php
include_once ("includes/body.inc.php");
print_r($_FILES);
$modelo=addslashes($_POST['modeloTelemovel']);
$descricao=addslashes($_POST['descricaoTelemovel']);
$idMar=intval($_POST['telemovelMarca']);
$imagem=$_FILES['imagemTelemovel']['name'];
$novoNome="images/".$imagem;

copy($_FILES['imagemTelemovel']['tmp_name'],"../".$novoNome);
echo $sql="insert into telemoveis(telemovelModelo, telemovelMarcaId, telemoveImagemURL, telemovelDescricao) values('".$modelo."',".$idMar.",'".$novoNome."','".$descricao."');";
mysqli_query($con,$sql);
//header("location:telemoveis.php");
?>
