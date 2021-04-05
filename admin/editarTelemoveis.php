<?php
include_once ("includes/body.inc.php");
top();

$id=intval($_GET['id']);
$sql="Select * from telemoveis inner join marcas on telemovelMarcaId = marcaId where telemovelId=$id";
$result=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($result);

?>
    <div class="services">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Editar<em> Telemovel</em></h2>
                    </div>
                    <form action="confirmaEditaTelemovel.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="chaveId" value="<?php echo $id?>">
                        <label for="modeloTelemovel">Nome: </label>
                        <input type="text" class="form-control" id="modeloTelemovel" name="modeloTelemovel" value="<?php echo $dados['telemovelModelo']?>"><br>
                        <label for="descricaoTelemovel">Descrição: </label>
                        <textarea id="descricaoTelemovel" class="form-control"  name="descricaoTelemovel" value="<?php echo $dados['telemovelDescricao']?>"></textarea><br>

                        <label for="imagemTelemovel">Imagem: </label>
                        <input type="file" class="form-control" id="imagemTelemovel" name="imagemTelemovel" value="<?php echo $dados['telemovelImagemURL']?>"><br>




                        <select name="telemovelMarca">
                            <option value="-1">Escolha a marca...</option>
                            <?php
                            $sql="select * from marcas order by marcaNome";
                            $resultMar=mysqli_query($con,$sql);
                            while ($dadosMar=mysqli_fetch_array($resultMar)){
                                ?>
                                <option value="<?php echo $dadosMar['marcaId']?>"
                                    <?php
                                    if($dados['telemovelMarcaId']==$dadosMar['marcaId'])
                                        echo " selected ";
                                    ?>
                                >
                                    <?php echo $dadosMar['marcaNome']?>
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