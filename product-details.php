<?php
include_once ("includes/body.inc.php");
top();
$id=intval($_GET['id']);
$sql="select * from telemoveis where telemovelId=$id";
$res=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($res);

?>
    <!-- Page Content -->
    <div class="page-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1><small><del><sup>$</sup>1999 </del></small> &nbsp; <sup>$</sup>1779</h1>
            <span>
                Bom desconto.
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="services">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <div>
              <img src="<?php echo $dados['telemovelImagemURL']?>" alt="" class="img-fluid wc-image">
            </div>

            <br>

            <div class="row">
              <div class="col-sm-4 col-6">
                <div>
                  <img src="assets/images/" alt="" class="img-fluid">
                </div>
                <br>
              </div>
              <div class="col-sm-4 col-6">
                <div>
                  <img src="assets/images/" alt="" class="img-fluid">
                </div>
                <br>
              </div>
              <div class="col-sm-4 col-6">
                <div>
                  <img src="assets/images/" alt="" class="img-fluid">
                </div>
                <br>
              </div>
            </div>

            <br>
          </div>

          <div class="col-md-5">
            <div class="sidebar-item recent-posts">
              <div class="sidebar-heading">
                <h4><?php echo $dados['telemovelModelo']?></h4>
              </div>

              <div class="content">
                <p></p>
              </div>
            </div>

            <br>
            <br>
          
            <h4>Adiciona ao carrinho</h4>

            <br>

            <form action="" method="post">
              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="">Cor</label>
                    <select class="form-control">
                      <option value="0">Bronze</option>
                      <option value="0">Preto</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="">Extra</label>
                    <select class="form-control">
                      <option value="0">carregador</option>
                      <option value="0">carregador, fones</option>
                      <option value="0">carregador, fones, Capa</option>

                    </select>
                  </div>
                </div>
              </div>


                <div class="col-lg-12">
                  <div class="form-group">
                    <a href="#"class="filled-button">Adiciona ao carrinho</a>
                  </div>
                </div>
              </div>
            </form>

            <br>
          </div>




        <h4>Descrição</h4>
        <p>
        <div class="w-product-about__info__wrapper">
              <?php echo $dados['telemovelDescricao'];?>
          </div>
        </p><br>

        <h4>Caracteristicas</h4>
          <?php
          $sql="select categoriaChaveId, categoriaChaveNome
                from categoriachaves inner join chaves on categoriaChaveId = chaveCategoriaChaveId
                inner join telemovelchaves on chaveId = telemovelChaveChaveId
                where telemovelChaveTelemovelId=$id group by categoriaChaveId";
          $resultCategorias=mysqli_query($con,$sql);
          while($dadosCategorias=mysqli_fetch_array($resultCategorias)){
              $sqlChaves="select chaveNome, telemovelChaveValor
                          from chaves inner join telemovelchaves on chaveId=telemovelChaveChaveId
                          where chaveCategoriaChaveId=".$dadosCategorias['categoriaChaveId']." and 
                          telemovelChaveTelemovelId=$id";
              $resChaves=mysqli_query($con,$sqlChaves);
              ?>
              <p align="justify"><b><?php echo $dadosCategorias['categoriaChaveNome']?></b></p>
              <?php
              while($dadosChaves=mysqli_fetch_array($resChaves)){
                  ?>
                  <p><?php echo $dadosChaves['chaveNome']?>-<?php echo $dadosChaves['telemovelChaveValor']?></p>

                      <?php

              }
              ?>
          <?php
          }

          ?>


        </div> <!-- fim do container -->






      <br>

        <p></p>
        <p></p>

        <br>

        <p></p>
        <br>

        <p></p>


        <br>
        <br>
        <br>
      </div>
    </div>

    <!-- Footer Starts Here -->


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

    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>

  </body>
</html>