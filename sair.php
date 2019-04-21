<?php
    session_start();
    
    unset($_SESSION['id'], $_SESSION['name'], $_SESSION['email'] );

    $_SESSION['msg'] = "<p class='alert alert-success alert-dismissible'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Deslogado com sucesso.</p>";

    header("Location: login.php");
?>