<?php
include_once ("includes/body.inc.php");
top();

$id=intval($_GET['id']);
$sql="Select * from chaves inner join categorias on chaveCategoriaId = categoriaId";
$result=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($result);

?>
    <div class="services">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Editar<em> Chaves</em></h2>
                    </div>
                    <form action="confirmaEditaChave.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="chaveId" value="<?php echo $id?>">
                        <label for="nomeChave">Nome: </label>
                        <input type="text" class="form-control" id="nomeChave" name="nomeChave" value="<?php echo $dados['chaveNome']?>"><br>
                        <select name="chaveCategoria">
                            <option value="-1">Escolha a categoria...</option>
                            <?php
                            $sql="select * from categorias order by categoriaNome";
                            $resultCategorias=mysqli_query($con,$sql);
                            while ($dadosCategorias=mysqli_fetch_array($resultCategorias)){
                                ?>
                                <option value="<?php echo $dadosCategorias['categoriaId']?>"
                                    <?php
                                    if($dados['chaveCategoriaId']==$dadosCategorias['categoriaId'])
                                        echo " selected ";
                                    ?>
                                >
                                    <?php echo $dadosCategorias['categoriaNome']?>
                                </option>
                                <?php
                            }

                            ?>

                        </select>
                        <br>
                        <button type="submit" class="btn btn-primary">Confirma alterações</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
bottom();
?>