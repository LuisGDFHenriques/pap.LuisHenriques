<?php
// dados na base de dados
include_once("../includes/body.inc.php");
$id=intval($_POST['idChave']);
$sql="Select * from chaves where chaveCategoriaChaveId=$id";
$result=mysqli_query($con,$sql);
while($dados=mysqli_fetch_array($result)){
    echo "<option value=\"".$dados['chaveId']."\">".$dados['chaveNome']."</option>";
};
?>