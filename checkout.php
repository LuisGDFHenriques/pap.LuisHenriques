<?php
include_once ("includes/body.inc.php");
top(CARRINHO);
$sql="select * from perfis where perfilId=".$_SESSION['id'];
$res=mysqli_query($con, $sql);
$dadosPerfil=mysqli_fetch_array($res);
?>
    <!-- Page Content -->
    <div class="page-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1>Carrinho</h1>
          </div>
        </div>
      </div>
    </div>

<!--<table class="table caption-top">
    <thead>
    <tr>
        <th scope="col">Produtos</th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col">Quantidade</th>
        <th scope="col">Valor</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row"><img src="assets/images/SAMSUNGZFOLD2.jpg   " alt="" class="img-fluid wc-image"></th>
        <td>Smartphone SAMSUNG Galaxy Z Fold2 5G (7.6'' - 12 GB - 256 GB)</td>
        <td>
            <button type="button" class="btn btn-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                </svg>
            </button>
        </td>
        <td><select class="form-control">
                <option value="0">1</option>
                <option value="0">2</option>
                <option value="0">3</option>
                <option value="0">4</option>
                <option value="0">5</option>
                <option value="0">6</option>
                <option value="0">7</option>
            </select>
        </td>
        <td>$1999</td>
    </tr>
    </tbody>
</table>-->

<table class='table caption-top' width="100%">
    <tr>
        <th width="40%">Nome</th>
        <th width="20%">Imagem</th>
        <th width="15%">Preço</th>
        <th width="15%">Quantidade</th>
        <th width="10%">&nbsp;Opções</th>
    </tr>
    <?php
    $total=0;
    $k=0;
    if(isset($_SESSION['carrinho'])){
        foreach ($_SESSION['carrinho'] as $produto){
            foreach ($produto as $prdId => $quant){
                $sql="select * from produtos where produtoId =".$prdId;
                $result=mysqli_query($con,$sql);
                if(mysqli_affected_rows($con)>0){
                    $dados=mysqli_fetch_array($result);
                ?>

                    <tr>
                        <td><?php echo $dados['produtoNome']?></td>
                        <td><img src="<?php echo $dados['produtoImagemURL']?>" width="120"></td>
                        <td><?php echo $dados['produtoPreco']?>&euro;</td>
                        <td><p><input onclick="atualizaCarrinho(this.value,<?php echo $prdId?>)" type="number" value="<?php echo $quant?>" min="1" style=" width: 50px; text-align: center"></p></td>
                        <td><a href="#" onclick="confirmaEliminaCarrinho(<?php echo $prdId?>);"><button type="button" class="btn btn-alert"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path></svg></button></a></td>
                    </tr>
                    <?php
                    $k++;
                    $total+=$dados["produtoPreco"]*$quant;
                }

            }

        }
    }
    ?>


    <tr style="text-align: left">
        <th colspan="6">
            <span style="font-size: 25px; font-weight: bold">Total ( <?php echo $k?> Produto<?php echo $k!=1?'s':''?>): <?php echo $total ?>&nbsp;€</span>
        </th>+
    </tr>
</table>



<div class="text-left">
    <a href="#" data-toggle="modal" data-target="#checkout"><span class="btn btn-success"<input type="submit" value="Finalizar compra" class="bg-transparent" /> Finalizar Compra</span> </a>
</div>


<div class="modal fade" id="checkout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Checkout</h5>
            </div>
            <div class="modal-body">
                <form action="confirmaEncomenda.php" method="post">
                    <div class="col-md-6">
                        <label for="validationServer01" class="form-label">Nome</label>
                        <input type="text" disabled value="<?php echo $dadosPerfil['perfilNome']?>" class="form-control" id="validationServer01"  required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputTelephone4" class="form-label">Telemóvel</label>
                        <input type="text" class="form-control" id="inputTelephone4"  value="<?php echo $dadosPerfil['perfilTelemovel']?>" >
                    </div>

                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Morada</label>
                        <input type="text"  value="<?php echo $dadosPerfil['perfilMorada']?>"  class="form-control" id="inputAddress" placeholder="1234 Main St">
                    </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-outline-success">Finalizar</button>
            </div>
            </form>
        </div>
    </div>
</div>

    <!-- Footer Starts Here -->

<?php
bot();
?>

  </body>
</html>