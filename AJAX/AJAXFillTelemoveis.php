<?php
include_once ("../includes/body.inc.php");
define("DEBUG",0);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$txt = addslashes($_POST['txt']);
$idMrc = intval ($_POST['idMarca']);
$idCat = intval ($_POST['idCategoria']);
$ordem = intval ($_POST['ordem']);
$sql = "Select * from produtos where 1 ";
        if ($txt != "")
            $sql.=" and produtoNome like '%$txt%'";
        if ($idMrc != -1)
            $sql.= " and produtoMarcaId = $idMrc";
        if ($idCat != -1)
            $sql.= " and produtoCategoriaId = $idCat";
        if ($ordem == 1)
            $sql.= " order by produtoId DESC";
        else if($ordem == -1)
            $sql.= " order by produtoPreco ASC";
        else if($ordem == 2)
            $sql.= " order by produtoPreco DESC";
if(DEBUG){
    echo '<pre>';
    print_r($_POST);
    echo $sql;
    echo '</pre>';
}


$result = mysqli_query($con, $sql);
?>
<?php
while ($dados = mysqli_fetch_array($result)){
    ?>
    <div class="col-md-4">
        <div class="service-item">
            <img src="<?php echo $dados['produtoImagemURL']?>" alt="">
            <div class="down-content" >
                <div align="center" style="min-height: 70px">
                <h5><?php echo $dados['produtoNome']?> teste teste teste</h5>
                </div>
                <div style="margin-bottom:10px;">
                  <span>
                      <?php echo $dados['produtoPreco']?>&euro;
                  </span>
                </div>
                <p></p>
                <a href="product-details.php?id=<?php echo $dados['produtoId']?>" class="filled-button">Ver mais</a>
                <br>
                <input type="checkbox"><a class="form-group"> Favoritos</a>
                <br>
                <input type="checkbox" class="form-group"><a class="form-group"> Comparar</a>
            </div>

        </div>

        <br>
    </div>


    <?php
}
?>