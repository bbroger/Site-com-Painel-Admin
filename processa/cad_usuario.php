<?php
    require_once("conexao.php");
    session_start();
    //Não permite acessar a página diretamente pelo endereço
    $btnCadastrar = filter_input(INPUT_POST, 'btnCadastrar', FILTER_SANITIZE_STRING);

    if($btnCadastrar){
        //captura as informações enviadas via POST
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $usuario = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
        $nivel = filter_input(INPUT_POST, 'nivel_acesso', FILTER_SANITIZE_STRING);
 
        //verifica se os campos usuario e senha foram preenchidos
        if(!empty($usuario) && !empty($senha)){
            //gerar senha criptografada
            $cripto = password_hash($senha, PASSWORD_DEFAULT);
            //Pesquisar o usuário no BD
            $queryInsert = " INSERT INTO usuarios (nome, email, senha, login, nivel_acesso_id, created)
            values ('$nome', '$email', '$cripto', '$usuario', '$nivel', NOW()); ";

            $resultado_usuario = mysqli_query($conn, $queryInsert);

            if($resultado_usuario){
                $_SESSION['msg'] = "<p class='alert alert-success alert-dismissible'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Usuário cadastrado com sucesso.</p>";
                header("Location: ../cadastrar_usuario.php");
            }else{
                $_SESSION['msg'] = "<p class='alert alert-warning alert-dismissible'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Não foi possível cadastrar esse usuário, tente novamente..</p>";
                header("Location: ../cadastrar_usuario.php");
            }
        }

    }else{
        $_SESSION['msg'] = "<p class='alert alert-danger alert-dismissible'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Página não encontrada.</p>";
        header("Location: ../login.php");
    }
?>