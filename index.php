<!DOCTYPE html>
<html dir="ltr" lang="pt">
  <head>
    <title> Tela principal </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/estilo_index.css" rel="stylesheet" type="text/css">
    <link href="css/hover.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"> </script>
    <script type="text/javascript" src="js/bootstrap.min.js"> </script>
  </head>
<body>
    <?php include ('navbar.php'); ?>
    <h1 class = "titulo"> Livros recomendados por nós </h1>
    <table class = "tabela_livros_inicial">
      <tr>

        <th> 
          <a href = ""> <img src = "imagens/exemplo_livro18.jpg" class = "card_livro"> </a>
        </th>

        <th> 
          <a href = ""> <img src = "imagens/exemplo_livro15.jpg" class = "card_livro"> </a>
        </th>
         
        <th> 
          <a href = ""> <img src = "imagens/exemplo_livro13.jpg" class = "card_livro"> </a>
        </th>

      </tr>
    </table>

    <h1 class = "titulo_todos"> Todos os anúncios </h1>

    <table class = "tabela_livros_todos">
      <tr>
          <td> <a href = ""> <img src = "imagens/exemplo_livro3.jpg" class = "card_livro_todos"> </a> </td>
          <td> <a href = ""> <img src = "imagens/exemplo_livro11.jpg" class = "card_livro_todos"> </a> </td>
          <td> <a href = ""> <img src = "imagens/exemplo_livro5.jpg" class = "card_livro_todos"> </a> </td>
          
      </tr>
      
      
    </table>

    


</body>
</html>