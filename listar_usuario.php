<?php 
  if( !isset($_SESSION['id']) || !isset($_SESSION['nome']) ){
    unset($_COOKIE['session']);
    unset($_SESSION['id']);
    unset($_SESSION['nome']);
    $_SESSION['msg'] = "<p class='alert alert-warning alert-dismissible'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Preencha os campos Usuário e Senha</p>";
    header("Location: login.php");
  }
  
  $sql = " SELECT * FROM usuarios ORDER BY nome ";
  $resultado = mysqli_query($conn, $sql);
?>
 
    <div class="container theme-showcase" role="main">
	  <div class="page-header">
        <h1>Lista de Usuários</h1>
      </div>
      <div class="row">
        <div class="col-md-12 table-responsive">
          <div class="msg">
            <?php
              if(isset($_SESSION['msg'])){
                  echo $_SESSION['msg'];
                  unset($_SESSION['msg']);
              }
            ?>
          </div>
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Nome</th>
                <th class="text-center">Usuário</th>
                <th class="text-center">Email</th>
                <th class="text-center">Nível de acesso</th>
                <th class="text-center">Ações</th>
              </tr>
            </thead>
            <tbody>
              <?php if($resultado){
                while ($usuario =  mysqli_fetch_array($resultado)){?>
                  <tr>
                    <td class="text-center"><?php echo $usuario['id']; ?></td>
                    <td class="text-center"><?php echo $usuario['nome']; ?></td>
                    <td class="text-center"><?php echo $usuario['login']; ?></td>
                    <td class="text-center"><?php echo $usuario['email']; ?></td>
                    <td class="text-center"><?php echo $usuario['nivel_acesso_id']; ?></td>
                    <td class="text-center botoes">
                        <a href="administrativo.php?link=4&id=<?php echo $usuario['id']; ?>"><button type="button" class="btn btn-success btn-xs">Visualizar</button></a>
                        <a href="administrativo.php?link=5&id=<?php echo $usuario['id']; ?>"><button type="button" class="btn btn-warning btn-xs">Editar</button></a>
                        <a href="administrativo.php?link=6&id=<?php echo $usuario['id'];?>"><button type="button" data-toggle="modal" data-target="#confirm" class="btn btn-danger btn-xs" name="btnExcluir" value="excluir">Excluir</button></a>
                    </td>
                  </tr>
              <?php }?>
              <?php }?>
            </tbody>
          </table>
        </div>
    </div>
    </div> <!-- /container -->

