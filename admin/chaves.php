<?php
include_once("includes/body.inc.php");
$sql="Select * from chaves inner join categoriachaves on chaveCategoriaChaveId = categoriaChaveId";
$result=mysqli_query($con,$sql);
top();
?>
<script>
    function confirmaElimina(id) {
        $.ajax({
            url:"AJAX/AJAXGetNameChave.php",
            type:"post",
            data:{
                idChaves:id
            },
            success:function (result){
                if(confirm('Confirma que deseja eliminar a chave:'+result+"?"))
                    window.location="eliminaChave.php?id=" + id;
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
                        <h2>Lista<em> Chaves</em></h2>
                        <a href="adicionarChave.php" ><span class="btn-sm btn-primary">adiciona</span></a>
                    </div>
                </div>
                <table class='table table-striped' width="100%">
                    <tr>
                        <th width="5%" style="text-align: center">Id</th>
                        <th>Nome</th>
                        <th>CategoriaChave</th>
                        <th width="15%" colspan="2" style="text-align: center">opções</th>
                    </tr>
                    <?php
                    while($dados=mysqli_fetch_array($result)){
                        ?>
                        <tr>
                            <td><?php echo $dados['chaveId']?></td>
                            <td><?php echo $dados['chaveNome']?></td>
                            <td><?php echo $dados['categoriaChaveNome']?></td>
                            <td><a href="editarChaves.php?id=<?php echo $dados['chaveId']?>"><span class="btn-sm btn-primary">Edita</span></a></td>
                            <td><span onclick="confirmaElimina(<?php echo $dados['chaveId']?>)" class="btn-sm btn-danger">Elimina</span></td>                        </tr>
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

