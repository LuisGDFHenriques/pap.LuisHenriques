<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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
        <script src="https://code.jquery.com/jquery-3.1.1.min.js">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

    </head>

    <body>


    <section>
            <div class="container">
                <h2>Brócolos 2 Store - Administração</h2>

                <div >
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item float-left">
                            <a class="nav-link active" href="marcas.php">Marcas</a>
                        </li>

                        <li class="nav-item float-left">
                            <a class="nav-link" href="categorias.php">Categorias</a>
                        </li>
                        <li class="nav-item float-left">
                            <a class="nav-link" href="chaves.php">Chaves</a>
                        </li>
                        <li class="nav-item float-left">
                            <a class="nav-link" href="categoriaChaves.php">CategoriaChaves</a>
                        </li>
                        <li class="nav-item float-left">
                            <a class="nav-link" href="telemoveis.php">Telemoveis</a>
                        </li>
                    </ul>
                </div>
            </div>
    </section>




    <?php
}

function bottom(){
    ?>


    </body>
    </html>

    <?php
}
?>