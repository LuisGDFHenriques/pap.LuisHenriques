<?php
include_once ("includes/body.inc.php");
top()
?>
    <div class="services">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Novo<em> Telemovel</em></h2>

                    </div>
                        <form action="confirmaNovoTelemovel.php" method="post" enctype="multipart/form-data">
                            <label for="modeloTelemovel">Nome: </label>
                            <input type="text" class="form-control" id="modeloTelemovel" name="modeloTelemovel"><br>
                            <label for="descricaoTelemovel">Descrição: </label>
                            <input type="text" class="form-control" id="descricaoTelemovel" name="descricaoTelemovel"><br>
                            <label for="imagemTelemovel">Imagem: </label>
                            <input type="file" class="form-control" id="imagemTelemovel" name="imagemTelemovel"><br>


                            <select name="telemovelMarca">
                                <option value="-1">Escolha a marca...</option>
                                <?php
                                $sql="select * from marcas order by marcaNome";
                                $result=mysqli_query($con,$sql);
                                while ($dados=mysqli_fetch_array($result)){
                                    ?>
                                    <option id="telemovelMarca" value="<?php echo $dados['marcaId']?>"><?php echo $dados['marcaNome']?></option>
                                    <?php
                                }

                                ?>
                            </select>
                            <br>
                            <button type="submit" class="btn btn-primary">Confirma nova</button>
                        </form>



                </div>


            </div>
        </div>


    </div>
<?php
bottom();
?>