<?php
include_once ("includes/body.inc.php");
top()
?>
    <div class="services">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Nova<em> Categoria</em></h2>

                    </div>
                    <form action="confirmaNovaCategoria.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nomeCategoria"> Nome</label>
                            <input type="text" class="form-control" id="nomeCategoria" name="nomeCategoria">
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