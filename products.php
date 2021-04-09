<?php
include_once ("includes/body.inc.php");
top();

$sql = "Select * from telemoveis where telemovelId ";
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
    <a>Pesquisar</a>
    <input autocomplete="on" id="search-text" type="text" value="" defaultval="Pesquisar..." style="margin: 0px;">
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

        <div class="row">
            <?php
            while ($dados = mysqli_fetch_array($result)){
                ?>
            <div class="col-md-4">
                <div class="service-item">
                    <img src="<?php echo $dados['telemovelImagemURL']?>" alt="">
                    <div class="down-content">
                        <h4><?php echo $dados['telemovelModelo']?></h4>
                        <div style="margin-bottom:10px;">
                  <span>
                      <del><sup>$</sup>1999 </del> &nbsp; <sup>$</sup>1779
                  </span>
                        </div>

                        <p><?php echo $dados['telemovelDescricao']?></p>
                        <a href="product-details.php" class="filled-button">Ver mais</a>
                        <br>
                        <input type="checkbox"><a class=""> Favoritos</a>
                        <br>
                        <input type="checkbox"><a class=""> Comparar</a>
                         </div>

                </div>

                <br>
            </div>
            <?php
                }
                ?>
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


<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Additional Scripts -->
<script src="assets/js/custom.js"></script>
<script src="assets/js/owl.js"></script>
<script src="assets/js/slick.js"></script>
<script src="assets/js/accordions.js"></script>

<script language="text/Javascript">
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t) {                   //declaring the array outside of the
        if (!cleared[t.id]) {                      // function makes it static and global
            cleared[t.id] = 1;  // you could use true and false, but that's more typing
            t.value = '';         // with more chance of typos
            t.style.color = '#fff';
        }
    }
</script>

</body>
</html>