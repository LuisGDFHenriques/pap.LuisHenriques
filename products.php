<?php
include_once ("includes/body.inc.php");
top(TELEMOVEIS);
$sql = "Select * from produtos where produtoId";
$result = mysqli_query($con, $sql);
?>
<!-- Page Content -->
<div class="page-heading header-text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Produtos</h1>
            </div>
        </div>
    </div>
</div>

<div align="center">
    <table>
        <tr>
    <td><a>Pesquisar</a>
    <input class="form-control" autocomplete="on" id="search" type="text" value="" defaultval="Pesquisar..." style="margin: 0px;"></td>
    <td><a>Ordenar por:</a>
    <select class="form-control" >
        <option selected="selected" value="created_at:desc">Mais recente</option>
        <option value="filter_float_price:asc">Mais barato</option>
        <option value="filter_float_price:desc">Mais caro</option>
        <option value="filter_float_price:desc">Maior numero de favoritos</option>
    </select></td>
    <td><a>Marca:</a>
    <select name="telemovelMarca" id="searchMarca" class="form-control">
        <option value="-1">Escolha a marca...</option>
        <?php
        $sqlM="select * from marcas order by marcaNome";
        $resultmarca=mysqli_query($con,$sqlM);
        while ($dadosmarca=mysqli_fetch_array($resultmarca)){
            ?>
            <option id="telemovelMarca" value="<?php echo $dadosmarca['marcaId']?>"><?php echo $dadosmarca['marcaNome']?></option>
            <?php
        }

        ?>
    </select></td>
        </tr>
    </table>
</div>
<div class="services">
    <div class="container">
        <div class="row" id="tableContent">

        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>
</div>




<?php
    bot(TELEMOVEIS);
?>

</body>
</html>