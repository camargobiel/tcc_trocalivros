<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title></title>
  <meta charset="utf-8">
  <link href="css/estilo_perfil.css" rel="stylesheet" type="text/css">
  <link href="css/hover.css" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="js/jquery-3.5.1.min.js"> </script>
  <script type="text/javascript" src="js/bootstrap.min.js"> </script>
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
          $sql = "select * from tb_usuario where email = '$email' ";
          $resultado = mysqli_query($conn, $sql);
          if($resultado->num_rows > 0){
            while($row = mysqli_fetch_assoc($resultado)){
              $foto_perfil = $row["foto_perfil"];
            }
          }
          
          echo "<img name = 'foto_perfil'style = 'width:200px; height:200px; border-radius:100px; margin-top:30px; margin-left:30px;' src = 'fotos_perfil/". $foto_perfil ."'>";
      
      
  ?>
        <form action="" method="POST" enctype="multipart/form-data">
		<!-- quando o objeto do tipo file (input type=file) é utilizado, se faz necessário usar a codificação
         multipart/form-data no atributo enctype da criação do formulario -->
	   <div class="form-group">
         <div class="col-md-6 offset-md-3">
           <label for="formFile" class="form-label"> Imagem </label>
           <input type="file" id="arquivo" name = "arquivo"/>
	     </div>
	  </div>
	  <br>
	  <div class="form-group">
        <div class="col-md-6 offset-md-3">
          <input type="submit" value="Cadastrar" name="cadastrar" id="cadastrar" >
        </div>
    </div>

    

</form>

 </body>
 </html>