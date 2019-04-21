<?php
    session_start();

    if($_SESSION['id']){

        echo "Olá ".$_SESSION['name'].", seja bem vindo!!!<br /><a href='sair.php'>Sair</a>";

    } else {

        $_SESSION['msg'] = "Necessário fazer login para acessar essa página.";
        header("Location: login.php");
    }
  
?>