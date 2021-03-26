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
    <table class='table table-striped' width="100%">
        <tr>
            <th width="5%" style="text-align: center">Id</th>
            <th>Telemovel</th>
            <th>Telemovel</th>
            <th>Telemovel</th>
            <th>Descrição</th>
            <th width="15%" colspan="2" style="text-align: center">opções</th>
        </tr>
        <?php
        ($dados=mysqli_fetch_array($resulttele))
            ?>
            <tr>
                <td><?php echo $dados['telemovelId']?></td>
                <td><?php echo $dados['telemovelModelo']?></td>
                <td><img src="../<?php echo $dados['telemovelImagemURL']?>"></td>
                <td><?php echo $dados['marcaNome']?></td>
                <td><?php echo $dados['telemovelDescricao']?></td>
                <td><span onclick="confirmaElimina(<?php echo $dados['telemovelId']?>)" class="btn-sm btn-danger">Elimina</span></td>
            </tr>
            <?php

        ?>
    </div>
</div>

<div class="container">
    <div class="services">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Lista<em> TelemoveisChave</em></h2>
                        <a href="confirmaNovoTelemovelChave.php" ><span class="btn-sm btn-primary">adiciona</span></a>
                    </div>
                </div>
                <table class='table table-striped' width="100%">
                    <tr>
                        <th width="5%" style="text-align: center">Id</th>
                        <th>Telemovel</th>
                        <th>Descrição</th>
                        <th width="15%" colspan="2" style="text-align: center">opções</th>
                    </tr>
                    <?php
                    while($dados=mysqli_fetch_array($result)){
                        ?>
                        <tr>
                            <td><?php echo $dados['telemovelId']?></td>
                            <td><?php echo $dados['telemovelDescricao']?></td>
                            <td><span onclick="confirmaElimina(<?php echo $dados['telemovelId']?>)" class="btn-sm btn-danger">Elimina</span></td>
                        </tr>
                        <?php
                    }
                    ?>

                    </table>
            </div>
        </div>


</div>
<?php
bottom();
?>