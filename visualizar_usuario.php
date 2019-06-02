<?php 
  session_start();
  require_once("processa/conexao.php");
  require_once("processa/head.php");

  if( !isset($_SESSION['id']) || !isset($_SESSION['nome']) ){
    unset($_COOKIE['session']);
    unset($_SESSION['id']);
    unset($_SESSION['nome']);
    $_SESSION['msg'] = "<p class='alert alert-warning alert-dismissible'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Preencha os campos Usuário e Senha</p>";
    header("Location: login.php");
  } else{

    $sql = " SELECT usuarios.id, usuarios.nome, usuarios.email, usuarios.senha, usuarios.login, usuarios.nivel_acesso_id,           nivel_acesso.id, nivel_acesso.nivel_acesso
              FROM usuarios
              INNER JOIN nivel_acesso
              WHERE usuarios.nivel_acesso_id = nivel_acesso.id;";
    
    $resultado = mysqli_query($conn, $sql);
  }
  
?>

<body>
    <?php require_once("menu_admin.php");?>
    <div class="container theme-showcase" role="main">
      <div class="page-header">
          <h1>Visualizar Usuários</h1>
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

          <?php if($resultado){

            while($usuario =  mysqli_fetch_array($resultado)){?>

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
        </div>
      </div>
         <?php }?>
         <?php }?>       
    </div> <!-- /container -->

    <?php require_once("processa/footer.php");?>