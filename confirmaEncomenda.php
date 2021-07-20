<?php
include_once("includes/body.inc.php");
$sql="insert into encomendas(encomendaData,encomendaPerfilId) values(now(),".$_SESSION['id'].")";
mysqli_query($con,$sql);
$encomendaId=mysqli_insert_id($con);
$cont=0;
if(isset($_SESSION['carrinho'])) {
    foreach ($_SESSION['carrinho'] as $produto) {
        foreach ($produto as $prdId => $quant) {
            $sql = "select produtoPreco from produtos  where produtoId =" . $prdId;
            $result = mysqli_query($con, $sql);
            if (mysqli_affected_rows($con) > 0) {
                $dados = mysqli_fetch_array($result);
                $sql = "insert into encomendadetalhes values($encomendaId,$prdId,$quant,$dados[0])";
                mysqli_query($con, $sql);
            }
        }
        unset($_SESSION['carrinho'][$cont++]);
    }
}
header("location:index.php");
?>