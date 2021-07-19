<?php
$id=intval($_POST['idPrd']);
session_start();
$n=0;
$primeiro=false;
$segundo=false;
if(isset($_SESSION['compara1']))
    if($id==$_SESSION['compara1']) {
        unset($_SESSION['compara1']);
        $primeiro = true;

    }

if(isset($_SESSION['compara2']))
    if($id==$_SESSION['compara2']) {
        unset($_SESSION['compara2']);
        $segundo = true;
    }
if($segundo==false && $primeiro==false) { // não desativou nenhum
    if(!isset($_SESSION['compara1'])) // o 1º está livre
        $_SESSION['compara1']=$id;
    elseif(!isset($_SESSION['compara2']))
        $_SESSION['compara2']=$id;
    else
        $_SESSION['compara1']=$id;
}

if(isset($_SESSION['compara1'])) $n++;

if(isset($_SESSION['compara2'])) $n++;

echo $n;

?>