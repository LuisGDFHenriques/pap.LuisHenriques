<?php
include_once("includes/body.inc.php");
$nome=addslashes($_POST['nome']);
$login=addslashes($_POST['email']);
$password=md5(addslashes($_POST['password']));
$sql="insert into users values(0,'".$login."','".$password."')";
$result=mysqli_query($con,$sql);
if(mysqli_affected_rows($con)==1){ // inseriu com sucesso
    $id=mysqli_insert_id($con);
    $sql="insert into perfis(perfilId,perfilNome) values(".$id.",'".$nome."')";
    $result=mysqli_query($con,$sql);
    if(mysqli_affected_rows($con)==1){
        session_start();
        $_SESSION['id']=$id;
        $_SESSION['nome']=$nome;
    }
}
header("location:index.php");
?>

