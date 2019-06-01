<?php 
  session_start();
  require_once("processa/conexao.php");

  if( !isset($_SESSION['id']) || !isset($_SESSION['nome']) ){
    unset($_COOKIE['session']);
    unset($_SESSION['id']);
    unset($_SESSION['nome']);
    $_SESSION['msg'] = "<p class='alert alert-warning alert-dismissible'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Preencha os campos Usuário e Senha</p>";
    header("Location: login.php");
  }
  
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="painel administrativo">
    <meta name="author" content="RCS SOFT">
    <link rel="icon" href="assets/imagens/favicon.ico">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.4/examples/theme/">

    <title>Cadastrar Usuários</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/theme.css" rel="stylesheet">
    
    <script src="assets/js/ie-emulation-modes-warning.js"></script>
  </head>

  <body>
     <?php require_once("menu_admin.php");?>
    <div class="container theme-showcase" role="main">
      <div class="page-header">
          <h1>Cadastrar Usuários</h1>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="msg">
            <?php
              if(isset($_SESSION['msg'])){
                  echo $_SESSION['msg'];
                  unset($_SESSION['msg']);
              }
            ?>
          </div>
          <form class="form-horizontal" method="POST" action="processa/cad_usuario.php">
            
            <div class="form-group">
              <label for="nome" class="col-sm-2 control-label">Nome</label>
              <div class="col-sm-10">
                <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome completo" required="required">
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email" required="required">
              </div>
            </div>

            <div class="form-group">
              <label for="login" class="col-sm-2 control-label">Login</label>
              <div class="col-sm-10">
                <input type="text" name="login" class="form-control" id="nome" placeholder="Login" required="required">
              </div>
            </div>

            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Senha</label>
              <div class="col-sm-10">
                <input type="password" name="senha" class="form-control" id="inputPassword3" placeholder="Senha">
              </div>
            </div>

            <div class="form-group">
              <label for="nivel_acesso" class="col-sm-2 control-label">Nível de acesso</label>
              <div class="col-sm-10">
                <select class="form-control" name="nivel_acesso">
                  <option value="1">Administrativo</option>
                  <option value="0">Usuário</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name="btnCadastrar" class="btn btn-success" value="cadastrar">Cadastrar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <script src="assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
