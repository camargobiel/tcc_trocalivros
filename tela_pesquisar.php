<!DOCTYPE html>
<html dir="ltr" lang="pt">
  <head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/estilo_pesquisar.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"> </script>
    <script type="text/javascript" src="js/bootstrap.min.js"> </script>
  </head>
  <body> 
  <?php 
    include ('menu_login.php')
  ?>
<div>
    <h3 class = "titulo_principal"> Principal resultado: <p style = "color:#B777E3;"> 1984 </p> </h3>
    
    <div class = "principal_div">
        <div class = "centralizar">
            <div class = "livro_hover">
            <a href = "tela_livro.php">
                <div class="card_livro">
                <img src="imagens/exemplo_livro2.jpg" class="img_card">
                </div>
            </a>
            </div>
        </div>
    </div>

    <div class = "resultados_semelhantes">
        <h3 class = "titulo_semelhantes"> Resultados semelhantes  </h3>
        <br><br>
        <div class = "centralizar_semelhantes">
            <div class = "livro_hover">
            <a href = "tela_livro.php">
                <div class="card_livro_S">
                <img src="imagens/exemplo_livro10.jpg" class="img_card_S">
                </div>
            </a>
            </div>

            <div class = "livro_hover">
            <a href = "tela_livro.php">
                <div class="card_livro_S">
                <img src="imagens/exemplo_livro12.jpg" class="img_card_S">
                </div>
            </a>
            </div>

            <div class = "livro_hover">
            <a href = "tela_livro.php">
                <div class="card_livro_S">
                <img src="imagens/exemplo_livro14.jpg" class="img_card_S">
                </div>
            </a>
            </div>

            <div class = "livro_hover">
            <a href = "tela_livro.php">
                <div class="card_livro_S">
                <img src="imagens/exemplo_livro7.jpg" class="img_card_S">
                </div>
            </a>
            </div>
        </div>

        <h3 class = "titulo_semelhantes"> Outros livros de <span style = "color:#B777E3;"> George Orwell </span> </h3>
        <br><br>
        <div class = "centralizar_semelhantes">
            <div class = "livro_hover">
                <a href = "tela_livro.php">
                    <div class="card_livro_S">
                    <img src="imagens/exemplo_livro1.jpg" class="img_card_S">
                    </div>
                </a>
            </div>

            <div class = "livro_hover">
                <a href = "tela_livro.php">
                    <div class="card_livro_S">
                    <img src="imagens/exemplo_livro19.jpg" class="img_card_S">
                    </div>
                </a>
            </div>
        </div>
    </div>
    
 
</body>
</html>