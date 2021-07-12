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
                        </div>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" checked type="radio" name="tipoCategoria" id="inlineRadio1" value="geral">
                                <label class="form-check-label" for="inlineRadio1">Geral (aparece em todos os produtos)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipoCategoria" id="inlineRadio2" value="especifico">
                                <label class="form-check-label" for="inlineRadio2">Específico (a uma categoria de produtos)</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Categoria"> Categoria</label>
                            <select name="Categoria" class="form-control">
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