<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title> Meu perfil </title>
  <meta charset="utf-8">
      <!-- TROCANDO A FOTO DO LINK DO SITE -->
      <link rel="shortcut icon" href="../imagens/celular_logo.png">
  <meta name="viewport" content="width=device-width, initial-scale=0.8">
  <link href="../css/estilo_perfil.css" rel="stylesheet" type="text/css">
  <link href="../css/navbar_items.css" rel="stylesheet" type="text/css">
  <link href="../css/hover.css" rel="stylesheet" type="text/css">
  <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="../js/jquery-3.5.1.min.js"> </script>
  <script type="text/javascript" src="../js/bootstrap.min.js"> </script>
</head>
<body>
  <?php
       include ('../sistemas/sistema_navbar.php'); 
       include ('../sistemas/sistema_conexao.php'); 

      $email = $_SESSION["email"];

      if(isset($_POST['cadastrar'])){
        if(($_FILES["arquivo"]["name"]!="")){
          $pastaArquivos = '../fotos_perfil/';
          $nomeArquivo = $_FILES["arquivo"]["name"];
          $nomeTemporario = $_FILES["arquivo"]["tmp_name"];

          if(move_uploaded_file($nomeTemporario,$pastaArquivos.$nomeArquivo)){
            include "../conexao.php";
          }
          $sql = "update tb_usuario set foto_perfil = '$nomeArquivo' where email = '$email'";
          $resultado = mysqli_query($conn, $sql);
        }
      }
          $sql = "select * from tb_usuario where email = '$email'";
          $resultado = mysqli_query($conn, $sql);
          if($resultado->num_rows > 0){
            while($row = mysqli_fetch_assoc($resultado)){
              $foto_perfil = $row["foto_perfil"];
            }
          }
          
  ?>
    <div class = "area_foto">
        <?php echo "<img name = 'foto_perfil' class = 'foto_perfil' src = '../fotos_perfil/". $foto_perfil ."'>";?>
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <input type="file" id="arquivo" name = "arquivo" class = "arquivo"><br>
            <button type="submit" style = 'margin-top:20px;background-color:#5e17eb;border-color:#5e17eb;' name="cadastrar" id="cadastrar" class = "btn btn-primary"> Atualizar foto </button>
          </div> 
        </form>
    </div>
        <?php 
        $sql="select * from tb_usuario where email = '$email'";
        $result= mysqli_query($conn, $sql);
        while($dados=mysqli_fetch_assoc($result)){
          $nome = $dados['nome'];
          $cep = $dados['cep'];
          $senha = $dados['senha'];

          $senha = str_repeat("*", strlen($senha)); 
          
          
          echo "
          <div class = 'tudo_dados'><br>
            <div class = 'dados'> <b> Nome: </b> $nome </div>
            <div class = 'dados'> <b> CEP: </b> $cep </div>
            <div class = 'dados'> <b> Senha </b> $senha </div>
            <div class = 'dados'> <b> E-mail: </b> $email </div>
            <form method='get' action='tela_alterar_perfil.php'>
              <button type='submit' style = 'margin-top:20px;background-color:#5e17eb;border-color:#5e17eb;' class = 'btn btn-primary'> Alterar dados do perfil </button> 
            </form>
          </div>
          
          
        ";
        }

        
 
        
        ?> 
      
 </body>
 </html>