<?php
include_once ("includes/body.inc.php");
top(PERFIL);
$sql = "select * from perfis inner join paises on perfilPaisId = paisId where perfilId=" . $_SESSION['id'];
$result = mysqli_query($con, $sql);
$dados = mysqli_fetch_array($result)
?>
<!-- Page Content -->
<div class="page-heading header-text">
    <div class="container">
        <div class="w-cards__icon">
            <div class="w-cards__icon_wrapper">
                <div class="header-right">
                       <h1><?php echo $dados['perfilNome'] ?></h1>
                </div>
            </div>
        </div>
    </div>


</div> <!-- fim do container -->

<div class="services">
    <div class="container">
        <div class="row">
            <table width="100%">
                <tr>
                    <th width="50%"></th>
                    <th width="50%"></th>
                </tr>
                <tr>
                    <th>Nome</th><td><?php echo $dados['perfilNome']?></td>
                </tr>
                <tr>
                    <th>Morada</th><td><?php echo $dados['perfilMorada']?></td>
                </tr><tr>
                    <th>Cidade</th><td><?php echo $dados['perfilCidade']?></td>
                </tr><tr>
                    <th>Telemovel</th><td><?php echo $dados['perfilTelemovel']?></td>
                </tr><tr>
                    <th>Pais</th><td><?php echo $dados['paisNome']?></td>
                </tr><tr>
                    <th>Codigo Postal</th><td><?php echo $dados['perfilCodPostal']?></td>
                </tr><tr>
                <th width="15%" colspan="2" style="text-align: center"></th><td><a href="editarPerfil.php?id=<?php echo $dados['perfilId']?>"><span class="btn-sm btn-primary">Alterar</span></a></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="services">
    <div class="container">

    </div>
</div>


<!-- Footer Starts Here -->
<?php
bot();
?>
</body>
</html>