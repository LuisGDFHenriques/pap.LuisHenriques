<?php
include_once ("includes/body.inc.php");
top(PERFIL);


?>
<!-- Page Content -->
<div class="page-heading header-text">
    <div class="container">
        <div class="w-cards__icon">
            <div class="w-cards__icon_wrapper">
                <div class="header-right">
                       <h1><?php echo $_SESSION['nome']?></h1>
                </div>
            </div>
        </div>
    </div>


</div> <!-- fim do container -->

<div class="services">
    <div class="container">
        <div class="row">
            <table class='table caption-top' width="70%">
                <h3>Historico das encomendas</h3>
                <tr>
                    <th width="30%" class="text-center" >Data de Realização</th>
                    <th width="20%" class="text-center">Valor</th>
                    <th width="20%" class="text-center">Estado</th>
                    <th width="20%" class="text-center">Detalhes</th>
                </tr>
                <?php
                $sql="  select *
                        from encomendas
                        where encomendaPerfilId=".$_SESSION['id'];
                $res=mysqli_query($con,$sql);
                $i = 0;
                while($dados=mysqli_fetch_array($res)){
                    ?>


                    <tr>
                        <td class="text-center"><?php echo $dados['encomendaData']?></td>
                        <td class="text-center"><?php echo $dados['encomendaValorFinal']?>&euro;</td>
                        <td class="text-center"><?php echo $dados['encomendaEstado']?></td>
                        <td class="text-center"><button class="btn btn-sm" onclick="mostrarDetalhes(<?php echo $i?>)">ver Detalhes </button></td>
                    </tr>

                    <tr>
                        <td colspan="5">
                            <div id="detalhes<?php echo $i ?>" style="display: none">
                                <table class="table caption-top" style="color: #000">
                                    <tr>
                                        <th width="50%" class="text-center">Produto</th>
                                        <th width="30%" class="text-center" >Preço</th>
                                        <th width="20%" class="text-center">Quant.</th>
                                    </tr>
                                    <?php
                                    $sql="  select *
                                    from encomendaDetalhes inner join produtos 
                                        on produtoId=encomendaDetalheProdutoId
                                    where encomendaDetalheEncomendaId=".$dados['encomendaId'];

                                    $resDetalhe=mysqli_query($con,$sql);
                                    while($dadosDetalhe=mysqli_fetch_array($resDetalhe)){
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo $dadosDetalhe['produtoNome']?></td>
                                            <td class="text-center"><?php echo $dadosDetalhe['encomendaDetalhePreco']?>&euro;</td>
                                            <td class="text-center"><?php echo $dadosDetalhe['encomendaDetalheQuantidade']?></td>
                                        </tr>
                                        <?php
                                    }
                                    $i = $i + 1;
                                    ?>
                                </table>
                            </div>

                        </td>
                    </tr>

                    <?php
                }
                ?>



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