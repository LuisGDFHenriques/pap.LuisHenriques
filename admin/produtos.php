<?php
include_once("includes/body.inc.php");
$sql="Select * from produtos inner join marcas on produtoMarcaId = marcaId";
$result=mysqli_query($con,$sql);
top();
?>
<script>
    function confirmaElimina(id) {
        $.ajax({
            url:"AJAX/AJAXGetNameTelemoveis.php",
            type:"post",
            data:{
                idProduto:id
            },
            success:function (result){
                if(confirm('Confirma que deseja eliminar o telemovel:'+result+"?"))
                    window.location="eliminaProduto.php?id=" + id;
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
                        <h2>Lista<em> Produtos</em></h2>
                        <a href="adicionarProduto.php" ><span class="btn-sm btn-primary">adiciona</span></a>
                    </div>
                </div>
                <table class='table table-striped' width="100%">
                    <tr>
                        <th width="5%" style="text-align: center">Id</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Imagem</th>
                        <th>Marcas</th>
                        <th>Descrição</th>
                        <th width="15%" colspan="3" style="text-align: center">opções</th>
                    </tr>
                    <?php
                    while($dados=mysqli_fetch_array($result)){
                        ?>
                        <tr>
                            <td><?php echo $dados['produtoId']?></td>
                            <td><?php echo $dados['produtoNome']?></td>
                            <td><?php echo $dados['produtoPreco']?></td>
                            <td><img width="120" src="../<?php echo $dados['produtoImagemURL']?>"></td>
                            <td><?php echo $dados['marcaNome']?></td>
                            <td><?php echo substr($dados['produtoDescricao'],0,100)." (..)"?></td>
                            <td><a href="editarProdutos.php?id=<?php echo $dados['produtoId']?>"><span class="btn-sm btn-primary">Edita</span></a></td>
                            <td><span onclick="confirmaElimina(<?php echo $dados['produtoId']?>)" class="btn-sm btn-danger">Elimina</span></td>
                            <td><a href="produtosChave.php?id=<?php echo $dados['produtoId']?>"><span class="btn-sm btn-primary">Detalhes</span></a></td>
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