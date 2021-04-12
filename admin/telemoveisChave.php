<?php
include_once("includes/body.inc.php");
$id=intval($_GET['id']);


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
                    <h2>Novo <em>TelemoveisChave</em></h2>

                </div>
                <form action="confirmaNovoTelemovelChave.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="<?php echo $id?>" name="telemovelChaveTelemovel">
                    <label>Categoria Chaves</label>
                    <select name="catChaveTelemovel" id="chaveCategoria">
                        <option value="-1">Escolha a categoria chave...</option>
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
                    <label>Chaves</label>
                    <select name="chaveChaveTelemovel" id="chave">

                    </select>
                    <br>
                    <label>Valor</label>
                    <input type="text" name="valorChaveTelemovel" class="w-50 p-3"><br>
                    <br>
                    <div class="container">
                        <input type="Submit" value="Adicionar">
                        <table class='table table-striped' width="100%">

                            <tr>
                                <th>Categoria Chave</th>
                                <th>Chave</th>
                                <th>Valor</th>
                                <th colspan="2">opções</th>
                            </tr>
                            <?php
                            $sqlT="Select * from telemoveischaves inner join chaves on chaveId=telemovelChaveChaveId inner join categoriaChaves on categoriaChaveId = chaveCategoriaChaveId where telemovelChaveTelemovelId=".$id;
                            $resultT=mysqli_query($con,$sqlT);
                            while($dadosT=mysqli_fetch_array($resultT)){
                                ?>

                                <tr>
                                    <td><?php echo $dadosT['categoriaChaveNome']?></td>
                                    <td><?php echo $dadosT['chaveNome']?></td>
                                    <td><?php echo $dadosT['telemovelChaveValor']?></td>

                                    <td><a class='btn btn-danger btn-xs' href="#" onclick="confirmaElimina(<?php echo $dados['chaveId']?>);"> <i class='fa fa-trash'></i>Eliminar</a></td>

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