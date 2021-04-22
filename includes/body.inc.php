<?php
include_once("config.inc.php");
$con=mysqli_connect(HOST,USER,PWD,DATABASE);
$con->set_charset("utf8");

function top()
{
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
          rel="stylesheet">
    <title>PHPJabbers.com | Free Mobile Store Website Template</title>

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
            <a class="navbar-brand" href="index.php"><h2>Brócolos Store</h2></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="true" aria-expanded="false">Produtos</a>

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="products.php">Telemoveis</a>
                            <a class="dropdown-item" href="capas.php">Capas</a>
                            <a class="dropdown-item" href="carregadores.php">Carregadores</a>
                            <a class="dropdown-item" href="fones.php">Fones</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="checkout.php">Carrinho</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Comparativo.php">Comparativo</a>
                    </li>
                    <?php
                    session_start();
                    if (!isset($_SESSION['id'])){

                    ?>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#regista">Registar</a>
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
                            <a class="nav-link" data-toggle="modal" data-target="#sair">Desconectar</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="perfil.php?id=<?php echo $dadosPerfis['perfilId'] ?>">
                               <?php echo $dadosPerfis['perfilNome'] ?></a>
                            </li>

                        </div>
                        <?php
                        }
                        ?>
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
            if ($menu == TELEMOVEIS){
            ?>
            $('#search').keyup(function () {
                fillTableTelemoveis(this.value, $('#searchMarca'). val());
            });
            $('#searchMarca').change(function () {
                fillTableTelemoveis($('#search'). val(), this.value);
            });
            fillTableTelemoveis();
            <?php
            }
            ?>
        })
    </script>
    <div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                </div>
                <div class="modal-body">
                    <form action="confirmaLogin.php" method="post">
                        <div class="form-group">
                            <label for="InputEmail">E-mail:</label>
                            <input type="email" class="form-control" id="InputEmail">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Palavra-passe:</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="id">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Manter-me logado</label>
                        </div>
                        <h8>Ainda não tem conta?</h8>
                        <a data-toggle="modal" data-target="#regista">
                            <br><button type="button" class="btn btn-outline-success" data-dismiss="modal">Registar</button></a>
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Fechar</button>
                        <button type="Submit" class="btn btn-outline-success" >Entrar</button>
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
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="InputName">Nome:</label>
                            <input type="name" class="form-control" id="InputName" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="InputEmail">E-mail:</label>
                            <input type="email" class="form-control" id="InputEmail">
                        </div>
                        <div class="form-group">
                            <label for="InputPassword1">Palavra-passe</label>
                            <input type="password" class="form-control" id="InputPassword1">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-outline-success">Registar</button>
                </div>
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
                    <form>
                        <div class="form-group">
                            <label for="InputName">Tem a certeza que deseja sair?</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-outline-success">Logout</button>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>
