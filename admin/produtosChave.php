<?php
include_once("includes/body.inc.php");
$id=intval($_GET['id']);
$sql="select * from produtos where produtoId=$id";
$result=mysqli_query($con,$sql);
$dadosProduto=mysqli_fetch_array($result);
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
                    <h2>Chaves <em> de produtos</em></h2>
                    <img src="../<?php echo $dadosProduto['produtoImagemURL']?>" width="200">
                    <h1><?php echo $dadosProduto['produtoNome']?></h1>
                </div>
                <form action="confirmaNovoProdutoChave.php" method="post" enctype="multipart/form-data">
                    <input id="idProduto" type="hidden" value="<?php echo $id?>" name="telemovelChaveTelemovel">
                    <label>Categoria Chaves</label>
                    <select name="catChaveTelemovel" id="chaveCategoria">
                        <option value="-1">Escolha a categoria chave...</option>
                        <?php
                        $sql="select * from categoriachaves 
where categoriaChaveTipo='geral'
or categoriaChaveId in(
select categoriaChaveId
from categoriachaves inner join categorias on categoriaId =categoriaChaveCategoriaId inner join produtos on categoriaId= produtoCategoriaId
	where produtoId=".$id.") order by categoriaChaveNome";
                        $result=mysqli_query($con,$sql);
                        while ($dados=mysqli_fetch_array($result)){
                            ?>
                            <option value="<?php echo $dados['categoriaChaveId']?>"><?php echo $dados['categoriaChaveNome']?></option>
                            <?php
                        }


                        ?>
                    </select>
                    <br>
                    <label>Chaves</label>
                    <select name="chaveChaveTelemovel" id="chave">

                    </select>
                    <br>
                    <label>Valor</label>
                    <input type="text" name="valorChaveTelemovel" class="w-50 p-3"><br>
                    <br>
                    <div class="container">
                        <button type="submit" class="btn btn-primary">Confirma alterações</button>
                        <table class='table table-striped' width="100%">

                            <tr>
                                <th>Categoria Chave</th>
                                <th>Chave</th>
                                <th>Valor</th>
                                <th colspan="2">opções</th>
                            </tr>
                            <?php
                            $sql="Select * from produtochaves 
                                    inner join chaves on chaveId=produtoChaveChaveId
                                    inner join categoriachaves on categoriaChaveId = chaveCategoriaChaveId 
                                    where produtoChaveProdutoId=".$id;
                            $result=mysqli_query($con,$sql);
                            while($dados=mysqli_fetch_array($result)){
                                ?>

                                <tr>
                                    <td><?php echo $dados['categoriaChaveNome']?></td>
                                    <td><?php echo $dados['chaveNome']?></td>
                                    <td><?php echo $dados['produtoChaveValor']?></td>

                                    <td><a class='btn btn-danger btn-xs' href="eliminaTelemoveisChaves.php" onclick="confirmaElimina(<?php echo $dados['chaveId']?>);"> <i class='fa fa-trash'></i>Eliminar</a></td>

                                </tr>
                                <?php
                            }
                            ?>


                        </table>



                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
bottom();
?>