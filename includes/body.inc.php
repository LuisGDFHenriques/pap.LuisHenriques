<?php
include_once("config.inc.php");
$con=mysqli_connect(HOST,USER,PWD,DATABASE);
$con->set_charset("utf8");
session_start();

function top($menu=HOME)
{
    global $con;
    $sql="select * from categorias";
    $res=mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Bróculos Store</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
</head>

<body>

<!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
<!-- ***** Preloader End ***** -->

<!-- Header -->

<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.php"><h2>Polo Store</h2></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link  <?php if($menu==HOME) echo " active "?>" href="index.php">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle nav-link <?php if($menu==PRODUTOS) echo " active "?> " data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="true" aria-expanded="false">Produtos</a>

                        <div class="dropdown-menu">
                            <?php
                            while( $dados=mysqli_fetch_array($res)){
                            ?>
                            <a class="dropdown-item" href="products.php?cat=<?php echo $dados['categoriaId']?>"><?php echo $dados['categoriaNome']?></a>
                            <?php
                            }
                            ?>

                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link<?php if($menu==COMPARATIVO) echo " active "?>" href="comparativo.php">Comparativo<?php
                        $n=0;
                        if(isset($_SESSION['compara1']))
                            $n++;
                        if(isset($_SESSION['compara2']))
                            $n++;

                        ?>
                            <span id="nComparativo" class="badge badge-dark"><?php echo $n>0?$n:''?></span>

                        </a>
                    </li>
                    <li>
                    <?php
                    if (!isset($_SESSION['id'])){

                    ?>
                    <li class="nav-item">
                        <a href="#" class="nav-link" onclick="abreLogin()">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" onclick="abreRegista()">Registar</a>
                    </li>
                    <?php
                    }
                    else {

                    ?>
                    <?php
                    $con=mysqli_connect(HOST,USER,PWD,DATABASE);
                    $sql = "select * from perfis where perfilId=" . $_SESSION['id'];
                    $resultPerfis = mysqli_query($con, $sql);
                    $dadosPerfis = mysqli_fetch_array($resultPerfis)
                    ?>
                    <div class="header-right">
                        <div class="user-access">
                            <li class="nav-item">
                                <a class="nav-link <?php if($menu==CARRINHO) echo " active "?>" href="checkout.php">Carrinho</a>
                            </li>
                            <li class="nav-item">
                            <a href="#" class="nav-link" data-toggle="modal" data-target="#sair">Logout</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link <?php if($menu==PERFIL) echo " active "?>" href="perfil.php?id=<?php echo $dadosPerfis['perfilId'] ?>">
                               <?php echo $dadosPerfis['perfilNome'] ?></a>
                            </li>

                        </div>
                    </div>
                        <?php
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<?php
    }
    ?>

<?php
function bot($menu=HOME, $id=0)
{
?>
    <script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Additional Scripts -->
<script src="assets/js/custom.js"></script>
<script src="assets/js/owl.js"></script>
<script src="assets/js/slick.js"></script>
<script src="assets/js/accordions.js"></script>
<script src="js/common.js"></script>
<script language="text/Javascript">
    cleared[0] = cleared[1] = cleared[2] = 0;
    function clearField(t) {
        if (!cleared[t.id]) {
            cleared[t.id] = 1;
            t.value = '';
            t.style.color = '#ffffff';
        }
    }
</script>
    <script>
        $('document').ready(function () {

            <?php
            if ($menu == PRODUTOS){
            ?>
            $('#search').keyup(function () {
                fillTableProdutos(this.value, $('#searchMarca'). val(),<?php echo $id?>,$('#ordenar'). val());
            });
            $('#searchMarca').change(function () {
                fillTableProdutos($('#search'). val(), this.value,<?php echo $id?>,$('#ordenar'). val());
            });
            $('#ordenar').change(function () {
                fillTableProdutos($('#search'). val(), $('#searchMarca'). val(),<?php echo $id?>,this.value);
            });
            fillTableProdutos('',-1,<?php echo $id?>,1);
            <?php
            }
            ?>
        })
    </script>
    <div class="modal fade" style="top:50px" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                </div>
                <div class="modal-body">
                    <form action="confirmaLogin.php" method="post">
                        <div class="form-group">
                            <label for="InputEmail">E-mail:</label>
                            <input type="email" class="form-control" id="InputEmail" name="login">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Palavra-passe:</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                        </div>

                        <h8>Ainda não tem conta?</h8>
                        <a href="#" onclick="abreRegista();">Registar</a>
                        <br>
                        <button type="Submit" class="btn btn-outline-success" >Entrar</button>
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Fechar</button>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="regista" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registar</h5>
                </div>
                <form action="confirmaRegista.php" method="post">
                <div class="modal-body">

                        <div class="form-group">
                            <label for="InputName">Nome:</label>
                            <input type="text" class="form-control" id="InputName" aria-describedby="emailHelp" name="nome">
                        </div>
                        <div class="form-group">
                            <label for="InputEmail">E-mail: <small>(serve de login)</small></label>
                            <input type="email" name="email" class="form-control" id="InputEmail">
                        </div>
                        <div class="form-group">
                            <label for="InputPassword1">Palavra-passe:</label>
                            <input type="password" name="password" class="form-control" id="InputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="InputPassword1">Confirma palavra-passe:</label>
                            <input type="password" class="form-control" id="InputPassword2">
                        </div>
                        <div class="form-group">
                            <label for="Morada">Morada:</label>
                            <input type="text" name="Morada" class="form-control" id="Morada">
                        </div>
                        <div class="form-group">
                            <label for="Cidade">Cidade:</label>
                            <input type="text" name="Cidade" class="form-control" id="Cidade">
                        </div>
                        <div class="form-group">
                            <label for="Telemovel">Telemovel:</label>
                            <input type="text" name="Telemovel" class="form-control" id="Telemovel">
                        </div>
                        <div class="form-group">
                            <label for="Pais"> Pais:</label>
                            <select name="Pais" id="Pais" class="form-control">
                                <option value="-1">Escolha o pais</option>
                                <?php
                                $con=mysqli_connect(HOST,USER,PWD,DATABASE);
                                $sql="select * from paises order by paisNome";
                                $result=mysqli_query($con,$sql);
                                while ($dados=mysqli_fetch_array($result)){
                                    ?>
                                    <option value="<?php echo $dados['paisId']?>"><?php echo $dados['paisNome']?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="CodigoPostal">Código Postal:</label>
                            <input type="text" name="CodigoPostal" class="form-control" id="CodigoPostal">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-outline-success">Registar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="sair" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                </div>
                <div class="modal-body">
                    <form action="logout.php" method="post">
                        <div class="form-group">
                            <label for="InputName">Tem a certeza que deseja sair?</label>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-outline-success">Logout</button>
                </div></form>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 footer-item">
                    <h4>Fica a saber</h4>
                    <p>A nossa loja foi criada em 2/11/2020 com intenção de vender telemoveis rápido e de entrega rapida.</p>
                    <ul class="social-icons">
                        <li><div class="count-area-content">
                               <div class="count-digit">
                                   <?php
                                       $con=mysqli_connect(HOST,USER,PWD,DATABASE);
                                       $sql="select count(produtoId) as count_produtos from produtos";
                                       $resultCP=mysqli_query($con,$sql);
                                       $dadosCP=mysqli_fetch_array($resultCP);
                                       echo $dadosCP['count_produtos'];
                                   ?>
                               </div>
                               <div class="count-title">Produtos</div>
                            </div></li>

                        <li><div class="count-area-content">
                                <div class="count-digit">
                                    <?php
                                        $con=mysqli_connect(HOST,USER,PWD,DATABASE);
                                        $sql="select count(userId) as count_users from users";
                                        $resultCU=mysqli_query($con,$sql);
                                        $dadosCU=mysqli_fetch_array($resultCU);
                                        echo $dadosCU['count_users'];
                                    ?>
                                </div>
                                <div class="count-title">Registrados</div>
                            </div></li>

                    </ul>
                </div>

                <div class="col-md-4 footer-item">
                    <h4>Páginas</h4>
                    <ul class="menu-list">
                        <li><a href="Home.php">Home</a></li>
                        <?php
                        $sql="select * from categorias";
                        $res=mysqli_query($con,$sql);
                        while( $dados=mysqli_fetch_array($res)){
                            ?>
                            <li><a href="products.php?cat=<?php echo $dados['categoriaId']?>"><?php echo $dados['categoriaNome']?></a></li>
                            <?php
                        }
                        ?>
                        <li><a href="Comparativo.php">Comparativo</a></li>
                    </ul>
                </div>
                <div class="col-md-4 footer-item last-item">
                    <h4>Contacte-nos</h4>
                    <div class="contact-form">
                        <form id="contact footer-contact" action="" method="post">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="name" type="text" class="form-control" id="name" placeholder="Nome Completo" required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="email" type="text" class="form-control" id="email" pattern="[^ @]*@[^ @]*" placeholder="E-Mail" required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <textarea name="message" rows="6" class="form-control" id="message" placeholder="A sua mensagem" required=""></textarea>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="filled-button">Send Message</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </footer>



    <?php
}
?>