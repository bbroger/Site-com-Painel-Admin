<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <h2>Área Restrita</h2>
    <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    <form method="POST" action="valida.php">
        <label>Usuário</label>
        <input type="text" name="usuario" placeholder="Digite seu nome de usuário"><br/><br/>
        <label>Senha</label>
        <input type="text" name="senha" placeholder="Digite sua senha"><br/><br/>

        <input type="submit" name="btnLogin" value="Acessar">
    </form>
</body>
</html>