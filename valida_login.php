<?php
    require_once("conexao.php");
    session_start();
    //Não permite acessar a página diretamente pelo endereço
    $btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);

    if($btnLogin){
        //captura as informações enviadas via POST
        $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

        //var_dump($senha);
        //exit;
        
        //verifica se os campos usuario e senha foram preenchidos
        if((!empty($usuario) && (!empty($senha)))){
            //gerar senha criptografada
            //$password = password_hash($senha, PASSWORD_DEFAULT);
            //echo $password;
            //exit;
            //Pesquisar o usuário no BD
            $result_usuario = "SELECT id, name, email, password FROM users WHERE email = '$usuario' LIMIT 1";
            $resultado_usuario = mysqli_query($conn, $result_usuario);

            if($resultado_usuario){
                $row_usuario =  mysqli_fetch_assoc($resultado_usuario);

                //var_dump(password_get_info($row_usuario['password']));
                //exit;

                if((password_verify($senha, $row_usuario['password'])) && $usuario === $row_usuario['email']){
                    $_SESSION['id'] = $row_usuario['id'];
                    $_SESSION['name'] = utf8_encode($row_usuario['name']);
                    $_SESSION['email'] = $row_usuario['email'];

                    header("Location: administrativo.php");

                }else{
                    $_SESSION['msg'] = "<p class='alert alert-warning alert-dismissible'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Usuário ou senha incorretos, tente novamente..</p>";
                    header("Location: login.php");
                }
            }else{
                    $_SESSION['msg'] = "<p class='alert alert-warning alert-dismissible'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Usuário ou senha incorretos, tente novamente..</p>";
                    header("Location: login.php");
            }

        }else{
            $_SESSION['msg'] = "Preencha os campos Usuário e Senha";
            header("Location: login.php");
        }

    }else{
        $_SESSION['msg'] = "<p class='alert alert-danger alert-dismissible'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Página não encontrada.</p>";
        header("Location: login.php");
    }
?>