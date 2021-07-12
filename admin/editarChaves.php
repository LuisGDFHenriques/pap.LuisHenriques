<?php
include_once ("includes/body.inc.php");
top();

$id=intval($_GET['id']);
$sql="Select * from chaves inner join categoriachaves on chaveCategoriaChaveId = categoriaChaveId where chaveId = $id";
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
                        <select name="chaveCategoria" class="form-control">
                            <option value="-1">Escolha a categoria...</option>
                            <?php
                            $sql="select * from categoriachaves order by categoriaChaveNome";
                            $resultCategorias=mysqli_query($con,$sql);
                            while ($dadosCategorias=mysqli_fetch_array($resultCategorias)){
                                ?>
                                <option value="<?php echo $dadosCategorias['categoriaChaveId']?>"
                                    <?php
                                    if($dados['chaveCategoriaChaveId']==$dadosCategorias['categoriaChaveId'])
                                        echo " selected ";
                                    ?>
                                >
                                    <?php echo $dadosCategorias['categoriaChaveNome']?>
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