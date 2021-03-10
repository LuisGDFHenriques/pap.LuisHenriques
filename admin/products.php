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
    <input autocomplete="on" id="search-text" type="text" value="" defaultval="Pesquisar..." style="margin: 0px;">
    <a>Ordenar por:</a>
    <select>
        <option selected="selected" value="created_at:desc">Mais recente</option>
        <option value="filter_float_price:asc">Mais barato</option>
        <option value="filter_float_price:desc">Mais caro</option>
        <option value="filter_float_price:desc">Maior numero de favoritos</option>
    </select>
    <a>Marca:</a>
    <select>
        <option selected="selected" value="created_at:desc">IPHONE</option>
        <option value="filter_float_price:asc">Samsung</option>
    </select>
</div>
<div class="services">
    <span class="btn-sm btn-primary" href="adicionartelemoveis.php">adiciona</span>
    <table class="table table-hover table-striped">
        <tr>
            <th style="text-align: center">Imagem</th>
            <th style="text-align: center">Nome</th>
            <th style="text-align: center">Preço Original</th>
            <th style="text-align: center">Preço Atual</th>
            <th colspan="3" style="text-align: center"> Opções </th>
        </tr>
        <tr>
            <td><img src="assets/images/SAMSUNGZFOLD2.jpg" alt=""></td>
            <td style="text-align: center">Samsung Z Fold2</td>
            <td style="text-align: center">2000.00 €</td>
            <td style="text-align: center">1700.00 €</td>
            <td><span class="btn-sm btn-primary">Edita</span></td>
            <td><span class="btn-sm btn-danger">Elimina</span></td>
            <td><a href="#" data-toggle="modal" data-target="#post1"><span class="btn-sm btn-success"><span class="btn-sm btn-success">Detalhes</span></a></td>
        </tr>
        <tr>
            <td><img src="assets/images/IPHONE8.gif" alt=""></td>
            <td style="text-align: center">Iphone 8</td>
            <td style="text-align: center">2000.00 €</td>
            <td style="text-align: center">1700.00 €</td>
            <td><span class="btn-sm btn-primary">Edita</span></td>
            <td><span class="btn-sm btn-danger">Elimina</span></td>
            <td><a href="#" data-toggle="modal" data-target="#post1"><span class="btn-sm btn-success"><span class="btn-sm btn-success">Detalhes</span></a></td>
        </tr>
        <tr>
            <td><img src="assets/images/Iphonex.jpg" alt=""></td>
            <td style="text-align: center">Iphone X</td>
            <td style="text-align: center">2000.00 €</td>
            <td style="text-align: center">1700.00 €</td>
            <td><span class="btn-sm btn-primary">Edita</span></td>
            <td><span class="btn-sm btn-danger">Elimina</span></td>
            <td><a href="#" data-toggle="modal" data-target="#post1"><span class="btn-sm btn-success"><span class="btn-sm btn-success">Detalhes</span></a></td>
        </tr>
        <tr>
            <td><img src="assets/images/Iphone11.jpg" alt=""></td>
            <td style="text-align: center">Iphone 11</td>
            <td style="text-align: center">2000.00 €</td>
            <td style="text-align: center">1700.00 €</td>
            <td><span class="btn-sm btn-primary">Edita</span></td>
            <td><span class="btn-sm btn-danger">Elimina</span></td>
            <td><a href="#" data-toggle="modal" data-target="#post1"><span class="btn-sm btn-success"><span class="btn-sm btn-success">Detalhes</span></a></td>
        </tr>
        <tr>
            <td><img src="assets/images/Iphone12.jpg" alt=""></td>
            <td style="text-align: center">Iphone 12</td>
            <td style="text-align: center">2000.00 €</td>
            <td style="text-align: center">1700.00 €</td>
            <td><span class="btn-sm btn-primary">Edita</span></td>
            <td><span class="btn-sm btn-danger">Elimina</span></td>
            <td><a href="#" data-toggle="modal" data-target="#post1"><span class="btn-sm btn-success"><span class="btn-sm btn-success">Detalhes</span></a></td>
        </tr>
        <tr>
            <td><img src="assets/images/IPHONE7.gif" alt=""></td>
            <td style="text-align: center">Iphone 7</td>
            <td style="text-align: center">2000.00 €</td>
            <td style="text-align: center">1700.00 €</td>
            <td><span class="btn-sm btn-primary">Edita</span></td>
            <td><span class="btn-sm btn-danger">Elimina</span></td>
            <td><a href="#" data-toggle="modal" data-target="#post1"><span class="btn-sm btn-success"><span class="btn-sm btn-success">Detalhes</span></a></td>
        </tr>
    </table>
</div>

        <br>
        <br>

        <nav>
            <ul class="pagination pagination-lg justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">«</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">»</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>

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