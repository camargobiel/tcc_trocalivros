<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">

  <!-- CHAMANDO ARQUIVOS .CSS -->
  <link href="../bootstrap_css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="../css/navbar_items.css" rel="stylesheet" type="text/css">
  <link href="../bootstrap_css/hover.css" rel="stylesheet" type="text/css">

  <!-- CHAMANDO ARQUIVOS .JS -->
  <script type="text/javascript" src="../js/jquery-3.5.1.min.js"> </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</head>
<body>
  <nav class="navbar nav_bar_fixed navbar-expand-lg">
    <div class="container-fluid"> 
      <a href = "../telas/index.php" class="navbar-brand"> <div class = "icone_nav_logo"> </div> </a> <!-- ICONE PRINCIPAL -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item" style = "margin-left:20px;">
            <a class="nav-link active navbar_items" aria-current="page">  </a>
          </li>       
        </ul>
      </div>

      <div class = "fixado">
        <form action = "../telas/tela_pesquisa.php" class="d-flex">
          <input name = "pesquisarLivro" id = "pesquisarLivro" class="form-control barra_pesquisa" type="text" placeholder="Pesquisar livros" aria-label="Search" required>
            &nbsp;<a href = "../telas/tela_pesquisar.php"> 
                    <button type = "submit" class="botao_pesquisar hvr-sweep-to-right" type="submit">  
                      Pesquisar 
                    </button> 
                  </a>
        </form>
      </div>

  <?php
    if(!isset($_SESSION)){
      session_start(); 
    }      
          
    if(!empty($_SESSION["email"])){

      //DROPDOWN
      echo "

        <div class='dropdown'>
          <button style = 'margin-right:70px; margin-left:10px; margin-top:5px; background-color:#5e17eb;' class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>
            Pefil
          </button>
          <ul class='dropdown-menu' aria-labelledby='dropdownMenuButton1'>
            <li><a class='dropdown-item' href='../telas/tela_perfil.php'>Ver perfil</a></li> 
            <li><a class='dropdown-item' href='../telas/tela_meus_anuncios.php'> Meus anúncios </a></li>
            <li><a class='dropdown-item' href='../chat-index.php'> Chat </a></li>
            <li><a class='dropdown-item' style = 'background-color:red; color:white;' href='../sistemas/sistema_sair.php'> Sair </a></li>
          </ul>
        </div>
        
      ";
    }else{

      //BOTAO FAZER LOGIN
      echo "<a href = 'tela_login.php'> <button class='hvr-sweep-to-right botao_logar' type='submit'>  Fazer login </button> </a>"; 
    }

  ?>
      
    </div>
  </nav>
</body>
</html>
  