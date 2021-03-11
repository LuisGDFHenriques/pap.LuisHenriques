<?php
include_once ("includes/body.inc.php");
top();

$id=intval($_GET['id']);
$sql="Select * from marcas where marcaId = $id";
$result=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($result);

?>
    <div class="services">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Editar<em> Marca</em></h2>

                    </div>
                    <form action="confirmaEditaMarca.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nomeMarca"> Nome</label>
                            <input type="text" class="form-control" id="nomeMarca" name="nomeMarca" value="<?php echo $dados['marcaNome'];?>">
                        </div>

                        <button type="submit" class="btn btn-primary">Confirma alterações</button>
                        <input type="hidden" name="idMarca" value="<?php echo $id?>">
                    </form>
                </div>


            </div>
        </div>


    </div>
<?php
bottom();
?>