<?php
include_once ("includes/body.inc.php");
top()
?>
    <div class="services">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Nova<em> Chave</em></h2>

                    </div>
                        <form action="confirmaNovaChave.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                            <label for="nomeChave">Nome: </label>
                            <input type="text" class="form-control" id="nomeChave" name="nomeChave">
                            </div><br>
                            <div class="form-group">
                            <label for="chaveCategoria"> chaveCategoria:</label>
                            <select name="chaveCategoria" class="form-control">
                                <option value="-1">Escolha a categoriaChave...</option>
                                <?php
                                $sql="select * from categoriachaves order by categoriaChaveNome";
                                $result=mysqli_query($con,$sql);
                                while ($dados=mysqli_fetch_array($result)){
                                    ?>
                                    <option value="<?php echo $dados['categoriaChaveId']?>"><?php echo $dados['categoriaChaveNome']?></option>
                                    <?php
                                }

                                ?>
                            </select>
                            </div>
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