<?php
include_once("includes/body.inc.php");
$login=addslashes($_POST['login']);
$password=md5(addslashes($_POST['password']));

$sql="select userId from users where userLogin='".$login."'";
$result=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($result);
if(mysqli_affected_rows($con)==1){ // um único login
    $sql="select * from users inner join perfis on userId=perfilId where userId=".$dados[0];
    $result=mysqli_query($con,$sql);
    $dados=mysqli_fetch_array($result);
    if($login==$dados['userLogin'] && $password == $dados['userPassword']){
        session_start();
        $_SESSION['id']=$dados['userId'];
        $_SESSION['nome']=$dados['perfilNome'];
        $_SESSION['carrinho'][0][0]=-1;
        $teste=array(0 => 0);
        array_push($_SESSION['carrinho'],$teste);
    }
}
header("location:index.php");
?>

