<?php
include_once ("includes/body.inc.php");
top(HOME);
$sql="select * from produtos order by produtoId desc limit 3";
$resRecentes=mysqli_query($con,$sql);

$sql="select produtoId, produtos.*, sum(encomendaDetalheQuantidade) as totalP from produtos inner join encomendadetalhes
        on produtoId=encomendaDetalheProdutoId group by 1 order by totalP desc limit 3";
$resVendidos=mysqli_query($con,$sql);

?>
    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="main-banner header-text" id="top">
        <div class="Modern-Slider">
          <!-- Item -->
          <div class="item item-1">
            <div class="img-fill">
                <div class="text-content">
                  <h6>A qualidade é o que importa!</h6>
                  <a style="color:#FFFFFF"><h3>Deslumbre-se já com os melhores telemóveis do mercado<br>por preços super acessíveis</h3></a>
                  <p></p>

                </div>
            </div>
          </div>
          <!-- // Item -->
          <!-- Item -->

          <!-- // Item -->
        </div>
    </div>
    <!-- Banner Ends Here -->


    <div class="services">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Mais<em> recentes</em></h2>
              <span></span>
            </div>
          </div>
            <?php
            while ($dados=mysqli_fetch_array($resRecentes)){
                ?>
                <div class="col-md-4">
                    <div class="service-item">
                        <img src="<?php echo $dados['produtoImagemURL']?>" alt="">
                        <div class="down-content">
                            <div align="center" style="min-height: 70px">
                            <h5><?php echo $dados['produtoNome']?></h5>
                            </div>
                            <div style="margin-bottom:10px;">
                                <span><?php echo $dados['produtoPreco']?>&euro;</span>
                            </div>
                            <p></p>
                            <a href="product-details.php?id=<?php echo $dados['produtoId']?>" class="filled-button">Ver Mais</a>
                        </div>
                    </div>

                    <br>
                </div>
            <?php
            }
            ?>



            <br>
          </div>
        </div>
      </div>
    </div>
    <div class="services">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Mais<em> vendidas</em></h2>
              <span></span>
            </div>
          </div>
            <?php
            while ($dados=mysqli_fetch_array($resVendidos)){
                ?>
                <div class="col-md-4">
                    <div class="service-item">
                        <img src="<?php echo $dados['produtoImagemURL']?>" alt="">
                        <div class="down-content">
                            <div align="center" style="min-height: 70px">
                                <h5><?php echo $dados['produtoNome']?></h5>
                            </div>
                            <div style="margin-bottom:10px;">
                                <span><?php echo $dados['produtoPreco']?>&euro;</span>
                            </div>

                            <p></p>
                            <a href="product-details.php?id=<?php echo $dados['produtoId']?>" class="filled-button">Ver Mais</a>
                        </div>
                    </div>

                    <br>
                </div>
                <?php
            }
            ?>


        </div>
      </div>
    </div>


<?php
bot();
?>

  </body>
</html>