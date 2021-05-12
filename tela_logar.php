<!DOCTYPE html>
<html dir="ltr" lang="pt">
  <head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/estilo_login.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"> </script>
    <script type="text/javascript" src="js/bootstrap.min.js"> </script>
  </head>
  <body> 
  <?php 
    include ('menu_login.php')
    ?>
    <div class = "container">
      <div class = "container_login">
        <form>
          <div class="mb-3">
            <label for="email_input" class="form-label" id = "inf_login"> E-mail </label> 
            <input type="text" class="form-control" id="email_input"> <!-- input do login -->
          </div>
          <div class="mb-3">
            <label for="senha_input" class="form-label" id = "inf_login"> Senha </label>
            <input type="password" class="form-control" id="senha_input"> <!-- input da senha -->
          </div>
          <p> <a href = "tela_registrar.php"> Não tem cadastro? Cadastre-se aqui </a> </p>
          <button type="submit" class="btn" style="width: 100%; background-color: #301b3f;" id = "inf_login"> Logar </button> <!-- botao para logar -->
        </form>
      </div> 
    </div>
  </body>
</html>