<?php
include_once ("includes/body.inc.php");
top(PRODUTOS);
$id=intval($_GET['cat']);
$sql = "Select * from categorias where categoriaId=".$id;
$result = mysqli_query($con, $sql);
$dados=mysqli_fetch_array($result);
?>
<input type="hidden" name="categoriaId" value="<?php echo $id?>">
<!-- Page Content -->
<div class="page-heading header-text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?php echo $dados['categoriaNome']?></h1>
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
    <select class="form-control" id="ordenar" name="ordenacao">
        <option selected="selected" value="1">Mais recente</option>
        <option value="-1">Mais barato</option>
        <option value="2">Mais caro</option>
    </select></td>
    <td><a>Marca:</a>
    <select name="telemovelMarca" id="searchMarca" class="form-control">
        <option value="-1">Escolha a marca...</option>
        <?php
        $sqlM="select * from marcas order by marcaNome";
        $resultmarca=mysqli_query($con,$sqlM);
        while ($dadosmarca=mysqli_fetch_array($resultmarca)){
            ?>
            <option value="<?php echo $dadosmarca['marcaId']?>"><?php echo $dadosmarca['marcaNome']?></option>
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
    bot(PRODUTOS,$id);
?>

</body>
</html>