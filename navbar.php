<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title></title>
  <meta charset="utf-8">
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/navbar_items.css" rel="stylesheet" type="text/css">
  <link href="css/hover.css" rel="stylesheet" type="text/css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"> </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

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

      <div class = "fixado">
        <form class="d-flex">
          <input class="form-control barra_pesquisa" type="search" placeholder="Pesquisar livros" aria-label="Search" required>
            &nbsp;<a href = "telas/tela_pesquisar.php"> 
                    <button class="botao_pesquisar hvr-sweep-to-right" type="submit">  
                      Pesquisar 
                    </button> 
                  </a>
        </form>
      </div>
        <?php
          
          session_start(); 
          
          if(!empty($_SESSION["email"])){
            echo "
            <div class='dropdown'>
              <button style = 'margin-right:70px; margin-left:10px; margin-top:5px; background-color:#5e17eb;' class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>
                Pefil
              </button>
              <ul class='dropdown-menu' aria-labelledby='dropdownMenuButton1'>
                <li><a class='dropdown-item' href='tela_perfil.php'>Ver perfil</a></li>
                <li><a class='dropdown-item' href='tela_anuncio.php'> Meus anúncios </a></li>
                <li><a class='dropdown-item' href='chat-index.php'> Chat </a></li>
                <li><a class='dropdown-item' style = 'background-color:red; color:white;' href='sair.php'>Sair</a></li>

              </ul>
            </div>";
            //echo "<div style = 'color:white;'> olá, " . $_SESSION["email"] . "</div>";
            //echo "<a class='nav-link' href='' style = 'color:white; margin-left:50px;'> Sair </a>";
          }else{
            echo "<a href = 'tela_login.php'> <button class='hvr-sweep-to-right botao_logar' type='submit'>  Fazer login </button> </a>";
          }

        ?>
      
      
    </div>
  </nav>
</body>
</html>
  