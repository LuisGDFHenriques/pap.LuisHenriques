<?php
include_once ("includes/body.inc.php");
top();

$id=intval($_GET['id']);
$sql="Select * from categoriachaves inner join categorias on categoriaChaveCategoriaId = categoriaId";
$result=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($result);

?>
    <div class="services">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Editar<em> CategoriaChave</em></h2>
                    </div>
                    <form action="confirmaEditaCategoriaChave.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="categoriaChaveId" value="<?php echo $id?>">
                        <label for="nomeCategoriaChave">Nome: </label>
                        <input type="text" class="form-control" id="nomeCategoriaChave" name="nomeCategoriaChave" value="<?php echo $dados['categoriaChaveNome']?>"><br>
                        <select name="Categoria">
                            <option value="-1">Escolha a categoria...</option>
                            <?php
                            $sql="select * from categorias order by categoriaNome";
                            $resultCategorias=mysqli_query($con,$sql);
                            while ($dadosCategorias=mysqli_fetch_array($resultCategorias)){
                                ?>
                                <option value="<?php echo $dadosCategorias['categoriaId']?>"
                                    <?php
                                    if($dados['categoriaChaveId']==$dadosCategorias['categoriaId'])
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