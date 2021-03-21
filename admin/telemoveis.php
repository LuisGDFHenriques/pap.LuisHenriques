<?php
include_once("includes/body.inc.php");
$sql="Select * from telemoveis inner join marcas on telemovelMarcaId = marcaId";
$result=mysqli_query($con,$sql);
top();
?>
<script>
    function confirmaElimina(id) {
        $.ajax({
            url:"AJAX/AJAXGetNameTelemoveis.php",
            type:"post",
            data:{
                idTelemovel:id
            },
            success:function (result){
                if(confirm('Confirma que deseja eliminar o telemovel:'+result+"?"))
                    window.location="eliminaTelemoveis.php?id=" + id;
            }
        })
    };

</script>
<div class="container">
    <div class="services">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Lista<em> Telemoveis</em></h2>
                        <a href="adicionarTelemovel.php" ><span class="btn-sm btn-primary">adiciona</span></a>
                    </div>
                </div>
                <table class='table table-striped' width="100%">
                    <tr>
                        <th width="5%" style="text-align: center">Id</th>
                        <th>Nome</th>
                        <th>Imagem</th>
                        <th>Marcas</th>
                        <th>Descrição</th>
                        <th width="15%" colspan="2" style="text-align: center">opções</th>
                    </tr>
                    <?php
                    while($dados=mysqli_fetch_array($result)){
                        ?>
                        <tr>
                            <td><?php echo $dados['telemovelId']?></td>
                            <td><?php echo $dados['telemovelModelo']?></td>
                            <td><img src="../<?php echo $dados['telemovelImagemURL']?>"></td>
                            <td><?php echo $dados['marcaNome']?></td>
                            <td><?php echo $dados['telemovelDescricao']?></td>
                            <td><a href="editarTelemoveis.php?id=<?php echo $dados['telemovelId']?>"><span class="btn-sm btn-primary">Edita</span></a></td>
                            <td><span onclick="confirmaElimina(<?php echo $dados['telemovelId']?>)" class="btn-sm btn-danger">Elimina</span></td>                        </tr>
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