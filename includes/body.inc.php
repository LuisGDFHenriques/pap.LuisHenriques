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
                        <a class="nav-link" data-toggle="modal" data-target="#login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#regista">Registar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Comparativo.php">Comparativo</a>
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
<?php
}
?>
