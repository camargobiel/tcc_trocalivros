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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  </head>
  <body>
  <?php 
    include ('navbar.php');
  ?>
    <div class = "container">
      <div class = "container_login">
        <form action = 'sistema_registro.php' method = "post">
          <div class="mb-3">
            <label for="nome" class="form-label" id = "inf_login"> Nome completo: </label> 
            <input type="text" class="form-control" id="nome" name="nome" required> <!-- input do nome completo -->
          </div>
          <div class="mb-3">
            <label for="email" class="form-label" id = "inf_login"> E-mail: </label> 
            <input type="email" class="form-control" id="email"  name="email" required> <!-- input do email -->
          </div>
          
          <div class="mb-3">
            <label for="cep" class="form-label" id = "inf_login"> Digite o CEP (Somente números): </label> 
            <input type="number" class="form-control" id="cep"  name="cep" required> <!-- input do cep -->
          </div>
          <div class="mb-3">
            <label for="senha" class="form-label" id = "inf_login"> Senha: </label>
            <input type="password" class="form-control" id="senha"  name="senha" required> <!-- input da senha -->
            <input id = "olho" type="checkbox" onclick="show()"></label> <label for="olho" id = "inf_login"> Ver senha 
            
          </div>
          <p> <a href = "tela_login.php"> Já tem cadastro? Faça o login aqui </a> </p>
          
          <button type="submit" class="btn" style="width: 100%; background-color: #301b3f; color:white;" id="botao" name="botao"> Registrar </button> <!-- botao para registrar -->
        </form>
      </div> 
    </div>
  </body>
</html>

<script>                       
  function show() {
    var senha = document.getElementById("senha");
    if (senha.type === "password") {
      senha.type = "text";
    } else {
      senha.type = "password";
    }
  }
</script>