<?php
function top(){
    ?>
    <header class="">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.html"><h2>Brócolos Store</h2></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.html">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Produtos</a>

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
                        <li class="nav-item ">
                            <a class="nav-link" href="Comparativo.php">Comparativo</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <?php
}
function bottom(){
    ?>



    <!-- SCRIPTS -->

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Additional CSS Files -->
        <link rel="stylesheet" href="assets/css/fontawesome.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/owl.css">

    <?php
}
?>