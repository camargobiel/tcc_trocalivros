<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title> Alterar dados cadastrais </title>
  <meta charset="utf-8">
  <!-- TROCANDO A FOTO DO LINK DO SITE -->
  <link rel="shortcut icon" href="../imagens/celular_logo.png">
  <meta name="viewport" content="width=device-width, initial-scale=0.8">



  <!-- CHAMANDO ARQUIVOS .CSS -->
  <link href="../bootstrap_css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="../bootstrap_css/hover.css" rel="stylesheet" type="text/css">
  <link href="../css/estilo_perfil.css" rel="stylesheet" type="text/css">

  <!-- CHAMANDO ARQUIVOS .JS -->
  <script type="text/javascript" src="../js/jquery-3.5.1.min.js"> </script>
  <script type="text/javascript" src="../js/bootstrap.min.js"> </script>

</head>
<body>
<?php        
    include ('../sistemas/sistema_navbar.php'); 
    include ('../sistemas/sistema_conexao.php');
    $email=$_SESSION["email"];

    $sql = "select * from tb_usuario where email = '$email'";
    $result= mysqli_query($conn, $sql);
    if($dados=mysqli_fetch_assoc($result)){
        $email = $dados["email"];
        $nome = $dados["nome"];
        $cep = $dados["cep"];
        $senha = $dados["senha"];
    }
?>
<h1 style = 'color:white;text-align:center;margin-top:40px;'> Alterar dados cadastrais </h1>
<div class = "container">
      <div class = "container_login">
        <form action = "../sistemas/sistema_alterar_perfil.php" method = "POST">
          <div class="mb-3"> 
            <label for="nome" class="form-label" id = "inf_login"> <div style = "color:white;"> Nome </div> </label> 
            <input type="text" class="form-control" id = "nome" name = "nome" value = "<?php echo $nome;  ?>" required> <!-- input do login -->
          </div>
          <div class="mb-3">
            <label for="senha" class="form-label" id = "inf_login"> <div style = "color:white;"> Senha </div></label>
            <input type="password" class="form-control" name = "senha"  id = "senha" value = "<?php echo $senha;  ?>" required> <!-- input da senha -->
          </div>
            <label for="olho" id = "inf_login"> <div style = "color:white;"> Ver senha </div></label>
            <input id = "olho" type="checkbox" onclick="show()">  
          <div class="mb-3">
            <label for="cep" class="form-label" id = "inf_login"> <div style = "color:white;"> CEP </div> </label>
            <input type="text" class="form-control" name = "cep" id = "cep" value = "<?php echo $cep;  ?>" required> <!-- input da senha -->
          </div>
          <input type="submit" value = "Alterar dados" name = "botao_atualizar" class="hvr-sweep-to-right btn" style="width: 100%; background-color: #301b3f;color:white;" id = "inf_login">
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