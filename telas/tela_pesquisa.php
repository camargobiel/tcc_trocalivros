<!DOCTYPE html>
<html dir="ltr" lang="pt">
  <head>
    <title> Tela principal </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <link href="../bootstrap_css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../css/estilo_index.css" rel="stylesheet" type="text/css">
    <link href="bootstrap_css/hover.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../js/jquery-3.5.1.min.js"> </script>
    <script type="text/javascript" src="../js/bootstrap.min.js"> </script>
  </head>
<body>
  
    <?php 
    include('../sistemas/sistema_conexao.php');
    include('../sistemas/sistema_navbar.php');
        $titulo_livro_pesquisa = $_GET["pesquisarLivro"];

        $titulo_livro_pesquisa = rawurlencode($titulo_livro_pesquisa);
        $chaveApi = "AIzaSyC4sWzWpIQc0ltz26lXDMxX-Wt24o4ejZ8";
        $url = 'https://www.googleapis.com/books/v1/volumes?q='.$titulo_livro_pesquisa.'&key='.$chaveApi;
        $livros = json_decode(file_get_contents($url));
        $item = $livros->items[0];
        $armazenaID = $item->id."<br>"; //string
        $armazenaAutor = $item->volumeInfo->authors; //array
        $armazenaTitulo = $item->volumeInfo->title; //string
        $armazenaDescricao = $item->volumeInfo->description; //string

        
        $sql = "select
        id_anuncio,
        titulo
        from tb_livro
        inner join tb_anuncio on cod_livro = id_livro
        where titulo = '$armazenaTitulo'";
        $resultado = mysqli_query($conn, $sql);
        if(mysqli_num_rows($resultado)<=0) {
          echo "<h2 style = 'color:white;text-align:center; margin-bottom:40px; margin-top:40px;'> Pesquisa: $armazenaTitulo </h2>";
          echo "<p style = 'color:white;text-align:center;'> Nenhum anúncio desse livro! </p>";
        }else{
          while($dados = mysqli_fetch_assoc($resultado)){
            $titulo = $dados['titulo'];
          }
              
          $titulo = rawurlencode($titulo);
          $chaveApiLivro = "8f46ed9a3176f2e7a114f81ad9385f04958e2d567b08c732f5a57f8e69a8cf5a";
          $url = 'https://serpapi.com/search.json?q='.$titulo.'capa&livro&tbm=isch&ijn=0&api_key='.$chaveApiLivro;
          $capa_livros = json_decode(file_get_contents($url));
          $capa = $capa_livros->images_results[0]->thumbnail;
          echo "<h2 style = 'color:white;text-align:center; margin-bottom:40px; margin-top:40px;'> Pesquisa: $armazenaTitulo </h2>";
          
          echo "
              <td> 
              <a href = 'tela_livro.php?titulo=$titulo&capa=$capa'> <center>
                <img src = '$capa' class = 'card_livro_todos' id = 'teste'> 
                </a></center>

                
              </td>
              
              ";
        }
        
          
        
      


    
    ?>


</body>
</html>