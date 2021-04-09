<?php
include_once ("includes/body.inc.php");
top();

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
    <a>Pesquisar</a>
    <input autocomplete="on" id="search" type="text" value="" defaultval="Pesquisar..." style="margin: 0px;">
    <a>Ordenar por:</a>
    <select>
        <option selected="selected" value="created_at:desc">Mais recente</option>
        <option value="filter_float_price:asc">Mais barato</option>
        <option value="filter_float_price:desc">Mais caro</option>
        <option value="filter_float_price:desc">Maior numero de favoritos</option>
    </select>
    <a>Marca:</a>
    <select name="telemovelMarca">
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
    </select>
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


<div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="InputEmail">E-mail:</label>
                        <input type="email" class="form-control" id="InputEmail">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Palavra-passe:</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Manter-me logado</label>
                    </div>
                    <h8>Ainda não tem conta?</h8>
                    <a data-toggle="modal" data-target="#regista">
                        <br><button type="button" class="btn btn-outline-success" data-dismiss="modal">Registar</button></a>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-outline-success" >Entrar</button>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="regista" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registar</h5>

            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="InputName">Nome:</label>
                        <input type="name" class="form-control" id="InputName" aria-describedby="emailHelp">

                    </div>
                    <div class="form-group">
                        <label for="InputEmail">E-mail:</label>
                        <input type="email" class="form-control" id="InputEmail">
                    </div>
                    <div class="form-group">
                        <label for="InputPassword1">Palavra-passe</label>
                        <input type="password" class="form-control" id="InputPassword1">

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-outline-success">Registar</button>
            </div>
        </div>
    </div>
</div>

<?php
    bot(TELEMOVEIS);

?>

</body>
</html>