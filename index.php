<!DOCTYPE html>
<html dir="ltr" lang="pt">
  <head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/estilo_index.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"> </script>
    <script type="text/javascript" src="js/bootstrap.min.js"> </script>
  </head>
<body>
  <?php include ('menu_login.php'); ?>
  <div class="container-fluid">
    <h3 class = "titulo_mais_trocados"> Os 4 livros mais trocados </h3>
    
    <div class = "center_cards">
      <a href = "tela_livro.php">
      <div class="card_livro ">
        <div class = "bloco"> <img src="imagens/exemplo_livro1.jpg" class="img_card"> </div>
        <div class="card-body">
          <h4 class="card_title card-title card-text"> Revolução dos bichos </h4>  
          <h5 class="card-subtitle card-text"> George Orwell </h5>  
        </div>
      </div> </a>

      <a href = "tela_livro.php">
      <div class="card_livro">
        <img src="imagens/exemplo_livro2.jpg" class="img_card" alt="...">
          <div class="card-body">
            <h4 class="card_title card-title card-text"> 1984 </h4>  
            <h5 class="card-subtitle card-text"> George Orwell </h5>
          </div>
      </div> </a>
      
      <a href = "tela_livro.php">
      <div class="card_livro">
        <img src="imagens/exemplo_livro3.jpg" class="img_card" alt="...">
          <div class="card-body">
            <h4 class="card_title card-title card-text"> Demon Slayer vol. 1 </h4>  
            <h5 class="card-subtitle card-text"> Koyoharu Gotouge </h5>
          </div>
      </div> </a>

      <a href = "tela_livro.php">
      <div class="card_livro">
        <img src="imagens/exemplo_livro5.jpg" class="img_card" alt="...">
          <div class="card-body">
            <h4 class="card_title card-title card-text"> O Capital </h4>  
            <h5 class="card-subtitle card-text"> Karl Marx </h5>
          </div>
      </div> </a>

    </div>
</body>
</html>