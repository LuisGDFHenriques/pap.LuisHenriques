<?php
include_once("includes/body.inc.php");

$nome=addslashes($_POST['nome']);
$morada=addslashes($_POST['Morada']);
$cidade=addslashes($_POST['Cidade']);
$telemovel=addslashes($_POST['Telemovel']);
$pais=addslashes($_POST['Pais']);
$codPostal=addslashes($_POST['CodigoPostal']);
$login=addslashes($_POST['email']);
$password=md5(addslashes($_POST['password']));

$sql="insert into users values(0,'".$login."','".$password."')";
$result=mysqli_query($con,$sql);
if(mysqli_affected_rows($con)==1){ // inseriu com sucesso
    $id=mysqli_insert_id($con);
    $sql="insert into perfis(perfilId,perfilNome,perfilMorada,perfilCidade,perfilTelemovel,perfilPaisId,perfilCodPostal) values('".$id."','".$nome."','".$morada."','".$cidade."','".$telemovel."','".$pais."','".$codPostal."')";
    $result=mysqli_query($con,$sql);
    if(mysqli_affected_rows($con)==1){
        session_start();
        $_SESSION['id']=$id;
        $_SESSION['nome']=$nome;
    }
}
header("location:index.php");
?>