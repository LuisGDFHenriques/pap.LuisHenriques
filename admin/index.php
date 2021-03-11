<?php
include_once("includes/body.inc.php");
top();
?>

  <body>


    <!-- Banner Starts Here -->
    <div class="main-banner header-text bg-danger" id="top">

    </div>
    <!-- Banner Ends Here -->


    <div class="services">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Lista<em> Marcas</em></h2>
                <a href="adicionarMarca.php" ><span class="btn-sm btn-primary">adiciona</span></a>
            </div>
          </div>
            <table class="table table-hover table-striped">
                <tr>
                    <th style="text-align: center">Id</th>
                    <th style="text-align: center">Nome</th>
                    <th style="text-align: center">Preço Original</th>
                    <th style="text-align: center">Preço Atual</th>
                    <th colspan="3" style="text-align: center"> Opções </th>
                </tr>
                <tr>
                    <td><img src="assets/images/SAMSUNGZFOLD2.jpg" alt=""></td>
                    <td style="text-align: center">SAMSUNGZFOLD2</td>
                    <td style="text-align: center">2000.00 €</td>
                    <td style="text-align: center">1700.00 €</td>
                    <td><span class="btn-sm btn-primary">Edita</span></td>
                    <td><span class="btn-sm btn-danger">Elimina</span></td>
                    <td><a href="#" data-toggle="modal" data-target="#post1"><span class="btn-sm btn-success"><span class="btn-sm btn-success">Detalhes</span></a></td>
                </tr>
                <tr>
                    <td><img src="assets/images/Iphone12.jpg" alt=""></td>
                    <td>Iphone 12</td>
                    <td>2000.00 €</td>
                    <td>1700.00 €</td>
                    <td><span class="btn-sm btn-primary">Edita</span></td>
                    <td><span class="btn-sm btn-danger">Elimina</span></td>
                    <td><a href="#" data-toggle="modal" data-target="#post1"><span class="btn-sm btn-success"><span class="btn-sm btn-success">Detalhes</span></a></td>
                </tr>
                <tr>
                    <td><img src="assets/images/Iphone11.jpg" alt=""></td>
                    <td>Iphone 11</td>
                    <td>2000.00 €</td>
                    <td>1700.00 €</td>
                    <td><span class="btn-sm btn-primary">Edita</span></td>
                    <td><span class="btn-sm btn-danger">Elimina</span></td>
                    <td><a href="#" data-toggle="modal" data-target="#post1"><span class="btn-sm btn-success"><span class="btn-sm btn-success">Detalhes</span></a></td>
                </tr>
            </table>
          </div>
        </div>

<?php
bottom();
?>