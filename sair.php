<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sair</title>
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/estilo.css" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="js/jquery-3.5.1.min.js"> </script>
  <script type="text/javascript" src="js/bootstrap.min.js"> </script>
</head>
  <body>
 
 <?php
  session_start();
  //destruindo (limpando as variaves de sessao)
  session_destroy();
  
  //redirecionando para o inicio ao sair
  header("Location:index.php");
  
 ?>
 </body>
 </html>