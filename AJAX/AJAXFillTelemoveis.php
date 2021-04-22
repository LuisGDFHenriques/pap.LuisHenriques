<?php
include_once ("../includes/body.inc.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$txt = addslashes($_POST['txt']);
$id = intval ($_POST['id']);
$sql = "Select * from telemoveis where 1 ";
        if ($txt != "")
            $sql.="and telemovelModelo like '%$txt%'";
        if ($id != -1)
            $sql.= "and telemovelMarcaId = $id";


$result = mysqli_query($con, $sql);
?>
<?php
while ($dados = mysqli_fetch_array($result)){
    ?>
    <div class="col-md-4">
        <div class="service-item">
            <img src="<?php echo $dados['telemovelImagemURL']?>" alt="">
            <div class="down-content">
                <h4><?php echo $dados['telemovelModelo']?></h4>
                <div style="margin-bottom:10px;">
                  <span>
                      <?php echo $dados['telemovelPreco']?>?
                  </span>
                </div>

                <p></p>
                <a href="product-details.php?id=<?php echo $dados['telemovelId']?>" class="filled-button">Ver mais</a>
                <br>
                <input type="checkbox"><a class=""> Favoritos</a>
                <br>
                <input type="checkbox"><a class=""> Comparar</a>
            </div>

        </div>

        <br>
    </div>


    <?php
}
?>