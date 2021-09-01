<!DOCTYPE html>
<html dir="ltr" lang="pt">
  <head>
    <title> Tela de registro </title>

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
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
    <!-- CHAMANDO ARQUIVOS SWEET ALERT -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  </head>
<body>
  <?php include ('../sistemas/sistema_navbar.php');
  
  ?>
    <div class = "container">
      <div class = "container_login">
        <form action = '../sistemas/sistema_registro.php' method = "post">
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
            
            <label for="olho" id = "inf_login"> Ver senha </label>
            <input id = "olho" type="checkbox" onclick="show()"> 
            
          </div>
          <p> <a href = "tela_login.php"> Já tem cadastro? Faça o login aqui </a> </p>
          <button type="submit" class="btn" style="width: 100%; background-color: #5e17eb; color:white;" id="botao" name="botao"> Fazer registro </button> <!-- botao para registrar -->
          <p  id = "teste">  </p>
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