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
      //echo $email;
      $sql = "update tb_usuario set foto_perfil = '$foto_perfil' where email = '$email'";
      $result= mysqli_query($conn, $sql);
      if($result==true){
        echo "deu certo";
      }
      
  ?>
 </body>
 </html>