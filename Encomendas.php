<?php
include_once ("includes/body.inc.php");
top(PERFIL);
$sql = "select * from encomendas inner join encomendasdetalhes on encomendaId = encomendaDetalheEncomendaId where encomendaPerfilId=" . $_SESSION['id'];
$result = mysqli_query($con, $sql);
$dados = mysqli_fetch_array($result)
?>
<!-- Page Content -->
<div class="page-heading header-text">
    <div class="container">
        <div class="w-cards__icon">
            <div class="w-cards__icon_wrapper">
                <div class="header-right">
                       <h1><?php echo $dados['perfilNome']?></h1>
                </div>
            </div>
        </div>
    </div>


</div> <!-- fim do container -->

<div class="services">
    <div class="container">
        <div class="row">
            <table width="100%">
                <tr>
                    <th width="20%">Nome</th>
                    <th width="20%">Data de envio</th>
                    <th width="20%">Quantidade</th>
                    <th width="20%">Preço</th>
                    <th width="20%">Estado</th>
                </tr>
                <tr>
                <td><?php echo $dados['produtoNome']?></td>
                <td><?php echo $dados['perfilMorada']?></td>
                <td><?php echo $dados['perfilCidade']?></td>
                <td><?php echo $dados['perfilTelemovel']?></td>
                <td><?php echo $dados['paisNome']?></td>
            </table>
        </div>
    </div>
</div>
<div class="services">
    <div class="container">

    </div>
</div>


<!-- Footer Starts Here -->
<?php
bot();
?>
</body>
</html>