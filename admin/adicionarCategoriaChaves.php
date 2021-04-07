<?php
include_once ("includes/body.inc.php");
top()
?>
    <div class="services">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Nova<em> CategoriaChaves</em></h2>

                    </div>
                    <form action="confirmaNovaCategoriaChave.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nomeCategoriaChave"> Nome</label>
                            <input type="text" class="form-control" id="nomeCategoriaChave" name="nomeCategoriaChave">
                            <label for="Categoria"> Categoria</label>
                            <select name="Categoria">
                                <option value="-1">Escolha a categoria...</option>
                                <?php
                                $sql="select * from categorias order by categoriaNome";
                                $result=mysqli_query($con,$sql);
                                while ($dados=mysqli_fetch_array($result)){
                                    ?>
                                    <option value="<?php echo $dados['categoriaId']?>"><?php echo $dados['categoriaNome']?></option>
                                    <?php
                                }

                                ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Confirma nova</button>
                    </form>
                </div>


            </div>
        </div>


    </div>
<?php
bottom();
?>