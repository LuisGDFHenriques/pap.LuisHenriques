<?php
include_once ("includes/body.inc.php");
top(PRODUTOS);
$id=intval($_GET['id']);
$sql="select * from produtos where produtoId=$id";
$res=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($res);

?>
    <!-- Page Content -->
    <div class="page-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <span>
                <h3><?php echo $dados['produtoNome']?></h3>
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
              <img src="<?php echo $dados['produtoImagemURL']?>" alt="" class="img-fluid wc-image">
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
                <h5><?php echo $dados['produtoPreco']?>€</h5>
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

                <div class="col-lg-12">
                  <div class="form-group">

                      <?php if(isset($_SESSION['id'])){ ?>

                              <input onclick="adicionaCarrinho(<?php echo $id?>)" class="btn btn-success" value="Adicionar ao Carrinho">
                      <?php }else{ ?>
                          <a class="form-group" data-toggle="modal" data-target="#carrinho"><input type="submit" class="primary" value="Adicionar ao Carrinho"></a>

                      <?php }?>

                  </div>
                </div>
              </div>
            </form>
            <br>
          </div>
        <h4>Descrição</h4>
        <p>
        <div class="w-product-about__info__wrapper">
              <?php echo $dados['produtoDescricao'];?>
          </div>
        </p><br>

        <h4>Caracteristicas</h4>
          <?php
           $sql="select categoriaChaveId, categoriaChaveNome
                from categoriachaves inner join chaves on categoriaChaveId = chaveCategoriaChaveId
                inner join produtochaves on chaveId = produtoChaveChaveId
                where produtoChaveProdutoId=$id group by categoriaChaveId";
          $resultCategorias=mysqli_query($con,$sql);
          while($dadosCategorias=mysqli_fetch_array($resultCategorias)){
               $sqlChaves="select chaveNome, produtoChaveValor
                          from chaves inner join produtochaves on chaveId=produtoChaveChaveId
                          where chaveCategoriaChaveId=".$dadosCategorias['categoriaChaveId']." and 
                          produtoChaveProdutoId=$id";
              $resChaves=mysqli_query($con,$sqlChaves);
              ?>
              <p align="justify"><b><?php echo $dadosCategorias['categoriaChaveNome']?></b></p>
              <?php
              while($dadosChaves=mysqli_fetch_array($resChaves)){
                  ?>
                  <p><?php echo $dadosChaves['chaveNome']?>-<?php echo $dadosChaves['produtoChaveValor']?></p>
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
        <br>
        <br>
        <br>
      </div>
    </div>
    <!-- Footer Starts Here -->
<?php
bot();
?>
  </body>
</html>