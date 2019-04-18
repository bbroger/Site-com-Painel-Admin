<?php
    require_once("conexao.php");
    session_start();
    //Não permite acessar a página diretamente pelo endereço
    $btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);

    if($btnLogin){
        //captura as informações enviadas via POST
        $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
        
        //verifica se os campos usuario e senha foram preenchidos
        if((!empty($usuario) && (!empty($senha)))){
            //gerar senha criptografada
            //echo password_hash($senha, PASSWORD_DEFAULT);
            //Pesquisar o usuário no BD
            $result_usuario = "SELECT id, name, email, password FROM users WHERE email = $usuario LIMIT 1";
            $resultado_usuario = mysqli_query($conn, $result_usuario);

            if($resultado_usuario){
                $row_usuario =  mysqli_fetch_assoc($resultado_usuario);

            var_dump($row_usuario['email']);
            var_dump($row_usuario['senha']);
            exit;

                if(($usuario === $row_usuario['email']) && (password_verify($senha, $row_usuario['password']))){


                }else{
                    $_SESSION['msg'] = "Usuário ou senha incorretos, tente novamente.";
                    header("Location: login.php");
                }
            }else{
                    $_SESSION['msg'] = "Usuário ou senha incorretos, tente novamente.";
                    header("Location: login.php");
            }

        }else{
            $_SESSION['msg'] = "Preencha os campos Usuário e Senha";
            header("Location: login.php");
        }

    }else{
        $_SESSION['msg'] = "Página não encontrada";
        header("Location: login.php");
    }
?>