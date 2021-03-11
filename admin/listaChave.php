<?php
include_once("includes/body.inc.php");
$sql="Select * from chaves inner join categorias on chaveCategoriaId=categoriaId ";
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


    $('document').ready(function (){
        $('#search').keyup(function (){
            fillTableChaves(this.value);
        });
        fillTableChaves();
    })
</script>
<div class="container">
    <h1>Chaves</h1>
    <table class='table table-striped' width="100%">
        <tr>
            <td colspan="5" align='right'>
                <a href="adicionaChave.php"><i class='btn btn-success btn-xs'>Adicionar</i></a>
            </td>
        </tr>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th colspan="2">opções</th>
        </tr>
        <?php
        while($dados=mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $dados['chaveId']?></td>
                <td><?php echo $dados['chaveNome']?></td>
                <td><?php echo $dados['categoriaNome']?></td>
                <td><a class='btn btn-warning btn-xs' href="editaChave.php?id=<?php echo $dados['chaveId']?>"><i class='fa fa-pencil'></i>Editar</a></td>
                <td><a class='btn btn-danger btn-xs' href="#" onclick="confirmaElimina(<?php echo $dados['chaveId']?>);"> <i class='fa fa-trash'></i>Eliminar</a></td>
            </tr>
            <?php
        }
        ?>

    </table>

</div>
<?php
?>

