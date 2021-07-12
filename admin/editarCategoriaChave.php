<?php
include_once ("includes/body.inc.php");
top();

$id=intval($_GET['id']);
$sql="Select * from categoriachaves where categoriaChaveId = ".$id;
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
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipoCategoria" id="inlineRadio1" value="geral" <?php
                                if ($dados['categoriaChaveTipo'] == "geral"){
                                    echo "checked";
                                } ?>
                                >
                                <label class="form-check-label" for="inlineRadio1">Geral (aparece em todos os produtos)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipoCategoria" id="inlineRadio2" value="especifico" <?php
                                if ($dados['categoriaChaveTipo'] == "especifico"){
                                    echo "checked";
                                } ?>
                                >
                                <label class="form-check-label" for="inlineRadio2">Específico (a uma categoria de produtos)</label>
                            </div>
                        </div><br>
                        <select name="Categoria" class="form-control">
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