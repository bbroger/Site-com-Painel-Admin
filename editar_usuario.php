<?php 
  if( !isset($_SESSION['id']) || !isset($_SESSION['nome']) ){
    unset($_COOKIE['session']);
    unset($_SESSION['id']);
    unset($_SESSION['nome']);
    $_SESSION['msg'] = "<p class='alert alert-warning alert-dismissible'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Preencha os campos Usuário e Senha</p>";
    header("Location: login.php");
  }

  $id = $_GET['id'];
  $id_admin = $_SESSION['id'];

  $queryIdUsuario = " SELECT * FROM usuarios WHERE id = $id LIMIT 1 ";
  $resultado = mysqli_query($conn, $queryIdUsuario);
  $usuario =  mysqli_fetch_array($resultado);

  $queryIdAdmin = " SELECT * FROM usuarios WHERE id = $id_admin LIMIT 1 ";
  $resultado = mysqli_query($conn, $queryIdAdmin);
  $admin =  mysqli_fetch_array($resultado);

?>
    <div class="container theme-showcase" role="main">
      <div class="page-header">
          <h1>Editar Usuário</h1>
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
          <form class="form-horizontal" method="POST" action="processa/edit_usuario.php">
            
            <div class="form-group">
              <label for="nome" class="col-sm-2 control-label">Nome</label>
              <div class="col-sm-10">
                <input type="text" name="nome" class="form-control" id="nome" value="<?php echo $usuario['nome']?>" required="required">
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="email" name="email" class="form-control" id="inputEmail3" value="<?php echo $usuario['email']?>" required="required">
              </div>
            </div>

            <div class="form-group">
              <label for="login" class="col-sm-2 control-label">Login</label>
              <div class="col-sm-10">
                <input type="text" name="login" class="form-control" id="nome" value="<?php echo $usuario['login']?>" required="required">
              </div>
            </div>

            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Senha</label>
              <div class="col-sm-10">
                <input type="password" name="senha" class="form-control" id="inputPassword3" placeholder="Senha">
              </div>
            </div>
            
            <?php if($admin['nivel_acesso_id'] == 1){?>
              <div class="form-group">
                <label for="nivel_acesso" class="col-sm-2 control-label">Nível de acesso</label>
                <div class="col-sm-10">
                  <select class="form-control" name="nivel_acesso">
                    <option value="1" <?php if($usuario['nivel_acesso_id'] == 1){echo "selected";}?>>Administrativo</option>
                    <option value="2" <?php if($usuario['nivel_acesso_id'] == 2){echo "selected";}?>>Usuário</option>
                  </select>
                </div>
              </div>
            <?php } ?>

            <input type="hidden" name="id" class="form-control" id="id_usuario" value="<?php echo $usuario['id']?>" 

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name="btnEditar" class="btn btn-success" value="editar">Editar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div> <!-- /container -->
