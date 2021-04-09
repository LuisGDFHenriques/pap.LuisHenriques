<?php
include_once ("../includes/body.inc.php");
top();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$txt = addslashes($_POST['txt']);
echo $sql = "Select * from telemoveis where telemovelId LIKE '%$txt%'";
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
                      <del><sup>$</sup>1999 </del> &nbsp; <sup>$</sup>1779
                  </span>
                        </div>

                        <p><?php echo $dados['telemovelDescricao']?></p>
                        <a href="product-details.php" class="filled-button">Ver mais</a>
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