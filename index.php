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
    <?php include ('navbar.php'); include('conexao.php');?>
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
    <?php 

      $pegarTITULO = "select distinct titulo from tb_livro";
      $resultado = mysqli_query($conn, $pegarTITULO);

      $sql = "select id_livro from tb_livro";
      $result = mysqli_query($conn, $sql);

      if($resultado->num_rows > 0){
        while($row = mysqli_fetch_assoc($resultado)){
            
            $titulo = $row['titulo'];
            
            $titulo = rawurlencode($titulo);
            $url = 'https://serpapi.com/search.json?q='.$titulo.'&tbm=isch&ijn=0&api_key=8f46ed9a3176f2e7a114f81ad9385f04958e2d567b08c732f5a57f8e69a8cf5a';
            $capa_livros = json_decode(file_get_contents($url));
            $capa = $capa_livros->images_results[0]->thumbnail;
            
            $row2 = mysqli_fetch_assoc($result);
            $id_anuncio_todos = $row2["id_livro"];

            echo "
            <td> 
              <a href = ''> 
                <label for = 'teste'> $id_anuncio_todos </label> <br><img src = '$capa' class = 'card_livro_todos' id = 'teste'> 
              </a>
            </td>
            
            ";
        }
      }

      
    
    ?>
          
      </tr>
    </table>

    


</body>
</html>