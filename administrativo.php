<?php 
  session_start();

  if( !isset($_SESSION['id']) || !isset($_SESSION['nome']) ){
    unset($_COOKIE['session']);
    unset($_SESSION['id']);
    unset($_SESSION['nome']);
    $_SESSION['msg'] = "<p class='alert alert-warning alert-dismissible'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Preencha os campos Usuário e Senha</p>";
    header("Location: login.php");
  }
?>
  <body>
    <?php
      require_once("processa/head.php");
  		require_once("menu_admin.php");
  	?>
   
    <div class="container theme-showcase" role="main">
	  <div class="page-header">
        <h4><?php echo utf8_decode($_SESSION['nome'])?>, bem vindo ao painel administrativo.</h4>
      </div>
    </div> <!-- /container -->

    <?php
      require_once("processa/footer.php");
  	?>