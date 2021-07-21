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
      <?php include ('navbar.php'); ?>
    <div class = "container">
      <div class = "container_login">
        <form action = "sistema_login.php" method = "POST">
          <div class="mb-3"> 
            <label for="email" class="form-label" id = "inf_login"> E-mail </label> 
            <input type="text" class="form-control" name = "email" required> <!-- input do login -->
          </div>
          <div class="mb-3">
            <label for="senha" class="form-label" id = "inf_login"> Senha </label>
            <input type="password" class="form-control" name = "senha" required> <!-- input da senha -->
          </div>
          <p> <a href = "tela_registro.php"> Não tem cadastro? Cadastre-se aqui </a> </p>
          <button type="submit" class="btn" style="width: 100%; background-color: #301b3f;" id = "inf_login"> Logar </button>
        </form>
      </div> 
    </div>
  </body>
</html>