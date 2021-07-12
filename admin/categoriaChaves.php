<?php
include_once("includes/body.inc.php");
$sql="Select * from categoriachaves left join categorias on categoriaChaveCategoriaId = categoriaId order by categoriaNome";
$result=mysqli_query($con,$sql);
top();
?>
<script>
    function confirmaElimina(id) {
        $.ajax({
            url:"AJAX/AJAXGetNameCategoriaChave.php",
            type:"post",
            data:{
                idCategoriaChave:id
            },
            success:function (result){
                if(confirm('Confirma que deseja eliminar a categoriaChave:'+result+"?"))
                    window.location="eliminaCategoriaChave.php?id=" + id;
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
                        <h2>Lista<em> CategoriaChave</em></h2>
                        <a href="adicionarCategoriaChaves.php" ><span class="btn-sm btn-primary">adiciona</span></a>
                    </div>
                </div>
                <table class="table table-hover table-striped">
                    <tr>
                        <th width="5%" style="text-align: center">Id</th>
                        <th style="text-align: center">Nome</th>
                        <th style="text-align: center">Categoria</th>

                        <th width="15%" colspan="2" style="text-align: center"> Opções </th>
                    </tr>
                    <?php
                    while($dados=mysqli_fetch_array($result)){
                        ?>


                    <tr>
                        <td><?php echo $dados['categoriaChaveId']?></td>
                        <td style="text-align: center"><?php echo $dados['categoriaChaveNome']?></td>
                        <td style="text-align: center"><?php
                        if(is_null($dados['categoriaNome']))
                            echo $dados['categoriaChaveTipo'];
                        else
                            echo $dados['categoriaNome'];
                        ?></td>
                        <td><a href="editarCategoriaChave.php?id=<?php echo $dados['categoriaChaveId']?>"><span class="btn-sm btn-primary">Edita</span></a></td>
                        <td><span onclick="confirmaElimina(<?php echo $dados['categoriaChaveId']?>)" class="btn-sm btn-danger">Elimina</span></td>
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

