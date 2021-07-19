<?php
include_once ("includes/body.inc.php");
top(COMPARATIVO);
$compara=false;
if(isset($_SESSION['compara1']) && isset($_SESSION['compara2'])){
    $id1=$_SESSION['compara1'];
    $id2=$_SESSION['compara2'];
    $compara=true;

    $sql="select * from produtos where produtoId=".$id1;
    $res=mysqli_query($con,$sql);
    $dadosPrd1=mysqli_fetch_array($res);

    $sql="select * from produtos where produtoId=".$id2;
    $res=mysqli_query($con,$sql);
    $dadosPrd2=mysqli_fetch_array($res);




//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++   chaves
    $sql="select *
from chaves left join categoriachaves on categoriaChaveId=chaveCategoriaChaveId
 left join 
(select * from produtos inner join produtochaves on produtoId = produtoChaveProdutoId where produtoChaveProdutoId=$id1) as tabela 
on chaveId = tabela.produtoChaveChaveId

order by categoriaChaveTipo asc ";
    $result1=mysqli_query($con,$sql);

    $sql="select *
from chaves left join categoriachaves on categoriaChaveId=chaveCategoriaChaveId
 left join 
(select * from produtos inner join produtochaves on produtoId = produtoChaveProdutoId where produtoChaveProdutoId=$id2) as tabela 
on chaveId = tabela.produtoChaveChaveId

order by categoriaChaveTipo asc ";
    $result2=mysqli_query($con,$sql);

}



?>
    <!-- Page Content -->
    <div class="page-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">

          </div>
        </div>
      </div>
    </div>

    <div class="services">
      <div class="container">
          <?php
            if($compara==true){
          ?>
        <table width="100%" class="table ">
            <tr>
                <th width="50%"><h4><?php echo $dadosPrd1['produtoNome']?></h4></th>
                <th width="50%"><h4><?php echo $dadosPrd2['produtoNome']?></h4></th>
            </tr>
            <tr>
              <th class="text-left"><img width="220" src="<?php echo $dadosPrd1['produtoImagemURL']?>" alt="" class="img-fluid wc-image"></th>
              <th class="text-left"><img width="220" src="<?php echo $dadosPrd2['produtoImagemURL']?>" alt="" class="img-fluid wc-image"></th>
            </tr>
            <tr>
              <th colspan="2"><h4>Caracteristicas</h4></th>
            </tr>
            <tr>
                <td colspan="2">
                    <table width="100%" class="table table-striped">
                        <?php
                        $categoria='';
                        while($dadosPrd1=mysqli_fetch_array($result1) ){
                            $dadosPrd2=mysqli_fetch_array($result2);
                            if($categoria!=$dadosPrd1['categoriaChaveNome']){
                                $categoria=$dadosPrd1['categoriaChaveNome'];
                                ?>
                                <tr>
                                    <td colspan="2" width="45%" class="text-left ml-3"><strong><i><?php echo $dadosPrd2['categoriaChaveNome']?></i></strong></td>
                                    <td width="10%">&nbsp;</td>
                                    <td colspan="2" width="45%" class="text-left ml-3"><strong><i><?php echo $dadosPrd2['categoriaChaveNome']?></i></strong></td>
                                    <td width="10%">&nbsp;</td>

                                </tr>
                                    <?php
                            }
                        ?>
                            <tr>
                                <td width="20%" class="text-left ml-3"><strong><?php echo $dadosPrd1['chaveNome']?>:</strong></td>
                                <td width="25%" class="text-left ml-3"><?php echo $dadosPrd1['produtoChaveValor']?></td>
                                <td width="10%">&nbsp;</td>
                                <td width="20%" class="text-left ml-3"><strong><?php echo $dadosPrd2['chaveNome']?>:</strong></td>
                                <td width="25%" class="text-left ml-3"><?php echo $dadosPrd2['produtoChaveValor']?></td>

                            </tr>
                        <?php
                        }
                        ?>

                    </table>
                </td>

            </tr>
        </table>
          <?php
          }
            else{
                ?>
                <h1>Tem que escolher 2 produtos para comparar...</h1>
          <?php
            }
          ?>
      </div> <!-- fim do container -->
    </div>


        <?php
        bot();
        unset($_SESSION['compara1']);
        unset($_SESSION['compara2']);
        ?>
  </body>
</html>