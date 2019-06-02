<?php 
  if( !isset($_SESSION['id']) || !isset($_SESSION['nome']) ){
    unset($_COOKIE['session']);
    unset($_SESSION['id']);
    unset($_SESSION['nome']);
    $_SESSION['msg'] = "<p class='alert alert-warning alert-dismissible'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Preencha os campos Usuário e Senha</p>";
    header("Location: login.php");
  }

  $id = $_GET['id'];
  
  $queryIdUsuario = " SELECT * FROM usuarios WHERE id = $id LIMIT 1 ";
  $resultado = mysqli_query($conn, $queryIdUsuario);
  $usuario =  mysqli_fetch_array($resultado);
  
?>

    <div class="container theme-showcase" role="main">
      <div class="page-header">
          <h1>Visualizar Usuário</h1>
      </div>
      <div class="row text-center">
        <div class="col-md-12">
          <form class="form-horizontal">
            
            <div class="form-group">
              <label for="nome" class="col-sm-6 control-label">Nome:</label>
              <div class="col-sm-6">
                <label for="nome" class="col-sm-2 control-label"><?php echo $usuario['nome']; ?></label>
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-6 control-label">Email:</label>
              <div class="col-sm-6">
                <label for="email" class="col-sm-2 control-label"><?php echo $usuario['email']; ?></label>
              </div>
            </div>

            <div class="form-group">
              <label for="login" class="col-sm-6 control-label">Login:</label>
              <div class="col-sm-6">
                <label for="login" class="col-sm-2 control-label"><?php echo $usuario['login']; ?></label>
              </div>
            </div>

            <div class="form-group">
              <label for="nivel_acesso" class="col-sm-6 control-label">Nível de acesso:</label>
              <div class="col-sm-6">
                <label for="nivel_acesso" class="col-sm-2 control-label"><?php echo $usuario['nivel_acesso_id']; ?></label>
              </div>
            </div>

            <div class="form-group">
              <div class="col">
              <a href="administrativo.php?link=2"><button type="button" class="btn btn-success">Voltar</button></a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div> <!-- /container -->

