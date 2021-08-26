<!DOCTYPE html>
<html dir="ltr" lang="pt">
  <head>
    <title> Tela de login </title>

    <!-- TROCANDO A FOTO DO LINK DO SITE -->
    <link rel="shortcut icon" href="../imagens/celular_logo.png">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">

    <!-- CHAMANDO ARQUIVOS .CSS -->
    <link href="../bootstrap_css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../css/navbar_items.css" rel="stylesheet" type="text/css">
    <link href="../css/estilo_login.css" rel="stylesheet" type="text/css">
    <link href="../bootstrap_css/hover.css" rel="stylesheet" type="text/css">

    <!-- CHAMANDO ARQUIVOS .JS -->
    <script type="text/javascript" src="../js/jquery-3.5.1.min.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
  </head>
<body> 
  <?php include ('../sistemas/sistema_navbar.php'); ?>
    <div class = "container">
      <div class = "container_login">
        <form action = "../sistemas/sistema_login.php" method = "POST">
          <div class="mb-3"> 
            <label for="email" class="form-label" id = "inf_login"> E-mail </label> 
            <input type="text" class="form-control" name = "email" required> <!-- input do login -->
          </div>
          <div class="mb-3">
            <label for="senha" class="form-label" id = "inf_login"> Senha </label>
            <input type="password" class="form-control" name = "senha" required> <!-- input da senha -->
          </div>
          <p> <a href = "../telas/tela_registro.php"> Não tem cadastro? Cadastre-se aqui </a> </p>
          <button type="submit" class="btn" style="width: 100%; background-color: #5e17eb;" id = "inf_login"> Fazer login </button>
        </form>
      </div> 
    </div>
  </body>
</html>