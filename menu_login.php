<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title></title>
  <meta charset="utf-8">
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/navbar_items.css" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="js/jquery-3.5.1.min.js"> </script>
  <script type="text/javascript" src="js/bootstrap.min.js"> </script>
</head>
<body>
  <nav class="navbar nav_bar_fixed navbar-expand-lg">
    <div class="container-fluid"> 
      <a href = "index.php" class="navbar-brand"> <div class = "icone_nav_logo"> </div> </a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item" style = "margin-left:20px;">
            <a class="nav-link active navbar_items" aria-current="page">  </a>
          </li>       
        </ul>
      </div>

      <form class="d-flex center">
        <!-- <div class = "barra_pesquisa"> -->
        <input class="form-control barra_pesquisa" type="search" placeholder="Pesquisar livros" aria-label="Search">
        <!-- </div> -->
          &nbsp;<a href = "tela_pesquisar.php"> <button class="botao_pesquisar hvr-sweep-to-right" type="submit">  Pesquisar </button> </a>
      </form>

      <a href = "tela_login.php"> <button class="hvr-sweep-to-right botao_logar" type="submit">  Fazer login </button> </a>
        
    </div>
  </nav>
</body>
</html>
  