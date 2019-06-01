<?php
    session_start();

    if($_SESSION['id']){

        echo "Olá ".$_SESSION['name'].", seja bem vindo!!!<br /><a href='sair.php'>Sair</a>";

    } else {

        $_SESSION['msg'] = "<p class='alert alert-warning alert-dismissible'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Necessário fazer login para acessar essa página.</p>";;
        header("Location: login.php");
    }
  
?>