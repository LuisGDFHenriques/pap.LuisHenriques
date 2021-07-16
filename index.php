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
                  <a style="color:#FFFFFF"><h3>Deslumbre-se já com os melhores telmoveis do mercado<br>por preços super acessíveis</h3></a>
                  <p></p>
                  <a href="products.html" class="filled-button">Produtos</a>
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
                        <img src="assets/images/SAMSUNGZFOLD2.jpg" alt="">
                        <div class="down-content">
                            <h4>SAMSUNG Z FOLD 2</h4>
                            <div style="margin-bottom:10px;">
                                <span> <del><sup>$</sup>2000.00</del>  <sup>$</sup>1700.00 </span>
                            </div>

                            <p></p>
                            <a href="product-details.html" class="filled-button">Ver Mais</a>
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
                        <img src="assets/images/SAMSUNGZFOLD2.jpg" alt="">
                        <div class="down-content">
                            <h4>SAMSUNG Z FOLD 2</h4>
                            <div style="margin-bottom:10px;">
                                <span> <del><sup>$</sup>2000.00</del>  <sup>$</sup>1700.00 </span>
                            </div>

                            <p></p>
                            <a href="product-details.html" class="filled-button">Ver Mais</a>
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