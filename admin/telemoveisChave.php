<?php
include_once("includes/body.inc.php");
$id=intval($_GET['id']);

$sql="Select * from telemovelchave inner join telemoveis on  telemovelChaveTelemovelId = telemovelId inner join chaves on telemovelChaveChaveId = chaveId";
$result=mysqli_query($con,$sql);

$sqltele="Select * from telemoveis inner join marcas on telemovelMarcaId = marcaId where telemovelId=".$id;
$resulttele=mysqli_query($con,$sqltele);

top();
?>
<script>
    function confirmaElimina(id) {
        $.ajax({
            url:"AJAX/AJAXGetNameTelemoveisChaves.php",
            type:"post",
            data:{
                idTelemovelChave:id
            },
            success:function (result){
                if(confirm('Confirma que deseja eliminar o telemovelChave:'+result+"?"))
                    window.location="eliminaTelemoveisChaves.php?id=" + id;
            }
        })
    };

</script>
<div class="container">
    <div class="services">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2><em>telemoveisChave</em></h2>

                </div>
                <form action="" method="post" enctype="multipart/form-data">
        <label>CategoriaChave:</label><br>
        <select name="chaveCategoria">
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
        <br>
        <br>

        <label>Chave:</label><br>
        <select name="chaveCategoria">
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
                <br>
                <br>
                <label>Valor</label><br>
                <input type="text" name="valor" class="w-25 "><br>
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