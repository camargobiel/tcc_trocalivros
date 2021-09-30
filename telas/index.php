<!DOCTYPE html>
<html dir="ltr" lang="pt">
  <head>
    <title> Tela principal </title>

    <!-- TROCANDO A FOTO DO LINK DO SITE -->
    <link rel="shortcut icon" href="../imagens/celular_logo.png">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">

    <!-- CHAMANDO ARQUIVOS .CSS -->
    <link href="../bootstrap_css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../css/estilo_index.css" rel="stylesheet" type="text/css">
    <link href="../bootstrap_css/hover.css" rel="stylesheet" type="text/css">

    <!-- CHAMANDO ARQUIVOS .JS -->
    <script type="text/javascript" src="../js/jquery-3.5.1.min.js"> </script>
    <script type="text/javascript" src="../js/bootstrap.min.js"> </script>
  </head>
<body>

  
    
  <?php 

    //CHAMANDO NAVBAR E CONEXAO
    include ('../sistemas/sistema_navbar.php'); 
    include ('../sistemas/sistema_conexao.php');

    //BOO
    echo "<center><img src = '../imagens/BooComTexto.png' class = 'boo''></center>"; 

    //MOSTRANDO OS DOIS TITULOS
    echo "
    <h1 class = 'titulo_todos'> Todos os anúncios </h1>
    
    ";

    //AQUI ESTA PEGANDO O TITULO, ID E COD DO LIVRO DA TELA INICIAL
    $pegarTitulo = "select distinct id_livro, titulo, cod_livro from tb_livro inner join tb_anuncio on id_livro = cod_livro";
    $resultadoTitulo = mysqli_query($conn, $pegarTitulo);

    //AQUI ESTA PEGANDO ID DO LIVRO
    $pegarIDLivro = "select id_livro from tb_livro";
    $resultadoIDLivro = mysqli_query($conn, $pegarIDLivro);
    echo "<table>
    <tr>
    ";
    if($resultadoTitulo->num_rows > 0){
      while($row = mysqli_fetch_assoc($resultadoTitulo)){
        
        $titulo = $row['titulo']; //PEGANDO O TITULO DO LIVRO E O ARMAZENANDO 
        $titulo = rawurlencode($titulo); //TRANSFORMANDO O TITULO EM "CRU"
        
        $chaveApi = "8f46ed9a3176f2e7a114f81ad9385f04958e2d567b08c732f5a57f8e69a8cf5a"; //CHAVE DA API DE PESQUISA
        $chaveApiReserva1 = "a6f10a5569e67e31354503a5aa62fc462cda5da3903cde7a0a1857d15f44f8ec";

        //USANDO UMA API DE PESQUISA NO GOOGLE IMAGENS, PEGA A CAPA DO LIVRO USANDO O TITULO FORNECIDO ANTERIORMENTE
        $url = 'https://serpapi.com/search.json?q='.$titulo.'capa&livro&tbm=isch&ijn=0&api_key='.$chaveApiReserva1; //CONSUMINDO A API
        $capa_livros = json_decode(file_get_contents($url));
        $capa = $capa_livros->images_results[0]->thumbnail; //ARMAZENANDO A CAPA NA VARIAVEL
            
        $row2 = mysqli_fetch_assoc($resultadoIDLivro);
        $id_livro_todos = $row2["id_livro"]; //PEGANDO O ID DO LIVRO

        //AQUI ESTA MOSTRANDO NA TELA A CAPA DOS LIVROS EM FORMA DE TABELA
        $titulo = $titulo = rawurldecode($titulo);
        echo "
          <td> 
            <a href = 'tela_livro.php?titulo=$titulo&capa=$capa'> 
              <img src = '$capa' class = 'card_livro_todos' id = 'teste'>
            </a>
          </td>
        ";
      }

      echo "</tr>
      </table>";
    }
    ?>
          
      
</body>
</html>