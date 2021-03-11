<?php
include_once("includes/body.inc.php");
$sql="Select * from marcas  ";
$result=mysqli_query($con,$sql);
top();
?>
<script>
    function confirmaElimina(id) {
        $.ajax({
            url:"AJAX/AJAXGetNameMarca.php",
            type:"post",
            data:{
                idMarca:id
            },
            success:function (result){
                if(confirm('Confirma que deseja eliminar a marca:'+result+"?"))
                    window.location="eliminaMarca.php?id=" + id;
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
                        <h2>Lista<em> Marcas</em></h2>
                        <a href="adicionarMarca.php" ><span class="btn-sm btn-primary">adiciona</span></a>
                    </div>
                </div>
                <table class="table table-hover table-striped">
                    <tr>
                        <th width="5%" style="text-align: center">Id</th>
                        <th style="text-align: center">Nome</th>

                        <th width="15%" colspan="2" style="text-align: center"> Opções </th>
                    </tr>
                    <?php
                    while($dados=mysqli_fetch_array($result)){
                        ?>


                    <tr>
                        <td><?php echo $dados['marcaId']?></td>
                        <td style="text-align: center"><?php echo $dados['marcaNome']?></td>
                        <td><a href="editarMarca.php?id=<?php echo $dados['marcaId']?>"><span class="btn-sm btn-primary">Edita</span></a></td>
                        <td><span onclick="confirmaElimina(<?php echo $dados['marcaId']?>)" class="btn-sm btn-danger">Elimina</span></td>
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

