<?php
include_once("includes/body.inc.php");
$sql="Select * from categorias  ";
$result=mysqli_query($con,$sql);
top();
?>
<script>
    function confirmaElimina(id) {
        $.ajax({
            url:"AJAX/AJAXGetNameCategoria.php",
            type:"post",
            data:{
                idCategoria:id
            },
            success:function (result){
                if(confirm('Confirma que deseja eliminar a categoria:'+result+"?"))
                    window.location="eliminaCategoria.php?id=" + id;
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
                        <h2>Lista<em> Categorias</em></h2>
                        <a href="adicionarCategorias.php" ><span class="btn-sm btn-primary">adiciona</span></a>
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
                        <td><?php echo $dados['categoriaId']?></td>
                        <td style="text-align: center"><?php echo $dados['categoriaNome']?></td>
                        <td><a href="editarCategorias.php?id=<?php echo $dados['categoriaId']?>"><span class="btn-sm btn-primary">Edita</span></a></td>
                        <td><span onclick="confirmaElimina(<?php echo $dados['categoriaId']?>)" class="btn-sm btn-danger">Elimina</span></td>
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

