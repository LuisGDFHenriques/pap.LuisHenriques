<?php
include_once ("includes/body.inc.php");
top(PERFIL);
$sql = "select * from perfis inner join paises on perfilPaisId = paisId where perfilId=" . $_SESSION['id'];
$result = mysqli_query($con, $sql);
$dados = mysqli_fetch_array($result)
?>
<!-- Page Content -->
<div class="page-heading header-text">
    <div class="container">
        <div class="w-cards__icon">
            <div class="w-cards__icon_wrapper">
                <div class="header-right">
                       <h1><?php echo $dados['perfilNome'] ?></h1>
                </div>
            </div>
        </div>
    </div>
</div> <!-- fim do container -->

<div class="services">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Editar<em> Perfil</em></h2>
                </div>
                <form action="confirmaEditaPerfil.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nomePerfil">Nome: </label>
                        <input type="text" class="form-control" id="nomePerfil" name="nomePerfil" value="<?php echo $dados['perfilNome']?>">
                    </div><br>
                    <div class="form-group">
                        <label for="Morada">Morada: </label>
                        <input type="text" class="form-control" id="Morada" name="Morada" value="<?php echo $dados['perfilMorada']?>">
                    </div><br>
                    <div class="form-group">
                        <label for="Cidade">Cidade: </label>
                        <input type="text" class="form-control" id="Cidade" name="Cidade" value="<?php echo $dados['perfilCidade']?>">
                    </div><br>
                    <div class="form-group">
                        <label for="Telemovel">Telemovel: </label>
                        <input type="text" class="form-control" id="Telemovel" name="Telemovel" value="<?php echo $dados['perfilTelemovel']?>">
                    </div><br>
                    <div class="form-group">
                        <label for="CodPostal">Codigo Postal: </label>
                        <input type="text" class="form-control" id="CodPostal" name="CodPostal" value="<?php echo $dados['perfilCodPostal']?>">
                    </div><br>
                    <div class="form-group">
                        <label for="pais"> Pais:</label>
                        <select name="pais" class="form-control">
                            <option value="-1">Escolha o pais...</option>
                            <?php
                            $sql="select * from paises order by paisNome";
                            $resultpais=mysqli_query($con,$sql);
                            while ($dadospais=mysqli_fetch_array($resultpais)){
                                ?>
                                <option value="<?php echo $dadospais['paisId']?>"
                                    <?php
                                    if($dados['perfilPaisId']==$dadospais['paisId'])
                                        echo " selected ";
                                    ?>
                                >
                                    <?php echo $dados['paisNome']?>
                                </option>
                                <?php
                            }

                            ?>
                        </select>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Confirma alterações</button>
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="services">
    <div class="container">

    </div>
</div>
<!-- Footer Starts Here -->


<?php
bot();
?>
</body>
</html>