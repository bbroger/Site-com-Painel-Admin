<?php
    //captura as informações enviadas via GET
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    
    //Realizar o update no banco
    $queryDelete = " DELETE FROM usuarios WHERE id = '$id'; ";

    $resultado_usuario = mysqli_query($conn, $queryDelete);

    if($resultado_usuario){
        $_SESSION['msg'] = "<p class='alert alert-success alert-dismissible'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Usuário excluído com sucesso.</p>";
        header("Location: administrativo.php?link=2");
    }else{
        $_SESSION['msg'] = "<p class='alert alert-warning alert-dismissible'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Não foi possível excluir esse usuário, tente novamente..</p>";
        header("Location: administrativo.php?link=2");
    }
?>