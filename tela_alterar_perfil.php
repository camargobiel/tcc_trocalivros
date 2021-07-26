<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=0.8">
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/estilo_perfil.css" rel="stylesheet" type="text/css">
  <link href="css/navbar_items.css" rel="stylesheet" type="text/css">
  <link href="css/hover.css" rel="stylesheet" type="text/css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"> </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</head>
<body>
<?php        
    include_once ('conexao.php');
    include ('navbar.php');
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

<div class = "container">
      <div class = "container_login">
        <form action = "sistema_alterar_perfil.php" method = "POST">
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
          <input type="submit" name = "botao_atualizar" class="hvr-sweep-to-right btn" style="width: 100%; background-color: #301b3f;color:white;" id = "inf_login"> </input>
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