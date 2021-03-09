<?php
include_once ("includes/body.inc.php");
?>
<h1>Adicionar novo Telemovel</h1>
<form action="confirmaNovoTelemovel.php" method="post" enctype="multipart/form-data">
    <label>Nome: </label>
    <input type="text" name="nome"><br>
    <label>Log&oacutetipo:</label>
    <input type="file" name="logo"><br>
    <select name="">
        <option value="-1">Escolha a marca...</option>
        <?php
        $sql="select * from ... order by ...Nome";
        $result=mysqli_query($con,$sql);
        while ($dados=mysqli_fetch_array($result)){
            ?>
            <option value="<?php echo $dados['...Id']?>"><?php echo $dados['...Nome']?></option>
            <?php
        }


        ?>
    </select>

    <input type="Submit" value="Adiciona"><br>

