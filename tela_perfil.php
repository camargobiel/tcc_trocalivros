<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title> Perfil </title>
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
      include ('conexao.php');
      include ('navbar.php');

      $email = $_SESSION["email"];
      //$foto_perfil = $_POST["arquivo"];
      //echo $email;
      if(isset($_POST['cadastrar'])){
        if(($_FILES["arquivo"]["name"]!="")){
          $pastaArquivos = 'fotos_perfil/';
          $nomeArquivo = $_FILES["arquivo"]["name"];
          $nomeTemporario = $_FILES["arquivo"]["tmp_name"];

          if(move_uploaded_file($nomeTemporario,$pastaArquivos.$nomeArquivo)){
            include "conexao.php";
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
  <div class = "area_perfil">
    <table>
    <tr>
      <td style = "width:20%;">
        <?php echo "<img name = 'foto_perfil' class = 'foto_perfil' src = 'fotos_perfil/". $foto_perfil ."'>";?>
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <input type="file" id="arquivo" name = "arquivo" class = "select_imagem"><br>
            <button type="submit" name="cadastrar" id="cadastrar" class = "btn_foto hvr-sweep-to-right"> Atualizar foto </button>
          </div> 
        </form>
      </td>
        <?php 
        $sql="select * from tb_usuario where email = '$email'";
        $result= mysqli_query($conn, $sql);
        while($dados=mysqli_fetch_assoc($result)){
          $nome = $dados['nome'];
          $cep = $dados['cep'];
          $senha = $dados['senha'];
        }
        
            echo '<td>
            <div class = "dados_campos"> <br>
              <div class = "dados"> <b> Nome: </b>'.$nome.' </div> 
              <div class = "dados"> <b> Email: </b>'.$_SESSION["email"].' </div>
              <div class = "dados"> <b> Senha: </b>'."*****".'</div>
              <div class = "dados"> <b> Cep: </b>'.$cep.' </div>
            </div>
              <a href = "tela_alterar_perfil.php" class = "hvr-sweep-to-right" style = "width:50%;margin-left:30%; margin-top:20px; background-color:#301b3f;color:white;border-width:0;border-radius:10px;font-size:17px;text-align:center;"> Alterar dados cadastrais</a>
            </td>
            ';     
        
        ?> 
        
      
    </tr>
    </table>
  </div>
 </body>
 </html>